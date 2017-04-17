<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use App\Shop;
use Cloudder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Shop::where('user_id', Auth::user()->id)->firstOrFail();
        $products = Product::where('shop_id', $shop->id)->paginate(6);

        return view('products.index', [
            'shop' => $shop,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->pluck('name', 'id');
        $subcategories = DB::table('sub_categories')->pluck('name', 'id');

        return view('products.create', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\ProductRequest $request)
    {
        $this->validate($request, [
            'photos' => 'required',
            'photos.*' => 'image',
        ]);

        //Get Shop
        $shop = Shop::where('user_id', Auth::user()->id)->first();

        //Save Product
        try {
            DB::beginTransaction();

            //Save product to database
            $product = new Product($request->all());
            $shop->products()->save($product);

            //Save product images to database
            $input_images = $request->file('photos');

            //Save to database
            if ($input_images) {
                foreach ($input_images as $image) {
                    # Using local storage
                    // $productimages_path = $image->store('public/images/product/photos');
                    // $productimages = new ProductImage(['name' => $productimages_path]);

                    # Using CDN
                    Cloudder::upload($image, null, [
                        'folder' => 'product/photos/',
                        'tags' => 'product'
                    ], null);
                    $productimages = new ProductImage(['name' => Cloudder::getPublicId()]);
                    $product->productimages()->save($productimages);
                }    
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return abort(500);
        }
        
        return redirect()->route('shop.index')->with('message', trans('messages.create success', ['object' => 'Product']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $categories = DB::table('categories')->pluck('name', 'id');
        $subcategories = DB::table('sub_categories')->where('category_id', $product->subcategory_id)->pluck('name', 'id');

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\ProductRequest $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->update($request->except('_token'));

        return redirect()->route('shop.index')->with('message', trans('messages.update success', ['object' => 'Product']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = Product::where('slug', $slug)->first();
        $model->delete();
        return response()->json(['message' => trans('messages.delete success', ['object' => 'Product'])], 200);
    }
}

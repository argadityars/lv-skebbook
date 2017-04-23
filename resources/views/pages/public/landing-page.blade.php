@extends('layouts.landing')

@section('content')

<section id="featured-slider">
	<a href="#"><img src="{{ url('images/web/Background.jpg') }}"></a>
</section>

<section id="featured-search">
	<div class="panel panel-default">
		<div class="panel-body">

			{!! Form::open(['url' => 'books', 'method' => 'GET', 'class' => 'form-inline', 'role' => 'search']) !!}

                <div class="form-group col-md-10">
                    {{ Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'Cari judul buku, genre, penerbit atau penulis disini']) }}
                </div>

                <button type="submit" class="btn btn-danger col-md-2">Cari Buku</button>

            {!! Form::close() !!}

		</div>
	</div>
</section>

<section id="featured-category" class="container-fluid container-addon">
	<div class="row">
			<div class="col-sm-3 col-xs-12">
			    <div class="book">
				    <a href="books">
					    <img src="{{ asset('images/web/Block1.jpg') }}" class="img-responsive book-image">
					</a>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12">
				<div class="book">
				    <a href="books">
					    <img src="{{ asset('images/web/block2.jpg') }}" class="img-responsive book-image">
					</a>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12">
				<div class="book">
				    <a href="books">
					    <img src="{{ asset('images/web/block3.jpg') }}" class="img-responsive book-image">
					</a>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12">
				<div class="book">
				    <a href="books">
					    <img src="{{ asset('images/web/block4.jpg') }}" class="img-responsive book-image">
					</a>
				</div>
			</div>
		</div>
</section>

<section id="featured-content" class="container-fluid container-addon">
	<div class="row">
		<div class="col-md-4">
			<div id="feature-left">
				<div class="img-container">
					<h1>Tidak menemukan buku yang dicari?</h1>
					<p>Biarkan ratusan penjual buku membantu, lelang pencarian buku sekarang.</p>
					<form >
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Judul Buku">
						</div>
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Nama penulis / penerbit">
						</div>
						<div class="form-group">
						  <input type="date" class="form-control" placeholder="Pilih tanggal deadline lelang">
						</div>
						<a type="submit" class="btn btn-outline btn-rounded">Bantu Cari</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<div id="feature-top">
						<div class="img-container">
							<h1>Tunjukan Karyamu</h1>
							<p>Publikasi bukumu sendiri, dapatkan fans page untuk berinteraksi dan mengapresiasi kryamu.</p>
							<a href="#" class="btn btn-outline btn-rounded">Buat halaman<i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div id="feature-right">
						<div class="img-container">
							<h1>E-book dari penulis keren</h1>
							<p>Koleksi dari buku e-book terbaru mulai dari penulis terkenal sampai penulis independen.</p>
							<a href="#" class="btn btn-outline btn-rounded">Cari e-book <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div id="feature-bottom">
						<div class="img-container">
							<h1>Langganan majalah favorite kamu.</h1>
							<div class="form-group">
								<select class="form-control" placeholder="Pilih majalah">
								  <option>Pilih merk majalah</option>
								  <option>CHIP</option>
								  <option>Gadis</option>
								  <option>Tempo</option>
								  <option>Hai</option>
								  <option>Bobo</option>
								  <option>Mentari</option>
								</select>
							</div>
							<a href="#" class="btn btn-outline btn-rounded">Langganan Majalah <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="product-popular" class="">
    <div class="container">
        <div class="page-header">
        	<h3>Buku Populer
        		<div class="pull-right">
        			<!-- Left and right controls -->
        			<a class="btn btn-danger btn-rounded" href="#populerCarousel" role="button" data-slide="prev">
        				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        			</a>
        			<a class="btn btn-danger btn-rounded" href="#populerCarousel" role="button" data-slide="next">
        				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        			</a>
        		</div>
        	</h3>
        </div>

        <div id="populerCarousel" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
                <div class="item active">
        			<div class="row">
        			    @for ($i=0; $i<4; $i++)
            			  <div class="col-sm-6 col-md-3">
            			    <div class="thumbnail">
            						<a href="detail.html">
            			      	<img class="img-responsive" src="{{ asset('images/web/buku.png') }}" alt="buku1">
            						</a>
            			    	<div class="caption">
            							<h5 id="judul">
            								Book Number 1
            								<div id="hearts" class="starrr pull-right"></div>
            							</h5>
            							<a href="detail.html">
            				    		<h4>Novel Drama</h4>
            							</a>
            				    	<h4 id="harga">Rp. 35.000,-</h4>
            			    	</div>
            			    </div>
            			   </div>
                        @endfor
            		</div>
                </div>

            <div class="item">
        			<div class="row">
        			  @for ($i=0; $i<4; $i++)
            			  <div class="col-sm-6 col-md-3">
            			    <div class="thumbnail">
            						<a href="detail.html">
            			      	<img class="img-responsive" src="{{ asset('images/web/buku.png') }}" alt="buku1">
            						</a>
            			    	<div class="caption">
            							<h5 id="judul">
            								Book Number 1
            								<div id="hearts" class="starrr pull-right"></div>
            							</h5>
            							<a href="detail.html">
            				    		<h4>Novel Drama</h4>
            							</a>
            				    	<h4 id="harga">Rp. 35.000,-</h4>
            			    	</div>
            			    </div>
            			   </div>
            		    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section id="product-newest" class="">
<div class="container">
    <!-- Terbaru -->
<div class="page-header">
	<h3>Buku Terbaru
		<div class="pull-right">

			<!-- Left and right controls -->
			<a class="btn btn-danger btn-rounded" href="#newestCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			</a>
			<a class="btn btn-danger btn-rounded" href="#newestCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			</a>

		</div>
	</h3>
</div>

<div id="newestCarousel" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">

			<div class="row">
			    @for ($i=0; $i<4; $i++)
    			  <div class="col-sm-6 col-md-3">
    			    <div class="thumbnail">
    						<a href="detail.html">
    			      	<img class="img-responsive" src="{{ asset('images/web/buku.png') }}" alt="buku1">
    						</a>
    			    	<div class="caption">
    							<h5 id="judul">
    								Book Number 1
    								<div id="hearts" class="starrr pull-right"></div>
    							</h5>
    							<a href="detail.html">
    				    		<h4>Novel Drama</h4>
    							</a>
    				    	<h4 id="harga">Rp. 35.000,-</h4>
    			    	</div>
    			    </div>
    			   </div>
    			  @endfor
			</div>
    </div>

    <div class="item">

			<div class="row">

			  @for ($i=0; $i<4; $i++)
    			  <div class="col-sm-6 col-md-3">
    			    <div class="thumbnail">
    						<a href="detail.html">
    			      	<img class="img-responsive" src="{{ asset('images/web/buku.png') }}" alt="buku1">
    						</a>
    			    	<div class="caption">
    							<h5 id="judul">
    								Book Number 1
    								<div id="hearts" class="starrr pull-right"></div>
    							</h5>
    							<a href="detail.html">
    				    		<h4>Novel Drama</h4>
    							</a>
    				    	<h4 id="harga">Rp. 35.000,-</h4>
    			    	</div>
    			    </div>
    			   </div>
    			  @endfor
					</div>
		    </div>
		  </div>
		</div>
	</div>
</section>

<section id="loops">
	<div class="row container-fluid container-addon">
		<div class="col-md-6 text-right img-container">
			<img src="{{ asset('images/web/loops-logo.png') }}" class="loops-logo">
			<h2>Buku di lemari bisa lebih berguna dan memberi manfaat.</h2>
			<p>Sekarang kamu dapat berdonasi dan meminjamkan buku sesuai dengan keinginan kamu, kapan pun dan kemana saja</p>
			<a href="#" class="btn btn-outline btn-rounded">Galang Donasi</a>
			<a href="#" class="btn btn-filled btn-rounded">Berdonasi</a>
		</div>
	</div>
</section>

<section id="promo">
	<div class="row container-fluid container-addon">
		<div class="col-md-6 col-sm-12" id="promo-left">
			<div class="row">
				<div class="col-sm-4">
					<h1 class="text-center">20%</h1>
				</div>
				<div class="col-sm-8">
					<h2>Rasakan Manfaat</h2>
					<p>Kode kupon untuk setiap toko berverified</p>
					<a href="#" class="btn btn-outline btn-rounded">Lihat kode kupon</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-12 text-center" id="promo-right">
			<h2>Buku yang kamu cari gak ada?</h2>
			<p>Sekarang kamu bisa pesan buku dalam jangka waktu yang kamu mau!</p>
			<a href="#" class="btn btn-outline btn-rounded">Pesan buku</a>
		</div>
	</div>
</section>

@endsection

@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            @include('includes.modules.profile-head')

            <div class="panel panel-default">
                <div class="panel-body">

                    <h4>@lang('titles.user')</h4>
                    <table class="table table-clean table-striped no-margin-btm">
                        <tr>
                            <td class="col-md-3">@lang('forms.name')</td>
                            <td><strong>{{ Auth::user()->name }}</strong></td>
                        </tr>
                        <tr>
                            <td>@lang('forms.email')</td>
                            <td><strong>{{ Auth::user()->email }}</strong></td>
                        </tr>
                        <tr>
                            <td>@lang('forms.password')</td>
                            <td><a href="{{ route('profile.password') }}" class="btn btn-default btn-sm">@lang('actions.edit') Password</a></td>
                        </tr>
                    </table>
                    <hr>
                    <h4>@lang('titles.profile')</h4>
                    <table class="table table-clean table-striped no-margin-btm">
                        <tr>
                            <td class="col-md-3">@lang('forms.province')</td>
                            <td>
                            @if ($profile->province_id) 
                                <strong>{{ ucwords(strtolower($profile->getProvince()->name)) }}</strong>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('forms.city')</td>
                            <td>
                            @if ($profile->city_id)
                                <strong>{{ ucwords(strtolower($profile->getCity()->name)) }}</strong>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('forms.address')</td>
                            <td><strong>{{ $profile->address }}</strong></td>
                        </tr>
                        <tr>
                            <td>@lang('forms.dob')</td>
                            <td><strong>{{ $profile->getDateOfBirth() }}</strong></td>
                        </tr>
                        <tr>
                            <td>@lang('forms.phone')</td>
                            <td><strong>{{ $profile->phone }}</strong></td>
                        </tr>
                        
                    </table>
                </div>
                <div class="panel-footer text-right">
                    <a href="{{ route('profile.edit') }}" class="btn btn-default btn-sm">@lang('actions.edit')</a>
                </div>
            </div>
        </div>
    </div>

@endsection
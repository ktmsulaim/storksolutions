@extends('backend.admin-master')

@section('site-title')
    {{__('Counterup Area')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Counterup Settings')}}</h4>
                        <form action="{{route('admin.homeone.counterup')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if(get_static_option('home_page_variant') == '01')
                            <div class="img-preview">
                                @if(file_exists('assets/uploads/'.get_static_option('home_01_counterup_bg_image')))
                                    <img style="max-width: 200px" src="{{asset('assets/uploads/'.get_static_option('home_01_counterup_bg_image'))}}" alt="">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="home_01_counterup_bg_image">{{__('Background Image')}} </label>
                                <input type="file" name="home_01_counterup_bg_image" class="form-control" id="home_01_counterup_bg_image">
                            </div>
                            @endif

                            @if(get_static_option('home_page_variant') == '02' || get_static_option('home_page_variant') == '03')
                            <div class="img-preview">
                                @if(file_exists('assets/uploads/'.get_static_option('home_02_counterup_bg_image')))
                                    <img style="max-width: 200px" src="{{asset('assets/uploads/'.get_static_option('home_02_counterup_bg_image'))}}" alt="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="home_02_counterup_bg_image">{{__('Background Image')}} </label>
                                <input type="file" name="home_02_counterup_bg_image" class="form-control" id="home_02_counterup_bg_image">
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


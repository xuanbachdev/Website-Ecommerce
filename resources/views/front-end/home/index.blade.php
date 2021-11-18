@extends('front-end.layouts.master')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('frontend/home/home.css') }}">
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('frontend/home/home.js') }}"></script>
@endsection

@section('content')

    <!--slider-->
    @include('front-end.home.components.slider')
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">

                @include('front-end.components.sidebar')
                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('front-end.home.components.feature_product')
                    <!--features_items-->

                    <!--category-tab-->
{{--                    @include('front-end.home.components.category_tab')--}}
                    <!--/category-tab-->

                    <!--recommended_items-->
                    @include('front-end.home.components.recommend_product')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>

@endsection

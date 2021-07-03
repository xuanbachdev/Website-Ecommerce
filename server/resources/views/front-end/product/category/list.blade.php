@extends('front-end.layouts.master')

@section('title')
    <title>Danh mục sản phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/home/home.css') }}">
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('frontend/home/home.js') }}"></script>
@endsection

@section('content')
    {{--    <section id="advertisement">--}}
    {{--        <div class="container">--}}
    {{--            <img src="images/shop/advertisement.jpg" alt="" />--}}
    {{--        </div>--}}
    {{--    </section>--}}

    <section>
        <div class="container">
            <div class="row">
               @include('front-end.components.sidebar')

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center"></h2>

                        @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ config('app.base_url') .$product->feature_image_path }}" alt=""/>
                                            <h2>{{ number_format($product->price) }} VND</h2>
                                            <p>{{ $product->product_name }}</p>
{{--                                            <a href="#" class="btn btn-default add-to-cart"><i--}}
{{--                                                    class="fa fa-shopping-cart"></i>Add to cart</a>--}}
                                        </div>
{{--                                        <div class="product-overlay">--}}
{{--                                            <div class="overlay-content">--}}
{{--                                                <h2>{{ number_format($product->price) }}</h2>--}}
{{--                                                <p>{{ $product->product_name }}</p>--}}
{{--                                                <a href="#" class="btn btn-default add-to-cart"><i--}}
{{--                                                        class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Details Product</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $products->links('pagination::bootstrap-4') }}

                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

@endsection






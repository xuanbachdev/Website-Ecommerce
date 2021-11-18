@extends('front-end.layouts.master')
@section('title')
    <title></title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/home/home.css') }}">
@endsection
@section('content')

    <div class="features_items">
    @include('front-end.components.sidebar')
        <h2 class="title text-center">Kết quả tìm kiếm</h2>

        @foreach($search_product as $key => $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt=""/>
                            <h2>{{ number_format($product->price) }} VND</h2>
                            <p>{{ $product->product_name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add
                                to cart</a>
                        </div>

                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{ number_format($product->price) }} VND</h2>
                                <p>{{ $product->product_name }}</p>
                                <button type="submit" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>


                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{ route('product-details', ["product_id" => $product->product_id]) }}"><i class="fa fa-plus-square"></i>Details Product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection

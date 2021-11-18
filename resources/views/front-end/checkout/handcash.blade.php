@extends('front-end.layouts.master')
@section('title')
    <title>Chi tiết đơn hàng</title>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/home/home.css') }}">
@endsection
@section('content')


    <section>
        <div class="container">
            <div class="row">
                @include('front-end.components.sidebar')

                <div class="col-sm-9 padding-right">
                    <section id="cart_items">
                        <div class="container">

                            <div class="review-payment">
                                <h2>Cảm ơn bạn đã đặt hàng</h2>
                            </div>

                        </div>
                    </section> <!--/#cart_items-->
                </div>
            </div>
        </div>
    </section>


@endsection




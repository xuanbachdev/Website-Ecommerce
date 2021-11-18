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
                            <div class="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                                    <li class="active">Giỏ hàng của bạn</li>
                                </ol>
                            </div>
                            <div class="table-responsive cart_info">
                                <?php
                                    $content = Cart::content();
                                ?>
                                <table class="table table-condensed table-bordered">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="image text-center">Hình ảnh</td>
                                        <td class="description text-center">Mô tả</td>
                                        <td class="price text-center">Giá</td>
                                        <td class="quantity text-center">Số lượng</td>
                                        <td class="total text-center">Tổng tiền</td>
                                        <td class="total text-center">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($content as $v_content)
                                    <tr>
                                        <td class="cart_product">
                                            <a href=""><img src="{{  $v_content->options->image }}" width="150" alt=""/></a>
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href="">{{ $v_content->name  }}</a></h4>
                                            <p>Mã ID: {{ $v_content->id }}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{ number_format($v_content->price). ' ' .'VND'  }}</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <form action="{{ URL::to('/update_cart_quantity') }}" method="POST">
                                                    {{ csrf_field() }}
{{--                                                <a class="cart_quantity_up" href=""> + </a>--}}
                                                <input class="cart_quantity_input" type="number" min="1" name="cart_quantity" value="{{ $v_content->qty }}" size="2">
                                                <input type="hidden" value="{{ $v_content->rowId }}" name="rowId_cart" class="form-control">
                                                <input type="submit" value="Cập nhập" name="update_qty" class="btn btn-default btn-sm">
{{--                                                <a class="cart_quantity_down" href=""> - </a>--}}
                                                </form>
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">
                                                <?php
                                               $subtotal = $v_content->price * $v_content->qty;
                                                echo number_format($subtotal).' '.'VND';
                                                ?>
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section> <!--/#cart_items-->

                    <section id="do_action">
                        <div class="container">

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="total_area">
                                        <ul>
                                            <li>Tổng <span>{{Cart::subtotal().' '.'VND'}}</span></li>
                                            <li>Thuế<span>{{Cart::tax().' '.'VND'}}</span></li>
                                            <li>Phí vận chuyển <span>Free</span></li>
                                            <li>Thành tiền <span>{{Cart::total().' '.'VND'}}</span></li>
                                        </ul>


                                        {{-- 	<a class="btn btn-default update" href="">Update</a> --}}

                                        <?php
                                        $customer_id = Session::get('customer_id');
                                        if (isset($customer_id)){
                                        ?>
                                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                                    <?php
                                        }
                                        else{
                                        ?>
                                        <a class="btn btn-default check_out" href="{{URL::to('/login')}}">Thanh toán</a>
                                    <?php
                                        }
                                        ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!--/#do_action-->
                </div>
            </div>
        </div>
    </section>


@endsection




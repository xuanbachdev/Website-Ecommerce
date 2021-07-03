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

                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {!! session()->get('message') !!}
                                </div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                    {!! session()->get('error') !!}
                                </div>
                            @endif
                            <div class="table-responsive cart_info" style="border: none;">

                                <form action="{{url('/update-cart')}}" method="POST">
                                    @csrf
                                <table class="table table-condensed table-bordered">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="image text-center">Hình ảnh</td>
                                        <td class="description text-center">Tên sản phẩm</td>
                                        <td class="price text-center">Giá sản phẩm</td>
                                        <td class="quantity text-center">Số lượng</td>
                                        <td class="total text-center">Thành tiền</td>
                                        <td class="total text-center">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php
                                        $total = 0 ;
                                    @endphp
                                    @if(Session::get('cart') == true)

                                    @foreach(Session::get('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['product_price'] * $cart['product_qty'] ;
                                            $total+= $subtotal;
                                        @endphp
                                        <tr>
                                            <td class="cart_product">
                                                <a href=""><img src="{{  config('app.base_url') . $cart['product_image'] }}" width="150" alt=""/></a>
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href=""></a></h4>
                                                <p>{{ $cart['product_name'] }} </p>
                                            </td>
                                            <td class="cart_price">
                                                <p>{{ number_format($cart['product_price']) }} VND</p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">

{{--                                                        <a class="cart_quantity_up" href=""> + </a>--}}
                                                    <input class="cart_quantity" style="width: 100px" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >


                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">
                                                    {{ number_format($subtotal).' VND' }}
                                                </p>
                                            </td>
                                            <td class="cart_delete">
                                                <a class="cart_quantity_delete" href="{{url('/delete-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <a class="btn btn-default check_out" href="{{ url('/del-all-product') }}">Xoá tất cả giỏ hàng</a>
                                            <input type="submit" value="Cập nhập giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm">
                                        </td>
                                    </tr>

                                        @else
                                        <tr>
                                           <td colspan="6" class="text-center" style="border: solid transparent">
                                               @php
                                                   echo
                                           '<div class="alert alert-success">
                                           Làm ơn thêm sản phẩm vào giỏ hàng
                                               </div>';
                                               @endphp
                                           </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </section> <!--/#cart_items-->

                    <section id="do_action" style="position: relative;right: -30%;">
                        <div class="container">

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="total_area">
                                        <ul>
                                            <li>Tổng tiền: <span>{{ number_format($total) .' VND' }}</span></li>
{{--                                            <li>Thuế<span></span></li>--}}
{{--                                            <li>Phí vận chuyển <span>Free</span></li>--}}

                                            @if(Session::get('coupon'))
                                                @foreach(Session::get('coupon') as $key => $cou)
                                                        @if($cou['coupon_condition']==1)
                                                           <li> Giảm giá : <span> {{$cou['coupon_number'].'%'}}</span></li>
                                                            <p>
                                                                @php
                                                                    $total_coupon = ($total*$cou['coupon_number'])/100;
                                                                    echo '<p><li>Tổng đã giảm:'.'<span>'.number_format($total_coupon).' VND'.'</span>'.'</li></p>';
                                                                @endphp
                                                            </p>
                                                            <p><li>Tổng đã giảm: <span>{{number_format($total-$total_coupon).' VND'}}</span></li></p>
                                            @elseif($cou['coupon_condition']==2)
                                               <li> Giảm giá: <span>{{number_format($cou['coupon_number']).' VND'}}</span></li>
                                                <p>
                                                    @php
                                                        $total_coupon = $total - $cou['coupon_number'];

                                                    @endphp
                                                </p>
                                                <p><li>Thành tiền: <span>{{number_format($total_coupon).' VND'}}</span></li></p>
                                                @endif
                                                @endforeach
                                            @endif
                                        </ul>

                                        @if(Session::get('cart'))
                                        <form action="{{URL::to('/check-coupon')}}" method="POST">
                                            @csrf

                                            @if(Session::get('coupon'))
                                            <a class="btn btn-default check_out" href="{{ url('/unset-coupon') }}"  style="position: relative;right: -35%;">Xoá mã khuyến mãi</a>
                                            @else
                                                <input type="text" class="form-control" style="margin: 20px 0 0 20px; width: 50%;" name="coupon" placeholder="Nhập mã giảm giá">
                                                <input type="submit" class="btn btn-primary check_coupon"  style="position: relative; top: -49px; float: right" name="check_coupon" value="Tính mã giảm giá">
                                            @endif
                                        </form>
                                        @endif

                                            @if(Session::get('customer_id'))
                                            <a class="btn btn-default check_out" style="position: relative;right: -40%;" href="{{URL::to('checkout')}}">Thanh toán</a>
                                            @else
                                            <a class="btn btn-default check_out" style="position: relative;right: -40%;" href="{{URL::to('login')}}">Thanh toán</a>
                                        @endif

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

@section('js')
    <script type="text/javascript">
        $(".alert").fadeTo(3000, 800).slideUp(800, function() {
            $(".alert").slideUp(800);
        });
    </script>


@endsection

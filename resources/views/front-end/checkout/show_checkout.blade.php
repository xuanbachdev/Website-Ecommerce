
@extends('front-end.layouts.master')
@section('title')
    <title>Thông tin thanh toán</title>
@endsection

@section('css')
    {{--    <link rel="stylesheet" href="{{ asset('frontend/home/home.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('frontend/css/customstyle.css') }}">
    <style>
        .panel{
            position: relative;
            right: -50%;
        }

        .custom_button{
            display: flex;
            justify-content: center;
            right: -25%;
        }
    </style>
@endsection

@section('content')
    <div class="row cart-body">
        <form class="form-horizontal" >
           @csrf
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                <!--SHIPPING METHOD-->
                <div class="panel panel-info">
                    <div class="panel-heading text-center" style="color: white; background: #db4118;">Thông tin khách hàng</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <i>(*) Lưu ý: Thông tin khách hàng sẽ được thay đổi khi bạn sửa tại đây!</i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="name">Họ và tên:</label>
                                <input type="text" name="shipping_name" id="name" class="form-control shipping_name" value=""
                                       placeholder="Điền họ và tên"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="email">Email:</label>
                                <input type="email" name="shipping_email" id="email" class="form-control shipping_email" value=""
                                       placeholder="Điền địa chỉ email" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="sdt">Số điện thoại:</label>
                                <input type="text" name="shipping_phone" id="sdt" class="form-control shipping_phone" value=""
                                       placeholder="Điền số điện thoại" />
                            </div>
                        </div>

                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key =>$cou)
                        <input type="hidden" name="order_coupon"  class="form-control order_coupon" value="{{ $cou->coupon_code }}"/>
                            @endforeach
                        @else
                            <input type="hidden" name="order_coupon"  class="form-control order_coupon" value="no"/>
                        @endif
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="diachi">Địa chỉ:</label>
                                <textarea type="text" name="shipping_address" id="diachi" class="form-control shipping_address" rows="1"
                                          placeholder="Điền địa chỉ"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="chuthich">Ghi chú:</label>
                                <textarea type="text" name="shipping_notes" id="chuthich" class="form-control shipping_notes" rows="3"
                                          placeholder="Điền ghi chú"></textarea>
                            </div>
                        </div>

                        <div class="form-group payment-options">
                            <div class="col-md-12">
                                <label for="chuthich">---Chọn hình thức thanh toán---</label>
                                <select name="payment_select" class="form-control payment_select">
                                    <option value="0">Chuyển khoản</option>
                                    <option value="1">Thanh toán khi nhận hàng</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 custom_button">
                                <button type="button" name="send_order" class="btn btn-primary btn-submit-fix send_order"
                                        style="background: #db4118">Xác nhận đơn hàng </button>
                            </div>
                        </div>
                    </div>
                </div>

        </form>
    </div>

@endsection

@section('js')
@endsection


@extends('front-end.layouts.master')
@section('title')
    <title>Đăng ký</title>
@endsection


@section('css')
    {{--    <link rel="stylesheet" href="{{ asset('frontend/home/home.css') }}">--}}

    <link rel="stylesheet" href="{{ asset('frontend/css/customstyle.css') }}">

    <style>
        input {
            caret-color: red;
        }
        .alert-danger {
            margin-top: 10px;
            padding: 3px 5px;
        }
    </style>
@endsection

@section('content')

        <div id="fh5co-services-section">
            <div class="container">

{{--                <div class="alert alert-success">--}}
{{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span--}}
{{--                            aria-hidden="true">&times;</span></button>--}}
{{--                    Đã đăng ký thành công! hãy <a href="{{ URL::to('/login') }}">Đăng Nhập</a>--}}
{{--                </div>--}}

                <div class="col-md-12">
                    <h2>ĐĂNG KÝ</h2>
                </div>

                <div class="col-md-12">
                    <div class="row">

                        <form action="{{ URL::to('/add-customer') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Họ và tên: </label>
                                    <input type="text" id="name" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="Nhập tên của bạn">
                                    @error('customer_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="email" id="email" name="customer_email" class="form-control @error('customer_email') is-invalid @enderror" value="{{ old('customer_email') }}" placeholder="Nhập email của bạn">
                                    @error('customer_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Mật khẩu: </label>
                                    <input type="password" id="password" name="customer_password" class="form-control  @error('customer_password') is-invalid @enderror" placeholder="Nhập mật khẩu ">
                                    @error('customer_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="confirmPassword">Xác nhận mật khẩu: </label>
                                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Xác nhận mật khẩu">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="sdt">Số điện thoại: </label>
                                    <input type="text" id="sdt" name="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" value="{{ old('customer_phone') }}" placeholder="Nhập số điện thoại của bạn">
                                    @error('customer_phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gioitinh">Giới tính: </label>
                                    <select name="gioitinh" id="" class="form-control {{ $errors->has('gioitinh') ? ' has-error' : '' }}">
                                        <option value="" >Chọn giới tính</option>
                                        <option value="1" id="male">Nam</option>
                                        <option value="0" id="female">Nữ</option>
                                        <span id="gender-error" class="error"></span>
                                    </select>
                                    @error('gioitinh')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="diachi">Địa chỉ: </label>
                                    <input type="text" id="diachi" name="customer_address" value="{{ old('customer_address') }}" class="form-control" placeholder="">
                                    @error('customer_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Đăng ký" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <i><p>Bạn đã có tài khoản? Hãy <a href="{{ URL::to('/login') }}">đăng nhập!</a></p></i>
                    <a href="{{ route('login.provider') }}" class="btn btn-lg btn-google btn-block text-uppercase" type="button" style="background-color: red; color: white"><i class="fa fa-google-plus"></i> Đăng ký với tài khoản Google</a>
                </div>
            </div>
        </div>

@endsection


@section('js')
    <script type="text/javascript">
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirmPassword");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Xác nhận mật khẩu không đúng!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;



    </script>

    <script>

    </script>

    <script type="text/javascript">
        $(".alert").fadeTo(3000, 800).slideUp(800, function() {
            $(".alert").slideUp(800);
        });
    </script>

@endsection


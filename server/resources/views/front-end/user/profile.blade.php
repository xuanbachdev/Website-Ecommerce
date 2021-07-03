
@extends('front-end.layouts.master')
@section('title')
    <title>Thông tin cá nhân</title>
@endsection


@section('css')
    {{--<link rel="stylesheet" href="{{ asset('frontend/home/home.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('frontend/css/customstyle.css') }}">
@endsection

@section('content')
{{--@if(isset($customer))--}}
    <div id="fh5co-wrapper">
        <div id="fh5co-page">

            <div id="fh5co-services-section" style="height: 1150px">
                <div class="container">

                    <div class="col-md-12">
                        <h2>Người dùng: <a href="">


                            </a></h2>
                        <div style="border: #555555 0.5px solid; margin-bottom: 50px"></div>
                    </div>
                    <div class="row">

                        <nav>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Thông tin tài khoản</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Đổi mật khẩu</a>--}}
{{--                                </li>--}}
                            </ul>
                        </nav>
                        <div class="tab-content" id="myTabContent" style="margin-top: 15px">
                            <div class="tab-pane fade active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="row">


                                            <form action="" method="POST">
                                                @csrf
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Họ và tên: </label>
                                                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên của bạn" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email">Email: </label>
                                                        <input type="email" id="email" name="email_account" class="form-control" placeholder="Nhập email của bạn" value="" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="sdt">Số điện thoại: </label>
                                                        <input type="text" id="sdt" name="sdt" class="form-control" placeholder="Nhập số điện thoại của bạn"  value=""  >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gioitinh">Giới tính: </label>
                                                        <select name="gioitinh" id="" class="form-control">
                                                            <option value="1" >Nam</option>
                                                            <option value="0" >Nữ</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="diachi">Địa chỉ: </label>
                                                        <input type="text" id="diachi" name="diachi" class="form-control" placeholder="" value="">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="submit" value="Sửa" class="btn btn-primary" onclick="ConfirmChange()">
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>


{{--                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">--}}
{{--                                <div class="container">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="row">--}}
{{--                                            <form action="" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="oldPassword">Mật khẩu cũ: </label>--}}
{{--                                                        <input type="password" id="oldPassword" name="oldPassword" class="form-control" placeholder="Nhập mật khẩu cũ">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="newPassword">Mật khẩu mới: </label>--}}
{{--                                                        <input type="password" id="newPassword" name="newPassword" class="form-control" placeholder="Nhập mật khẩu mới">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="confirm_newPassword">Xác nhận mật khẩu mới: </label>--}}
{{--                                                        <input type="password" id="confirm_newPassword" name="confirm_newPassword" class="form-control" placeholder="Xác nhận mật khẩu mới">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="col-md-12">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <input type="submit" value="Đổi mật khẩu" class="btn btn-primary" onclick="ConfirmChange()">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>

                    </div>
                </div>
            </div>


        </div>
        <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

{{--@endif--}}




@endsection

@section('js')
    <script type="text/javascript">
        var password = document.getElementById("newPassword"),
            confirm_password = document.getElementById("confirm_newPassword");

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

    <script type="text/javascript">
        function ConfirmChange() {
            var x = confirm("Bạn có chắc muốn thay đổi?");
            if (x) return true;
            else return false;
        }
    </script>
    <script type="text/javascript">
        $(".alert").fadeTo(3000, 800).slideUp(800, function() {
            $(".alert").slideUp(800);
        });
    </script>
@endsection

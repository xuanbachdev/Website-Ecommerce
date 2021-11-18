@extends('front-end.layouts.master')
@section('title')
    <title>Login</title>
@endsection


@section('css')
{{--<link rel="stylesheet" href="{{ asset('frontend/home/home.css') }}">--}}
<link rel="stylesheet" href="{{ asset('frontend/css/customstyle.css') }}">
@endsection

@section('content')


    <div id="fh5co-wrapper">
        <div id="fh5co-page">

            <div id="fh5co-services-section">
                <div class="container">

                    <div class="col-md-12">
                        <h2>ĐĂNG NHẬP</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    @foreach ($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        {{ session('message') }}
                                    </div>
                                @endif
                            <form action="{{ URL::to('/login-customer') }}" method="POST">
                               @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email: </label>
                                        <input type="email" id="email" name="email_account" class="form-control" value="{{ old('email_account') }}" placeholder="Tài khoản" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu: </label>
                                        <input type="password" id="password" name="password_account" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                </div>

{{--                                <span>--}}
{{--                                   <input type="checkbox" name="remember_me" class="" style="margin-left: 20px;">--}}
{{--                                        Ghi nhớ đăng nhập--}}
{{--                                </span>--}}

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Đăng nhập" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>Bạn chưa có tài khoản? Hãy <a href="{{ URL::to('/register') }}">đăng ký!</a></p>
                    </div>
                </div>
            </div>


        </div>
        <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->





@endsection

@section('js')
        <script type="text/javascript">
            $(".alert").fadeTo(3000, 800).slideUp(800, function() {
                $(".alert").slideUp(800);
            });
        </script>

{{--    <script>--}}
{{--        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;--}}
{{--        let email = document.getElementById('email').value;--}}
{{--        input.oninvalid = function (event){--}}
{{--            if (input != regex){--}}
{{--                event.target.setCustomValidity('Vui lòng nhập đúng định dạng email (Ex:@tricker.vn,...)');--}}
{{--            }--}}
{{--            else {--}}
{{--                event.target.setCustomValidity('');--}}
{{--            }--}}
{{--        }--}}

{{--    </script>--}}

@endsection

@extends('front-end.layouts.master')
@section('title')
    <title>Đăng nhập</title>
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
                        <a href="{{ route('login.provider') }}" class="btn btn-lg btn-google btn-block text-uppercase" type="button" style="background-color: red; color: white"><i class="fa fa-google-plus"></i> Đăng nhập với tài khoản Google</a>
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


@endsection

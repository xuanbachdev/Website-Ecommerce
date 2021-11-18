<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Numans');

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }
    .alert-danger {
        display: flex;
        justify-content: center;
    }

    #login .container #login-row #login-column #login-box {
        background-color: rgba(0, 0, 0, 0.5);
        margin-top: 120px;
        max-width: 600px;
        height: 400px;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    #login .container #login-row #login-column #login-box #login-form {
        padding:0px 20px;
    }

    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }


    .input-group-prepend span {
        width: 50px;
        background-color: #FFC312;
        color: black;
        border: 0 !important;
    }

    input:focus {
        outline: none;
        box-shadow: 0 0 0 0 !important;

    }

    a:hover {
        text-decoration: none;
    }

    span.alert{
        position: relative;
        top: -5px;
        padding: 3px 3px;
    }
    </style>
</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('admin.post-login') }}" method="post">
{{--                        <form id="login-form" class="form" action="{{ URL::to('/admin-dashboard') }}" method="post">--}}
                            {{ csrf_field() }}
                            <h3 class="text-center text-info">Login</h3>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {!! session()->get('message') !!}
                                </div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger">
                                    {!! session()->get('error') !!}
                                </div>
                            @endif
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input  type="text" name="email" id="" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Username">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group form-group" style="margin-top: 5px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input  type="password" name="password" id=""  class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password">
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group" style="margin-top: 10px;">
                                <label for="remember-me" class="text-info remember"><span>Remember
                                        me</span> <span><input id="remember-me" name="remember_me"
                                            type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md col-md-12" value="Login">
                            </div>
                        </form>

                        <div class="login-footer">
                            <div class="d-flex justify-content-center">
                                <a href="#">Forgot your password?</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(".alert").fadeTo(3000, 800).slideUp(800, function() {
            $(".alert").slideUp(800);
        });
    </script>

</body>

</html>

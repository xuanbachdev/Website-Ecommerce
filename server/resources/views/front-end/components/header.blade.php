
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>{{ getConfigValueFromSettingTable('phone_contact') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{ getConfigValueFromSettingTable('email') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ getConfigValueFromSettingTable('facebook_link') }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
{{--                        <a href="index.html"><img src="frontend/images/home/logo.png" alt=""/></a>--}}
                    </div>
                    <div class="btn-group pull-right clearfix">

                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">

                        <ul class="nav navbar-nav">
{{--                            <li><a href="{{ URL::to('/login') }}"><i class="fa fa-user"></i> Tài khoản</a></li>--}}
                            <li><a href=""><i class="fa fa-star"></i> Yêu thích</a></li>

                            <?php
                            $customer_id = Session::get('customer_id');
                            $shipping_id = Session::get('shipping_id');
                            if($customer_id!=NULL && $shipping_id==NULL){
                            ?>
                            <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                            <?php
                            }elseif($customer_id!=NULL && $shipping_id!=NULL){
                            ?>
                            <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <?php
                            }else{
                            ?>
                            <li><a href="{{URL::to('/login')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <?php
                            }
                            ?>

                            <li class="cart-hover"><a href="{{ URL::to('gio-hang') }}"><i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                        <span class="show-cart"></span>
                                            <div class="clearfix"></div>
                                        <span class="giohang-hover"></span>

                                </a>
                            </li>


                            <?php
                                $customer_id = Session::get('customer_id');
                                if (isset($customer_id)){
                            ?>
                            <li class="dropdown">

                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-user fa-fw"></i>
                                    <?php
                                        $name = Session::get('customer_name');
                                        echo $name;
                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
{{--                                    <li class="kh"><a href="{{ URL::to('profile') }}" style="color: #FF5722;" class="kh"><i--}}
{{--                                                class="fa fa-user fa-fw"></i> Thông tin người dùng</a>--}}
{{--                                    </li>--}}
                                    <li class="divider"></li>
                                    <li><a href="{{ URL::to('/logout') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                    </li>
                            <?php
                                }
                                else{
                                    ?>
                            <li><a href="{{ URL::to('/login') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                    <?php
                                }
                                ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom" id="navbar"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    @include('front-end.components.main_menu')

                </div>

                <div class="col-sm-5">
                    <form action="{{ URL::to('tim-kiem') }}" class="search-bar" method="POST">
                       @csrf
                        <input type="search" name="keyword" pattern=".*\S.*" required placeholder="Nhập nội dung tìm kiếm">
                        <button  style="margin-top: 0" class="search-btn btn btn-primary" type="submit" name="search_items">
                            <span>Tìm kiếm</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div><!--/header-bottom-->

</header><!--/header-->

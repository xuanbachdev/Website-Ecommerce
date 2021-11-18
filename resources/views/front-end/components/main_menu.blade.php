<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('home') }}" class="active">Trang chủ</a></li>

        <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                @foreach($categorysLimit as $categoryParent)
                    <li class=""><a href="#">
                            {{ $categoryParent->category_name }}
                        </a>
                        {{--                    <i class="fa fa-angle-down"></i></a>--}}
                        @include('front-end.components.child_menu', ['categoryParent' => $categoryParent])
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="dropdown">
            <a href="{{ URL::to('/gio-hang') }}">
                Giỏ hàng
                    <span class="show-cart"></span>
            </a>
        </li>
    </ul>
</div>

@extends('front-end.layouts.master')
@section('title')
    <title>Chi tiết sản phẩm</title>
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

                    @foreach($product_details as $key => $value)
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="{{ $value->feature_image_path }}" alt=""/>
                                    <h3>ZOOM</h3>
                                </div>
                                <div id="similar-product" class="carousel slide" data-ride="carousel">

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <a href=""><img
                                                    src="{{ asset('frontend/images/product-details/similar1.jpg') }}"
                                                    alt=""></a>
                                            <a href=""><img
                                                    src="{{ asset('frontend/images/product-details/similar2.jpg') }}"
                                                    alt=""></a>
                                            <a href=""><img
                                                    src="{{ asset('frontend/images/product-details/similar3.jpg') }}"
                                                    alt=""></a>
                                        </div>

                                    </div>

                                    <!-- Controls -->
                                    <a class="left item-control" href="#similar-product" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="right item-control" href="#similar-product" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <img src="{{ asset('frontend/images/product-details/new.jpg') }}" class="newarrival"
                                         alt=""/>
                                    <h2>{{ $value->product_name }}</h2>
                                    <p>Mã ID: {{ $value->product_id }}</p>
                                    <img src="{{ asset('frontend/images/product-details/rating.png') }}" alt=""/>

{{--                                    <form action="{{ URL::to('/save-cart') }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">--}}

{{--                                        <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">--}}

{{--                                        <input type="hidden" value="{{$value->feature_image_path}}" class="cart_product_image_{{$value->product_id}}">--}}

{{--                                        <input type="hidden" value="{{$value->price}}" class="cart_product_price_{{$value->product_id}}">--}}
{{--                                    <span>--}}
{{--                                        <span>{{ number_format($value->price) }} VND</span>--}}
{{--                                        <label>Số lượng:</label>--}}
{{--                                        <input name="qty" type="number" value="1" min="1"/>--}}
{{--                                        <input name="productid_hidden" type="hidden" value="{{ $value->product_id }}"/>--}}
{{--								    </span>--}}
{{--                                        <button type="submit" class="btn btn-fefault btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">--}}
{{--                                            <i class="fa fa-shopping-cart"></i>--}}
{{--                                            Thêm giỏ hàng--}}
{{--                                        </button>--}}
{{--                                    </form>--}}

{{--                                    <form action="{{ URL::to('/save-cart') }}" method="POST">--}}
                                    <form>
                                        @csrf
                                        <input type="hidden" name="" value="{{ $value->product_id }}" class="cart_product_id_{{ $value->product_id }}">
                                        <input type="hidden" name="" value="{{ $value->product_name }}" class="cart_product_name_{{ $value->product_id }}">
                                        <input type="hidden" name="" value="{{ $value->feature_image_path }}" class="cart_product_image_{{ $value->product_id }}">
                                        <input type="hidden" name="" value="{{ $value->price }}" class="cart_product_price_{{ $value->product_id }}">
                                        <input type="hidden" name="" value="1" class="cart_product_qty_{{ $value->product_id }}">
                                        <input type="hidden" value="{{$value->price}}" class="cart_product_price_{{$value->product_id}}">
                                        <span>
                                            <span>{{ number_format($value->price) }} VND</span>
                                            <input name="qty" type="number" value="1" min="1"/>
                                            <input name="productid_hidden" type="hidden" value="{{ $value->product_id }}"/>
                                        </span>

                                        <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $value->product_id }}" name="add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm giỏ hàng
                                        </button>
                                    </form>

                                    <p><b>Tình trạng:</b>Còn hàng</p>
                                    <p><b>Điều kiện:</b> Mới 100%</p>
                                    <p><b>Danh mục:</b> {{ $value->category_name }}</p>
                                    <a href=""><img src="{{ asset('frontend/images/product-details/share.png') }}"
                                                    class="share img-responsive_share" alt=""/></a>
                                </div><!--/product-information-->
                            </div>
                        </div><!--/product-details-->


                        <div class="category-tab shop-details-tab"><!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li><a href="#details" data-toggle="tab">Mô tả</a></li>
                                    <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
                                    <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="details">
                                    {!! $value->description !!}
                                </div>

                                <div class="tab-pane fade" id="companyprofile">
                                    {!! $value->content !!}
                                </div>


                                <div class="tab-pane fade active in" id="reviews">
                                    <div class="col-sm-12">
                                        <ul>
                                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                        </ul>
                                        <p></p>
                                        <p><b>Write Your Review</b></p>

                                        <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                            <textarea name=""></textarea>
                                            <b>Rating: </b> <img
                                                src="{{ asset('frontend/images/product-details/rating.png') }}" alt=""/>
                                            <button type="button" class="btn btn-default pull-right">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div><!--/category-tab-->

                @endforeach
                <!--recommended_items-->
                    <div class="recommended_items">
                        <h2 class="title text-center">Sản phẩm liên quan</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                @foreach($relate as $keyRecommend => $productsRecommendItem )
                                    {{--                @if($keyRecommend % 3 == 0)--}}
                                    <div class="item active">
                                        {{--                    <div class="item {{$keyRecommend == 0 ? 'active' : '' }}">--}}
                                        {{--                        @endif--}}
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img
                                                            src="{{ config('app.base_url') . $productsRecommendItem->feature_image_path }}"
                                                            alt=""/>
                                                        <h2>{{ number_format($productsRecommendItem->price) }} VND</h2>
                                                        <p>{{ $productsRecommendItem->product_name }}</p>
{{--                                                        <a href="#" class="btn btn-default add-to-cart"><i--}}
{{--                                                                class="fa fa-shopping-cart"></i>Add--}}
{{--                                                            to cart</a>--}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{--                        @if($keyRecommend % 3 == 2)--}}
                                    </div>
                                    {{--                @endif--}}
                                @endforeach


                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!--/recommended_items-->


                </div>
            </div>
        </div>
    </section>


@endsection




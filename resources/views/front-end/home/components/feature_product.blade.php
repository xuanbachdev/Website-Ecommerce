<div class="features_items">
    <h2 class="title text-center">Sản phẩm mới nhất</h2>

    @foreach($products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">

                <div class="single-products">
                    <div class="productinfo text-center">
                        <form>
                            @csrf
                            <input type="hidden" name="" value="{{ $product->product_id }}" class="cart_product_id_{{ $product->product_id }}">
                            <input type="hidden" name="" value="{{ $product->product_name }}" class="cart_product_name_{{ $product->product_id }}">
                            <input type="hidden" name="" value="{{ $product->feature_image_path }}" class="cart_product_image_{{ $product->product_id }}">
                            <input type="hidden" name="" value="{{ $product->price }}" class="cart_product_price_{{ $product->product_id }}">
                            <input type="hidden" name="" value="1" class="cart_product_qty_{{ $product->product_id }}">
                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$product->product_slug) }}">
                            <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt=""/>
                            <h2>{{ number_format($product->price) }} VND</h2>
                            <p>{{ $product->product_name }}</p>
                            </a>

                            <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id }}" name="add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Thêm giỏ hàng
                            </button>
                        </form>

                    </div>

                    {{--                    <div class="product-overlay">--}}
                    {{--                        <div class="overlay-content">--}}

                    {{--                        @csrf--}}
                    {{--                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$product->product_slug) }}"></a>--}}
                    {{--                                <h2>{{ number_format($product->price) }} VND</h2>--}}
                    {{--                                <p>{{ $product->product_name }}</p>--}}
                    {{--                            </a>--}}
                    {{--                            <button type="button" class="btn btn-default add-to-cart" name="add-to-cart">--}}
                    {{--                                <i class="fa fa-shopping-cart"></i>--}}
                    {{--                                Thêm giỏ hàng--}}
                    {{--                            </button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>

                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="{{ route('product-details', ["product_slug" => $product->product_slug]) }}"><i class="fa fa-plus-square"></i>Details Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-md-12">
        {{ $products->appends($_GET)->links('pagination::bootstrap-4') }}
    </div>
</div>


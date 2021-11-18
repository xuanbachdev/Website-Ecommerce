<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Xuân Bách">
    <meta name="keywords" content="">
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="https://nodemy.vn/images/fav-icon/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sweetalert.css') }}">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }} " rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }} " rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }} " rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }} " rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }} " rel="stylesheet">
    @yield('css')

</head>
<body>
@include('front-end.components.preloader')
@include('front-end.components.header')
@yield('content')
@include('front-end.components.footer')

<script src=" {{ asset('frontend/js/style.js') }} "></script>
<script src=" {{ asset('frontend/js/jquery.js') }} "></script>
<script src=" {{ asset('frontend/js/bootstrap.min.js') }} "></script>
<script src=" {{ asset('frontend/js/jquery.scrollUp.min.js') }} "></script>
<script src=" {{ asset('frontend/js/price-range.js') }} "></script>
<script src=" {{ asset('frontend/js/jquery.prettyPhoto.js') }} "></script>
<script src=" {{ asset('frontend/js/main.js') }} "></script>
<script src=" {{ asset('frontend/js/sweetalert.min.js') }} "></script>
@yield('js')



<script type="text/javascript">
    // Show cart quantity
        hover_cart();
        show_cart();
        function show_cart(){
            $.ajax({
                url: '{{url('/show-cart')}}',
                method: 'GET',

                success:function (data){
                    $('.show-cart').html(data);
                }
            });
        }
// Hover show cart

    function hover_cart(){
        $.ajax({
            url: '{{url('/hover-cart')}}',
            method: 'GET',
            success:function (data){
                $('.giohang-hover').html(data);
            }
        });
    }

    $(document).ready(function(){
        $('.add-to-cart').click(function(){

            var id = $(this).data('id_product');
            // alert(id);
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url('/add-cart-ajax')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                success:function(){

                    swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/gio-hang')}}";
                        });
                        show_cart();
                        hover_cart();
                }

            });



        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('.send_order').click(function(){
            swal({
                    title: "Xác nhận đơn hàng",
                    text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Cảm ơn, Mua hàng",

                    cancelButtonText: "Đóng,chưa mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        var shipping_name = $('.shipping_name').val();
                        var shipping_email = $('.shipping_email').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_name:shipping_name,shipping_email:shipping_email,shipping_phone:shipping_phone,shipping_address:shipping_address,shipping_notes:shipping_notes,_token:_token,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                                swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                            }
                        });

                        window.setTimeout(function(){
                            // location.reload();
                            location.href = "{{url('/')}}";
                        } ,3000);




                    } else {
                        swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                    }

                });


        });
    });
</script>

<script type="text/javascript">
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
        sticky_navbar()
    };

    // Get the navbar
    var navbar = document.getElementById("navbar");

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function sticky_navbar() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>

</body>
</html>

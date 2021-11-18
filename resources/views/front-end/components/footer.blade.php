

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
{{--                    <div class="col-sm-3">--}}
{{--                        <div class="companyinfo">--}}
{{--                            <p><img width="100%" src=""></p>--}}
{{--                            <p></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                <div class="col-sm-7">

                </div>

            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Dịch vụ chúng tôi</h2>
                        <ul class="nav nav-pills nav-stacked">

                            <li><a href="">Hỗ trợ online</a></li>

                        </ul>
                    </div>
                </div>


                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Thông tin địa chỉ shop</h2>
                            <div class="information_footer">
                                Phone: {!! getConfigValueFromSettingTable('phone_contact')  !!}

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Fanpage</h2>
                            <ul class="nav nav-pills nav-stacked">

                            </ul>
                        </div>
                    </div>

                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Đăng ký Email</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Điền email của bạn.." />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Shop chúng tôi có cập nhật gì mới nhất <br />thì chúng tôi sẽ nhắc bạn qua email.</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                 {!! getConfigValueFromSettingTable('footer_information')  !!}
            </div>
        </div>
    </div>


</footer><!--/Footer-->

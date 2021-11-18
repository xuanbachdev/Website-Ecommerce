@extends('back-end.layouts.admin')

@section('title')
    <title>Thêm mã giảm giá</title>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('back-end.partials.content-header', ['name' => 'Coupon', 'key' => 'Add'])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('insert-coupon-code') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên mã giảm giá</label>
                                <input type="text"
                                       name = "coupon_name"
                                       class="form-control" placeholder="Nhập tên mã giảm giá">
                            </div>

                            <div class="form-group">
                                <label>Mã giảm giá</label>
                                <input type="text"
                                       name = "coupon_code"
                                       class="form-control" placeholder="Nhập tên mã giảm giá">
                            </div>

                            <div class="form-group">
                                <label>Số lượng mã</label>
                                <input type="text"
                                       name = "coupon_time"
                                       class="form-control" placeholder="Nhập số lượng giảm giá">
                            </div>

                            <div class="form-group">
                                <label>Tính năng mã</label>
                                <select name="coupon_condition" class="form-control input-sm ">
                                <option value="0">---Chọn---</option>
                                <option value="1">Giảm theo phần trăm</option>
                                <option value="2">Giảm theo tiền</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nhập số % hoặc tiền giảm</label>
                                <input type="text"
                                       name = "coupon_number"
                                       class="form-control" placeholder="Nhập số % hoặc tiền giảm ">
                            </div>


                            <button type="submit" name="add_coupon" class="btn btn-primary">Thêm mã giảm giá</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script type="text/javascript">
        $(".alert").fadeTo(3000, 800).slideUp(800, function() {
            $(".alert").slideUp(800);
        });
    </script>


@endsection

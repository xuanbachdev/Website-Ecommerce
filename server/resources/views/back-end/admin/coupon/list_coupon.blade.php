@extends('back-end.layouts.admin')

@section('title')
    <title>Liệt kê mã giảm giá</title>
@endsection

@section('css')
    <style>
        .panel-heading {
            color: #000000 ! important;
            background-color: #ddede0 ! important;
            border-color: #ddede0 ! important;
            font-size: 20px;
            position: relative;
            height: 57px;
            line-height: 57px;
            letter-spacing: 0.2px;
            color: #000;
            font-size: 18px;
            font-weight: 400;
            padding: 0 16px;
            background: #ddede0;
            border-top-right-radius: 2px;
            border-top-left-radius: 2px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
@endsection



@section('content')

    <div class="content-wrapper">
{{--        @include('back-end.partials.content-header', ['name' => 'Category', 'key' => 'List'])--}}

        <div class="panel-heading">
            Liệt kê đơn hàng
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {!! session()->get('message') !!}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
        @endif
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        {{--                        @can('category-add')--}}
                        <a href="{{ URL::to('insert-coupon') }}" class="btn btn-success float-right m-2">Add</a>
                        {{--                        @endcan--}}
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Tên mã giảm giá</th>
                                <th scope="col" class="text-center">Mã giảm giá</th>
                                <th scope="col" class="text-center">Số lượng giảm giá</th>
                                <th scope="col" class="text-center">Điều kiện giảm giá</th>
                                <th scope="col" class="text-center">Số tiền giảm giá</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupon as $key => $coupons)
                                <tr>
                                    <th scope="row">{{ $coupons->coupon_id }}</th>
                                    <td>{{ $coupons->coupon_name }}</td>
                                    <td>{{ $coupons->coupon_code }}</td>
                                    <td>{{ $coupons->coupon_time }}</td>
                                    <td>
                                       <?php
                                            if ($coupons->coupon_condition==1){
                                                ?>
                                        Giảm theo %
                                           <?php
                                           }
                                            else{
                                             ?>
                                           Giảm theo tiền
                                           <?php
                                            }

                                        ?>
                                    </td>

                                    <td>
                                       <?php
                                            if ($coupons->coupon_condition==1){
                                                ?>
                                        Giảm {{ $coupons->coupon_number }} %
                                           <?php
                                           }
                                            else{
                                             ?>
                                           Giảm {{ number_format($coupons->coupon_number) }} VND
                                           <?php
                                            }
                                        ?>
                                    </td>

                                    <td class="text-center">
                                        <a onclick="return confirm('Bạn có chắc là muốn xoá mã này không?')"
                                           href="{{ URL::to('/delete-coupon/'.$coupons->coupon_id) }}"
                                           class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $coupon->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--@section('js')--}}
{{--    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/admin/main.js') }}"></script>--}}
{{--@endsection--}}

@section('js')
    <script type="text/javascript">
        $(".alert").fadeTo(3000, 800).slideUp(800, function() {
            $(".alert").slideUp(800);
        });
    </script>

@endsection

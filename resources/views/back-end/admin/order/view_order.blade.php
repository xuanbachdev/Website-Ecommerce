@extends('back-end.layouts.admin')

@section('title')
    <title>Chi tiết đơn hàng</title>
@endsection

@section('css')
    <style>
        .card-header {
            display: flex;
            justify-content: center;
        }

        .checkbox-highlight {
            text-align: center;
            font-size: 30px;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('back-end/css/dataTables.bootstrap4.min.css') }}">


@endsection


@section('content')

    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid">

            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        <div class="card card-primary">

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Thông tin khách hàng</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableData" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px; min-width: auto; text-align: center;">#</th>
                                        <th scope="col" class="text-center">Tên khách hàng</th>
                                        <th scope="col" class="text-center">Số điện thoại</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Địa chỉ</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <th scope="row">{{ $customer-> customer_id}}</th>
                                        <td>{{ $customer->customer_name}}</td>
                                        <td>{{ $customer->customer_phone }}</td>
                                        <td>{{ $customer->customer_email }}</td>
                                        <td>{{ $customer->customer_address }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        <div class="card card-primary">

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Thông tin vận chuyển</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableData" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px; min-width: auto; text-align: center;">#</th>
                                        <th scope="col" class="text-center">Tên người nhận</th>
                                        <th scope="col" class="text-center">Số điện thoại</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Địa chỉ nhận hàng</th>
                                        <th scope="col" class="text-center">Hình thức thanh toán</th>
                                        <th scope="col" class="text-center">Ghi chú</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <th scope="row">{{ $shipping-> shipping_id}}</th>
                                        <td>{{ $shipping->shipping_name}}</td>
                                        <td>{{ $shipping->shipping_phone }}</td>
                                        <td>{{ $shipping->shipping_email }}</td>
                                        <td>{{ $shipping->shipping_address }}</td>
                                        <td>
                                            @if( $shipping->shipping_method == 0)
                                                Chuyển khoản
                                            @else
                                                Nhận hàng khi thanh toán
                                            @endif
                                        </td>
                                        <td>{{ $shipping->shipping_notes }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        <div class="card card-primary">

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Chi tiết đơn hàng</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableData" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px; min-width: auto; text-align: center;">#</th>
                                        <th scope="col" class="text-center">Tên sản phẩm</th>
                                        <th scope="col" class="text-center">Mã giảm giá</th>
                                        <th scope="col" class="text-center">Số lượng</th>
                                        <th scope="col" class="text-center">Giá</th>
                                        <th scope="col" class="text-center">Tổng tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php
                                        $i = 0;
                                        $total= 0;
                                    @endphp
                                    @foreach($order_details as $key => $details)
                                        @php
                                            $i++;
                                            $subtotal = $details->product_price* $details->product_sales_quantity;
                                            $total+=$subtotal;
                                        @endphp
                                        <tr>
                                            <th scope="row">{{ $i}}</th>
                                            <td>{{ $details->product_name }}</td>
                                            <td>
                                                @if($details->product_coupon!='no')
                                                    {{ $details->product_coupon }}
                                                @else
                                                    Không có mã km
                                                @endif
                                            </td>
                                            <td>{{ $details->product_sales_quantity }}</td>
                                            <td>{{ number_format($details->product_price).' VND'}}</td>
                                            <td>
                                                {{ number_format($subtotal).' VND'}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="5">Tổng</td>
                                        <td>{{ number_format($total).' VND'}}</td>
                                    </tr>

                                    <tr>

                                        <td>
                                            @php
                                                $total_coupon = 0;
                                            @endphp

                                            @if($coupon_condition==1)
                                                @php
                                                $total_after_coupon = ($total*$coupon_number)/100;
                                                    echo '<tr>'.'<td colspan="5">'.'Tổng giảm'.'</td>'.'<td>'.number_format($total_after_coupon).' VND'.'</td>';
                                                $total_coupon = $total - $total_after_coupon;
                                                @endphp

                                            @else
                                                @php
                                                    echo '<tr>'.'<td colspan="5">'.'Tổng giảm'.'</td>'.'<td>'.number_format($coupon_number). ' VND'.'</td>';
                                                        $total_coupon = $total - $coupon_number;
                                                @endphp
                                            @endif
                                            <tr>
                                                <td colspan="5">Thanh toán</td>
                                                <td>  {{ number_format($total_coupon).' VND'}}</td>
                                            </tr>

                                            <tr>
                                                <td colspan="2">
                                                    @foreach($getorder as $key => $or)
                                                    @if($or->order_status==1)
                                                   <form>
                                                       @csrf
                                                       <select class="form-control order_details">
                                                           <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                                                           <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                                                   </form>

                                                        @else
                                                    <form>
                                                        @csrf
                                                        <select class="form-control order_details">
                                                            <option disabled id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                                                            <option id="{{$or->order_id}}" selected value="2">Đã xử lý-Đã giao hàng</option>
                                                        </select>
                                                    </form>

                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td colspan="4"></td>
                                            </tr>

                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>
        </section>


    </div>




@endsection

@section('js')

    {{--    <script>--}}
    {{--        $(function () {--}}
    {{--            $("#tableData").DataTable({--}}
    {{--                "responsive": true, "lengthChange": false, "autoWidth": false,--}}
    {{--                "buttons": ["copy", "csv", "excel", "pdf", "print"]--}}
    {{--            }).buttons().container().appendTo('#tableData_wrapper .col-md-6:eq(0)');--}}
    {{--        });--}}
    {{--    </script>--}}

    <script>
        $('.order_details').change(function(){
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();


                $.ajax({
                    url : '{{url('/update-order-qty')}}',
                    method: 'POST',
                    data:{_token:_token, order_status:order_status ,order_id:order_id},
                    success:function(data){
                        alert('Thay đổi tình trạng đơn hàng thành công');
                        location.href = "{{url('/manage-order')}}";
                    }
                });

            // window.setTimeout(function(){
            //     // location.reload();
            //
            // } ,3000);

        });
    </script>


@endsection

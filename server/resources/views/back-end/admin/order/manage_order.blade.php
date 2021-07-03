@extends('back-end.layouts.admin')

@section('title')
    <title>Liệt kê đơn hàng</title>
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

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('assets/admin/main.js') }}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
{{--        @include('back-end.partials.content-header', ['name' => 'Category', 'key' => 'List'])--}}
        <div class="panel-heading">
            Liệt kê đơn hàng
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Mã đơn hàng</th>
                                <th scope="col" class="text-center">Ngày tháng đặt hàng</th>
                                <th scope="col" class="text-center">Tình trạng đơn hàng</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach($getorder as $key => $orders)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{ $orders->order_code }}</td>
                                    <td>{{ $orders->created_at }}</td>
                                    <td>
                                        @if($orders->order_status == 1)
                                            <span class="text text-success">Đơn hàng mới</span>
                                        @elseif($orders->order_status==2)
                                            <span class="text text-primary">Đã xử lý - Đã giao hàng</span>
                                        @else
                                            <span class="text text-danger">Đơn hàng đã bị hủy</span>
                                        @endif
                                      </td>

{{--                                    <td>--}}
{{--                                        @if($orders->order_status==3)--}}
{{--                                            {{$orders->order_destroy}}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}

                                    <td class="text-center">
                                        <a href="{{ URL::to('/view-order/'.$orders->order_code) }}"
                                           class="btn btn-default">View</a>

                                        <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$orders->order_code)}}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $getorder->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

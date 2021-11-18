@extends('back-end.layouts.admin')

@section('title')
<title>Sản phẩm</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/product/index/list.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/main.js')}}"></script>
@endsection

{{--@section('header')--}}
{{--    @include('back-end.partials.header-product')--}}
{{--@endsection--}}


@section('content')

<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'Product', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">Tên sản phẩm</th>
                                <th scope="col" class="text-center">Giá</th>
                                <th scope="col" class="text-center">Hình ảnh</th>
                                <th scope="col" class="text-center">Danh mục</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $productItem)
                            <tr>
                                <th scope="row">{{ $productItem->product_id }}</th>
                                <td>{{ $productItem->product_name }}</td>
                                <td>{{ number_format($productItem->price).' VND' }}</td>
                                <td>
                                <img class="product_image_150_180" src="{{ $productItem->feature_image_path }}" alt="">
                                </td>
                                <td>{{ $productItem->category->category_name }}</td>
                                <td>
                                    <a href="{{ route('product.edit', ['product_id' => $productItem->product_id]) }}"
                                        class="btn btn-default">Edit</a>
                                    <a href=""
                                        data-url="{{ route('product.delete', ['product_id' => $productItem->product_id]) }}"
                                        class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                {{ $products->appends($_GET)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('back-end.layouts.admin')

@section('title')
<title>Sửa sản phẩm</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/product/add/add.css') }}" rel="stylesheet" />
@endsection




@section('content')
<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'Product', 'key' => 'Edit'])

    <form action="{{ route('product.update', ['product_id' => $product->product_id]) }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control"
                                placeholder="Nhập tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" name="price" value="{{ $product->price }}" class="form-control"
                                placeholder="Nhập giá sản phẩm">
                        </div>

                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" name="feature_image_path" class="form-control-file">

                            <div class="col-md-3 feature_image_container">
                                <div class="row">
                                    <img class="feature_image" src="{{ $product-> feature_image_path}}" alt="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input multiple type="file" name="image_path[]" class="form-control-file">

                            <div class="col-md-12 ">
                                <div class="row">
                                    @foreach($product->images as $productImageItem)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{ $productImageItem->image_path }}"
                                            alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nhập tag cho sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select2_choose" multiple="multiple">
                                @foreach($product->tags as $tagItem )
                                <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control tinymce_editor_init"
                                      rows="5">{{ $product->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="contents" class="form-control tinymce_editor_init"
                                rows="10">{{ $product->content }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </form>


</div>

@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/hufdlok7qrd1k3xbs2o7k26amflxie28r4kw4tfk4ltzewdf/tinymce/5/tinymce.min.js"
    referrerpolicy="origin">
</script>
<script src="{{ asset('assets/admin/product/add/add.js') }}"></script>

@endsection

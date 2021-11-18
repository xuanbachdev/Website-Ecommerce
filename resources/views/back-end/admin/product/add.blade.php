@extends('back-end.layouts.admin')

@section('title')
<title>Thêm sản phẩm</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/admin/product/add/add.css') }}" rel="stylesheet" />
@endsection




@section('content')
<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'Product', 'key' => 'Add'])

    <div class="col-md-12">
        <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->
    </div>

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="product_name"
                                value="{{ old('product_name') }}"
                                class="form-control @error('product_name') is-invalid @enderror"
                                placeholder="Nhập tên sản phẩm">

                            @error('product_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" name="price"
                                value="{{ old('price') }}"
                                class="form-control price_format @error('price') is-invalid @enderror"
                                placeholder="Nhập giá sản phẩm">

                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" name="feature_image_path" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input multiple type="file" name="image_path[]" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>

                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Nhập tag cho sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select2_choose"  multiple="multiple">

                            </select>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="@error('description') is-invalid @enderror form-control tinymce_editor_init" rows="5">
                            {{ old('description') }}
                            </textarea>

                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="contents" class="@error('contents') is-invalid @enderror form-control tinymce_editor_init" rows="10">
                            {{ old('contents') }}
                            </textarea>

                            @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

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
<script type="text/javascript">
    $('.price_format').simpleMoneyFormat();

</script>

@endsection

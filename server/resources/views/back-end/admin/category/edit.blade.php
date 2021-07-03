@extends('back-end.layouts.admin')

@section('title')
<title>Sửa danh mục sản phẩm</title>
@endsection


@section('content')
<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'Category', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('categories.update', ['category_id' => $category->category_id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="category_name"
                            value ="{{ $category->category_name }}"
                            class="form-control" placeholder="Nhập tên danh mục">
                        </div>

                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn danh mục cha</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

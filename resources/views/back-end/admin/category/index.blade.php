@extends('back-end.layouts.admin')

@section('title')
    <title>Danh mục sản phẩm</title>
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('assets/admin/main.js') }}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.partials.content-header', ['name' => 'Category', 'key' => 'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
{{--                        @can('category-add')--}}
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Add</a>
{{--                        @endcan--}}
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Tên danh mục</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->category_id }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td class="text-center">

{{--                                        @can('category-edit')--}}
                                            <a href="{{ route('categories.edit', ['category_id' => $category->category_id]) }}"
                                               class="btn btn-default">Edit</a>
{{--                                        @endcan--}}

{{--                                            @can('category-delete')--}}
                                            <a href=""
                                               data-url="{{ route('categories.delete', ['category_id' => $category->category_id]) }}"
                                               class="btn btn-danger action_delete">Delete</a>
{{--                                            @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

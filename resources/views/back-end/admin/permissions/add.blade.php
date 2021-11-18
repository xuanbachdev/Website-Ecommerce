@extends('back-end.layouts.admin')

@section('title')
    <title>Thêm permission</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/main.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/admin/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('back-end.partials.content-header', ['name' => 'Permissions', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permissions.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Chọn tên module </label>
                                <select class="form-control" name="module_parent">
                                    <option value="">Chọn tên module</option>
                                    @foreach(config('permissions.table_module') as $moduleItem)
                                        <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 check_all">
                                        <label>
                                            <input type="checkbox" class="checkall">
                                            Check all
                                        </label>
                                    </div>

                                    @foreach(config('permissions.module_childrent') as $moduleItemChildent)

                                        <div class="col-md-3">
                                            <label for="">
                                                <input type="checkbox" value="{{ $moduleItemChildent }}" name="module_childrent[]" class="checkbox_wrapper">
                                                {{ $moduleItemChildent }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

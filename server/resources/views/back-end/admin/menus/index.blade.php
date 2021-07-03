@extends('back-end.layouts.admin')

@section('title')
<title>Menu</title>
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/main.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'Menu', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)

                            <tr>
                                <th scope="row">{{ $menu->id }}</th>
                                <td>{{ $menu->name }}</td>
                                <td>
                                    <a href="{{ route('menus.edit', ['id' => $menu->id]) }}"
                                        class="btn btn-default">Edit</a>
                                    <a href="{{ route('menus.delete', ['id' => $menu->id]) }}" data-url=""
                                        class="btn btn-danger action_delete">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                {{ $menus->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

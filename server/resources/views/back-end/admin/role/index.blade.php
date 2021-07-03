@extends('back-end.layouts.admin')

@section('title')
<title>Role</title>
@endsection

@section('css')

@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/main.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'Role', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">Tên vai trò</th>
                                <th scope="col" class="text-center">Mô tả vai trò</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($roles as $role)

                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>

                                <td>
                                    <a href="{{ route('roles.edit', ['id' => $role->id]) }}"
                                        class="btn btn-default">Edit</a>
                                    <a href="" data-url="{{ route('roles.delete', ['id' => $role->id]) }}"
                                        class="btn btn-danger action_delete">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    {{ $roles->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

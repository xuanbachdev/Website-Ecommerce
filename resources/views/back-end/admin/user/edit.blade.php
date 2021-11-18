@extends('back-end.layouts.admin')

@section('title')
<title>Sửa user</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/admin/main.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/user/main.js') }}"></script>
@endsection


@section('content')
<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'User', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nhập tên">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email/UserName</label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Nhập email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập password">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Chọn vai trò</label>
                            <select name="role_id[]" multiple class="select2_init form-control">
                                <option value=""></option>

                                @foreach($roles as $role)
                                <option {{ $rolesOfUser->contains('id', $role->id) ? 'selected' : '' }}
                                    value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

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

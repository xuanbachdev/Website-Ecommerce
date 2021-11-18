@extends('back-end.layouts.admin')

@section('title')
<title>Settings</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/main.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin/main.js')}}"></script>
@endsection



@section('content')

<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'settings', 'key' => 'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="btn-group float-right">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            Add setting
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('settings.create') . '?type=Text' }}">Text</a></li>
                            <li><a href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a></li>
                        </ul>
                    </div>

                    <!-- <a href="{{ route('settings.create') }}" class="btn btn-success float-right m-2">Add</a> -->
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Config key</th>
                                <th scope="col" class="text-center">Config value</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($settings as $setting)
                            <tr>
                                <th scope="row">{{ $setting->id }}</th>
                                <td>{{ $setting->config_key }}</td>
                                <td>{{ $setting->config_value }}</td>
                                <td>
                                    <a href="{{ route('settings.edit', ['id' => $setting->id]) . '?type=' . $setting->type}}" class="btn btn-default">Edit</a>
                                    <a href=""
                                    data-url="{{ route('settings.delete', ['id' => $setting->id]) }}"
                                    class="btn btn-danger action_delete">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                {{ $settings->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

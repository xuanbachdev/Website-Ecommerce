@extends('back-end.layouts.admin')

@section('title')
<title>Edit Setting</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/main.css') }}">
@endsection


@section('content')

<div class="content-wrapper">
    @include('back-end.partials.content-header', ['name' => 'settings', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('settings.update', ['id' => $setting->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Config key</label>
                            <input type="text" class="form-control "
                                name="config_key"
                                value="{{ $setting->config_key }}"
                                placeholder="Nhập config key">

                        </div>

                        @if(request()->type === 'Text')
                        <div class="form-group">
                            <label>Config value</label>
                            <input type="text" class="form-control @error('config_value') is-invalid @enderror"
                                name="config_value"
                                value="{{ $setting->config_value }}"
                                placeholder="Nhập config value">
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @elseif(request()->type === 'Textarea')
                        <div class="form-group">
                            <label>Config value</label>
                            <textarea class="form-control @error('config_value') is-invalid @enderror"
                                name="config_value"
                                placeholder="Nhập config value" rows="5">{{ $setting->config_value }}</textarea>
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @endif


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

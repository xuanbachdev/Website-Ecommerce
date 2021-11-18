@extends('back-end.layouts.admin')

@section('title')
<title>Slider</title>
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
    @include('back-end.partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12 table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">Tên slider</th>
                                <th scope="col" class="text-center">Description</th>
                                <th scope="col" class="text-center">Hình ảnh</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($sliders as $slider)

                            <tr>
                                <th scope="row">{{ $slider->id }}</th>
                                <td>{{ $slider->name }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <img class="image_slider_150_180" src="{{ $slider->image_path }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', ['id' => $slider->id]) }}"
                                        class="btn btn-default">Edit</a>
                                    <a href="" data-url="{{ route('slider.delete', ['id' => $slider->id]) }}"
                                        class="btn btn-danger action_delete">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    {{ $sliders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

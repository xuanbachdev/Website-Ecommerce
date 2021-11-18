@extends('back-end.layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

@include('back-end.partials.content-header', ['name' => 'Home', 'key' => 'home'])


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                </div>
                <div class="col-md-12 text-center">
                    Trang chủ
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

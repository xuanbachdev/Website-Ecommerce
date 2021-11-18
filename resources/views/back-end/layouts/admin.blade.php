<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="https://nodemy.vn/images/fav-icon/icon.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  @yield('title')
 <!--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('back-end.partials.header')

@include('back-end.partials.sidebar')

@yield('content')



@include('back-end.partials.footer')
</div>


<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('back-end/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('back-end/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back-end/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('back-end/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('back-end/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('back-end/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('back-end/js/buttons.bootstrap4.min.js') }}"></script>


@yield('js')
</body>
</html>

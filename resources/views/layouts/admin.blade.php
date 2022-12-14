<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ARTL</title>
  <link rel="icon" type="image/x-icon" href="{{asset('img/logo.png')}}">
  @yield('scaffold_css')
  @include('Admin.includes.scaffold_css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('img/logo.png')}}" alt="ARTLLogo" height="40" width="100">

    {{-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> --}}
  </div>
    @include('Admin.includes.navbar')
    @include('Admin.includes.sidebar')
    @yield('content')
    @include('Admin.includes.footer')

    


    {{-- @extends('template.include.navbar') --}}


  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('Admin.includes.scaffold_js')
@yield('scaffold_js')

</body>
</html>

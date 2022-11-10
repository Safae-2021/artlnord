{{-- @section('scaffold_css') --}}
  <!-- Font Awesome -->
  <link rel="stylesheet" href='{{asset("../../plugins/fontawesome-free/css/all.min.css")}}'>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href='{{asset("../../plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}'>
  <!-- Theme style -->
  <link rel="stylesheet" href='{{asset("../../dist/css/adminlte.min.css")}}'>

{{-- @endsection --}}



{{-- @extends('layouts.application')

@section('content') --}}
<div class="container">
    <div class="row justify-content-center" style="margin-left: auto;margin-top:15%;margin-right: auto;width:80%">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">   <a href="#" class="h1"><b>Artl</b>NORD</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de pass oublier') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head> --}}

{{-- <div class="login-box"  style="margin-left: auto;margin-top:15%;margin-right: auto;width:50%">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Artl</b>NORD</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connecter a votre compte</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email"  id="email"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" id="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
    
          <!-- /.col -->
          <div class="col-4 ">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      @if (Route::has('password.request'))
      <p class="mb-1">
      <a class="btn btn-link" href="{{ route('password.request') }}">
      </p>
          {{ __('Mot de pass oublier') }}
      </a>
  @endif --}}
      {{-- <p class="mb-1">
        <a href="forgot-password.html">mot de pass oublier </a>
      </p> --}}
    {{-- </div> --}}
    <!-- /.card-body -->
  {{-- </div> --}}
  <!-- /.card -->
{{-- </div> --}}
<!-- /.login-box -->

{{-- <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html> --}}

{{-- @endsection --}}

{{-- @section('scaffold_js') --}}

 <!-- jQuery -->
<script src="{{asset('../../plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../../dist/js/adminlte.min.js')}}"></script>
{{-- @endsection --}}
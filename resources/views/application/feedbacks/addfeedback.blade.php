
    @section('scaffold_css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    @endsection

    @extends('layouts.application')
    @section('content')

    @if($errors->any())

    @endif


<div class="container-fluid " >
  <div class="card card-outline card-primary col-11 mt-5 " style="margin-left: 5%">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>ARTL</b>Nord</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{__('Remplire le formulaire')}}</p>

      <form action="{{route('store.feedback')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
          <div class="col-lg-6">
        <label for="name">{{__('Nom Complet')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nom Complet" value="{{ old('name')}} ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('name')}}</div>
        </div>
    
        <div class="col-lg-6">
          <div class="form-group">
              <label for="photo">{{__('Votre photo ')}}</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="photo" id="photo" name="photo" accept="image/jpg" value="{{ old('photo')}}">
                  <label class="custom-file-label" for="photo">{{__('Votre photo')}}</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                </div>
              </div>
              <div class="text-danger">{{$errors->first('photo')}}</div> 
            </div>
      
      </div>
      </div>



    
      <div class="row ">
        <div class="col-lg-12">
      <label for="description">{{__('Description')}}</label>
      <div class="input-group mb-3">
        <textarea type="text" class="form-control" id="description" name="description" >description</textarea>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-align-center"></span>
          </div>
        </div>
      </div>
      <div class="text-danger">{{$errors->first('description')}}</div>
      </div>
    </div>





<div class="row ">
 

  </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-3 mt-5" style="margin-left: 34%">
            <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> --}}

      {{-- <a href="login.html" class="text-center">I already have a membership</a> --}}
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@endsection

@section('scaffold_js')
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

@endsection



@extends('layouts.admin')

@section('content')

  @if($errors->any())

    @endif


<div class="container-fluid " >
  <div class="card card-outline card-primary col-9 mt-5 " style="margin-left: 20%">
    <div class="card-header text-center">
      <a href="{{route('admin.dashboard')}}" class="h1"><b>ARTL</b>Nord</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{__('Remplire le formulaire')}}</p>

      <form action="{{route('store.blog')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
          <div class="col-lg-6">
        <label for="title">{{__('Titre')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="title"  placeholder="Titre" name="title">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-align-center"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('title')}}</div>
        </div>
        <div class="col-lg-6">
          <label for="titlear">{{__('Titre en Arab')}}</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="titlear"  placeholder="Titre en Arab" name="titlear">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-align-center"></span>
              </div>
            </div>
          </div>
          <div class="text-danger">{{$errors->first('titlear')}}</div>
          </div>
      </div>


<div class="row ">
  <div class="col-lg-6">
<label for="description">{{__('Description')}}</label>
<div class="input-group mb-3">
  <textarea type="text" class="form-control" id="description" name="description" placeholder="description"></textarea>
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-align-center"></span>
    </div>
  </div>
</div>
<div class="text-danger">{{$errors->first('description')}}</div>
</div>
<div class="col-lg-6">
  <label for="descriptionar">{{__('Description en Arab')}}</label>
  <div class="input-group mb-3">
    <textarea type="text" class="form-control" id="descriptionar" name="descriptionar" placeholder="description en Arab"></textarea>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-align-center"></span>
      </div>
    </div>
  </div>
  <div class="text-danger">{{$errors->first('descriptionar')}}</div>
  </div>
</div>

<div class="row ">
<div class="col-lg-6">
  <div class="form-group">
    <label for="photo">{{__('Photo du Post')}}</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="photo" id="photo" name="photo" accept="image/jpg">
        <label class="custom-file-label" for="photo">{{__('Photo du Post')}}</label>
      </div>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-file-image"></span>
          {{-- <i class="fas fa-file-image"></i> --}}
        </div>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('photo')}}</div> 
  </div>
</div>
<div class="col-lg-6 mt-1">
  <div class="input-group mt-4 ">
    <div class="custom-control custom-switch ">
      <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="status">
      <label class="custom-control-label" for="customSwitch1"> Activer ce champ si vous voulez utiliser ce post etre publier  dans votre application </label>
    </div>
  </div>
  <div class="text-danger">{{$errors->first('status')}}</div>
</div>

</div>


</div>
{{-- <div class="form-group">
  <div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="customSwitch1">
    <label class="custom-control-label" for="customSwitch1">Toggle this custom switch element</label>
  </div>
</div> --}}
        <div class="row">
          <div class="col-3 mt-2 pb-3" style="margin-left: 34%">
            <button type="submit" class="btn btn-primary btn-block">Valider</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection



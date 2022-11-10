

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

      <form action="{{route('store.room')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
          <div class="col-lg-12">
            <label for="label">{{__('Label')}}</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="label"  placeholder="Label" name="label" value="{{old('status')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-align-center"></span>
                </div>
              </div>
            </div>
        <div class="text-danger">{{$errors->first('label')}}</div>
        </div>
    </div>
  
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
  <label for="labelone">{{__('1ère Label  ')}}</label>
  <div class="input-group mb-3">
    <input type="text" class="form-control" id="labelone"  placeholder="1ère Label" name="labelone">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-align-center"></span>
      </div>
    </div>
  </div>
  <div class="text-danger">{{$errors->first('labelone')}}</div>
  </div>
  <div class="col-lg-6">
    <label for="labelonear">{{__('1ère Label en arab')}}</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="labelonear"  placeholder="1ère Label en arab" name="labelonear">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-align-center"></span>
        </div>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('labelonear')}}</div>
    </div>
</div>

<div class="row ">
  <div class="col-lg-6">
<label for="labeltwo">{{__('2ème Label')}}</label>
<div class="input-group mb-3">
  <input type="text" class="form-control" id="labeltwo"  placeholder="2ème Label" name="labeltwo">
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-align-center"></span>
    </div>
  </div>
</div>
<div class="text-danger">{{$errors->first('labeltwo')}}</div>
</div>
<div class="col-lg-6">
  <label for="labeltwoar">{{__('2ème Label en Arab')}}</label>
  <div class="input-group mb-3">
    <input type="text" class="form-control" id="labeltwoar"  placeholder="2ème Label en Arab" name="labeltwoar">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-align-center"></span>
      </div>
    </div>
  </div>
  <div class="text-danger">{{$errors->first('labeltwoar')}}</div>
  </div>
</div>

<div class="row ">
  <div class="col-lg-6">
<label for="labelthree">{{__('3ème Label')}}</label>
<div class="input-group mb-3">
  <input type="text" class="form-control" id="labelthree" name="labelthree" placeholder="3ème Label">
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-align-center"></span>
    </div>
  </div>
</div>
<div class="text-danger">{{$errors->first('labelthree')}}</div>
</div>
<div class="col-lg-6">
  <label for="labelthreear">{{__('3ème Label en Arab')}}</label>
  <div class="input-group mb-3">
    <input type="text" class="form-control" id="labelthreear" name="labelthreear" placeholder="3ème Label en Arab">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-align-center"></span>
      </div>
    </div>
  </div>
  <div class="text-danger">{{$errors->first('labelthreear')}}</div>
  </div>
</div>

<div class="row ">
  <div class="col-lg-6">
<label for="description">{{__('Description')}}</label>
<div class="input-group mb-3">
  <textarea type="text" class="form-control" id="description" name="description" placeholder="description"> </textarea>
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
      <label for="photo">{{__('Photo de la salle')}}</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" class="photo" id="photo" name="photo" accept="image/jpg">
          <label class="custom-file-label" for="photo">{{__('Photo de la salle')}}</label>
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
        <label class="custom-control-label" for="customSwitch1"> Activer ce champ si vous  voulez que  cette salles  être affichés  dans votre application </label>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('status')}}</div>
  </div>
  
  </div>
  

</div>

</div>
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



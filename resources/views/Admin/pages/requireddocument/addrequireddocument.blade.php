

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

      <form action="{{route('store.required.document')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
          <div class="col-lg-12">
        <label for="label">{{__('document requis ')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="label"  placeholder="document requis " name="label">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-align-center"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('label')}}</div>
        </div>
        {{-- <div class="col-lg-6 mt-1">
            <div class="input-group mt-4 ">
              <div class="custom-control custom-switch ">
                <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="status">
                <label class="custom-control-label" for="customSwitch1"> Activer ce champ si vous  voulez utiliser ce document dans votre application </label>
              </div>
            </div>
            <div class="text-danger">{{$errors->first('status')}}</div>
          </div> --}}
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
{{-- </div> --}}
<!-- /.register-box -->
@endsection



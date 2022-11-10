

@extends('layouts.admin')

@section('content')

  @if($errors->any())

    @endif


<div class="container-fluid " >
  <div class="card card-outline card-primary col-9 mt-5 " style="margin-left: 20%"  >
    <div class="card-header text-center">
      <a href="{{route('admin.dashboard')}}" class="h1"><b>ARTL</b>Nord</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{__('Remplire le formulaire')}}</p>

      <form action="{{route('admin.update.profile',$selectAdmin[0]->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($selectAdmin as $admin)
            
        <div class="row ">
          <div class="col-lg-6">
        <label for="name">{{__('Nom Complet')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="name" name="name" value="{{$admin->name}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('name')}}</div>
        </div>
        <div class="col-lg-6">
            <label for="email">{{__('Email')}}</label>
            <div class="input-group mb-3">
              <input type="email" class="form-control" id="email" name="email" value="{{$admin->email}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="text-danger">{{$errors->first('email')}}</div>
          </div>
      </div>
   


      <div class="row ">
        <div class="col-lg-6">
        <label for="cin">{{__('CIN')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="cin" name="cin" value="{{$admin->cin}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span ><i class="fas fa-id-card mr-1"></i></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('cin')}}</div>
      </div>
      <div class="col-lg-6">
        <label for="phone">{{__('N Telephone')}}</label>
        <div class="input-group mb-3">
          <input type="number" class="form-control" id="phone" name="phone" value="{{$admin->phone}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('phone')}}</div>
      </div>
    </div>

  



  <div class="row ">
    
    <div class="col-lg-12">
      <label for="address">{{__('Address')}}</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="address" name="address" value="{{$admin->address}}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-map"></span>
          </div>
        </div>
      </div>
      <div class="text-danger">{{$errors->first('address')}}</div>
    </div>
  

</div>





<div class="row ">
    <div class="col-lg-6">
        <label for="password">{{__('Password')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="password" name="password" value="{{$admin->password}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('password')}}</div>
    </div>
<div class="col-lg-6">
 
  <div class="form-group">
    <label for="photo">{{__('Votre photo ')}}</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="photo" id="photo" name="photo" accept="image/jpg">
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


        <div class="row">
          <!-- /.col -->
          <div class="col-3 mt-5" style="margin-left: 34%">
            <button type="submit" class="btn btn-primary btn-block">Mise A jour</button>
          </div>
          <!-- /.col -->
        </div>
        @endforeach

      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection



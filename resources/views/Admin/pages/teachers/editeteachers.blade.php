

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

      <form action="{{route('update.teachers',$selectTeacherInfo[0]->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
          <div class="col-lg-6">
        <label for="name">{{__('Nom Complet')}}</label>
        <div class="input-group mb-3"> 
          <input type="text" class="form-control" id="name" name="name" placeholder="Nom Complet" value="{{$selectTeacherInfo[0]->name}}">
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
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$selectTeacherInfo[0]->email}}">
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
          <input type="text" class="form-control" id="cin" name="cin" placeholder="CIN" value="{{$selectTeacherInfo[0]->cin}}">
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
          <input type="number" class="form-control" id="phone" name="phone" placeholder="Telephone" value="{{$selectTeacherInfo[0]->phone}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('phone')}}</div>
      </div>
    </div>

  
{{-- 
    <div class="row ">
      <div class="col-lg-6">
        <label for="date_naissance">{{__('Date de Naissance')}}</label>
        <div class="input-group mb-3">
          <input type="date" class="form-control" id="date_naissance" name="date_naissance" placeholder="Date de Naissance">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('date_naissance')}}</div>
      </div>
      <div class="col-lg-6">
      <label for="lieu_naissance">{{__('Lieu de naissance')}}</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" placeholder="Lieu de naissance">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-map"></span>
          </div>
        </div>
      </div>
      <div class="text-danger">{{$errors->first('lieu_naissance')}}</div>
    </div>
  
  </div> --}}


  <div class="row ">
    
    <div class="col-lg-12">
      <label for="address">{{__('Address')}}</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$selectTeacherInfo[0]->address}}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-map"></span>
          </div>
        </div>
      </div>
      <div class="text-danger">{{$errors->first('address')}}</div>
    </div>
  

</div>


{{-- <div class="row ">
  <div class="col-lg-6">
    <label for="n_permis">{{__('N Permis')}}</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="n_permis" name="n_permis" placeholder="N Permis">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-map"></span>
        </div>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('n_permis')}}</div>
  </div>
  <div class="col-lg-6">
    <label for="date_obtention">{{__('Date d`optention de Permis')}}</label>
    <div class="input-group mb-3">
      <input type="date" class="form-control" id="date_obtention" name="date_obtention" placeholder="Date de Permis">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-calendar"></span>
        </div>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('date_obtention')}}</div>
</div>
</div> --}}




<div class="row ">
 
<div class="col-lg-6">
  {{-- <label for="photo">{{__('Votre photo ')}}</label>
    <input type="file" accept="image/jpg" class="photo " id="photo" name="photo" placeholder="Votre photo  ">
  <div class="text-danger">{{$errors->first('photo')}}</div> --}}


  <div class="form-group">
    <label for="photo">{{__('Votre photo ')}}</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="photo" id="photo" name="photo" accept="image/jpg"  value="{{$selectTeacherInfo[0]->photo}}" >
        <label class="custom-file-label" for="photo" >{{$selectTeacherInfo[0]->photo}}</label>
      </div>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fas fa-file-image"></i></span>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('photo')}}</div> 
  </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label for="scan_cin">{{__('Votre scan cin ')}}</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="scan_cin" id="scan_cin" name="scan_cin" accept="image/jpg" value="{{$selectTeacherInfo[0]->scan_cin}}" >
            <label class="custom-file-label" for="scan_cin">{{$selectTeacherInfo[0]->scan_cin}}</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-file-image"></i></span>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('scan_cin')}}</div> 
      </div>
</div>
</div>
<div class="row ">

  <div class="col-lg-6 mt-1">
    <div class="input-group mt-4 ">
      <div class="custom-control custom-switch ">
        <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="status">
        <label class="custom-control-label" for="customSwitch1"> Activer ce champ si vous  voulez que ce prof étre un enseignant  </label>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('status')}}</div>
  </div>
  </div>
        


        <div class="row">
          <div class="col-3 mt-2 pb-3" style="margin-left: 10%">
            <button type="submit" class="btn btn-primary btn-block">Mettre à Jour</button>
          </div>
          <div class="col-3 mt-2 pb-3" style="margin-left: 24%">
            <a  href="{{route('teachers.list')}}" class="btn btn-primary btn-block">Annuler</a>
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



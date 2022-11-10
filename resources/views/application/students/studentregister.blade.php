
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

      <form action="{{route('students.store',$training_id)}}" method="POST" enctype="multipart/form-data">
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
        <div class="text-danger text-center">{{$errors->first('name')}}</div>
        </div>
        <div class="col-lg-6 text-right" >
          <label for="arabic_name "  >{{__('الاسم الكامل')}}</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control text-right" id="arabic_name" name="arabic_name" placeholder=" الاسم الكامل "  value="{{ old('arabic_name')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        <div class="text-danger text-center">{{$errors->first('arabic_name')}}</div>
          </div>
      </div>
      <div class="row ">
        <div class="col-lg-6 ">
        <label for="email">{{__('البريد الإلكتروني')}}</label>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="{{ old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="text-danger text-center">{{$errors->first('email')}}</div>
      </div>
      <div class="col-lg-6 text-right">
        <label for="password">{{__('كلمة المرور')}}</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="text-danger text-center">{{$errors->first('password')}}</div>
      </div>
      </div>




      <div class="row ">
        <div class="col-lg-6 ">
        <label for="cin">{{__('CIN')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="cin" name="cin" placeholder="CIN" value="{{ old('cin')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card mr-1"></span>
            </div>
          </div>
        </div>
        <div class="text-danger text-center">{{$errors->first('cin')}}</div>
      </div>
      <div class="col-lg-6 text-right">
        <label for="phone">{{__('  رقم الهاتف')}}</label>
        <div class="input-group mb-3">
          <input type="number" class="form-control" id="phone" name="phone" placeholder="Telephone" value="{{ old('phone')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="text-danger text-center">{{$errors->first('phone')}}</div>
      </div>
    </div>

    

    <div class="row ">
      <div class="col-lg-6 ">
        <label for="date_naissance">{{__('تاريخ الميلاد')}}</label>
        <div class="input-group mb-3">
          <input type="date" class="form-control" id="date_naissance" name="date_naissance" placeholder="Date de Naissance" value="{{ old('date_naissance')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <div class="text-danger text-center">{{$errors->first('date_naissance')}}</div>
      </div>
      <div class="col-lg-6 text-right">
      <label for="lieu_naissance">{{__('مكان الميلاد')}}</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" placeholder="Lieu de naissance" value="{{ old('lieu_naissance')}}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-map"></span>
          </div>
        </div>
      </div>
      <div class="text-danger text-center">{{$errors->first('lieu_naissance')}}</div>
    </div>
  
  </div>


  <div class="row ">
    
    <div class="col-lg-12">
      <label for="address">{{__('عنوان')}}</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address')}}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-map"></span>
          </div>
        </div>
      </div>
      <div class="text-danger text-center">{{$errors->first('address')}}</div>
    </div>
    {{-- <div class="col-lg-6">
    <label for="photo">{{__('Votre photo  ')}}</label>
    <div class="input-group mb-3">
      <input type="file" accept="image/jpg" class="form-control" id="photo" name="photo" placeholder="Votre photo  ">
   
    </div>
  </div> --}}

</div>


<div class="row ">
  <div class="col-lg-6">
    <label for="n_permis">{{__(' رقم رخصة السياقة ')}}</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="n_permis" name="n_permis" placeholder="N Permis" value="{{ old('n_permis')}}">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-map"></span>
        </div>
      </div>
    </div>
    <div class="text-danger text-center">{{$errors->first('n_permis')}}</div>
  </div>
  <div class="col-lg-6 text-right">
    <label for="date_obtention">{{__('تاريخ الحصول على رخصة السياقة')}}</label>
    <div class="input-group mb-3">
      <input type="date" class="form-control" id="date_obtention" name="date_obtention" placeholder="Date de Permis" value="{{ old('date_obtention')}}">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-calendar"></span>
        </div>
      </div>
    </div>
    <div class="text-danger text-center">{{$errors->first('date_obtention')}}</div>
</div>
</div>




<div class="row ">
  <div class="col-lg-6 text-right">
    <label for="categorie_permis_id">{{__('فئة رخصة قياد ')}}</label>
    <div class="dropdown">
      <select class="btn btn-primary  dropdown-toggle"  name="categorie_permis_id"   type="button" id="categorie_permis_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categorie
        <option ></option>
          {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> --}}
      @foreach ($selectCatPermis as $CatPermis)
        <option class="dropdown-item" value="{{$CatPermis->id}}">{{$CatPermis->label}}</option>
      @endforeach
    {{-- </div>   --}}
  </select>    
    </div>
    <div class="text-danger ">{{$errors->first('categorie_permis_id')}}</div>
  
  </div>

@for ($i = 0; $i < count($getTrainingRequiredDocument); $i++)
    @if (Str::contains($getTrainingRequiredDocument[$i]['label'],['carte professionnelle']))
        
  {{-- if the selection id of fromation has fco --}}
 
  {{-- dd($getTrainingRequiredDocument) --}}
  <div class="col-lg-6">
    <label for="n_carte_professionnelle">{{__('N Carte Professionnelle')}} *</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="n_carte_professionnelle" name="n_carte_professionnelle"  value="{{ old('n_carte_professionnelle')}}">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-map"></span>
        </div>
      </div>
    </div>
    <div class="text-danger text-center">{{$errors->first('n_carte_professionnelle')}}</div>
  </div>

@endif
@endfor
</div>


      


<div class="row">





  @foreach ($getTrainingRequiredDocument as $getTrainingRequiredDocument)  
  <div class="col-lg-6">
    <div class="form-group">
      <label for="documents">{{$getTrainingRequiredDocument->label}} *</label>
      <div class="input-group">
        <div class="custom-file">
         
          <input type="file" class="custom-file-input " id="documents" name="doc[{{$getTrainingRequiredDocument->id}}]" accept="image/jpg"  multiple>
          <label class="custom-file-label" for="documents"></label>
      
        </div>
        <div class="input-group-append">
          <span class="input-group-text"><i class="fas fa-file-image"></i></span>
        </div>
      </div>
      <div class="text-danger text-center">{{$errors->first('documents')}}</div> 
    </div>
  </div>
  @endforeach

 


</div>

{{-- test path of image --}}
{{-- <div class="form-group">
  <label for="documents">{{$getTrainingRequiredDocument->label}}</label>
  <div class="input-group">
    <div class="custom-file">
     
      <input type="file" class="form-control form-control-custom-file-input" required name="image">
    </div>
    <div class="input-group-append">
      <span class="input-group-text"><i class="fas fa-file-image"></i></span>
    </div>
  </div>
  <div class="text-danger">{{$errors->first('documents')}}</div> 
</div> --}}




        <div class="row">
          <!-- /.col -->
          <div class="col-3 mt-5" style="margin-left: 34%">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
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

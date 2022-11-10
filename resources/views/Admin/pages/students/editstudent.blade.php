

    @extends('layouts.admin')
    @section('content')

    @if($errors->any())

    @endif


<div class="container-fluid " >
  <div class="card card-outline card-primary col-9 mt-5 " style="margin-left: 20%">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>ARTL</b>Nord</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{__('Remplire le formulaire')}}</p>

      <form action="{{route('update.student',[$training_id,$student_id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
          <div class="col-lg-6">
        <label for="name">{{__('Nom Complet')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nom Complet" value="{{$selectStudent[0]->user->name}} ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('name')}}</div>
        </div>
        <div class="col-lg-6">
          <label for="arabic_name">{{__('Nom Complet en arabe')}}</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="arabic_name" name="arabic_name" placeholder="Nom Complet "  value="{{$selectStudent[0]->arabic_name}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        <div class="text-danger">{{$errors->first('arabic_name')}}</div>
          </div>
      </div>
      <div class="row ">
        <div class="col-lg-6">
        <label for="email">{{__('Email')}}</label>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="{{$selectStudent[0]->user->email}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('email')}}</div>
      </div>
      <div class="col-lg-6">
        <label for="password">{{__('Password')}}</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('password')}}</div>
      </div>
      </div>




      <div class="row ">
        <div class="col-lg-6">
        <label for="cin">{{__('CIN')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="cin" name="cin" placeholder="CIN" value="{{$selectStudent[0]->user->cin}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card mr-1"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('cin')}}</div>
      </div>
      <div class="col-lg-6">
        <label for="phone">{{__('N Telephone')}}</label>
        <div class="input-group mb-3">
          <input type="number" class="form-control" id="phone" name="phone" placeholder="Telephone" value="{{$selectStudent[0]->user->phone}}">
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
      <div class="col-lg-6">
        <label for="date_naissance">{{__('Date de Naissance')}}</label>
        <div class="input-group mb-3">
          <input type="date" class="form-control" id="date_naissance" name="date_naissance" placeholder="Date de Naissance" value="{{$selectStudent[0]->date_naissance}}">
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
        <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" placeholder="Lieu de naissance" value="{{$selectStudent[0]->lieu_naissance}}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-map"></span>
          </div>
        </div>
      </div>
      <div class="text-danger">{{$errors->first('lieu_naissance')}}</div>
    </div>
  
  </div>


  <div class="row ">
    
    <div class="col-lg-12">
      <label for="address">{{__('Address')}}</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$selectStudent[0]->user->address}}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-map"></span>
          </div>
        </div>
      </div>
      <div class="text-danger">{{$errors->first('address')}}</div>
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
    <label for="n_permis">{{__('N Permis')}}</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="n_permis" name="n_permis" placeholder="N Permis" value="{{$selectStudent[0]->n_permis}}">
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
      <input type="date" class="form-control" id="date_obtention" name="date_obtention" placeholder="Date de Permis" value="{{$selectStudent[0]->date_obtention}}">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-calendar"></span>
        </div>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('date_obtention')}}</div>
</div>
</div>

<div class="row ">
  <div class="col-lg-4 " style="margin-left: 10%">
    <label for="categorie_permis_id">{{__('Categorie de Permis')}}</label>
    <div class="dropdown">
      <select class="btn btn-primary  dropdown-toggle col-lg-9 "  name="categorie_permis_id"   type="button" id="categorie_permis_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categorie
        <option ></option>
          {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> --}}
      @foreach ($selectCatPermis as $CatPermis)
        <option class="dropdown-item" value="{{$CatPermis->id}}">{{$CatPermis->label}}</option>
      @endforeach
    {{-- </div>   --}}
  </select>    
    </div>
    <div class="text-danger">{{$errors->first('categorie_permis_id')}}</div>
  </div>

  <div class="col-lg-4 " style="margin-left: 15%">
    <label for="group_id">{{__('Group ')}}</label>
    <div class="dropdown">
      <select class="btn btn-primary  dropdown-toggle col-lg-9"  name="group_id"   type="button" id="group_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Group
        <option ></option>
          {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> --}}
      @foreach ($selectGroups as $group)
        <option class="dropdown-item" value="{{$group->id}}">{{$group->label}}</option>
      @endforeach
    {{-- </div>   --}}
  </select>    
    </div>
    <div class="text-danger">{{$errors->first('group_id')}}</div>
  </div>

</div>


<div class="row">

    @for ($i = 0; $i < count($getTrainingRequiredDocument); $i++)
    @if (Str::contains($getTrainingRequiredDocument[$i]['label'],['carte professionnelle']))
        
  {{-- if the selection id of fromation has fco --}}
 
  {{-- dd($getTrainingRequiredDocument) --}}
  <div class="col-lg-6">
    <label for="n_carte_professionnelle">{{__('N Carte Professionnelle')}}</label>
    <div class="input-group mb-3">
      <input type="text" class="form-control" id="n_carte_professionnelle" name="n_carte_professionnelle"  value="{{$selectStudent[0]->n_carte_professionnelle}}">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-map"></span>
        </div>
      </div>
    </div>
    <div class="text-danger">{{$errors->first('n_carte_professionnelle')}}</div>
  </div>

@endif
@endfor



  @foreach ($getTrainingRequiredDocument as $getTrainingRequiredDocument)  
  <div class="col-lg-6">
    <div class="form-group">
      <label for="documents">{{$getTrainingRequiredDocument->label}}</label>
      <div class="input-group">
        <div class="custom-file">
         
          <input type="file" class="custom-file-input " id="documents" name="doc[{{$getTrainingRequiredDocument->id}}]" accept="image/jpg"  multiple>
          <label class="custom-file-label" for="documents"></label>
      
        </div>
        <div class="input-group-append">
          <span class="input-group-text"><i class="fas fa-file-image"></i></span>
        </div>
      </div>
      <div class="text-danger">{{$errors->first('documents')}}</div> 
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
            <button type="submit" class="btn btn-primary btn-block">Update</button>
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



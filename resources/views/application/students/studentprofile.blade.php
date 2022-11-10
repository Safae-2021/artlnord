


@extends('layouts.application')
@section('content')
@if($errors->any())

@endif


@php
use App\Models\{Requireddocument_student,Note,Student};
@endphp

{{-- @php
$selectRqDocStdPhoto      =  Requireddocument_student::where('student_id',$student->id)
->where('image_path', 'like', '%' . 'photo' . '%',)
->get('image_path');
@endphp --}}
 
  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 ">
            <h1 class="text-center">Profile</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}
    @foreach ($selectUserStd as $userStd)
        
    <!-- Main content -->
    <section class="content mt-5" id="stdprofile">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @php
                  $selectRqDocStdPhoto      =  Requireddocument_student::where('student_id',$userStd->id)
                  ->where('image_path', 'like', '%' . 'photo' . '%',)
                  ->get('image_path');

                  $selectRqDocStd      =  Requireddocument_student::where('student_id',$userStd->id)
                  ->get();
                  
                  @endphp
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$StorageSourcePathStudents.'/'.$selectRqDocStdPhoto[0]->image_path}}"
                       alt="User profile picture" style="height: 150px">
                </div>

                <h3 class="profile-username text-center">{{$userStd->user->name}}</h3>
                {{-- arabic --}}
                <p class="text-muted text-center">{{$userStd->arabic_name}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$userStd->user->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>N Tel</b> <a class="float-right">{{'0'.$userStd->user->phone}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>CIN</b> <a class="float-right">{{$userStd->user->cin}}</a>
                  </li>
                  <li class="list-group-item">
                  @if (Route::has('password.request'))
                     <a href="{{ route('password.request') }}" class="text-center">Mot de pass oublier</a>
                     @endif
                  </li>
                
                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

  
          </div>
          <!-- /.col -->
          <div class="col-md-7">
                   <!-- About Me Box -->
                   <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <strong ><i class="fas fa-pen mr-1" ></i> Naissance</strong>
      
                      <p class="text-muted">
                        <span class="tag tag-info" style="color:green">Lieu de  Naissance :</span>
                        <span class="tag tag-warning" > {{$userStd->lieu_naissance}}</span>
                        <br>
                        <span class="tag tag-info" style="color:green "style="color:green"     >Date de Naissance :</b></span>
                        <span class="tag tag-warning"> {{$userStd->date_naissance}}</span>
                        <br>
                      </p>
      
                      <hr>
      
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
      
                      <p class="text-muted">{{$userStd->user->address}} </p>

      
                      <hr>
      
                      <strong><i class="fas fa-id-card-alt mr-1"></i> Permis</strong>
      
                      <p class="text-muted">
                        <span class="tag tag-danger " style="color:green" >      Categorie de Permis :</b></span>
                        <span class="tag tag-success">{{$userStd->categoriepermis->label}}</span>
                        <br>
                        <span class="tag tag-info " style="color:green" >N Permis :</b></span>
                        <span class="tag tag-warning"> {{$userStd->n_permis}}</span>
                        <br>
                        <span class="tag tag-info " style="color:green">Date d`Obtention :</b></span>
                        <span class="tag tag-warning"> {{$userStd->date_obtention}}</span>
                        <br>
                        <span class="tag tag-info " style="color:green" >N Carte Professionnelle :</b></span>
                        <span class="tag tag-warning"> {{$userStd->n_professionnelle_carte}}</span>
                      </p>
      
                     
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endforeach

  </div>
  <!-- /.content-wrapper -->

@endsection
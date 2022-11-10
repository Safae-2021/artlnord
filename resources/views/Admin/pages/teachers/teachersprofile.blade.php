



@extends('layouts.Admin')
@section('content')
@if($errors->any())

@endif





 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-5">


      @foreach ($getTeacherprofile as $Teacherprofile)
          
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$StorageSourcePathTeachers.'/'.$Teacherprofile->photo}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$Teacherprofile->name}}</h3>

                {{-- <p class="text-muted text-center">Software Engineer</p> --}}

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>CIN</b> <a class="float-right">{{$Teacherprofile->cin}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>N Telephone</b> <a class="float-right">0{{$Teacherprofile->phone}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$Teacherprofile->email}}</a>
                  </li>
                </ul>

                <a href="{{route('teachers.list',$Teacherprofile->id)}}" style="margin-left:45%" ><b> <i class="fas fa-arrow-left ml-3 " style="color:green"></i></b></a>
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
                      <h3 class="card-title">Documents</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div >
                        <div class="row">
                        <img class="img-fluid mb-3  col-lg-3 "
                             src="{{$StorageSourcePathTeachers.'/'.$Teacherprofile->photo}}"
                             alt="User profile picture">

                        <img  class="img-fluid mb-3  col-lg-3"
                             src="{{$StorageSourcePathTeachers.'/'.$Teacherprofile->scan_cin}}"
                             alt="User profile picture">
                        </div>
                      </div>
                   
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








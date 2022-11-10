
 @extends('layouts.admin')
 @section('content')

 @php
 use App\Models\{Requireddocument_student,Note,Student};
 @endphp


    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper pt-5">
    
    @forelse ($selectStudents as $student)
    {{-- <a href="{{route('student.list',$training_id)}}"> <i class="fas fa-arrow-left ml-3 " style="color:green"></i> </a> --}}

    <!-- Main content -->
    <section class="content mt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @php
                  $selectRqDocStdPhoto      =  Requireddocument_student::where('student_id',$student->id)
                  ->where('image_path', 'like', '%' . 'photo' . '%',)
                  ->get('image_path');

                  $selectRqDocStd      =  Requireddocument_student::where('student_id',$student->id)
                  ->get();
                  
                  @endphp
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$StorageSourcePathStudents.'/'.$selectRqDocStdPhoto[0]->image_path}}"
                       alt="User profile picture" style="height: 150px">
                </div>

                <h3 class="profile-username text-center">{{$student->user->name}}</h3>
                                                    {{-- arabic --}}
                <p class="text-muted text-center">{{$student->arabic_name}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$student->user->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>N Tel</b> <a class="float-right">{{'0'.$student->user->phone}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>CIN</b> <a class="float-right">{{$student->user->cin}}</a>
                  </li>
                </ul>

                <a href="{{route('student.list',$training_id)}}" style="margin-left:45%" ><b> <i class="fas fa-arrow-left ml-3 " style="color:green"></i></b></a>
    {{-- <a href="{{route('student.list',$training_id)}}"> </a> --}}


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

     
          </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Information </a></li>
                  <li class="nav-item"><a class="nav-link" href="#doc" data-toggle="tab">Documents</a></li>
                </ul>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="info">
                    <div class="card-body">
                      <strong ><i class="fas fa-pen mr-1" ></i> Naissance</strong>
      
                      <p class="text-muted">
                        <span class="tag tag-info" style="color:green">Lieu de  Naissance :</span>
                        <span class="tag tag-warning" > {{$student->lieu_naissance}}</span>
                        <br>
                        <span class="tag tag-info" style="color:green "style="color:green"     >Date de Naissance :</b></span>
                        <span class="tag tag-warning"> {{$student->date_naissance}}</span>
                        <br>
                      </p>
                      <hr>
      
                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
      
                      <p class="text-muted">{{$student->user->address}} </p>
      
                      <hr>
      
                      <strong><i class="fas fa-id-card-alt mr-1"></i> Permis</strong>
      
                      <p class="text-muted">
                        <span class="tag tag-danger " style="color:green" >      Categorie de Permis :</b></span>
                        <span class="tag tag-success">{{$student->categoriepermis->label}}</span>
                        <br>
                        <span class="tag tag-info " style="color:green" >N Permis :</b></span>
                        <span class="tag tag-warning"> {{$student->n_permis}}</span>
                        <br>
                        <span class="tag tag-info " style="color:green">Date d`Obtention :</b></span>
                        <span class="tag tag-warning"> {{$student->date_obtention}}</span>
                        <br>
                        <span class="tag tag-info " style="color:green" >N Carte Professionnelle :</b></span>
                        <span class="tag tag-warning"> {{$student->n_professionnelle_carte}}</span>
                      </p>
    
                      {{-- <hr>
      
                      <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
      
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
                    </div>
                    <!-- /.card-body -->

                    
                  </div>
                  <!-- /.tab-pane -->


                  <div class="tab-pane" id="doc">
                 
                    <!-- Post -->
                    <div class="post">
                     
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            @foreach ($selectRqDocStd  as  $rqDocStd )
                                <div class="col-sm-6">
                                 {{-- {{ $rqDocStd->image_path}}  --}}
                                   <img class="img-fluid mb-3 " src="{{$StorageSourcePathStudents.'/'.$rqDocStd->image_path}}" alt="Photo" style="width: 100%;height:150px">
                                  </div>
                                  <div  class="text-center ">
                               <a href="{{route('download.student.requireddocument',['requireddocumentstudent_id' => $rqDocStd->id])}}" class="btn btn-primary  mt-5" >Telecharger</a>
                              </div>
                            @endforeach
                         
                       
                            {{-- <a href="{{route('download.multi.student.requireddocument', ['training_id' => $training_id , 'student_id' => $student->id])}}" class="btn btn-primary "  >Telecharger</a> --}}
                       
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      
                      <!-- /.row -->
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         
          
            {{-- note start --}}
    
            <div class="card col-md-6 ">
            
              <!-- /.card-header -->
              <div class="card-body p-0 ">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>Parties de Formation</th>
                      <th>Notes</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                
        


                      {{-- <td>1.</td> --}}
                      @forelse ($selectTraining as $training)
                      
                     
                      <td class="mt-2">{{$training->parts[0]->label}} </td>
                      
                        @php
                        $note=    Note::where('student_id',$student_id)->where('part_training_id',$training->parts[0]->id)->where('training_id',$training_id)->get('note');
                        @endphp
                     
                       {{-- <input type="number" name="note"  class="mt-2" class="form-control" > --}}
                        @if ($note->count()>0)

                        <td>
                           {{$note[0]->note}} 
                        </td>
                        <td>
                          <form action="{{route('student.update.note',[$training_id,$student_id,'part_training_id'=>$training->parts[0]->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                    

                          <div class="dropdown show">
                            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-edit " style="color:#0a58ca;cursor: pointer; "></i>
                            </a>
                          
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#">
    
                                <div class="row "  >
                                  <div  >
                                    <div class="input-group mb-3">
                                   <input type="number" name="note"  class="mt-2 col-lg-12" class="form-control" >
                                    </div>
                                    <div class="text-danger">{{$errors->first('note')}}</div>
                                    </div>
                                    <div class=" mt-2  "  >
                                      <button type="submit" class="btn btn-primary btn-block col-lg-12">update</button>
                                    </div>
                                  </div>
    
                              </a>
                           
                            </div>
                          </div>
                            </form>
                        </td>
                        <td><a href="{{route('student.delete.note',[$training_id,$student_id,'part_training_id'=>$training->parts[0]->id])}}"> <i class="fas fa-trash ml-3" style="color:red"></i> </a></td>

                        @else
                          <form action="{{route('student.store.note',[$training_id,$student_id,'part_training_id'=>$training->parts[0]->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf  
                            <td>
                            <div class="col-lg-6">
                          <div class="input-group mb-3">
                         <input type="number" name="note"  class="mt-2" class="form-control" >
                          </div>
                          <div class="text-danger">{{$errors->first('note')}}</div>
                          </div>

                        </td>
                        <td>   <div class=" mt-2 pb-3" >
                          <button type="submit" class="btn btn-primary btn-block">Valider</button>
                        </div>
                      </td>
                     </form>

                        @endif
                


                    </tr>
                    @empty
                          
                    @endforelse
              
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          {{-- note end --}}



          {{-- absance start --}}

          <div class="card col-md-6 ">
            
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Date D`absents</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
              
                    {{-- <td>1.</td> --}}
                    @forelse ($selectAbsentDatesOfStudent as $absentDatesOfStudent)
                    {{-- {{$absentDatesOfStudent}} --}}
                   
                    <td class="mt-2">{{$absentDatesOfStudent->date_absences}} </td>
                    <td>
                      <form action="{{route('student.absences.update',[$training_id,$student_id,'absent_date'=>$absentDatesOfStudent->date_absences])}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                      <div class="dropdown show">
                        <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-edit " style="color:#0a58ca;cursor: pointer; "></i>
                        </a>
                      
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">

                            <div class="row "  >
                              <div  >
                                <div class="input-group mb-3">
                               <input type="date" name="absences"  class="mt-2 col-lg-12" class="form-control" >
                                </div>
                                <div class="text-danger">{{$errors->first('absences')}}</div>
                                </div>
                                <div class=" mt-2  "  >
                                  <button type="submit" class="btn btn-primary btn-block col-lg-12">update</button>
                                </div>
                              </div>

                          </a>
                       
                        </div>
                      </div>

                        </form>
                    </td>
                    <td><a href="{{route('student.absences.delete',[$training_id,$student_id,'absent_date'=>$absentDatesOfStudent->date_absences])}}"> <i class="fas fa-trash ml-3" style="color:red"></i> </a></td>
                  </tr>
                  @empty
                        
                  @endforelse
            
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          {{-- absence end --}}
 


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @empty
                
    @endforelse

    
  </div>
  <!-- /.content-wrapper -->

  


  

@endsection

@section('scaffold_js')

<script>
  // function show(){
  //   querySelector('.show').style.display = "block"; 
  // }


  function show() {
var noteDiv = document.querySelector('.show');
if (noteDiv.style.display === "none") {
noteDiv.style.display = "block";
} 
else{
noteDiv.style.display = "none";
}
}
function showHide() {
var absencesDiv = document.getElementById('showhide');
if (absencesDiv.style.display === "none") {
absencesDiv.style.display = "block";
} 
else{
absencesDiv.style.display = "none";
}
}

</script>

@endsection

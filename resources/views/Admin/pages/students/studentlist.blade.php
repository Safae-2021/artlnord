
@section('scaffold_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@extends('layouts.admin')
@section('content')

@php
use App\Models\{Student,Requireddocument_student,Registration,Training,Absences};
@endphp

<div class="container-fluid  col-9" style="margin-left: 20%" >
<div class="card mt-5 ">
    <div class="card-header ">
        <div class="row">
      <h3 class="card-title col-6"> Etudiants 
          {{-- <a href="{{route('trashed.student', ['training_id' => $training_id,'student_id' => $selectStudent[0]->id ])}}"> --}}
          {{-- <i class="fas fa-trash  ml-3" style="color:red;width:20px"></i>   --}}
        {{-- </a> --}}
    </h3>
      <div class="card-title col-6">
          <h3 ></h3>
      </div>

    </div>

    </div>
    <div class="mt-2">
    <h4 class="text-center">La liste des Archives <a href="{{route('trashed.student', ['training_id' => $training_id])}}">
      <i class="fas fa-trash  ml-4" style="color:red;width:50px"></i>  
       </a></h3> 
     <hr>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2 ">
      <table class="table table-sm table-striped " id="example1" >
        <thead>
          <tr>
            <th style="width: 10px;color:#0a58ca">#</th>
            <th style="color:#0a58ca">Photo</th>
            <th style="color:#0a58ca">Nom Complet</th>
            <th style="color:#0a58ca">Group</th>
            <th style="color:#0a58ca">Professeur</th>
            {{-- <th style="color:#0a58ca">Progrès </th> --}}
            <th style="color:#0a58ca">Absence</th>
            {{-- <th style="color:#0a58ca">Notes</th> --}}
            <th style="color:#0a58ca">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php 
           $i=0;
           @endphp 
 

          @forelse ($selectStdIdsTraining as $selectStdIds)
          @php
           $getIds              = $selectStdIds->student_id;
           $selectStudent       =  Student::where('id',$getIds)->paginate(5);
          @endphp
  
          @foreach ($selectStudent as $student)

          
          <tr>
            <td>{{++$i}}.</td>
            @php
            $selectRqDocStd      =  Requireddocument_student::where('student_id',$student->id)
            ->where('image_path', 'like', '%' . 'photo' . '%',)
            ->get('image_path');
            @endphp

            <td><img src="{{$StorageSourcePathStudents
            $selectRqDocStd[0]->image_path}}" alt="" width="40%" height="50px"> </td>          
            <td>{{$student->user->name}}</td>        
            <td> 
              @php
                  $selectStdGroupFromRg       =  Registration::where('student_id',$student->id)->get();
                  // echo($selectStdGroupFromRg[0]->group_id);                  
                $u=0;
             @endphp

              
                      @if ($selectStdGroupFromRg[0]->group_id != null)  
                         <p class=" ml-3"> {{ $selectStdGroupFromRg[0]->group->label ; }}</p>
                      @elseif($selectStdGroupFromRg[0]->group_id == null)
                      <a href="{{route('affectation.group', ['training_id' => $training_id , 'student_id' => $student->id])}}"> <i class="fas fa-plus-circle  ml-3" style="color:#0a58ca;width:10px"></i>  </a>
                      @endif
               
            


              {{-- @if ($GroupIdNotNull != null)  
                 <p> {{ $GroupIdNotNull[0]->group->label ; }}</p>
              @else
              <a href="{{route('affectation.group', ['training_id' => $training_id , 'student_id' => $student->id])}}"> <i class="fas fa-plus-circle  ml-3" style="color:#0a58ca;width:10px"></i>  </a>
              @endif --}}
      
            </td>
            <td> {{$selectStdGroupFromRg[0]->group->teacher->name}}</td>  
            @php
            // $stdAbsentDate      =$student->absences[0]->date_absences;
            $stdAbsents           =$student->absences;
            // $selectAllTrainings   =Training::all();
            // $startdate                = $selectAllTrainings[0]->startdate;
            // $enddate                = $selectAllTrainings[0]->enddate;

            $selectStartDate       =Training::where('id',$training_id)->get('startdate');
            $selectEndDate         =Training::where('id',$training_id)->get('enddate');
            $startdate            =$selectStartDate[0]->startdate;
            $enddate              =$selectEndDate[0]->enddate;
            $srtDay                = new DateTime( $startdate);
            $enDay                = new DateTime( $enddate);
            $interval             = $srtDay->diff($enDay);
            
            
              // Absences::whereBetween('date_absences', [$selectStartDate, $selectEndDate])->get();
              // $absentStudents =  Absences::where('student_id',$student->id)
              //   ->whereBetween('date_absences', [$selectStartDate[0]->startdate,  $selectEndDate[0]->enddate])
              //   ->get();

        // if absentstudents true
        // else if date 
        // if student wbhere is != std id absent 
      // $presentStudents    =  Student::where('id', '!='  ,$absentStudents[0]->student_id)->get();
      
      // $student->id != $absentStudents[0]->student_id;
        @endphp
            {{-- <td>
              <div class="progress mt-2">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  @php
                  //( IF start date [date absence] end date formation )->count *100
                      // $student->absences->date_absences ;
                 
                 
                 @endphp
                 %</div>
              </div>

           



              @if ($student->absences->count() > 0)
  
                 
                 
                @foreach ($stdAbsents as $stdAbsent)

                @if ($stdAbsent->date_absences >= $selectStartDate ||  $stdAbsent->date_absences <= $selectEndDate)

                  
                @endif
                @endforeach
              
                  
              @else
                @php
                    $stdAbsents           =$student->absences;
                    
                @endphp
            

              {{    count([$student->id] )*100/$interval->d }}
            

           
              @endif
            </td>   --}}
              @php
                  // student absent between two day
              $absencesCount=    Absences::where('student_id',$student->id)->whereBetween('date_absences', [$startdate, $enddate])->get();
              @endphp
            <td>{{$absencesCount->count()}}</td>  
            {{-- <td>{{$student->absences->count()  }}</td>   --}}
            {{-- <td></td>   --}}
            <td> 
               <a href="{{route('edit.student',['training_id' => $training_id,'student_id' => $student->id ])}}" > <i class="fas fa-edit " style="color:#0a58ca"></i></a>                   
               <a href="{{route('delete.student', ['training_id' => $training_id,'student_id' => $student->id ])}}"> <i class="fas fa-trash ml-3" style="color:red"></i> </a>
               <a href="{{route('student.list.two', ['student_id' => $student->id, 'training_id' => $training_id])}}"> <i class="fas fa-arrow-right ml-3" style="color:green"></i> </a>
            </td> 
        </tr>
    
       @endforeach
       @empty
           
       
       <tr>
        <td colspan="6" class="text-center"> aucun etudiant </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
       @endforelse
        </tbody>
      </table>
    

    </div>
    <!-- /.card-body -->
    <!-- card-footer  -->
    <div class="card-footer clearfix">
      <ul class="pagination-sm m-0 float-right">
      {{$selectStudent ->links('application.helpers.pagination')}}
      </ul>
    </div>
  <!-- /.card -->

  </div>
  <!-- /.card-footer -->

  <style>
    .w-5{
      display:none;
      
    }
  </style>
  



</div>
@endsection

@section('scaffold_js')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script> --}}
{{-- <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> --}}
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>{{-- to change the color of the download buttons  --}}
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>{{-- excel --}}
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
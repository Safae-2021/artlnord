
@section('scaffold_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@extends('layouts.admin')
@section('content')

@php
use App\Models\Student;
use App\Models\Requireddocument_student;
use App\Models\Registration;

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
            <th style="color:#0a58ca">Progrès </th>
            <th style="color:#0a58ca">Absence</th>
            <th style="color:#0a58ca">Notes</th>
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

            <td><img src="{{$StorageSourcePathStudents.'/'.$selectRqDocStd[0]->image_path}}" alt="" width="40%" height="50px"> </td>          
            <td>{{$student->user->name}}</td>        
            <td> 
              @php
                  $GroupIds       =  Registration::where('student_id',$student->id)->get('group_id');
                  // echo($GroupIds[0]->group_id);                  
              @endphp


              @if ($GroupIds[0]->group_id != null)  
                 <p class=" ml-3"> {{ $GroupIds[0]->group->label ; }}</p>
              @elseif($GroupIds[0]->group_id == null)
              <a href="{{route('affectation.group', ['training_id' => $training_id , 'student_id' => $student->id])}}"> <i class="fas fa-plus-circle  ml-3" style="color:#0a58ca;width:10px"></i>  </a>
              @endif


              {{-- @if ($GroupIdNotNull != null)  
                 <p> {{ $GroupIdNotNull[0]->group->label ; }}</p>
              @else
              <a href="{{route('affectation.group', ['training_id' => $training_id , 'student_id' => $student->id])}}"> <i class="fas fa-plus-circle  ml-3" style="color:#0a58ca;width:10px"></i>  </a>
              @endif --}}
      

            
            </td>
            <td></td>  
            <td></td>  
            <td></td>  
            <td></td>  
            <td> 
               {{-- <a href="{{route('edit.student',$student->id)}}" > <i class="fas fa-edit " style="color:#0a58ca"></i></a>                    --}}
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
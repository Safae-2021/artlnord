
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
use App\Models\Group;

@endphp




<div class="container-fluid  col-9 content" style="margin-left: 20%" >
  
  @if (session()->has('absence-success'))
    <div class="alert alert-success mt-5 text-center"> 
      {{session('absence-success')}}
    </div>
    @elseif(session()->has('already-absent'))
    <div class="alert alert-danger mt-5 text-center"> 
      {{session('already-absent')}}
    </div>
  @endif

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
        <div class="row"> 
              @php
                $selectGroupLabel   = Group::where('id',$group_id)->get();
               @endphp
               <h4  class="col-6 text-center">Formation : <span  style="color:green"> {{$selectGroupLabel[0]->training->label}}</span></h4> 
                
                <h4  class="col-6 text-center"> Group : <span  style="color:green">{{$selectGroupLabel[0]->label}}</span></h4> 
                
        </div>
     <hr>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2 ">
      <form action="{{route('student.absences.add',['training_id' => $selectGroupLabel[0]->training->id ])}}" method="POST" enctype="multipart/form-data" id="ajax">
        @csrf
      <table class="table table-sm table-striped " id="example1" >
        <thead>
          <tr>
            <th style="width: 10px;color:#0a58ca">#</th>
            <th style="color:#0a58ca">Photo</th>
            <th style="color:#0a58ca">Nom Complet</th>
            {{-- <th style="color:#0a58ca">Email</th>
            <th style="color:#0a58ca">N Tel</th>
            <th style="color:#0a58ca">CIN </th> --}}
            <th style="color:#0a58ca">Absences</th>
          </tr>
        </thead>
        <tbody>
            @php 
           $i=0;
           @endphp 
 

          @forelse ($selectStdByGroupId as $selectStdIds)
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
            {{-- <td>{{$student->user->email}}</td>
            <td>{{'0'.$student->user->phone}}</td>
            <td>{{$student->user->cin}}</td> --}}
            <td> 
               {{-- <a href="{{route('edit.student',$student->id)}}" > <i class="fas fa-edit " style="color:#0a58ca"></i></a>                    --}}
               {{-- <a href="{{route('delete.student', ['training_id' => $training_id,'student_id' => $student->id ])}}"> <i class="fas fa-trash ml-3" style="color:red"></i> </a> --}}
               {{-- <a href=""> <i class="fas fa-arrow-right ml-3" style="color:green"></i> </a> --}}
              
              
                <div class="custom-control custom-checkbox">
              <input  class="ajaxload " type="checkbox" id="customCheckbox1" name="student_id[]" value="{{$student->id}}"  multiple>
                    {{-- <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label> onchange="this.form.submit()"  --}}
                  </div>

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
        <div class="text-right pt-0 mb-5" style="margin-right: 20%">
        <button type="submit" class="btn btn-primary ">Valider</button>
        </div>
        </form>

    </div>
    <!-- /.card-body -->
    <!-- card-footer  -->
    <div class="card-footer clearfix">
      <ul class="pagination-sm m-0 float-end">
      {{-- {{$selectStudent ->links('application.helpers.pagination')}} --}}

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
<script src="{{asset('js/jquery.js')}}"></script>

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
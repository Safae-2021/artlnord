
@section('scaffold_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@extends('layouts.admin')
@section('content')

@php
// use App\Models\Student;
use App\Models\Requireddocument_student;
use App\Models\Registration;
use App\Http\Controllers\Admin\AdminStudentController;

@endphp

<div class="container-fluid  col-9" style="margin-left: 20%" >
<div class="card mt-5 ">
    <div class="card-header ">
        <div class="row">
      <h3 class="card-title col-6"> 
        <a href="{{route('student.list',$training_id)}}" class="m-2" ><b> <i class="fas fa-arrow-left  " style="color:green"></i></b></a>
        Etudiants 
    </h3>
      <div class="card-title col-6">
          <h5 > {{$selectTrainingLabel[0]->label}}</h5>
      </div>

    </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-2 ">
      <table class="table table-sm table-striped " id="example1" >
        <thead>
          <tr>
            <th style="width: 10px;color:#0a58ca">#</th>
            <th style="color:#0a58ca">Photo</th>
            <th style="color:#0a58ca">Nom Complet</th>
            <th style="color:#0a58ca">Email</th>
            <th style="color:#0a58ca">N Tel</th>
            <th style="color:#0a58ca">CIN </th>
            <th style="color:#0a58ca">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php 
           $i=0;
           @endphp 

      @forelse ($selectTrashedStudent as $trashedStudent)
      <td>{{++$i}}.</td>
      @php
      $selectRqDocStd      =  Requireddocument_student::where('student_id',$trashedStudent->id)
      ->where('image_path', 'like', '%' . 'photo' . '%',)
      ->get('image_path');
      @endphp

<td><img src="{{$StorageSourcePathStudents.'/'.$selectRqDocStd[0]->image_path}}" alt="" width="40%" height="50px"> </td>          
<td>{{$trashedStudent->user->name}}</td>        

<td>{{$trashedStudent->user->email}}</td>
<td>{{'0'.$trashedStudent->user->phone}}</td>
<td>{{$trashedStudent->user->cin}}</td>
<td> <a href="{{route('restore.trashedStudent',['training_id' => $training_id,'student_id' => $trashedStudent->id ])}}"> <i class="fas fa-recycle " style="color:green"></i></a> </td>
      @empty
        <td colspan="6" class="text-center"> aucun etudiant </td>
        <td></td>
      @endforelse



        </tbody>
      </table>
    

    </div>
    <!-- /.card-body -->
    <!-- card-footer  -->
    <div class="card-footer clearfix">
      <ul class="pagination-sm m-0 float-right">
      {{$selectTrashedStudent ->links('application.helpers.pagination')}}
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
@section('scaffold_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@extends('layouts.admin')
@section('content')

<div class="text-center mt-3 " style="margin-left: 40%">
@if (session()->has('deletesucces'))
    <div class="alert alert-success col-6  ">{{session('deletesucces')}}</div>
@endif
@if (session()->has('acceptsucces'))
    <div class="alert alert-success col-6">{{session('acceptsucces')}}</div>
@endif
</div>
<div class="container-fluid  col-9" style="margin-left: 20%">
<div class="card mt-5 ">
    <div class="card-header ">
        <div class="row">
      <h3 class="card-title col-6"> Table des Locateures 
          {{-- <a href="{{route('add.teachers')}}">
          <i class="fas fa-plus-circle  ml-3" style="color:#0a58ca;width:10px"></i>  
        </a> --}}
    </h3>
      <div class="card-title col-6">
          <h3 ></h3>
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
            <th style="color:#0a58ca">Date debut</th>
            <th style="color:#0a58ca">Date de fin</th>
            <th style="color:#0a58ca">Heur debut</th>
            <th style="color:#0a58ca">Heur de fin</th>
            <th style="color:#0a58ca">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php 
           $i=0;
       @endphp 
       @forelse ($selectRentals as $selectRental)
            <tr>
            <td>{{++$i}}.</td>
            <td><img src="{{$StorageSourcePathRentals.'/'.$selectRental->photo}}" alt="" width="40%" height="50px"> </td>
            {{-- <td><img src="images/selectRental/profile881879.jpg" alt="" width="50%" height="20px"> </td> --}}
            <td>{{$selectRental->user->name}}</td>
            <td>{{$selectRental->startdate}}</td>
            <td>{{$selectRental->enddate}}</td>
            <td>{{$selectRental->starttime}}</td>
            <td>{{$selectRental->endtime}}</td>

            <td> 
               
               <a href="{{route('delete.rental',$selectRental->id)}}"> <i class="fas fa-trash " style="color:red"></i> </a>
               @if ($selectRentals[0]->status == true)  
                <i class="fas fa-user-friends ml-3" style="color:#0a58ca"></i>
            @elseif($selectRentals[0]->status == false)
            <a href="{{route('affectation.group', ['training_id' => $training_id , 'student_id' => $student->id])}}"> <i class="fas fa-plus-circle  ml-3" style="color:#0a58ca;width:10px"></i>  </a>
            @endif
            {{-- <a href="{{route('accept.rental',$selectRental->id)}}">   <i class="fas fa-check ml-3" style="color:#0a58ca"></i></a> --}}
            
               <a href="{{route('rental.listtwo',$selectRental->id)}}"> <i class="fas fa-arrow-right ml-3" style="color:green"></i> </a>
               {{-- <a href="{{route('refuse.rental',$selectRental->id)}}"  style="color:#0a58ca;width:40px;height:70px"  class="ml-3"> X</a>                    --}}
               </td>

          

          </tr>
       @empty
           
           <tr>
            <td colspan="6" class="text-center"> aucun Locateur</td>
         </tr>
       @endforelse
         
          
        
        </tbody>
      </table>
    

    </div>
    <!-- /.card-body -->
    <!-- card-footer  -->
    <div class="card-footer clearfix">
      <ul class="pagination-sm m-0 float-right">
      {{$selectRentals ->links('application.helpers.pagination')}}
        
        {{-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> --}}
      </ul>

    </div>
  <!-- /.card -->

  </div>
  <!-- /.card-footer -->

    {{-- $all before maping --}}
    {{-- {{$selectTeachers ->links('application.helpers.pagination')}} --}}
 
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
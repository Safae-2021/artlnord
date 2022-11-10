
@section('scaffold_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@extends('layouts.admin')
@section('content')


@if($errors->any())

@endif

@php
use App\Http\Controllers\Admin\AdminStudentController;
use App\Models\Group;
@endphp

<div class="container-fluid " >
<div class="card card-outline card-primary col-9 mt-5 " style="margin-left: 20%">
<div class="card-header text-center">
  <a href="{{route('admin.dashboard')}}" class="h1"><b>ARTL</b>Nord</a>
</div>
<div class="card-body">
  <p class="login-box-msg">{{__('Affectation des Groups')}}</p>
  


  @if ($selectGroupFromTraining->count() > 0)
  
  <form action="{{route('store.student.affgroup',[$training_id,$student_id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row text-center">
      <div class="col-lg-6">
    <label for="group_id">{{__('Groups ')}}</label>
    <div class="dropdown">
        <select class="btn btn-primary  custom-select"   name="group_id"   type="button" id="group_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   >
              Group
           <option ></option>
           @forelse ($selectGroupFromTraining as $groupFromTraining)
            <option class="dropdown-item" value="{{$groupFromTraining->id}}" >{{$groupFromTraining->label}}</option>
            @php
       
    @endphp
          @empty
          <option >aucun group</option>
            @endforelse
    </select>    
      </div>
    <div class="text-danger">{{$errors->first('group_id')}}</div>
    </div>
    <div class="col-lg-6 mt-2">
      <img src="{{asset('img/room-2.jpg')}}" alt="" style="max-height: 200px;max-width:90%">
    </div>
  </div>


</div>

    <div class="row">
      <div class="col-3 mt-2 pb-3" style="margin-left: 34%">
        <button type="submit" class="btn btn-primary btn-block">Valider</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  @else

  <div class="row text-center">
    <div class="col-lg-6">
  <label for="group_id">{{__('Groups')}}</label>
  <div class="dropdown">
      <select class="btn btn-primary  custom-select"   name="group_id"   type="button" id="group_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   >
         Group
        <option >aucun group</option>  
  </select>    
    </div>
  <div class="mt-3" > <a href="{{route('add.group')}}"> Ajoutez un group</a> </div>
  </div>
  <div class="col-lg-6 mt-3">
    <img src="{{asset('img/room-2.jpg')}}" alt="" style="max-height: 200px;max-width:90%">
  </div>
</div>

  @endif


 

</div>
<!-- /.form-box -->
</div><!-- /.card -->



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
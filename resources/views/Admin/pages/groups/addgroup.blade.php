

@extends('layouts.admin')

@section('content')

  @if($errors->any())

    @endif


<div class="container-fluid " >
  <div class="card card-outline card-primary col-9 mt-5 " style="margin-left: 20%">
    <div class="card-header text-center">
      <a href="{{route('admin.dashboard')}}" class="h1"><b>ARTL</b>Nord</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{__('Remplire le formulaire')}}</p>

      <form action="{{route('store.group')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
          <div class="col-lg-6">
        <label for="label">{{__('Group ')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="label"  placeholder="Group" name="label">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-align-center"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('label')}}</div>
        </div>
        <div class="col-lg-6">
          <label for="training_id">{{__('Formation')}}</label>
          <div class="dropdown">
            <select class="btn btn-primary  custom-select"   name="training_id"   type="button" id="training_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   >
               Formation
              <option ></option>
            @foreach ($selsctTrainings as $training)
              <option class="dropdown-item" value="{{$training->id}}" >{{$training->label}}</option>
            @endforeach
        </select>    
          </div>
          <div class="text-danger">{{$errors->first('training_id')}}</div>
        
        </div>
      </div>
   
      <div class="row ">
        <div class="col-lg-6">
          <label for="room_id">{{__('Salle')}}</label>
          <div class="dropdown">
            <select class="btn btn-primary  custom-select"   name="room_id"   type="button" id="room_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   >
               Salle
              <option ></option>
            @foreach ($selsctRooms as $rooms)
              <option class="dropdown-item" value="{{$rooms->id}}" >{{$rooms->label}}</option>
            @endforeach
        </select>    
          </div>
          <div class="text-danger">{{$errors->first('room_id')}}</div>
        
        </div>
        <div class="col-lg-6">
          <label for="teacher_id">{{__('Professeur')}}</label>
          <div class="dropdown">
            <select class="btn btn-primary  custom-select"   name="teacher_id"   type="button" id="teacher_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   >
               Professeur
              <option ></option>
            @foreach ($selectTeachers as $teachers)
              <option class="dropdown-item" value="{{$teachers->id}}" >{{$teachers->name}}</option>
            @endforeach
        </select>    
          </div>
          <div class="text-danger">{{$errors->first('teacher_id')}}</div>
        
        </div>
      </div>

{{-- <div class="row ">
<div class="col-lg-6 mt-1">
  <div class="input-group mt-4 ">
    <div class="custom-control custom-switch ">
      <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="status">
      <label class="custom-control-label" for="customSwitch1"> Activer ce champ si vous  voulez utiliser cette partie de formation dans votre application </label>
    </div>
  </div>
  <div class="text-danger">{{$errors->first('status')}}</div>
</div>

</div> --}}


</div>

        <div class="row">
          <div class="col-3 mt-2 pb-3" style="margin-left: 34%">
            <button type="submit" class="btn btn-primary btn-block">Valider</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection



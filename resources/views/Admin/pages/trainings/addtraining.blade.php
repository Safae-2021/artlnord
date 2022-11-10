@section('scaffold_css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
<!-- SimpleMDE -->
<link rel="stylesheet" href="{{asset('plugins/simplemde/simplemde.min.css')}}">
  @endsection


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

      <form action="{{route('store.training')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
        <div class="col-lg-12">
        <label for="label">{{__('Formation ')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="label"  placeholder="Formation " name="label" value="{{ old('label')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-align-center"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('label')}}</div>
        </div>
        {{-- <div class="col-lg-6 text-center">
          <label for="room_id">{{__('Choisire une salle')}}</label>
          <div class="dropdown "  >
            <select class="btn btn-primary  dropdown-toggle"  name="room_id"   type="button" id="room_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Salle
              <option ></option>
            @foreach ($selectRooms as $room)
              <option class="dropdown-item" value="{{$room->id}}">{{$room->label}}</option>
            @endforeach
        </select>    
          </div>
          <div class="text-danger">{{$errors->first('room_id')}}</div>
        
        </div> --}}
      </div>
   
      <div class="row ">
        <div class="col-lg-6">
            <label for="startdate">{{__('Date début')}}</label>
            <div class="input-group mb-3">
              <input type="date" class="form-control" id="startdate" name="startdate" placeholder="Date début" value="{{ old('startdate')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-calendar"></span>
                </div>
              </div>
            </div>
            <div class="text-danger">{{$errors->first('startdate')}}</div>
          </div>
          <div class="col-lg-6">
            <label for="enddate">{{__('Date fin')}}</label>
            <div class="input-group mb-3">
              <input type="date" class="form-control" id="enddate" name="enddate" placeholder="Date fin" value="{{ old('enddate')}}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-calendar"></span>
                </div>
              </div>
            </div>
            <div class="text-danger">{{$errors->first('enddate')}}</div>
          </div>
        </div>

        <div class="row ">
            <div class="col-lg-6">
                <label for="starttime">{{__('heure début')}}</label>
                <div class="input-group mb-3">
                  <input type="time" class="form-control" id="starttime" name="starttime" placeholder="heure début" value="{{ old('starttime')}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar"></span>
                    </div>
                  </div>
                </div>
                <div class="text-danger">{{$errors->first('starttime')}}</div>
              </div>
              <div class="col-lg-6">
                <label for="endtime">{{__('heure fin')}}</label>
                <div class="input-group mb-3">
                  <input type="time" class="form-control" id="endtime" name="endtime" placeholder="heure fin" value="{{ old('endtime')}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar"></span>
                    </div>
                  </div>
                </div>
                <div class="text-danger">{{$errors->first('endtime')}}</div>
              </div>
            </div>

            <div class="row ">
              {{-- <div class="col-lg-12">
                <label for="description">{{__('Description')}}</label>
                <div class="input-group mb-3">
                  <textarea type="text" class="form-control" id="description" name="description" placeholder="description">{{ old('description')}}</textarea>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-align-center"></span>
                    </div>
                  </div>
                </div>
                <div class="text-danger">{{$errors->first('description')}}</div>
                </div> --}}
                <div class="col-lg-12">
                <label for="description">{{__('Description')}}</label>
                <div class="input-group mb-3">
                  <div class="col-lg-12">
                      <div class="card-body">
                        <textarea id="summernote" name="description">
                          {{ old('description')}}
                        </textarea>
                      </div>
                  </div>
                </div>
                <div class="text-danger">{{$errors->first('description')}}</div>
              </div>
              </div>


           {{--   <div class="row ml-5 ">
                <div class="col-lg-6">
                  <label for="room_id">{{__('Choisire une salle')}}</label>
                  <div class="dropdown">
                    <select class="btn btn-primary  dropdown-toggle"  name="room_id"   type="button" id="room_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Salle
                      <option ></option>
                    @foreach ($selectRooms as $room)
                      <option class="dropdown-item" value="{{$room->id}}">{{$room->label}}</option>
                    @endforeach
                </select>    
                  </div>
                  <div class="text-danger">{{$errors->first('room_id')}}</div>
                
                </div>
               <div class="col-lg-6">
                  <label for="teacher_id">{{__('Choisire un Enseignant')}}</label>
                  <div class="dropdown">
                    <select class="btn btn-primary  dropdown-toggle"  name="teacher_id"   type="button" id="teacher_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Enseignant
                      <option ></option>
                    @foreach ($selectTeachers as $teacher)
                      <option class="dropdown-item" value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
                </select>    
                  </div>
                  <div class="text-danger">{{$errors->first('teacher_id')}}</div>
                
                </div>
               
            </div> --}}
            
            <div class="row mt-5">
              <div class="col-lg-4">
                <label for="part_id">{{__('Choisire la partie')}}</label>
                <div class="dropdown">
                  <select class="btn btn-primary  dropdown-toggle custom-select"   name="part_id[]"   type="button" id="part_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" multiple  >
                     partie
                    <option ></option>
                  @foreach ($selectParts as $part)
                    <option class="dropdown-item" value="{{$part->id}}" >{{$part->label}}</option>
                  @endforeach
              </select>    
                </div>
                <div class="text-danger">{{$errors->first('part_id')}}</div>
              
              </div>
              <div class="col-lg-4">
                <label for="required_document_id">{{__('Documents Requis')}}</label>
                <div class="dropdown">
                  <select class="btn btn-primary  custom-select"   name="required_document_id[]"   type="button" id="required_document_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" multiple  >
                     Documents Requis
                    <option ></option>
                  @foreach ($selectRequiredDocuments as $requiredDocument)
                    <option class="dropdown-item" value="{{$requiredDocument->id}}" >{{$requiredDocument->label}}</option>
                  @endforeach
              </select>    
                </div>
                <div class="text-danger">{{$errors->first('required_document_id')}}</div>
              
              </div>
              <div class="col-lg-4">
                <label for="requested_document_id">{{__('Documents Demander')}}</label>
                <div class="dropdown">
                  <select class="btn btn-primary  custom-select"   name="requested_document_id[]"   type="button" id="requested_document_id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" multiple  >
                     Documents Demander
                    <option ></option>
                  @foreach ($selectRequestedDocuments as $requestedDocument)
                    <option class="dropdown-item" value="{{$requestedDocument->id}}" >{{$requestedDocument->label}}</option>
                  @endforeach
              </select>    
                </div>
                <div class="text-danger">{{$errors->first('requested_document_id')}}</div>
              </div>
            </div>

           
        <div class="row ">
            <div class="col-lg-6 mt-1">
                <div class="input-group mt-3 ">
                  <div class="custom-control custom-switch ">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="status">
                    <label class="custom-control-label" for="customSwitch1"> Status </label>
                    <br>
                    <span class="text  text-secondary disabled" >Activer ce champ si vous  voulez utiliser cette  formation dans votre application</span>
                  </div>
                </div>
              <div class="text-danger">{{$errors->first('status')}}</div>
            </div>
        </div>


</div>

        <div class="row">
          <div class="col-3 mt-2 pb-3" style="margin-left: 34%">
            <button type="submit" class="btn btn-primary btn-block">Valider</button>
          </div>
        </div>
      </form>

     

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection

@section('scaffold_js')
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

   
  })
</script>
@endsection

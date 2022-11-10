
    @section('scaffold_css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    {{-- jquery ui --}}

    <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.structure.css')}}">
<link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.theme.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.theme.css')}}">
    @endsection

    @extends('layouts.application')
    @section('content')

    @if($errors->any())

    @endif


<div class="container-fluid " id="rentalregister" >
  <div class="card card-outline card-primary col-11 mt-5 " style="margin-left: 5%">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>ARTL</b>Nord</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{__('Remplire le formulaire')}}</p>
      @if (session()->has('chooseanothertime'))
      <div class="alert alert-danger text-center">
        {{session('chooseanothertime')}}
      </div>
  @endif
      <form action="{{route('rentals.store',$emptyRoomIdFromTraining)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row ">
          <div class="col-lg-6">
        <label for="name">{{__('Nom Complet')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="Nom Complet" value="{{ old('name')}} ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('name')}}</div>
        </div>
        <div class="col-lg-6">
          <label for="email">{{__('Email')}}</label>
          <div class="input-group mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="{{ old('email')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="text-danger">{{$errors->first('email')}}</div>
        </div>
      </div>

      
      <div class="row ">
        <div class="col-lg-6">
        <label for="cin">{{__('CIN')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="cin" name="cin" placeholder="CIN" value="{{ old('cin')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card mr-1"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('cin')}}</div>
      </div>
      <div class="col-lg-6">
        <label for="phone">{{__('N Telephone')}}</label>
        <div class="input-group mb-3">
          <input type="number" class="form-control" id="phone" name="phone" placeholder="Telephone" value="{{ old('phone')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('phone')}}</div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <label for="address">{{__('Address')}}</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ old('address')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('address')}}</div>
      </div>
      <div class="col-lg-6">
        <label for="password">{{__('Password')}}</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="text-danger">{{$errors->first('password')}}</div>
      </div>
    </div>
  
      <div class="row ">
 
        <div class="col-lg-6">
         
          <div class="form-group">
            <label for="photo">{{__('Votre photo ')}}</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="photo" id="photo" name="photo" accept="image/jpg">
                <label class="custom-file-label" for="photo">{{__('Votre photo')}}</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-file-image"></i></span>
              </div>
            </div>
            <div class="text-danger">{{$errors->first('photo')}}</div> 
          </div>
        </div>
        <div class="col-lg-6">
        
            <div class="form-group">
                <label for="scan_cin">{{__('Votre scan cin ')}}</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="scan_cin" id="scan_cin" name="scan_cin" accept="image/jpg">
                    <label class="custom-file-label" for="scan_cin">{{__('Votre scan cin')}}</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-file-image"></i></span>
                  </div>
                </div>
                <div class="text-danger">{{$errors->first('scan_cin')}}</div> 
              </div>
        </div>
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
            <div class="col-lg-6 d-none" >
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


</div>



{{-- <div class="col-lg-6">
  <label for="enddate">{{__('Date fin')}}</label>
  <div class="input-group mb-3">
    <input type="text"   id="datepicker" class="form-control  "/>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-calendar"></span>
      </div>
    </div>
  </div>
  <div class="text-danger">{{$errors->first('enddate')}}</div>
</div> --}}


{{-- <p>The selected date is as follows: <input type="text" class="disableFuturedate"></p> --}}



        <div class="row">
          <!-- /.col -->
          <div class="col-3 mb-5" style="margin-left: 34%">
            <button type="submit" class="btn btn-primary btn-block">Reserver</button>
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

@section('scaffold_js')
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
{{-- <script src="{{asset('plugins/jquery-ui/jquery-ui.css')}}"></script> --}}
<script src="{{asset('plugins/jquery-ui/jquery-ui.js')}}"></script>
{{-- <script src="{{asset('plugins/jquery-ui/jquery-ui.structure.css')}}"></script> --}}
{{-- <script src="{{asset('plugins/jquery-ui/jquery-ui.theme.css')}}"></script> --}}
{{-- <script src="{{asset('plugins/jquery-ui/jquery-ui.theme.min.css')}}"></script> --}}

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>


@isset($training_all_dates)
  


<script>
// var array1 = ["'"+all_dates+"'"];

//  var array = array1[0].split(',');
// array = array.map(i => '"' + i + '"');
// alert(array)

//////// date picker for all days that the rooms 1 & 2 full


// var training_all_dates     =  <?php echo json_encode($training_all_dates); ?>;
// document.write(training_all_dates);

// var trainingAllDates  ='"' + training_all_dates.join('","') + '"';
// document.write(trainingAllDates);

// // document.write("'" + disabledDates.join("','") + "'");
// // document.write(disabledDates);
// var disabledTrainingDates = trainingAllDates;
// // document.write(disabledTrainingDates);

// $('#datepicker').datepicker({
//     beforeShowDay: function(date){
//         var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
//         return [ disabledTrainingDates.indexOf(string) == -1 ];
//     }
// });


/////////////////////////////

//
// date today default value
// var today = new Date();

// var dd = today.getDate();
// var mm = today.getMonth()+1; //January is 0!
// var yyyy = today.getFullYear();

// if(dd<10) {
//     dd = '0'+dd
// } 

// if(mm<10) {
//     mm = '0'+mm
// } 

// // today = yyyy + '/' + mm + '/' + dd;
//  today = yyyy + '-' + mm + '-' + dd;

// // console.log(today);
// document.getElementById('datepicker').value = today;

    

// ///////

// $( ".datepicker" ).datepicker({
//   hideIfPrev: true
// });


</script>


@endisset



@endsection




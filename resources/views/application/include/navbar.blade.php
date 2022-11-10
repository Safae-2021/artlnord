<!-- Topbar Start bg-dark -->
 <div class="container-fluid  topbar-start">
    <div class="row py-2 px-lg-5">
        {{-- <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center text-white">
                <small>Français</small>
                <small class="px-3">|</small>
                <small>Arabe</small>
            </div>
        </div> --}}
         {{-- @php
        $DeleteSession = Session::forget('user'); 
         @endphp   --}}
                   
        <div class="col-lg-6 text-center text-lg-left">
            <div class="d-inline-flex align-items-center">
                @if (Session::has('user'))
                <a  href="{{route('delete.session.user')}}" class="text-white px-2" id="removesession">  
                   {{-- @php
                  Session::forget('user'); 
                    @endphp  
                    onclick=" sessionStorage.removeItem('user');" --}}
                     Logout </a>
                 
                
              
               {{-- Session::forget('user'); --}}
               {{-- <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
      
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> --}}
                        
                @else
                <a class="text-white px-2" href="{{route('login')}}">
                  Login
               </a>
                @endif
              

                @if (Session::has('user'))
                <small class="px-3">|</small>
                @foreach (Session::get('user') as $item )
                    @if ($item->role_id == 2)
                    <a class="text-white px-2" href="{{route('students.profile',[$item->id ,'#stdprofile'] )}}">
                      {{Str::upper($item->name)}}
                   </a>
                   @elseif($item->role_id == 3)
                   <a class="text-white px-2" href="#">
                    {{Str::upper($item->name)}}
                  </a>
                    @endif
                  
                @endforeach
               
                @endif

                {{-- <a class="text-white px-2" href=""> --}}
                   
                    {{-- <i class="fa fa-basket"></i> --}}
                </a>

             
            </div>

        </div>
    </div>
</div>
<!-- Topbar End -->


<div class="navbar">
 
  <!-- Navbar logo -->
  <div class="nav-header">
    <div class="nav-logo">
      <a href="#">
        <img src="{{asset('img/logo.png')}}" width="200px" alt="logo">
      </a>
    </div>
  </div>

  <!-- responsive navbar toggle button -->
  <input type="checkbox" id="nav-check">
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>

  <!-- Navbar items -->
  <div class="nav-links">
    <a href="{{ route("acceuil",'#acceuil') }}">Acceuil</a>
    <a href="{{ route("artln",'#artln') }}">ARTLN</a>
    <div class="dropdown">
      <a class="dropBtn" href="#">Formation
        <i class="fas fa-angle-down"></i>
      </a>
      <div class="drop-content">

        <!-- Creating sub menu Dropdown -->
        <div class="dropdown2">
          <a class="dropBtn2" href="#">Professionnelle
            <i class="fas fa-angle-right"></i>
          </a>
          <div class="drop-content2">
            @foreach ($selectTrainingNavbar as $training)
            <a href="{{route('formation',$training->id)}}">{{$training->label}}</a>
            @endforeach
            {{-- <a href="#">FCO</a> --}}
          </div>
        </div>
        {{-- <a href="#">En Econduite</a> --}}
      </div>
    </div>
    <!-- Dropdown menu -->
    {{-- @if (Session::has('user'))
    @foreach (Session::get('user') as $item )
      @if ($item->role_id == 2)

    <div class="dropdown">
      <a class="dropBtn" href="#">Formation
        <i class="fas fa-angle-down"></i>
      </a>
      <div class="drop-content">

        <!-- Creating sub menu Dropdown -->
        <div class="dropdown2">
          <a class="dropBtn2" href="#">Professionnelle
            <i class="fas fa-angle-right"></i>
          </a>
          <div class="drop-content2">
            @foreach ($selectTrainingNavbar as $training)
            <a href="{{route('formation',$training->id)}}">{{$training->label}}</a>
            @endforeach
         
          </div>
        </div>
        <a href="#">En Econduite</a>
      </div>
    </div>
    @endif
    @endforeach
    @endif --}}

    <div class="dropdown">
      <a class="dropBtn" href="#">Conseil
        <i class="fas fa-angle-down"></i>
      </a>
      <div class="drop-content">

        <!-- Creating sub menu Dropdown -->
    
        <a href="{{route('iso','#iso')}}">Accompagnement Iso</a>
        <ul class="list1">
          <li> ISO 9001</li>
          <li> ISO 28000</li>
          <li> ISO 39001</li>
          <li> ISO 45001</li>
          <li> ISO 14001</li>
        </ul>
        <a href="{{route('douane','#douane')}}">Categorisation de Douane(OEA)</a>
        <ul class="list1">
          <li> Class A</li>
          <li> Class B</li>
          <li> Class SS</li>
        </ul>
      </div>

      <style>
        .list1 {
          margin-left: 40px;
          list-style: none;
          margin-top: 2px;
        }
      </style>
    </div>
    {{-- @if (Session::has('user'))
    @foreach (Session::get('user') as $item )
      @if ($item->role_id == 3)
    <a href="{{ route("location",'#location') }}">Location</a>
    @endif
    @endforeach
    @endif --}}
    <a href="{{ route("location",'#location') }}">Location</a>
    <a href="{{ route("actualites",'#blog') }}">Actualite</a>
    <a href="{{ route("contact",'#contact') }}">Contact</a>

  </div>

</div>


<style>

  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    background-image: url(background-img.jpg);
    background-size: cover;
    background-attachment: fixed;
  }
  .navbar{
    height: 70px;
    width: 100%;
    padding: 19px 30px;
    background-color: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));;
    position: relative;
    z-index: 6;
  }
  .navbar .nav-header{
    display: inline;
  }
  .navbar .nav-header .nav-logo{
    display: inline-block;
    margin-top: -7px;
  }
  .navbar .nav-links{
    display: inline;
    float: right;
    font-size: 18px;
  }
   
  .navbar .nav-links .loginBtn{
    display: inline-block;
    padding: 5px 15px;
    margin-left: 20px;
    font-size: 17px;
    color: rgb(9, 14, 90);
  }
  .navbar .nav-links a {
    padding: 10px 12px;
    text-decoration: none;
    font-weight: 550;
    color: black;
  }
  /* Hover effects */
  .navbar .nav-links a:hover{
    background-color: #0a58ca;
  }
   
  /* responsive navbar toggle button */
  .navbar #nav-check, .navbar .nav-btn{
    display: none;
  }
   
  @media (max-width:700px) {
    .navbar .nav-btn{
      display: inline-block;
      position: absolute;
      top: 0px;
      right: 0px;
    }
    .navbar .nav-btn label {
      display: inline-block;
      width: 80px;
      height: 70px;
      padding: 25px;
    }
    .navbar .nav-btn label span {
      display: block;
      height: 10px;
      width: 25px;
      border-top: 3px solid #eee;
    }
    .navbar .nav-btn label:hover, .navbar #nav-check:checked ~ .nav-btn label {
      background-color: black;
      transition: all 0.5s ease;
    }
    .navbar .nav-links{
      position: absolute;
      display: block;
      text-align: center;
      width: 100%;
      background-color: white;
      transition: all 0.3s ease-in;
      overflow-y: hidden;
      top: 70px;
      right: 0px;
    }
    .navbar .nav-links a {
      display: block;
    }
   
    /* when nav toggle button not checked */
    .navbar #nav-check:not(:checked) ~ .nav-links {
      height: 0px;
    }
   
    /* when nav toggle button is checked */
    .navbar #nav-check:checked ~ .nav-links {
      height: calc(100vh - 70px);
      overflow-y: auto;
    }
    .navbar .nav-links .loginBtn {
      padding: 10px 40px ;
      margin: 20px;
      font-size:  18px;
      font-weight: bold;
      color: rgb(9, 14, 90);
    }
    /* Responsive dropdown code */
    .navbar .nav-links .dropdown, .navbar .nav-links .dropdown2 {
      float: none;
      width: 100%;
    }
    .navbar .nav-links .drop-content, .navbar .nav-links .drop-content2 {
      position: relative;
      background-color: rgb(220, 220, 250);
      top: 0px;
      left: 0px;
    }
    /* Text color */
    .navbar .nav-links .drop-content a {
      color: rgb(9, 14, 90);
    }  
   
  }
   
  /* Dropdown menu CSS code */
  .dropdown{
    position: relative;
    display: inline-block;
  }
  .drop-content, .drop-content2 {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 180px;
    font-size: 16px;
    top: 34px;
    z-index: 6;
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.4);
  }
  /* on hover show dropdown */
  .dropdown:hover .drop-content, .dropdown2:hover .drop-content2 {
    display: block;
  }
  /* drondown links */
  .drop-content a {
    padding: 12px 10px;
    border-bottom: 1px solid rgb(167, 167, 167);
    display: block;
    transition: all 0.5s ease !important;
  }
  .dropBtn .drop-content a:hover {
    background-color: rgb(129, 129, 129);
  }
  .dropdown:hover .dropBtn, .dropdown2:hover .dropBtn2 {
    background-color: rgba(207, 207, 207, 0.3);
  }
  .dropdown2 .drop-content2 {
    position: absolute;
    left: 181px;
    top: 30px;
  }
  .dropBtn2 i {
    margin-left: 15px;
  }
  </style>

@section('scaffold_js')

<script>
var btnC = getElementById("removesession");
if(btnC.onclick == true) {
sessionStorage.removeItem('user');
};
console.log('hhhh';)

// document.getElementById("removesession").onclick = function() {  
// fun()  
// };  
// function fun() {  
//   sessionStorage.removeItem('user');
// }
</script>
@endsection
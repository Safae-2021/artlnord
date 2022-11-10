
<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="#" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5 text-uppercase text-primary"> <img src="img\logo.jpg" alt="" srcset=""> </h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <div class="hamburger-toggle">
                <div class="hamburger">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0  mb-2 mb-lg-0">
                <a href="http://127.0.0.1:8000" class="nav-item nav-link active">Acceuil</a>
                <a href="http://127.0.0.1:8000/about" class="nav-item nav-link">ARTLN </a>
                <a href="http://127.0.0.1:8000/formation" class="nav-item nav-link">Formation</a>
                {{--  --}}
           <!--  -->
    {{-- <ul class="navbar-nav mr-auto mb-2 mb-lg-0"> --}}

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">Conseil</a>
            <ul class="dropdown-menu ">
      
              <li class="dropstart">
                <a href="#" class="dropdown-item dropdown-toggle " data-bs-toggle="dropdown">Accompagnement au ISO</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href=""> ISO 9001</a></li>
                  <li><a class="dropdown-item" href=""> ISO 2800</a></li>
                  <li><a class="dropdown-item" href=""> ISO 39001</a></li>
                  <li><a class="dropdown-item" href=""> ISO 45001 </a></li>
                  <li><a class="dropdown-item" href=""> ISO 14001</a></li>
                </ul>
              </li>
              <li class="dropend">
                <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">Categorisation de la douane(OEA)</a>
                <ul class="dropdown-menu shadow">
                  <li><a class="dropdown-item" href=""> Classe A</a></li>
                  <li><a class="dropdown-item" href=""> Classe B</a></li>
                  <li><a class="dropdown-item" href=""> Classe SS</a></li>
                </ul>
              </li>
              
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
                <a href="http://127.0.0.1:8000/location" class="nav-item nav-link">Location</a>
                <a href="http://127.0.0.1:8000/actualites" class="nav-item nav-link">Actualités</a>
                <a href="http://127.0.0.1:8000/contact" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ARTL NORD</title>
   <link rel="icon" type="image/x-icon" href="{{asset('img/logo.png')}}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {{-- <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description"> --}}

    @yield('scaffold_css')
    @include('application.include.scaffold_css')
    {{-- <script src="js/timer.js"></script> --}}

   <!-- Bootstrap 5 CSS -->
   {{-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css'> --}}
</head>

<body>

    {{-- <div class="container-fuid"> --}}

    @include('application.include.navbar')
    @include('application.include.header')
    @yield('content')
    @include('application.include.footer')
    


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    @include('application.include.scaffold_js')


  @yield('scaffold_js')


    <!-- JavaScript Libraries -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script> --}}

    <!-- Contact Javascript File -->
    {{-- <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script> --}}

    <!-- Template Javascript -->
    {{-- <script src="js/main.js"></script> --}}


    {{-- <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script> --}}


    {{-- multimenu --}}
    {{-- <script>
    
     
     document.addEventListener('click',function(e){
       // Hamburger menu
       if(e.target.classList.contains('hamburger-toggle')){
         e.target.children[0].classList.toggle('active');
       }
     })   
           
     </script>--}}
</body> 

</html>








@extends('layouts.application')
    @section('content')
   

    @php
    use App\Http\Controllers\Application\ApplicationController;
    @endphp

{{-- @if (session()->has('user'))
    <div>
        {{session('user')['name']}}
    </div>
@endif --}}
{{-- @if(Session::has('user'))
@foreach (Session::get('user') as $item )
    <div>
        {{$item->name}}
    </div>
@endforeach
@endif --}}

 <!-- About Start -->
    <div class="container-fluid py-5" id="acceuil">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0 remove">
                     <img class="img-fluid w-100" src="img/room-1.jpg" alt=""> 
                    <div class="bg-primary text-dark text-center p-4">
                        <h3 class="m-0">4+ Ans Experience</h3>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h6 class="text-primary text-uppercase font-weight-bold">A Propos </h6>
                  
                    <h2>PRESENTATION DE L ’ ENTREPRISE </h2>
                    <br>
                    <p>L ’ Académie Régionale du Transport et de la Logistique du Nord (ARTL NORD) est un
                        organisme spécialisé dans la Formation & le Conseil des entreprises du secteur du
                        Transport et de la Logistique, il soutien votre équipe en interne et vous propose des
                        solutions rentables selon les besoins ou affectation d’une équipe dédiée à la réalisation
                        d’un projet d’amélioration logistique et de la chaîne d’approvisionnement, ainsi il vous
                        accompagne à l’intégration et la mise en place des systèmes de management de la qualité
                        au Maroc et à l’international.</p>
                        <br>
                    <h6 class="text-primary text-uppercase font-weight-bold">L ’ activité principale </h6>

                    <ul class="list-inline">
                        <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>Formation</h6>
                        <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>Conseil et Accompagnement</h6></li>
                        <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>Location des salles </h6></li>
                    </ul>
                    {{-- <div>
                    <h6 class="text-primary text-uppercase font-weight-bold">Logistique</h6>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odit ad adipisci distinctio corporis illo minus ex odio delectus, dolores quod provident, quam reiciendis voluptas. Porro sapiente harum nam id.</p>
                    </div>
                    <div>
                    <h6 class="text-primary text-uppercase font-weight-bold">Education</h6>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odit ad adipisci distinctio corporis illo minus ex odio delectus, dolores quod provident, quam reiciendis voluptas. Porro sapiente harum nam id.</p>
                    </div> --}}
                   
                    {{-- <a href=" " class="btn btn-primary mt-3 ml-10 py-2 px-4">Voir Plus</a> --}}

                    {{-- <div class="d-flex align-items-center pt-2 ">
                       <a href="http://127.0.0.1:8000/about"> <button type="button" class="btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                            <span></span>
                        </button>
                        </a>
                        <h5 class="font-weight-bold m-0 ml-4">Voir Plus</h5>
                    </div> --}}
                </div>
            </div>
        </div>
        <br>

        <!-- Video Modal -->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-fluid bg-secondary my-5" >
        <div class="container">
            <div class="row align-items-center">
                @forelse ($selectTraining as $training)
               
                <div class="col-lg-8 py-5 py-lg-5  ">
                    <h6 class="text-primary text-uppercase font-weight-bold"></h6>
                    <h1 class="mb-4">Nouvelle Formation Disponible</h1>
                  
                    <div class="timer"> 
                            <div class="countdown">  Date de debut {{$training->startdate}}  et l`heure  {{$training->starttime}}</div>
                    </div>  
                    <h3 class="mb-4">{{$training->label}}</h3>
                    {{-- Str::limit( , 500)--}}
                    <p class="mb-4">{!!substr(strip_tags($training->description), 0, 500)  !!} ....</p>
                    <div>
                    <h4 class="mb-4"> Les Objectives </h4>
                    <ul class="list-inline">
                        <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>Conduire de manière rationnelle et connaître les règles de sécurité</h6>
                        <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>Savoir appréhender la santé, la sécurité routière et la sécurité environnementale</h6></li>
                        <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>Comprendre l’impact de la qualité de service et connaître l’organisation du transport de marchandises</h6></li>
                    </ul>
                    </div>
                    {{-- <a href="{{route('students.register',$training->id)}}" class="btn btn-primary mt-3 ml-10 py-2 px-4">S'inscrire</a>
                    <a  href="/contact">S'inscrire</a>
                    <a class="border-bottom border-primary text-uppercase text-decoration-none" href="{{ route("students.register",$training->id)}}">Lire la suite <i class="fa fa-angle-right"></i></a> --}}                   
                </div>
                <div class="col-lg-4 remove-timer">
                    <img class="img-fluid w-100" src="{{asset('img/timer.jpg')}} " alt="">
                </div>
                <a href="{{route('students.register',$training->id)}}" class="btn btn-primary  ml-15 py-2 px-4 mb-5 ">S'inscrire</a>
                
                 {{-- <a href="{{route('students.register',$training->id)}}" class="btn btn-primary  ml-10  px-4">S'inscrire</a> --}}
                 @empty
                        
                 @endforelse
            </div>
        </div>
    </div>
    <!-- Features End -->

    
<!-- Timer staRT -->

	
	<!-- Timer end -->




<!-- Blog Start -->
<div class="container-fluid pt-5" id="blog">
    <div class="container">
        <div class="text-center pb-2">
            <!-- <h6 class="text-primary text-uppercase font-weight-bold">  </h6> -->
            <h1 class="mb-4">Actualités</h1>
        </div>
        <div class="row">
                @forelse ($selectBlogs as $blogInfo)
            <div class="col-md-6 mb-5 col-lg-6">
                
                        <div class="position-relative">
                    
                    <img class="img-fluid w-100 "   src="{{$StorageSourcePathBlogs.'/'.$blogInfo->photo}}"  alt="" style="max-height: 320px">
                    <div class="position-absolute bg-primary d-flex flex-column align-items-center justify-content-center rounded-circle"
                        style="width: 60px; height: 60px; bottom: -30px; right: 30px;">

                        <h4 class="font-weight-bold mb-n1">{{$dateMonth}} </h4>
                        {{-- <small class="text-white text-uppercase">{{$dateYear}}</small> --}}
                    </div>
                </div>
                <div class="bg-secondary" style="padding: 30px;">
                    <h4 class="font-weight-bold mb-3">{{$blogInfo->title}}</h4>
                    <p>{{  Str::limit($blogInfo->description, 100)  }}</p>                      
                    <a class="border-bottom border-primary text-uppercase text-decoration-none" href="{{ route("article",$blogInfo->id)}}">Lire la suite <i class="fa fa-angle-right"></i></a>
                </div>
                </div>
                    @empty
                        
                    @endforelse
                
            


        </div>
    </div>
</div>

<!-- Blog End -->

    <!-- partenaire start -->


    <div id="fh5co-course-categories" class="container-fluid bg-secondary my-5 pb-5">
        <div class="container">
          {{-- <div class="row animate-box"> --}}
            {{-- <div class="col-md-6 col-md-offset-3   fh5co-heading" style="margin-left:25%">
              <h2 class="text-center">Notre Partenaire</h2>
              <!-- <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
            </div> --}}
                    <div class="text-center pb-2 pt-2">
                        <h1 class="mb-4">Nos Partenaires</h1>
                    </div>
                  
          {{-- </div> --}}
          <div class="row">
            
            <div class="col-md-3 col-sm-6 col-lg-4 text-center animate-box" >
              <div class="services">
                <span class="icon">
                  <i class="icon-heart4"></i>
                                <img src="img/par-1.png" alt="" srcset=""> 
                </span>
               
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-4 text-center animate-box">
              <div class="services">
                <span class="icon">
                  <i class="icon-banknote"></i>
                                <img src="img/par-2.png" alt="" srcset=""> 
                </span>
                
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-4 text-center animate-box">
              <div class="services">
                <span class="icon">
                  <i class="icon-lab2"></i>
                                <img src="img/par-3.png" alt="" srcset=""> 
    
                </span>
               
              </div>
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-md-3 col-sm-6 col-lg-4 text-center animate-box">
              <div class="services">
                <span class="icon">
                  <i class="icon-photo"></i>
                      <img src="img/par-4.png" alt="" srcset="" > 
                </span>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-4 text-center animate-box">
              <div class="services">
                <span class="icon">
                  <i class="icon-home-outline"></i>
                    <img src="img/par-5.png" alt="" srcset=""> 
                </span>
              
              </div>
            </div>
        </div>

    </div>
    </div>
    <!-- patrenaire end -->
   <!-- patrenaire end -->



 
           <!-- Testimonial Start -->
           <div class="container-fluid py-5">
            <div class="container">
                <div class="text-center pb-2">
                    {{-- <h6 class="text-primary text-uppercase font-weight-bold">Testimonial</h6> --}}
                    <h1 class="mb-4">FeedBack</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    @foreach ($selectFeedBacks as $feedBack)
                        
                    <div class="position-relative bg-secondary p-4">
                        <i class="fa fa-3x fa-quote-right text-primary position-absolute" style="top: -6px; right: 0;"></i>
                        <div class="d-flex align-items-center mb-3">
                            <img class="img-fluid rounded-circle" src="{{$StorageSourcePathFeedbacks.'/'.$feedBack->photo}}" style="width: 60px; height: 60px;" alt="">
                            <div class="ml-3">
                                <h6 class="font-weight-semi-bold m-0">{{$feedBack->name}} </h6>
                            </div>
                        </div>
                        <p class="m-0">{{$feedBack->description}}</p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Testimonial End -->
    
        @endsection

        @section('scaffold_js')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @endsection

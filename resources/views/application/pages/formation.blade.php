@extends('layouts.application')
@section('content')




  <div class="container-fluid py-5  bg-secondary" id="formation">
    <h2 class="text-center">Notre Academie  </h2>
    <p class="text-center text-primary"> vous propose des formation spécial  </p>
       <div class="container" >
           <div class="row align-items-center">
            @forelse ($selectTraining as $training)

                <div class="col-lg-6 pb-4 pb-lg-0 ">
                    <img class="img-fluid w-100 " src="{{asset('img/room-3.jpg')}}" alt=""> 
               </div>
               <div class="col-lg-6">
                   
            
                 <h2 class="text-primary text-uppercase font-weight-bold">{{$training->label}} </h2>

                 <br>
                 <div>
                 <ul class="list-inline">
                      <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>La durée  {{$interval->d}} Jours</h6></li>
                      {{-- <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>  {{$training->labeltwo}} </h6></li>
                      <li><h6><i class="far fa-dot-circle text-primary mr-3"></i> {{$training->labelthree}}</h6></li> --}}
                  </ul>
                
                 <a href="{{route('rentals.register','#rentalregister')}} " class="btn btn-primary mt-3 ml-10 py-2 px-4">S'inscrire</a>
                
                  </div>
                 


           
           </div>
        </div>
              
    </div>
   <br>
   <br>
   <br>
   <br>
             <section  class="ml-5 mr-5"> 
              <h3 class="text-center text-primary">Description</h3>
              <p>{!!$training->description!!}</p>
            </section>
                 @empty
                     
                 @endforelse
                  
      
     

      
    
 
  
</div>



@endsection
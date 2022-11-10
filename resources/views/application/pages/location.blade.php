@extends('layouts.application')
@section('content')



  <!-- About Start -->
  <div class="container-fluid py-5  bg-secondary" id="location">
       <div class="container" >
           <div class="row align-items-center">
            @forelse ($selectRoomInfo as $roomInfo)

                <div class="col-lg-6 pb-4 pb-lg-0 ">
                    <img class="img-fluid w-100 " src="{{$StorageSourcePathRooms ='/storage/images/rooms' .'/'.$roomInfo->photo}}" alt=""> 
               </div>
               <div class="col-lg-6">
                   
                
                 <h1> Location des salles</h1>
                 <h6 class="text-primary text-uppercase font-weight-bold">{{$roomInfo->title}} </h6>

                 <br>
                 <div>
                 <ul class="list-inline">
                      <li><h6><i class="far fa-dot-circle text-primary mr-3"></i> {{$roomInfo->labelone}} </h6></li>
                      <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>  {{$roomInfo->labeltwo}} </h6></li>
                      <li><h6><i class="far fa-dot-circle text-primary mr-3"></i> {{$roomInfo->labelthree}}</h6></li>
                  </ul>
                 <p> 
                    {{$roomInfo->description}}
                 </p>
                 <a href="{{route('rentals.register','#rentalregister')}} " class="btn btn-primary mt-3 ml-10 py-2 px-4">Réservation</a>
                
                  </div>
                 @empty
                     
                 @endforelse
                  
                   <div>
                 
                   <br>
               
               </div>
           </div>
       </div>
       <br>

      
       <section class="imageclass"> 
        <h1>Vision</h1>
          <div class="conta">
          <img src="{{asset('img/room-1.jpg')}}" alt="" class="locationimg">
          <img src="{{asset('img/simulator.jpg')}}" alt="" class="locationimg">
          <img src="{{asset('img/room-2.jpg')}}" alt="" class="locationimg">
        </div>
      </section>
   </div>
   <!-- About End -->
  
</div>

<style>
    .imageclass {
  width: 100%;
  height: 50vh;
  margin-bottom: 7%; 
  display:grid;
  place-items:center;
}
.locationimg{
  width: 60%;
  height: 100%;
  object-fit:cover;
  
  -webkit-box-reflect:below 2px linear-gradient(transparent, transparent, #0004);
  
  transform-origin:center;
  transform:perspective(800px) rotateY(25deg);
  transition:0.5s;
}
.conta {
  max-width:600px;
  max-height:350px;
  
  
  
  display:flex;
  justify-content:center;
  align-items:center;
  gap:20px;
  
}
.conta:hover .locationimg {
  opacity:0.3;
}
.conta .locationimg:hover {
  transform:perspective(800px)       rotateY(0deg);
  opacity:1;
}
</style>

@endsection
 {{-- slider start --}}



 <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel" style="">
     <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner">
         <div class="carousel-item active">
             <div style="position: relative;z-index:1">
                 <div style="background-color: black;opacity:0.5;width:100%;height:100%;position:absolute;z-index:4">
                 </div>
                 <img class="d-block w-100" src="{{ asset('img/room-5.jpg') }}" style="height: 90vh" alt="First slide">
                
             </div>

                 {{-- <div class="mx-auto" style="width: 100%; max-width: 600px;">
                     <div class="input-group">
                         <input type="text" class="form-control border-light" style="padding: 30px;"
                             placeholder="Tracking Id">
                         <div class="input-group-append">
                             <button class="btn btn-primary px-3">Track & Trace</button>
                         </div>
                     </div>
                 </div> --}}


         </div>
         
         <div class="carousel-item" style="position: relative;z-index:1">
          <div style="background-color: black;opacity:0.5;width:100%;height:100%;position:absolute;z-index:4">
          </div>
             <img class="d-block w-100" src="{{ asset('img/room-3.jpg') }}"style="height: 90vh" alt="Second slide">
         </div>
         <div class="carousel-item" style="position: relative;z-index:1">
          <div style="background-color: black;opacity:0.5;width:100%;height:100%;position:absolute;z-index:4">
          </div>
             <img class="d-block w-100" src="{{ asset('img/room-2.jpg') }}" style="height: 90vh" alt="Third slide">
         </div>
     </div>
     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
     </a>
 </div>

 <div class="container text-center py-5 " style="position:absolute;top:45%;left:5%;z-index:5">
  <h1 class="text-white display-3 mb-5"> Académie Régionale de Transport et Logistique</h1>
  <h1 class="text-primary mb-8">(ARTL NORD)</h1>
</div>
 {{-- slider end --}}
 <!-- Header Start -->
 {{-- <div class="jumbotron jumbotron-fluid mb-5">
      <div class="container text-center py-5">
          <h1 class="text-primary mb-4">Safe & Faster</h1>
          <h1 class="text-white display-3 mb-5">Logistics Services</h1>
          <div class="mx-auto" style="width: 100%; max-width: 600px;">
              <div class="input-group">
                  <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Tracking Id">
                  <div class="input-group-append">
                      <button class="btn btn-primary px-3">Track & Trace</button>
                  </div>
              </div>
          </div>
      </div>
  </div> --}}
 <!-- Header End -->

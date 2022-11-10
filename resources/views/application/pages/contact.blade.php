@extends('layouts.application')

    @section('content')
   
    @if(session()->has('messagesent'))
    <div class="alert alert-success text-center">{{session('messagesent')}}</div>
    @endif
   <!--  Quote Request Start -->
    <div class="container-fluid bg-secondary my-5" id="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 py-5 py-lg-0">
                    <!-- <h6 class="text-primary text-uppercase font-weight-bold">Contactez nous</h6> -->
                    <h1 class="mb-4 text-primary">Contact Information</h1>
                    <!-- <p class="mb-4">Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duo</p> -->
                    <div class="row">
                        <div class="col-sm-7">
                            <!-- <h1 class="text-primary mb-2" data-toggle="counter-up">225</h1>
                            <h6 class="font-weight-bold mb-4">SKilled Experts</h6> -->
                           <p><i class="fa fa-map-marker-alt mr-2"></i>07 Boulvard Hariri  <br>N12-Tanger-Maroc</p>
                            <p><i class="fa fa-phone-alt mr-2"></i>+ 212 664 159 137</p>
                            <p><i class="fa fa-envelope mr-2"></i><a href="mailto:info@yoursite.com">artl.nord.tanger@gmail.com</a></p>
                        </div>
                        <!-- <div class="col-sm-4">
                            <h1 class="text-primary mb-2" data-toggle="counter-up">1050</h1>
                            <h6 class="font-weight-bold mb-4">Happy Clients</h6>
                        </div>
                        <div class="col-sm-4">
                            <h1 class="text-primary mb-2" data-toggle="counter-up">2500</h1>
                            <h6 class="font-weight-bold mb-4">Complete Projects</h6>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5" action="{{route('contact.store')}}" method="POST" >
                          @csrf
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" name="fullname" placeholder="Nom et Prenom" required="required" />
                            </div>
                            {{-- <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Prenom" required="required" />
                            </div> --}}
                            <div class="form-group">
                                <input type="email" class="form-control border-0 p-4" name="email" placeholder="Your Email" required="required" />
                            </div>
                            <div class="form-group">
                                <!-- <input type="text" class="form-control border-0 p-4" placeholder="Prenom" required="required" /> -->
								<textarea name="message" id="message" cols="30" rows="5" class="form-control border-0 p-4" placeholder="Entrer votre message"></textarea>
                            
                            </div>


                            <!-- <div class="form-group">
                                <select class="custom-select border-0 px-4" style="height: 47px;">
                                    <option selected>Select A Service</option>
                                    <option value="1">Service 1</option>
                                    <option value="2">Service 1</option>
                                    <option value="3">Service 1</option>
                                </select>
                            </div> -->
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote Request Start -->




    <!-- Map start -->
        <div class="container-fluid bg-secondary my-5">
            <div class="container">
                    <div class="row align-items-center">
                        <!-- <div class="col-lg-5 py-5 py-lg-0"> -->
                <!-- <iframe  class="col-lg-5 py-5 py-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3236.985833688614!2d-5.807421685251016!3d35.77572433239229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0c7f57dc2b13fb%3A0xe3e6b346166061bf!2sTiger%20Creation!5e0!3m2!1sen!2sma!4v1645915176670!5m2!1sen!2sma" width="700" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3236.985833688614!2d-5.807421685251016!3d35.77572433239229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0c7f57dc2b13fb%3A0xe3e6b346166061bf!2sTiger%20Creation!5e0!3m2!1sen!2sma!4v1645915176670!5m2!1sen!2sma" width="1150" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>   
                    </div>
            </div>
        </div>
 

        
    <!-- Map end -->
    @endsection

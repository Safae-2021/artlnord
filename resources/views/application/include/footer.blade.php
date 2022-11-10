


  
 <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h3 class="text-primary mb-4">Contact</h3>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>07 Boulvard Hariri  <br>N12-Tanger-Maroc</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+ 212 664 159 137</p>
                        <p><i class="fa fa-envelope mr-2"></i><a href="mailto:info@yoursite.com">artl.nord.tanger@gmail.com</a></p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social mr-2" href="https://www.linkedin.com/company/artl-nord/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h3 class="text-primary mb-4">links</h3>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="{{ route("acceuil") }}"><i class="fa fa-angle-right mr-2"></i>Acceuil</a>
                            <a class="text-white mb-2" href="{{ route("artln") }}"><i class="fa fa-angle-right mr-2"></i>ARTLN</a>
                            <a class="text-white mb-2" href="{{ route("location") }}"><i class="fa fa-angle-right mr-2"></i>Location</a>
                            <a class="text-white mb-2" href="{{ route("actualites") }}"><i class="fa fa-angle-right mr-2"></i>Actualite</a>
                            <a class="text-white" href="{{ route("contact") }}"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Feedback</h3>                    
                <p>Nous Sommes Heureux de savoir votre avis </p>
                <div class="w-100">
                    <div class="input-group">
                        {{-- <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address"> --}}
                        <div class="input-group-append">
                            <a href="{{route('add.feedback')}}" class="btn btn-primary px-4">Ajouter Feedback</a href="{{route('add.feedback')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: #3E3E4E !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">ARTL NORD</a>. Tous Les Droits sont Réservés. 
				
				<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
				Designed by <a href="#">Safae Tahere  & Zaynab Chaoui & Otman Abussaber</a>
                </p>
            </div>
            {{-- <div class="col-lg-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
    <!-- Footer End -->


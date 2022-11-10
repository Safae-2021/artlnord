@section('scaffold_css')

<style>
    *{
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

h1{
  font-size: 2.5rem;
  font-family: 'Montserrat';
  font-weight: normal;
  color: #444;
  text-align: center;
  margin: 2rem 0;
}

.wrapper{
  width: 90%;
  margin: 0 auto;
  max-width: 80rem;
}

.cols{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.col{
  width: calc(25% - 2rem);
  margin: 1rem;
  cursor: pointer;
}

.container{
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
	-webkit-perspective: 1000px;
	        perspective: 1000px;
}

.front,
.back{
  background-size: cover;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.25);
  border-radius: 10px;
	background-position: center;
	-webkit-transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	-o-transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1), -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
	-webkit-backface-visibility: hidden;
	        backface-visibility: hidden;
	text-align: center;
	min-height: 280px;
	height: auto;
	border-radius: 10px;
	color: #fff;
	font-size: 1.5rem;
}

.back{
  background: #cedce7;
  background: -webkit-linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
  background: -o-linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
  background: linear-gradient(45deg,  #cedce7 0%,#596a72 100%);
}

.front:after{
	position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    width: 100%;
    height: 100%;
    content: '';
    display: block;
    opacity: .6;
    background-color: #000;
    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
    border-radius: 10px;
}
.container:hover .front,
.container:hover .back{
    -webkit-transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    -o-transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
    transition: transform .7s cubic-bezier(0.4, 0.2, 0.2, 1), -webkit-transform .7s cubic-bezier(0.4, 0.2, 0.2, 1);
}

.back{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}

.inner{
    -webkit-transform: translateY(-50%) translateZ(60px) scale(0.94);
            transform: translateY(-50%) translateZ(60px) scale(0.94);
    top: 50%;
    position: absolute;
    left: 0;
    width: 100%;
    padding: 2rem;
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    outline: 1px solid transparent;
    -webkit-perspective: inherit;
            perspective: inherit;
    z-index: 2;
}

.container .back{
    -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg);
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
}

.container .front{
    -webkit-transform: rotateY(0deg);
            transform: rotateY(0deg);
    -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
}

.container:hover .back{
  -webkit-transform: rotateY(0deg);
          transform: rotateY(0deg);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.container:hover .front{
  -webkit-transform: rotateY(-180deg);
          transform: rotateY(-180deg);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

.front .inner p{
  font-size: 2rem;
  margin-bottom: 2rem;
  position: relative;
}

.front .inner p:after{
  content: '';
  width: 4rem;
  height: 2px;
  position: absolute;
  background: #C6D4DF;
  display: block;
  left: 0;
  right: 0;
  margin: 0 auto;
  bottom: -.75rem;
}

.front .inner span{
  color: rgba(255,255,255,0.7);
  font-family: 'Montserrat';
  font-weight: 300;
}

@media screen and (max-width: 64rem){
  .col{
    width: calc(33.333333% - 2rem);
  }
}

@media screen and (max-width: 48rem){
  .col{
    width: calc(50% - 2rem);
  }
}

@media screen and (max-width: 32rem){
  .col{
    width: 100%;
    margin: 0 0 2rem 0;
  }
}
</style>
@endsection

    @extends('layouts.application')
    @section('content')


    <div class="wrapper mt-5  " id="iso">
        <h1>Accompagnement ISO</h1>
        <div class="cols  mt-5 ">
                  <div class="col-lg-5 mb-5" ontouchstart="this.classList.toggle('hover');">
                      <div class="container">
                          <div class="front" style="background-image: url({{asset('img/iso-4.jpg')}})">
                              <div class="inner">
                                  <p>Certificat</p>
                     <span>ISO 9001</span>
                              </div>
                          </div>
                          <div class="back">
                              <div class="inner">
                                <p>ISO 9001 :  définit des exigences internationales relatives à un 
                                    système de management de la qualité. Pour obtenir une telle certification, 
                                    le système mis en place doit satisfaire aux exigences des clients et des administrations</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-5 mb-5" ontouchstart="this.classList.toggle('hover');">
                      <div class="container">
                          <div class="front" style="background-image: url({{asset('img/iso-4.jpg')}})">
                              <div class="inner">
                                  <p>Certificat</p>
                    <span>ISO 28000</span>
                              </div>
                          </div>
                          <div class="back">
                              <div class="inner">
                                  <p>ISO 28000 : est un modèle de sécurité pour chaque organisation impliquée dans une chaîne 
                                    d'approvisionnement, assurant la sécurité de la production, du stockage et de la distribution
                                     tout au long du parcours jusqu'à l'acheteur</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-5 mb-5" ontouchstart="this.classList.toggle('hover');">
                      <div class="container">
                          <div class="front" style="background-image: url({{asset('img/iso-4.jpg')}})">
                              <div class="inner">
                                  <p>Certificat</p>
                    <span>ISO 39001</span>
                              </div>
                          </div>
                          <div class="back">
                              <div class="inner">
                                  <p>ISO 39001 : spécifie les exigences pour un système de management de la sécurité routière (SR) afin d`interagit 
                                    avec le système de circulation routière de réduire le nombre de décès et de blessures graves </p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-5 mb-5" ontouchstart="this.classList.toggle('hover');">
                      <div class="container">
                          <div class="front" style="background-image: url({{asset('img/iso-4.jpg')}})">
                              <div class="inner">
                                  <p>Certificat</p>
                    <span>ISO 45001</span>
                              </div>
                          </div>
                          <div class="back">
                              <div class="inner">
                                  <p>ISO 45001  : concerne la santé et la sécurité au travail.
                                    C’est la première norme internationale à répondre de cette manière aux constats faits sur les maladies professionnelles et les accidents du travail</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-5 mb-5" ontouchstart="this.classList.toggle('hover');">
                      <div class="container">
                          <div class="front" style="background-image: url({{asset('img/iso-4.jpg')}}">
                              <div class="inner">
                                  <p>Certificat</p>
                    <span>ISO 14001</span>
                              </div>
                          </div>
                          <div class="back">
                              <div class="inner">
                                  <p>ISO 14001   : est la norme de management de l’environnement. Elle apporte des garanties en matière de 
                                    maîtrise des impacts environnementaux dans l’entreprise.
                                     Elle concerne tous les impacts de l’entreprise</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  {{-- <div class="col-lg-5 mb-5" ontouchstart="this.classList.toggle('hover');">
                      <div class="container">
                          <div class="front" style="background-image: url({{asset('img/iso-4.jpg')}})">
                              <div class="inner">
                                  <p>Reflupper</p>
                    <span>Lorem ipsum</span>
                              </div>
                          </div>
                          <div class="back">
                              <div class="inner">
                                  <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias cum repellat velit quae suscipit c.</p>
                              </div>
                          </div>
                      </div>
                  </div> --}}

    
              </div>
       </div>





    @endsection
    
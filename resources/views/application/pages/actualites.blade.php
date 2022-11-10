@extends('layouts.application')
@section('content')

@php
use App\Http\Controllers\Application\ApplicationController;

@endphp
    <!-- Blog Start -->
    <div class="container-fluid pt-5" id="blog">
        <div class="container">
            <div class="text-center pb-2">
                <!-- <h6 class="text-primary text-uppercase font-weight-bold">  </h6> -->
                <h1 class="mb-4">Actualités</h1>
            </div>
            <div class="row">
                    @forelse ($selectBlogInfo as $blogInfo)
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

    
  





@endsection
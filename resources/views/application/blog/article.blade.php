
@extends('layouts.application')
@section("content")
@php
use App\Http\Controllers\Application\ApplicationController;

@endphp
<!--------------------------------------
HEADER
--------------------------------------->
<br><br><br><br>
<div class="container-fluid">

	@forelse ($getBlogInfo as $blog)
<div class="container">
 <div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
  <div class="h-100 tofront">
   <div class="row justify-content-between">
    <div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
     
     <h1 class="display-4 secondfont mb-3 font-weight-bold">
		{{$blog->title}}
	</h1>
     
    </div>
    <div class="col-md-6 pr-0">
     <img src="{{$StorageSourcePathBlogs.'/'.$blog->photo}}" width=100% height=100% >
    </div>
   </div>
  </div>
 </div>
</div>
<!-- End Header -->
    
<!--------------------------------------
MAIN
--------------------------------------->
<div class="container-fluid pt-4 pb-4">
 <div class="row ">
  <div class="col-lg-2  mb-4 col-md-2">
   <div class="sticky-top text-center">
    <div class="text-muted">
     Partager
    </div>
    <div class="share d-inline-block">
     <!-- AddToAny BEGIN -->
     <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
      <a class="a2a_button_facebook" ></a>
      <a class="a2a_button_whatsapp"></a>
     </div>
     <script async src="https://static.addtoany.com/menu/page.js"></script>
     <!-- AddToAny END -->
    </div>
   </div>
  </div>
  <div class="col-md-12 col-lg-6">
   <article class="article-post" style="color: black">
   <p>
	{{$blog->description}}
   </p>

 
   </article>
  </div>
  @empty
		
  @endforelse


  <div class="col-lg-3 mt-5 align-self-center">
	<h5 class="font-weight-bold spanborder" style="margin-bottom: 50px"><span>Lire En Suite</span></h5>
	
	 
	  <div class="flex-md-row mb-4 box-shadow h-xl-300">
		  @forelse ($selectFilteredBlogs as $filteredBlog)
		<div class="mb-3 d-flex ">
		<img height="100" src="{{$StorageSourcePathBlogs.'/'.$filteredBlog->photo}}">
		<div class="pl-3">
		 <h2 class="mb-2 h6 font-weight-bold">
		 <a class="text-dark" href="{{route('article',$filteredBlog->id)}}">{{ Str::limit($filteredBlog->description, 40)}}</a>
		 </h2>
		 <small class="text-muted">Publier le {{$filteredBlog->publication_date}}</small>
		</div>
	   </div>
		  @empty
			  
		  @endforelse

	  </div>
	 </div>
	</div>
 
 
  </div>
 </div>


 
 
 @endsection



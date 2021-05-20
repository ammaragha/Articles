@extends('frontEnd.temps.app')

@section("title")
Home
@stop

@section('content')



   <!-- masonry
   ================================================== -->
   <section id="bricks">

   	<div class="row masonry">

   		<!-- brick-wrapper -->
         <div class="bricks-wrapper">

         	<div class="grid-sizer"></div>

         	<div class="brick entry featured-grid animate-this">
         		<div class="entry-content">
         			<div id="featured-post-slider" class="flexslider">
			   			<ul class="slides">

                        @foreach(App\slider::orderBy('sort','asc')->get() as $slide)
				   			<li>
				   				<div class="featured-post-slide">

						   			<div class="post-background" style="background-image:url('{{ $slide->img }}');"></div>

								   	<div class="overlay"></div>			   		

								   	<div class="post-content">
								   		<ul class="entry-meta">
												<li>{{ date('M , d,Y', strtotime(explode(" ",$slide->created_at)[0] )) }}</li> 
											</ul>	

								   		<h1 class="slide-title"><a href="single-standard.html" title="">{{ $slide->title }}</a></h1> 
								   	</div> 				   					  
				   			
				   				</div>
				   			</li> <!-- /slide -->
                        @endforeach
				   			

				   		</ul> <!-- end slides -->
				   	</div> <!-- end featured-post-slider -->        			
         		</div> <!-- end entry content -->         		
         	</div>

            @foreach(App\artical::get() as $art)
         	<article class="brick entry format-standard animate-this">

               <div class="entry-thumb">
                  <a href="single-standard.html" class="thumb-link">
	                  <img src="{{ url($art->img) }}" alt="building">             
                  </a>
               </div>

               <div class="entry-text">
               	<div class="entry-header">

               		<div class="entry-meta">
               			<span class="cat-links">
               				         				
               			</span>			
               		</div>

               		<h1 class="entry-title"><a href="single-standard.html">{{ $art->name }}</a></h1>
               		
               	</div>
						<div class="entry-excerpt">
							{{ Str::limit($art->description,40 ,"..") }}
						</div>
               </div>

        		</article> <!-- end article -->
            @endforeach

         </div> <!-- end brick-wrapper --> 

   	</div> <!-- end row -->

   	<div class="row">
   		
   		<nav class="pagination">
		      <span class="page-numbers prev inactive">Prev</span>
		   	<span class="page-numbers current">1</span>
		   	<a href="#" class="page-numbers">2</a>
		      <a href="#" class="page-numbers">3</a>
		      <a href="#" class="page-numbers">4</a>
		      <a href="#" class="page-numbers">5</a>
		      <a href="#" class="page-numbers">6</a>
		      <a href="#" class="page-numbers">7</a>
		      <a href="#" class="page-numbers">8</a>
		      <a href="#" class="page-numbers">9</a>
		   	<a href="#" class="page-numbers next">Next</a>
	      </nav>

   	</div>

   </section> <!-- end bricks -->

   
 @stop
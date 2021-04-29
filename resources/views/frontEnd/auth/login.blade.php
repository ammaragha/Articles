@extends('frontEnd.temps.app')

@section('title')
Login
@stop

@section('content')

    <!-- content
   ================================================== -->
   <section id="content-wrap" class="site-page">
   	<div class="row">
   		<div class="col-twelve">

   			<section>  

			   @if(Session::has('rm'))
               <div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ Session::get('rm') }} </div>
			   @elseif(Session::has('rmx'))
               <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ Session::get('rmx') }}  </div>
			   @elseif(Session::has('k'))
               <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ Session::get('k') }}  </div>
               @elseif(Session::has('err'))
               <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ Session::get('err') }}  </div>
                @endif


                        <center><h1>Login</h1></center>



						{!! Form::Open() !!}	
	  					   <fieldset>

	                     <div class="form-field">
	  						      <input name="email" type="email" id="email" class="full-width" placeholder="Your Name" value=""
                                    pattern=".{6,}" title="Eight or more characters"
                                    required>
	                     </div>


	                     <div class="form-field">
	  						      <input name="password" type="password" id="pass" class=" full-width" placeholder="password"  value=""
                                    minlength="6"
                                    required>
                         </div>

                         <div class="form-field">
                              <input name="remember" checked="" type="checkbox" value="1" id="remember"  style="display:inline-block;" placeholder="password"  value="">
                              <lable>remmeber me</lable>  
                         </div>
                         
                         
                        

	                     

	                     <button type="submit" class="submit button-primary full-width-on-mobile">login</button>

	  					   </fieldset>


  				      {!! Form::Close() !!}

				</section>
   		

			</div> <!-- end col-twelve -->
   	</div> <!-- end row -->		
   </section> <!-- end content -->

@stop
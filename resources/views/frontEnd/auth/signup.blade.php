@extends('frontEnd.temps.app')

@section('title')
Sign up
@stop

@section('content')

    <!-- content
   ================================================== -->
   <section id="content-wrap" class="site-page">
   	<div class="row">
   		<div class="col-twelve">


   			<section>  
               
                @if(isset($errors))
                    @foreach($errors->all() as $err)
                    <strong><i class="fa fa-times-circle" aria-hidden="true"></i> {{ $err }}</strong>
                    @endforeach 
                @endif


               @if(Session::has('k'))
               <div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ Session::get('k') }} </div>
               @elseif(Session::has('err'))
               <div class="alert alert-danger" role="alert"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ Session::get('err') }}  </div>
                @endif

                

                        <center><h1>Sign up</h1></center>

                    {!! Form::Open(['name'=>'sForm','method'=>'post']) !!}
	  					   <fieldset>

	                     <div class="form-field">
	  						      <input name="fName" type="text" id="cName" class="full-width" placeholder="Your First name" value=""
                                    pattern=".{2,}" title="2~8 characters"
                                    required>
                         </div>
                         <div class="form-field">
	  						      <input name="lName" type="text" id="cName" class="full-width" placeholder="Your Last name" value=""
                                    pattern=".{2,}" title="2~8 characters"
                                    required>
	                     </div>

	                     <div class="form-field">
	  						      <input name="email" type="email" id="cEmail" class="full-width" placeholder="Your Email" value=""
                                    required>
	                     </div>

	                     <div class="form-field position-relative">
	  						      <input name="password" type="password" id="pass" class=" full-width" placeholder="password"  value=""
                                    minlength="6"
                                    required>
	                     </div>
                        

	                     

	                     <button type="submit" class="submit button-primary full-width-on-mobile">Sign up</button>

                             </fieldset>
                    {!! Form::Close() !!}

				</section>
   		

			</div> <!-- end col-twelve -->
   	</div> <!-- end row -->		
   </section> <!-- end content -->

@stop
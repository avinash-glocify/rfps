@extends('front.signin_head')

@section('content') 
<section class="banner_head inner_banner">
         <div class="container">
            <div class="banner_text">
               <h1>Sign Up For a NetPEO Account</h1>
            </div>
         </div>
         </div>
         <img  class="banner_image"src="{{ URL::asset('front/img/banner_1.jpg') }}">
      </section>
 <section class="signup_options">
         <div class="container sign_holder">
            <h1 class="site_h">Welcome to NetPEO </h1>
            <p class="site_p"><b>Choose Your Application Type</b> - Choose the application type that will describe your relationship with NetPEO. The application process will require you to enter some personal and business related information. Please complete all mandatory fields in order to get your application processed as soon as possible. Brokers will have to electronically sign a Brokers Agreement before applications will be submitted to NetPEO. Providers will have to confirm a valid email address before applications will be submitted to NetPEO.</p>
            {!!  Form::open(['url' => 'signup', 'method' => 'post' ,'id'=>'signup']) !!}
			{{ csrf_field() }}
			   @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('flash_message') }}
                    </div>
                    @endif  
				
				
               <div class="f_group1">
			      <div id="err" style="display:none;">Please choose one.</div>
                  <span><input type="radio" value="company" name="company" id="j1"><label for="j1">Sign Up as a NetPEO Providers</label></span>
                  <span><input type="radio" value="broker" name="company" id="j2"><label for="j2">Sign Up as a NetPEO Broker</label></span>
                  <span><input type="submit" id="chkformval" value="Sign me up"></span>
				    
               </div>
			  
            {!! Form::close() !!}
			<!--
            <p class="site_p">If you already completed the first part of the Provider Application, and you have a Confirmation Code, please <a href="#">click here</a></p> -->
         </div>
      </section>
	   @endsection 
	  
@extends('front.front_head')
@section('content')

 <section class="content_holder">
         <div class="container">
            <div class="col-md-8 main_sec">
               <h1 class="site_h">Welcome to NetPEO </h1>
               <p class="site_p">NetPEO is a comprehensive Professional Employer Outsourcing & HR Outsourcing Industry Consulting, Training anad Brokerage firm based in Atlanta, GA.
                  <br>
                  <br>
                  We match your needs with the services offered by our providers to find the best HR Solution for your company.
                  </br>
                  </br>
                  NetPEO Advisory & Brokerage Services will help you to handle the complexity and costs of employment administration. To edit one of your existing RFPs, simply click on the RFP number. 
               </p>
               <div class="infographic">
                  <figure>
                     <img src="{{ URL::asset('front/img/infog.jpg') }}" class="img-responsive">
                  </figure>
               </div>
            </div>
            <div class="col-md-3 col-md-offset-1 side_bar">
               <ul class=" widgeter important_links">
			   @if(!Auth::check())
                  <li><a href="{{ URL::to('/signin') }}">Apply today</a></li>
			  @else
				<li><a href="{{ URL::to('/dashboard') }}">Go to dashboard</a></li>  
			  @endif
                  <li><a href="#">Go to netpeo website</a></li>
                  <li><a href="{{ URL::to('/support-ticket') }}">Log a support ticket</a></li>
                  <li><a href="#">Frequently asked questions</a></li>
               </ul>
			   @if(!Auth::check())
               <section class="widgeter login_form">
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
                  <h1>Login form</h1>
{!! Form::open(array('url' => array('login'),'class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form')) !!}                      <input type="text" name="email" placeholder="Email">	
                     <input type="password" name="password"  placeholder="password">
					 <a href="{{ URL::to('password/email') }}" class="pull-right" style="margin-right: 25px;
"> <small>Forgot Password ?</small></a>
                     <div class="conrols">
                        <div class="f_group"><input type="checkbox" >Remember</div>
                        <div class="f_group text-right"><input type="submit" value="submit"></div>
                     </div>
					 
                  {!! Form::close() !!} 
               </section>
			   @endif
            </div>
         </div>
      </section>
      

 @endsection       
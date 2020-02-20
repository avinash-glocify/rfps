@extends('front.front_head')
@section('content')


     <div class="cash-pagelog" style="padding-bottom: 249px;">	 
	    <div class="container wido">
		{!! Form::open(array('url' => 'password/email','class'=>'','id'=>'password','role'=>'form')) !!} 
		    <div class="col-sm-12 login_page">
			<div class="head-new-title">
			
			 <h2 class="about-headline text-center">Forgot Password</h2>
			 </div>
			 
               <div class="message">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                              <ul style="list-style: none;">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
            </div>
			@if(Session::has('flash_message'))
				<div class="alert alert-success fade in">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				 {{ Session::get('flash_message') }} 
			   </div>             
			@endif
			
			<div class="form-group">
              <label class="control-label" for="email">Email<span class="required">*</span></label>
              <input id="email" name="email" type="text" placeholder="Enter mail" class="form-control input-md">
            </div>
             
            <div class="form-group">
              <button id="submit" name="submit" class="btn-primary" style="padding:10px; background-color:#0673a2; border:1px solid #0673a2;">Submit</button>
              <a href="{{ URL::to('/') }}" class="pull-right" style="color:#0673a2; font-size:18px;"> <small>Login ?</small></a> </div>
			{!! Form::close() !!}
</div>

</div>

@endsection
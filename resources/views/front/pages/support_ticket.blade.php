 @extends('front.signin_head')

@section('content') 
 
         
          
      <section class="sign_up_form">
      <div class="container">
               
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
      <div class="form_holder_1"><h2>Contact Us for Any kind of Questions</h2>
      <div class="personal_form">
      {!! Form::open(array('url' => 'support-ticket','class'=>'','id'=>'','method' => 'post','role'=>'form')) !!}
      <div class="col-md-12">
		  <label for="name"> Name</label>
           <input class="form-control" type="text" id="name" name="name" placeholder="Enter Name..">
      </div>
	  <div class="col-md-12">
		   <label for="role">Role:</label>
                       <select class="form-control" id="role" name="role">
					   <option> ---Select role---</option>
					   <option value="company"> company</option>
					   <option value="broker"> broker</option>
					   </select>
      </div>
	  <div class="col-md-12">
		  <label for="subject">Subject:</label>
                                            <input class="form-control" type="text" id="subject" name="subject" placeholder="Enter subject ">
      </div>
	  <div class="col-md-12">
		  <label for="email">Email ID:</label>
                                            <input class="form-control" type="email" id="email" name="email" placeholder="Enter email id ">
      </div>
	  <div class="col-md-12">
		  <label for="phone_number">Phone Number:</label>
                                            <input class="form-control" type="number" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
      </div>
	  
	  <div class="col-md-12">
		  <label for="message">Message:</label>
                                            <textarea class="form-control"  id="message" name="message" placeholder="Enter message"> </textarea>
      </div>
        
		  <div class="submit_button" >
		  <input type="submit" value="send" style="margin-top:30px !important;">
		  </div>
      </div>
      </div>
      </div>
	  {!! Form::close() !!}
      </section>
	    @endsection 
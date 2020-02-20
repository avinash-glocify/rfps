@extends("admin.admin_applist")
@section("content")

 <!-- Page Header -->
              <?php /*  <div class="content bg-image" style="background-image: url('{{ URL::asset('admin_assets/img/photos/bg.jpg') }}');">
                    <div class="push-50-t push-15 clearfix">
                        <div class="push-15-r pull-left animated fadeIn">
                            
                            @if(Auth::user()->fileUpload1)
                                 
                                    <img src="{{URL::to(Auth::user()->fileUpload1)}}" alt="Avatar" class="img-avatar img-avatar-thumb">
                            
                            @else
                                
                            <img src="{{ URL::asset('admin_assets/img/avatars/avatar10.jpg') }}" alt="Avatar"  class="img-avatar img-avatar-thumb"/>
                            
                            @endif
                        </div>
                        <h1 class="h2 text-white push-5-t animated zoomIn">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
                        <h2 class="h5 text-white-op animated zoomIn">{{ Auth::user()->usertype }}</h2>
                    </div>
                </div> */?>
                <!-- END Page Header -->

                

                <!-- Page Content -->
                <div class="content content-boxed">
                    <div class="row">
					<h3>Edit User</h3>
                        <div class="col-sm-12 col-lg-12">

                             <!-- Block Tabs Alternative Style -->
                            <div class="block">
                                <div class="block-content tab-content">
 

                                    <div class="col-lg-8 tab-pane active" id="btabs-alt-static-profile">

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
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            {{ Session::get('flash_message') }}
                                        </div>
                                    @endif
	<div class="row" >
		{!! Form::model($userData, array('url' => 'admin/updateUserData','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'loginform','role'=>'form')) !!}
			
			<div class="form-group">
						{{Form::label('email', 'Email')}}
						{{Form::email('email', $userData['username'] ,['class' => 'form-control'])}}
			</div>
			<div class="form-group">
					   {{Form::label('usertype', 'User Type')}}		
					   <Select name="usertype" class="form-control" >
						@foreach($userType as $singleTypekey => $singleTypeValue)
							<option @if($userData['usertype'] == $singleTypekey ){{'selected'}} @endif value="{{$singleTypekey}}"> {{$singleTypeValue}} </option>
						@endforeach	
					   </select>	
			</div>
			<div class="form-group">	 
				{{Form::label('first_name', 'First Name')}}				{{Form::text('first_name',$userData['first_name'],['class' => 'form-control'])}}
			</div>
			
			<div class="form-group">	 
				{{Form::label('last_name', 'Last Name')}}				{{Form::text('last_name',$userData['last_name'],['class' => 'form-control'])}}
			</div>
			
			<div class="form-group">	 
				{{Form::label('address', 'Address')}}				
				{{Form::text('address',$userData['address'],['class' => 'form-control'])}}
				{{Form::text('address2',$userData['address2'],['class' => 'form-control'])}}
			</div>
			
			<div class="form-group">
					   {{Form::label('country', 'Country')}}				
					   {{Form::select('country',$country, $userData['country'], ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
					   {{Form::label('state', 'State')}}		
						{{Form::select('state',$state, $userData['state'], ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
					   {{Form::label('city', 'City')}}		
						{{Form::select('city',$city,$userData['city'], ['class' => 'form-control'])}}
			</div>
			<div class="form-group">
						{{Form::label('phone_number', 'Contact Number')}}				
						{{Form::text('phone_number', $userData['phone_number'], ['class' => 'form-control'])}}		    											
			</div>	
		
			<div class="form-group">
					   {{Form::label('status', 'Status')}}		
						{{Form::select('status',$status,null, ['class' => 'form-control'])}}
						{{Form::hidden('id',$userData['id'])}}
			</div>

			<div class="form-group">
				<button class="btn btn-block btn-primary" type="submit"><i class="si si-login pull-right"></i> Update</button>
			</div> 
		{!! Form::close() !!} 
	</div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END Block Tabs Alternative Style -->
                        </div>
                        
                    </div>
                </div>
                <!-- END Page Content -->
@endsection
@extends("admin.admin_applist")
@section("content")

 <!-- Page Header -->
                <?php /*<div class="content bg-image" style="background-image: url('{{ URL::asset('admin_assets/img/photos/bg.jpg') }}');">
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
                    <div class="row qst">
					<h3>View Broker</h3>
                        <div class="col-sm-12 col-lg-12">

                             <!-- Block Tabs Alternative Style -->
                            <div class="block">
                                <div class="block-content tab-content">
 

                                    <div class="col-lg-8 tab-pane active" id="btabs-alt-static-profile">

                                        
                                
	<div class="row" >
		
			
			<div class="form-group">
                <div class="col-md-6">  			
				{{Form::label('email', 'Email')}}
				</div>
				<div class="col-md-6"> 
				{{Form::label('email', $userData['email'])}}
				</div>
				
				
			</div>
			
			<div class="form-group">
                 <div class="col-md-6">  			
				{{Form::label('company_name', 'Company Name')}}
				</div>
				<div class="col-md-6"> 
				{{Form::label('company_name', $userData['brokerdetails']['company_name'])}}
				</div>
			
				
			</div>
			
			<div class="form-group">
                 <div class="col-md-6">  			
				{{Form::label('first_name', 'First Name')}}
				</div>
				<div class="col-md-6"> 
				{{Form::label('first_name', $userData['first_name'])}}
				</div>
			
				
			</div>
			
			<div class="form-group">
			    <div class="col-md-6">  			
				{{Form::label('last_name', 'Last Name')}}
				</div>
				<div class="col-md-6"> 
				{{Form::label('last_name', $userData['last_name'])}}
				</div>
				
			</div>
			
			<div class="form-group">	
               <div class="col-md-6">  			
				{{Form::label('address', 'Address')}}
				</div>
				<div class="col-md-6"> 
				{{Form::label('address', $userData['address'])}}
				{{Form::label('address2', $userData['address2'])}}
				</div>
			
				
			</div>
			
			<div class="form-group">
                <div class="col-md-6">  			
				{{Form::label('country', 'Country')}}
				</div>
				<div class="col-md-4"> 
				
				{{Form::select('country',$country, $userData['country'], ['class' => 'form-control',' disabled'=>' disabled'])}}
				
				</div>
			
				
			</div>
			
			<div class="form-group">	
			    <div class="col-md-6">  			
				{{Form::label('state', 'State')}}
				</div>
				<div class="col-md-4"> 
				
				{{Form::select('state',$state, $userData['state'], ['class' => 'form-control',' disabled'=>' disabled'])}}
				</div>
				
			</div>
			
			<div class="form-group">
			    <div class="col-md-6">
               			
				{{Form::label('city', 'City')}}
				</div>
				<div class="col-md-4"> 
				
				{{Form::select('city',$city, $userData['city'], ['class' => 'form-control',' disabled'=>' disabled'])}}
				</div>
				<!--
				{{Form::label('city', 'City')}}		
				{{Form::select('city',$city, $userData['city'], ['class' => 'form-control'])}} -->
			</div>
			<div class="form-group">
			    <div class="col-md-6">  			
				{{Form::label('phone_number', 'Contact Number')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('phone_number', $userData['phone_number'])}}
				</div>
						    											
			</div>
			<div class="form-group">
			    <div class="col-md-6">  			
				{{Form::label('fax_number', 'Fax Number')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('fax_number', $userData['brokerdetails']['fax_number'])}}
				</div>
			
														
			</div>
			<div class="form-group">
			    <div class="col-md-6">  			
				{{Form::label('doingBusinessAs', 'Doing Business As')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('doingBusinessAs', $userData['brokerdetails']['doingBusinessAs'])}}
				</div>
				
			</div>
			
			<div class="form-group">
			     <div class="col-md-6">  			
				{{Form::label('federal_ID', 'Federal ID')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('federal_ID', $userData['brokerdetails']['federal_ID'])}}
				</div>
				
			</div>
			<div class="form-group">
			  <div class="col-md-6">  			
				{{Form::label('social_security', 'Social Security')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('social_security', $userData['brokerdetails']['social_security'])}}
				</div>
			
			</div>
			<div class="form-group">
			<div class="col-md-6">  			
				{{Form::label('employer_id_number', 'Employer ID Number')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('employer_id_number', $userData['brokerdetails']['employer_id_number'])}}
				</div>
					 
			</div>
			
			<div class="form-group">
			   <div class="col-md-6">  			
				{{Form::label('additional_notes', 'Experience and Additional Notes')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('additional_notes', $userData['brokerdetails']['additional_notes'])}}
				</div>
					 
			</div>
			
			<div class="form-group">
			    <div class="col-md-6">  			
				{{Form::label('website_url', 'Website URL')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('website_url', $userData['brokerdetails']['website_url'])}}
				</div>
				
			</div>
			
			<div class="form-group">
			    <div class="col-md-6">  			
				{{Form::label('status', 'Status')}}
				</div>
				<div class="col-md-6"> 
				
				{{Form::label('status', $userData['status'])}}
				</div>
			
			</div>

			<div class="form-group">
				<button class="btn btn-block btn-primary" type="submit" onclick="window.history.go(-1); return false;"><i class="si si-login pull-right"></i> Back</button>
			</div> 
	
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
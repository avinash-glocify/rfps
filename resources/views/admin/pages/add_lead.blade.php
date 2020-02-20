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
						<h3>Add New Prospect</h3>
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
		{!! Form::open(array('url' => 'admin/leadRegister','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'leadform','role'=>'form')) !!}
		
		
		<div class="form-group">
					<strong>What type of services are you interested in? (Select any one)</strong><br />
					{{Form::label('service_type', 'PEO (Professional Employer Organization)')}}
					{{Form::radio('service_type', 'PEO' ,'false')}}<br />
					{{Form::label('service_type', 'HR Outsourcing')}}
					{{Form::radio('service_type', 'HR', 'false')}}
		</div>
		 <div class="form-group">	 
					{{Form::label('total_employee', ' Number Of Employees')}}				{{Form::select('total_employee',$numbersOfEmployees, null, ['class' => 'form-control', 'required' => 'required'])}}
		</div>   
		
		<div class="form-group">
				<strong>What is the main reason for your interest in services?</strong><br />
				{{Form::checkbox('reason[]',1, false)}}
				{{Form::label('reason', 'Workers Compensation Coverage')}}	<br />
				
				{{Form::checkbox('reason[]',2, false)}}
				{{Form::label('reason', 'Payroll/Technology')}}	<br />
				
				{{Form::checkbox('reason[]',3, false)}}
				{{Form::label('reason', 'Multi-state')}}	<br />
				
				{{Form::checkbox('reason[]',4, false)}}
				{{Form::label('reason', 'Currently with a Peo and Shopping')}}	<br />
				
				{{Form::checkbox('reason[]',5, false)}}
				{{Form::label('reason', 'HR/Compliance')}}	<br />
				
				{{Form::checkbox('reason[]',6, false)}}
				{{Form::label('reason', 'Time and Attendance')}}	<br />	
				
				{{Form::checkbox('reason[]',7, false)}}
				{{Form::label('reason', ' Other')}}	<br />
					
		</div>
		<div class="form-group">
					<strong>When do you expect to make a decision?</strong><br />
					{{Form::label('expected_decision_time', 'ASAP')}}
					{{Form::radio('expected_decision_time', 'ASAP' ,'false')}}<br />
					{{Form::label('expected_decision_time', 'In one month')}}
					{{Form::radio('expected_decision_time', 'In one month', 'false')}}<br />
					{{Form::label('expected_decision_time', 'In two months or more')}}
					{{Form::radio('expected_decision_time', 'In two months or more', 'false')}}<br />
		</div>
		<div class="form-group">
				<strong>What additional benefits (if any) would you like to provide through the PEO?</strong><br />
				{{Form::checkbox('additional_benfefits[]','Group medical/ dental/ vision insurance', false)}}
				{{Form::label('additional_benfefits', 'Group medical/ dental/ vision insurance')}}	<br />
				
				{{Form::checkbox('additional_benfefits[]','Group life insurance', false)}}
				{{Form::label('additional_benfefits', 'Group life insurance')}}	<br />
				
				{{Form::checkbox('additional_benfefits[]','Short and long-term disability', false)}}
				{{Form::label('additional_benfefits', 'Short and long-term disability')}}	<br />
				
				{{Form::checkbox('additional_benfefits[]','Flexible Spending Account (FSA) or Health Savings Account (HSA)', false)}}
				{{Form::label('additional_benfefits', 'Flexible Spending Account (FSA) or Health Savings Account (HSA)')}}	<br />
				
				{{Form::checkbox('additional_benfefits[]','401(k) programs', false)}}
				{{Form::label('additional_benfefits', '401(k) programs')}}	<br />
				
				{{Form::checkbox('additional_benfefits[]','Currently not offering Benefits but interested', false)}}
				{{Form::label('additional_benfefits', 'Currently not offering Benefits but interested')}}	<br />	
				
				{{Form::checkbox('additional_benfefits[]','Do not wish to offer Benefits', false)}}
				{{Form::label('additional_benfefits', 'Do not wish to offer Benefits')}}	<br />
					
		</div>
		
		<div class="form-group">	 
				{{Form::label('first_name', 'First Name')}}				
				{{Form::text('first_name','',['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">	 
				{{Form::label('last_name', 'Last Name')}}			
				{{Form::text('last_name','',['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">	 
				{{Form::label('email', 'Email')}}
				{{Form::email('email', '',['class' => 'form-control', 'required' => 'required'])}}
			</div>
		
		<div class="form-group">	 
				{{Form::label('company_name', 'Company Name')}}			
				{{Form::text('company_name','',['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">	 
				{{Form::label('phone_number', 'Phone Number')}}			
				{{Form::text('phone_number','',['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">
				<strong>Preferred method of contact?</strong><br />
				{{Form::checkbox('preferred_method_contact[]','Phone', false)}}
				{{Form::label('preferred_method_contact', 'Phone')}}	<br />
				
				{{Form::checkbox('preferred_method_contact[]','Email', false)}}
				{{Form::label('preferred_method_contact', 'Email')}}	<br />
					
		</div>
		
		<div class="form-group">
				   {{Form::label('job_title', 'Job Title :')}}				
				   {{Form::select('job_title',$jobTittle, null, ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">
				   {{Form::label('work_indstry', 'Industry you work in:')}}				
				   {{Form::select('work_indstry',$workIN, null, ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">
				   {{Form::label('country', 'Country')}}				
				   {{Form::select('country',$country, null, ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		<div class="form-group">
				   {{Form::label('state', 'State')}}		
					{{Form::select('state',$state, null, ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		<div class="form-group">
				   {{Form::label('city', 'City')}}		
					{{Form::select('city',$city,null, ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		
		<div class="form-group">
					<button class="btn btn-block btn-primary" type="submit"><i class="si si-login pull-right"></i> Submit</button>
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
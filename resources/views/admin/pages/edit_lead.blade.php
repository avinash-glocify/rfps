@extends("admin.admin_applist")
@section("content")

 <!-- Page Header -->
               <?php /* <div class="content bg-image" style="background-image: url('{{ URL::asset('admin_assets/img/photos/bg.jpg') }}');">
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
					<h3>Edit Prospect</h3>
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
		{!! Form::model($leadData, array('url' => 'admin/updateLeadData','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'loginform','role'=>'form')) !!}
			
			
			<div class="form-group">
					<strong>What type of services are you interested in? (Select any one)</strong><br />
					{{Form::label('service_type', 'PEO (Professional Employer Organization)')}}
					
					@if($leadData['service_type'] == 'PEO')
						{{Form::radio('service_type', 'PEO' ,['checked' => 'checked'])}}<br />
					@else
						{{Form::radio('service_type', 'PEO' ,'false')}}<br />
					@endif		
					
					{{Form::label('service_type', 'HR Outsourcing')}}
					
					@if($leadData['service_type'] == 'HR')
						{{Form::radio('service_type', 'HR' ,['checked' => 'checked'])}}<br />
					@else
						{{Form::radio('service_type', 'HR' ,'false')}}<br />
					@endif
					
		</div>
		 <div class="form-group">	 
					{{Form::label('total_employee', ' Number Of Employees')}}				{{Form::select('total_employee',$numbersOfEmployees, $leadData['total_employee'], ['class' => 'form-control', 'required' => 'required'])}}
		</div>   
		
		<div class="form-group">
				<strong>What is the main reason for your interest in services?</strong><br />
				
				@if(in_array(1, $leadData['reason']))	
				{{Form::checkbox('reason[]',1, true)}}
				@else
				{{Form::checkbox('reason[]',1, false)}}
				@endif
				{{Form::label('reason', 'Workers Compensation Coverage')}}	<br />
				
				@if(in_array(2, $leadData['reason']))
					{{Form::checkbox('reason[]',2, true)}}
				@else
					{{Form::checkbox('reason[]',2, false)}}
				@endif
				{{Form::label('reason', ' Payroll/Technology')}}	<br />
				
				@if(in_array(3, $leadData['reason']))
					{{Form::checkbox('reason[]',3, true)}}
				@else
					{{Form::checkbox('reason[]',3, false)}}
				@endif			
				{{Form::label('reason', ' Multi-state')}}	<br />
				
				@if(in_array(4, $leadData['reason']))
					{{Form::checkbox('reason[]',4, true)}}
				@else
					{{Form::checkbox('reason[]',4, false)}}
				@endif				
				{{Form::label('reason', 'Currently with a Peo and Shopping')}}	<br />
				
				@if(in_array(5, $leadData['reason']))
					{{Form::checkbox('reason[]',5, true)}}
				@else
					{{Form::checkbox('reason[]',5, false)}}
				@endif
				{{Form::label('reason', 'HR/Compliance')}}	<br />
				
				@if(in_array(6, $leadData['reason']))
					{{Form::checkbox('reason[]',6, true)}}
				@else
					{{Form::checkbox('reason[]',6, false)}}
				@endif
				{{Form::label('reason', 'Time and Attendance')}}	<br />	
				
				@if(in_array(7, $leadData['reason']))
					{{Form::checkbox('reason[]',7, true)}}
				@else
					{{Form::checkbox('reason[]',7, false)}}
				@endif
				{{Form::label('reason', ' Other')}}	<br />
					
		</div>
		<div class="form-group">
					<strong>When do you expect to make a decision?</strong><br />
					{{Form::label('expected_decision_time', 'ASAP')}}
					@if($leadData['expected_decision_time'] == 'ASAP')
						{{Form::radio('expected_decision_time', 'ASAP' , true)}}<br />
					@else
						{{Form::radio('expected_decision_time', 'ASAP' ,false)}}<br />
					@endif
					
					{{Form::label('expected_decision_time', 'In one month')}}
					@if($leadData['expected_decision_time'] == 'In one month')
						{{Form::radio('expected_decision_time', 'In one month', true)}}<br />
					@else
						{{Form::radio('expected_decision_time', 'In one month', false)}}<br />
					@endif
					
					{{Form::label('expected_decision_time', 'In two months or more')}}
					@if($leadData['expected_decision_time'] == 'In two months or more')
						{{Form::radio('expected_decision_time', 'In two months or more', true)}}<br />
					@else
						{{Form::radio('expected_decision_time', 'In two months or more', false)}}<br />
					@endif
					
		</div>
		<div class="form-group">
				<strong>What additional benefits (if any) would you like to provide through the PEO?</strong><br />
				@if(in_array('Group medical/ dental/ vision insurance', $leadData['additional_benfefits']))
					{{Form::checkbox('additional_benfefits[]','Group medical/ dental/ vision insurance', true)}}
				@else
					{{Form::checkbox('additional_benfefits[]','Group medical/ dental/ vision insurance', false)}}
				@endif
				
				{{Form::label('additional_benfefits', 'Group medical/ dental/ vision insurance')}}	<br />
				
				@if(in_array('Group life insurance', $leadData['additional_benfefits']))
					{{Form::checkbox('additional_benfefits[]','Group life insurance', true)}}
				@else
					{{Form::checkbox('additional_benfefits[]','Group life insurance', false)}}
				@endif			
				{{Form::label('additional_benfefits', 'Group life insurance')}}	<br />
				@if(in_array('Short and long-term disability', $leadData['additional_benfefits']))
					{{Form::checkbox('additional_benfefits[]','Short and long-term disability', true)}}
				@else
					{{Form::checkbox('additional_benfefits[]','Short and long-term disability', false)}}
				@endif
				{{Form::label('additional_benfefits', 'Short and long-term disability')}}	<br />
				
				@if(in_array('Flexible Spending Account (FSA) or Health Savings Account (HSA)', $leadData['additional_benfefits']))
					{{Form::checkbox('additional_benfefits[]','Flexible Spending Account (FSA) or Health Savings Account (HSA)', true)}}
				@else
					{{Form::checkbox('additional_benfefits[]','Flexible Spending Account (FSA) or Health Savings Account (HSA)', false)}}
				@endif
				
				{{Form::label('additional_benfefits', 'Flexible Spending Account (FSA) or Health Savings Account (HSA)')}}	<br />
				
				@if(in_array('401(k) programs', $leadData['additional_benfefits']))
					{{Form::checkbox('additional_benfefits[]','401(k) programs', true)}}
				@else
					{{Form::checkbox('additional_benfefits[]','401(k) programs', false)}}
				@endif
				{{Form::label('additional_benfefits', '401(k) programs')}}	<br />
				
				@if(in_array('Currently not offering Benefits but interested', $leadData['additional_benfefits']))
					{{Form::checkbox('additional_benfefits[]','Currently not offering Benefits but interested', true)}}
				@else
					{{Form::checkbox('additional_benfefits[]','Currently not offering Benefits but interested', false)}}
				@endif
				{{Form::label('additional_benfefits', 'Currently not offering Benefits but interested')}}	<br />	
				
				@if(in_array('Do not wish to offer Benefits', $leadData['additional_benfefits']))
					{{Form::checkbox('additional_benfefits[]','Do not wish to offer Benefits', true)}}
				@else
					{{Form::checkbox('additional_benfefits[]','Do not wish to offer Benefits', false)}}
				@endif
				{{Form::label('additional_benfefits', 'Do not wish to offer Benefits')}}	<br />
				
				
					
		</div>
		
		<div class="form-group">	 
				{{Form::label('first_name', 'First Name')}}				
				{{Form::text('first_name',$leadData['first_name'],['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">	 
				{{Form::label('last_name', 'Last Name')}}			
				{{Form::text('last_name',$leadData['last_name'],['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">	 
				{{Form::label('email', 'Email')}}
				{{Form::email('email', $leadData['email_address'],['class' => 'form-control', 'required' => 'required'])}}
			</div>
		
		<div class="form-group">	 
				{{Form::label('company_name', 'Company Name')}}			
				{{Form::text('company_name',$leadData['company_name'],['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">	 
				{{Form::label('phone_number', 'Phone Number')}}			
				{{Form::text('phone_number',$leadData['phone_number'],['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">
				<strong>Preferred method of contact?</strong><br />
				@if(in_array('Phone', $leadData['preferred_method_contact']))
					{{Form::checkbox('preferred_method_contact[]','Phone', true)}}
				@else
					{{Form::checkbox('preferred_method_contact[]','Phone', false)}}
				@endif
				{{Form::label('preferred_method_contact', 'Phone')}}	<br />
				
				@if(in_array('Email', $leadData['preferred_method_contact']))
					{{Form::checkbox('preferred_method_contact[]','Email', true)}}
				@else
					{{Form::checkbox('preferred_method_contact[]','Email', false)}}
				@endif
				
				{{Form::label('preferred_method_contact', 'Email')}}	<br />
					
		</div>
		
		<div class="form-group">
				   {{Form::label('job_title', 'Job Title :')}}				
				   {{Form::select('job_title',$jobTittle, $leadData['job_title'], ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">
				   {{Form::label('work_indstry', 'Industry you work in:')}}				
				   {{Form::select('work_indstry',$workIN, $leadData['work_indstry'], ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		
		<div class="form-group">
				   {{Form::label('country', 'Country')}}				
				   {{Form::select('country', $country, $leadData['country'], ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		<div class="form-group">
				   {{Form::label('state', 'State')}}		
					{{Form::select('state', $state, $leadData['state'], ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		<div class="form-group">
				   {{Form::label('city', 'City')}}		
					{{Form::select('city', $city,$leadData['city'], ['class' => 'form-control', 'required' => 'required'])}}
		</div>
		<div class="form-group">
			{{Form::label('status', 'Status ')}}				
			{{Form::select('status',$status, $leadData['status'], ['class' => 'form-control'])}}
			{{Form::hidden('id',$leadData['id'])}}
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
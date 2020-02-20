@extends("companies.company_app")
@section("content")
<!-- Page Content -->
<div class="content content-boxed">
	<div class="row qst">
	<h3>View Prospect</h3>
		<div class="col-sm-12 col-lg-12">

			 <!-- Block Tabs Alternative Style -->
			<div class="block">
				<div class="block-content tab-content">
					<div class="col-lg-12 tab-pane active" id="btabs-alt-static-profile">	<div class="row">
						<div class="form-group">	
								 <div class="col-md-3">			
								{{Form::label('first_name', 'First Name')}}	
								</div>
								<div class="col-md-3">
								{{Form::label('first_name', $leadData['first_name'])}}	
								</div>
								 <div class="col-md-3">			
								{{Form::label('last_name', 'Last Name')}}				
								</div>
								<div class="col-md-3">
								{{Form::label('last_name', $leadData['last_name'])}}		
								</div>		
						</div>
						<div class="form-group">
							<div class="col-md-3">
								{{Form::label('email', 'Email')}}	
							</div>
							<div class="col-md-3">
								{{Form::label('email', $leadData['email_address'])}}
							</div>
							<div class="col-md-3">
								{{Form::label('company_name', 'Company Name')}}	
							</div>
							<div class="col-md-3">
								{{Form::label('phone_number', $leadData['company_name'])}}
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								{{Form::label('phone_number', 'Contact Number')}}
							</div>
							<div class="col-md-3">
								{{Form::label('phone_number', $leadData['phone_number'])}}
							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact">Preferred method of contact?</label>
							</div>
							<div class="col-md-3">
								@if(in_array('Phone', $leadData['preferred_method_contact']))
									{{Form::label('preferred_method_contact', 'Phone')}}	<br />
								@else									
								@endif								
								@if(in_array('Email', $leadData['preferred_method_contact']))
									{{Form::label('preferred_method_contact', 'Email')}}	<br />
								@else									
								@endif							
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								{{Form::label('job_title', 'Job Title :')}}
							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact">{{Form::select('job_title',$jobTittle, $leadData['job_title'], ['class' => 'form-control', ' disabled'=>' disabled'])}}</label>
							</div>
							<div class="col-md-3">
								{{Form::label('work_indstry', 'Industry you work in:')}}
							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact">{{Form::select('work_indstry',$workIN, $leadData['work_indstry'], ['class' => 'form-control',' disabled'=>' disabled'])}}
								</label>								
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								{{Form::label('country', 'Country')}}
							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact">{{Form::select('country',$country, $leadData['country'], ['class' => 'form-control',' disabled'=>' disabled'])}}
								</label>
							</div>
							<div class="col-md-3">
								{{Form::label('state', 'State')}}
							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact">{{Form::select('state',$state, $leadData['state'], ['class' => 'form-control',' disabled'=>' disabled'])}}
								</label>								
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								{{Form::label('city', 'City')}}
							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact">{{Form::select('city',$city, $leadData['city'], ['class' => 'form-control',' disabled'=>' disabled'])}}
								</label>
							</div>
							<div class="col-md-3">
								{{Form::label('status', 'Status Time')}}	
							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact">{{Form::select('status',$status, $leadData['status'], ['class' => 'form-control','disabled'=>'disabled'])}}
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								{{Form::label('service_type', ' What type of services are you interested in? (Select any one)')}}								
							</div>
							<div class="col-md-6">
								@if($leadData['service_type'] == 'PEO')
									{{Form::label('service_type', 'PEO (Professional Employer Organization)')}}<br />
								@else									
								@endif								
								@if($leadData['service_type'] == 'HR')
									{{Form::label('service_type', 'HR Outsourcing')}}<br />
								@else									
								@endif
							</div>							
						</div>
						<div class="form-group">
							<div class="col-md-3">
								{{Form::label('total_employee', ' Number Of Employees')}}	
							</div>
							<div class="col-md-3">
								{{Form::label('total_employee', $leadData['total_employee'])}}
							</div>
							<div class="col-md-3">
								{{Form::label('expected_decision_time', 'When do you expect to make a decision?')}}	
							</div>
							<div class="col-md-3">
							@if($leadData['expected_decision_time'] == 'ASAP')
								{{Form::label('expected_decision_time', 'ASAP')}}<br />
							@else						
							@endif					
					
							@if($leadData['expected_decision_time'] == 'In one month')
								{{Form::label('expected_decision_time', 'In one month')}}<br />
							@else
								
							@endif					
					
							@if($leadData['expected_decision_time'] == 'In two months or more')
								{{Form::label('expected_decision_time', 'In two months or more')}}<br />
							@else						
							@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								{{Form::label('reason', 'What is the main reason for your interest in services?')}}								
							</div>
							<div class="col-md-6">
								@if(in_array(1, $leadData['reason']))	
									{{Form::label('reason', 'Workers Compensation Coverage')}} <br />
								@else				
								@endif
							
								@if(in_array(2, $leadData['reason']))
									{{Form::label('reason', ' Payroll/Technology')}}	<br />
								@else					
								@endif
							
								@if(in_array(3, $leadData['reason']))
									{{Form::label('reason', ' Multi-state')}}	<br />
								@else					
								@endif
							
								@if(in_array(4, $leadData['reason']))
									{{Form::label('reason', 'Currently with a Peo and Shopping')}}	<br />
								@else					
								@endif			
								
								@if(in_array(5, $leadData['reason']))
									{{Form::label('reason', 'HR/Compliance')}}	<br />
								@else					
								@endif				
								
								@if(in_array(6, $leadData['reason']))
									{{Form::label('reason', 'Time and Attendance')}}	<br />
								@else					
								@endif				
								
								@if(in_array(7, $leadData['reason']))
									{{Form::label('reason', ' Other')}}	<br />
								@else					
								@endif
							</div>							
						</div>
						<div class="form-group">
							<div class="col-md-6">
								{{Form::label('additional_benfefits', 'What additional benefits (if any) would you like to provide through the PEO?')}}								
							</div>
							<div class="col-md-6">
								@if(in_array('Group medical/ dental/ vision insurance', $leadData['additional_benfefits']))
									{{Form::label('additional_benfefits', 'Group medical/ dental/ vision insurance')}}	<br />
								@else					
								@endif				
								
								@if(in_array('Group life insurance', $leadData['additional_benfefits']))
									{{Form::label('additional_benfefits', 'Group life insurance')}}	<br />
								@else					
								@endif			
								
								@if(in_array('Short and long-term disability', $leadData['additional_benfefits']))
									{{Form::label('additional_benfefits', 'Short and long-term disability')}}	<br />
								@else					
								@endif				
								
								@if(in_array('Flexible Spending Account (FSA) or Health Savings Account (HSA)', $leadData['additional_benfefits']))
									{{Form::label('additional_benfefits', 'Flexible Spending Account (FSA) or Health Savings Account (HSA)')}}	<br />
								@else					
								@endif				
								
								@if(in_array('401(k) programs', $leadData['additional_benfefits']))
									{{Form::label('additional_benfefits', '401(k) programs')}}	<br />
								@else					
								@endif				
								
								@if(in_array('Currently not offering Benefits but interested', $leadData['additional_benfefits']))
									{{Form::label('additional_benfefits', 'Currently not offering Benefits but interested')}}	<br />	
								@else					
								@endif			
								
								@if(in_array('Do not wish to offer Benefits', $leadData['additional_benfefits']))
									{{Form::label('additional_benfefits', 'Do not wish to offer Benefits')}}	<br />
								@else					
								@endif
							</div>							
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-4">
								<button class="btn btn-block btn-primary" type="button" onclick="download_Questionnaire_form_data({{ $leadData['id'] }});"><i class="si si-login pull-right"></i> Download Request Questionnaire</button>
							</div>
							<div class="col-md-4">
								<button class="btn btn-block btn-primary" type="button" onclick="download_Compensation_form_data({{ $leadData['id'] }});"><i class="si si-login pull-right"></i> Download Workers Compensation Form</button>
							</div>
							<div class="col-md-4">
								<button class="btn btn-block btn-primary" type="submit" onclick="window.history.go(-1); return false;"><i class="si si-login pull-right"></i> Back</button>
							</div>
						</div>
						<?php if(isset($getQuotes) && count($getQuotes)>0){?>
							<div class="form-group">
								<div class="col-md-4">
									<button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#viewQuote">View Quote</button>
								</div>
							</div>
						<?php } else {?>
							<div class="form-group">
								<div class="col-md-4">
									<button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#sendQuote">Send Quote</button>
								</div>
							</div>
						<?php } ?>
					</div>				

					</div>					
				</div>
			</div>
			<!-- END Block Tabs Alternative Style -->
		</div>
		
	</div>
</div>
<?php if(isset($getQuotes) && count($getQuotes)>0){?>
<div class="modal fade" id="viewQuote" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">View Your Quotes</h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-lg-12" id="alert_message" style="display:none;"></div>
			<div class="col-lg-12">
				<div class="form-group">	 
					<div class="col-lg-3">
						{{Form::label('quote_title', 'Title')}}	<span class="error" style="color: red;">*</span>
					</div>
					<div class="col-lg-9">
						{{Form::label('quote_title', @$getQuotes[0]->quote_title)}}
					</div>
				</div> 
			</div>
			<div class="col-lg-12">
				<div class="form-group">	 
					<div class="col-lg-3">
						{{Form::label('quote_description', 'Description')}}<span class="error" style="color: red;">*</span>
					</div>
					<div class="col-lg-9">
						{{Form::label('quote_description', @$getQuotes[0]->quote_description)}}
					</div>										
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">	 
					<div class="col-lg-3">
						{{Form::label('quote_attachment', 'Docs')}}<span class="error" style="color: red;">*</span>
					</div>
					<div class="col-lg-9">
						<?php if((@$getQuotes[0]->document != '')){?>
						<a target="_blank" href="{{ URL::to('/') }}/quotes/<?php echo @$getQuotes[0]->document;?>">
							Click to View
						</a>
						<?php } ?>
					</div>										
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">	 
					<div class="col-lg-3">
						{{Form::label('quote_status', 'Status')}}<span class="error" style="color: red;">*</span>
					</div>
					<div class="col-lg-9">
						<?php if(@$getQuotes[0]->quote_status==0){
							echo "Pending";
						} elseif(@$getQuotes[0]->quote_status==1) { 
							echo "Approved";
						} else {
							echo "Rejected";
						}?>
					</div>										
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <div class="row">
			<div class="form-group">
				<div class="col-md-6">&nbsp;</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-block btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="modal fade" id="sendQuote" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="favoritesModalLabel">Send Your Quotes</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(array('url' => 'company/SendQuote','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'quoteform','role'=>'form','file'=>true,'enctype'=>'multipart/form-data')) !!}		
		<?php $userId = Auth::user()->id;					
		$usertype = Auth::user()->usertype;?>
		<input type="hidden" name="leadid" value="{{ $leadData['id'] }}" required>
		<input type="hidden" name="sender_id" value="<?php echo @$userId;?>" required>
		<input type="hidden" name="sender_type" value="<?php echo @$usertype;?>" required>
		<input type="hidden" name="reciever_id" value="{{ $leadData['user_id'] }}" required>
		<div class="row">
			<div class="col-lg-12" id="alert_message" style="display:none;"></div>
			<div class="col-lg-12">
				<div class="form-group">	 
					<div class="col-lg-3">
						{{Form::label('quote_title', 'Title')}}	<span class="error" style="color: red;">*</span>
					</div>
					<div class="col-lg-9">
						{{Form::text('quote_title','',['class' => 'form-control', 'required' => 'required'])}}
					</div>
				</div> 
			</div>
			<div class="col-lg-12">
				<div class="form-group">	 
					<div class="col-lg-3">
						{{Form::label('quote_description', 'Description')}}<span class="error" style="color: red;">*</span>
					</div>
					<div class="col-lg-9">
						{{Form::textarea('quote_description','',['class' => 'form-control', 'required' => 'required'])}}
					</div>										
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">	 
					<div class="col-lg-3">
						{{Form::label('quote_attachment', 'Docs')}}<span class="error" style="color: red;">*</span>
					</div>
					<div class="col-lg-9">
						<?php echo Form::file('quote_attachment',array('class' => 'form-control', 'required' => 'required'));?>
					</div>										
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<div class="col-md-6">&nbsp;</div>
					<div class="col-md-6">
						<input type="submit" name="submitquote" value="Send" id="submitquote" class="btn btn-block btn-primary" >
						<!--onclick="return Send_Quote();"-->
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!} 
      </div>
      <div class="modal-footer">
        <div class="row">
			<div class="form-group">
				<div class="col-md-6">&nbsp;</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-block btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Page Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javaScript">
$(document).ready(function() {
	$("#quoteform").submit(function(e) {
		e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			type: "POST",
			data: formData,
			cache:false,
			cache:false,
			contentType: false,
			processData: false,
			url: "/company/SendQuote",
			dataType: "json",
			success: function(response) {
				if(response.success){
					$('#alert_message').html(response.message);
					$('#alert_message').css('color','green');
					$('#alert_message').show();
				} else {				
					if(response.error_msg){
						var strings = '';
						var array =  $.map(response.error_msg, function(value){
							strings+= '<p>'+value+'</p>';					
						});
						$('#alert_message').html(strings);
					} else {
						$('#alert_message').html(response.message);
					}					
					$('#alert_message').show();
					$('#alert_message').css('color','#d30000');
					setTimeout(function() {
						$('#alert_message').fadeOut('fast');
					}, 10000);
				}
			}
		});
	});
});
function download_Questionnaire_form_data(formID){
	$.ajax({
	  type: "POST",
	  url: "/company/downloadPdf",
	  data:{'formid': formID,'form_name':'Questionnaire_form'},	  
	  dataType: 'json',
	  cache: false,
	  success: function(response, status, xhr){	  
		  if( response.success == true && status == 'success' ){
			  if( response.filepath != '' ){
				var a = document.createElement('A');
				a.href = response.filepath;
				a.class = 'download_link';
				a.download = response.filepath.substr(response.filepath.lastIndexOf('/') + 1);
				document.body.appendChild(a);
				a.click();
			  }
		  }else{
			  alert('Some Error Occured!');
		  }
	  }
	});	
}
function download_Compensation_form_data(formID){
	$.ajax({
	  type: "POST",
	  url: "/company/downloadPdf",
	  data:{'formid': formID,'form_name':'Compensation_form'},	  
	  dataType: 'json',
	  cache: false,
	  success: function(response, status, xhr){	  
		  if( response.success == true && status == 'success' ){
			  if( response.filepath != '' ){
				var a = document.createElement('A');
				a.href = response.filepath;
				a.class = 'download_link';
				a.download = response.filepath.substr(response.filepath.lastIndexOf('/') + 1);
				document.body.appendChild(a);
				a.click();
			  }
		  }else{
			  alert('Some Error Occured!');
		  }
	  }
	});
}
</script>            
@endsection
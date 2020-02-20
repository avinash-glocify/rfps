<?php $__env->startSection("content"); ?>
<!-- Page Content -->
<div class="content content-boxed">
	<div class="row qst">
		<h3>View Prospect</h3>
		<div class="col-sm-12 col-lg-12">
			 <!-- Block Tabs Alternative Style -->
			<div class="block">
				<div class="block-content tab-content">
					<div class="col-lg-12 tab-pane active" id="btabs-alt-static-profile">
					<div class="row">
						<div class="form-group">	
								 <div class="col-md-3">			
								<?php echo e(Form::label('first_name', 'First Name')); ?>	
								</div>
								<div class="col-md-3">
								<?php echo e(Form::label('first_name', $leadData['first_name'])); ?>	
								</div>
								 <div class="col-md-3">			
								<?php echo e(Form::label('last_name', 'Last Name')); ?>				
								</div>
								<div class="col-md-3">
								<?php echo e(Form::label('last_name', $leadData['last_name'])); ?>		
								</div>		
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<?php echo e(Form::label('email', 'Email')); ?>	
							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('email', $leadData['email_address'])); ?>

							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('company_name', 'Company Name')); ?>	
							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('phone_number', $leadData['company_name'])); ?>

							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<?php echo e(Form::label('phone_number', 'Contact Number')); ?>

							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('phone_number', $leadData['phone_number'])); ?>

							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact">Preferred method of contact?</label>
							</div>
							<div class="col-md-3">
								<?php if(in_array('Phone', $leadData['preferred_method_contact'])): ?>
									<?php echo e(Form::label('preferred_method_contact', 'Phone')); ?>	<br />
								<?php else: ?>									
								<?php endif; ?>								
								<?php if(in_array('Email', $leadData['preferred_method_contact'])): ?>
									<?php echo e(Form::label('preferred_method_contact', 'Email')); ?>	<br />
								<?php else: ?>									
								<?php endif; ?>							
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<?php echo e(Form::label('job_title', 'Job Title :')); ?>

							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact"><?php echo e(Form::select('job_title',$jobTittle, $leadData['job_title'], ['class' => 'form-control', ' disabled'=>' disabled'])); ?></label>
							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('work_indstry', 'Industry you work in:')); ?>

							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact"><?php echo e(Form::select('work_indstry',$workIN, $leadData['work_indstry'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>

								</label>								
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<?php echo e(Form::label('country', 'Country')); ?>

							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact"><?php echo e(Form::select('country',$country, $leadData['country'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>

								</label>
							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('state', 'State')); ?>

							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact"><?php echo e(Form::select('state',$state, $leadData['state'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>

								</label>								
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<?php echo e(Form::label('city', 'City')); ?>

							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact"><?php echo e(Form::select('city',$city, $leadData['city'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>

								</label>
							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('status', 'Status Time')); ?>	
							</div>
							<div class="col-md-3">
								<label for="preferred_method_contact"><?php echo e(Form::select('status',$status, $leadData['status'], ['class' => 'form-control','disabled'=>'disabled'])); ?>

							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<?php echo e(Form::label('service_type', ' What type of services are you interested in? (Select any one)')); ?>								
							</div>
							<div class="col-md-6">
								<?php if($leadData['service_type'] == 'PEO'): ?>
									<?php echo e(Form::label('service_type', 'PEO (Professional Employer Organization)')); ?><br />
								<?php else: ?>									
								<?php endif; ?>								
								<?php if($leadData['service_type'] == 'HR'): ?>
									<?php echo e(Form::label('service_type', 'HR Outsourcing')); ?><br />
								<?php else: ?>									
								<?php endif; ?>
							</div>							
						</div>
						<div class="form-group">
							<div class="col-md-3">
								<?php echo e(Form::label('total_employee', ' Number Of Employees')); ?>	
							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('total_employee', $leadData['total_employee'])); ?>

							</div>
							<div class="col-md-3">
								<?php echo e(Form::label('expected_decision_time', 'When do you expect to make a decision?')); ?>	
							</div>
							<div class="col-md-3">
							<?php if($leadData['expected_decision_time'] == 'ASAP'): ?>
								<?php echo e(Form::label('expected_decision_time', 'ASAP')); ?><br />
							<?php else: ?>						
							<?php endif; ?>					
					
							<?php if($leadData['expected_decision_time'] == 'In one month'): ?>
								<?php echo e(Form::label('expected_decision_time', 'In one month')); ?><br />
							<?php else: ?>
								
							<?php endif; ?>					
					
							<?php if($leadData['expected_decision_time'] == 'In two months or more'): ?>
								<?php echo e(Form::label('expected_decision_time', 'In two months or more')); ?><br />
							<?php else: ?>						
							<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<?php echo e(Form::label('reason', 'What is the main reason for your interest in services?')); ?>								
							</div>
							<div class="col-md-6">
								<?php if(in_array(1, $leadData['reason'])): ?>	
									<?php echo e(Form::label('reason', 'Workers Compensation Coverage')); ?> <br />
								<?php else: ?>				
								<?php endif; ?>
							
								<?php if(in_array(2, $leadData['reason'])): ?>
									<?php echo e(Form::label('reason', ' Payroll/Technology')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>
							
								<?php if(in_array(3, $leadData['reason'])): ?>
									<?php echo e(Form::label('reason', ' Multi-state')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>
							
								<?php if(in_array(4, $leadData['reason'])): ?>
									<?php echo e(Form::label('reason', 'Currently with a Peo and Shopping')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>			
								
								<?php if(in_array(5, $leadData['reason'])): ?>
									<?php echo e(Form::label('reason', 'HR/Compliance')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>				
								
								<?php if(in_array(6, $leadData['reason'])): ?>
									<?php echo e(Form::label('reason', 'Time and Attendance')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>				
								
								<?php if(in_array(7, $leadData['reason'])): ?>
									<?php echo e(Form::label('reason', ' Other')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>
							</div>							
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<?php echo e(Form::label('additional_benfefits', 'What additional benefits (if any) would you like to provide through the PEO?')); ?>								
							</div>
							<div class="col-md-6">
								<?php if(in_array('Group medical/ dental/ vision insurance', $leadData['additional_benfefits'])): ?>
									<?php echo e(Form::label('additional_benfefits', 'Group medical/ dental/ vision insurance')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>				
								
								<?php if(in_array('Group life insurance', $leadData['additional_benfefits'])): ?>
									<?php echo e(Form::label('additional_benfefits', 'Group life insurance')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>			
								
								<?php if(in_array('Short and long-term disability', $leadData['additional_benfefits'])): ?>
									<?php echo e(Form::label('additional_benfefits', 'Short and long-term disability')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>				
								
								<?php if(in_array('Flexible Spending Account (FSA) or Health Savings Account (HSA)', $leadData['additional_benfefits'])): ?>
									<?php echo e(Form::label('additional_benfefits', 'Flexible Spending Account (FSA) or Health Savings Account (HSA)')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>				
								
								<?php if(in_array('401(k) programs', $leadData['additional_benfefits'])): ?>
									<?php echo e(Form::label('additional_benfefits', '401(k) programs')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>				
								
								<?php if(in_array('Currently not offering Benefits but interested', $leadData['additional_benfefits'])): ?>
									<?php echo e(Form::label('additional_benfefits', 'Currently not offering Benefits but interested')); ?>	<br />	
								<?php else: ?>					
								<?php endif; ?>			
								
								<?php if(in_array('Do not wish to offer Benefits', $leadData['additional_benfefits'])): ?>
									<?php echo e(Form::label('additional_benfefits', 'Do not wish to offer Benefits')); ?>	<br />
								<?php else: ?>					
								<?php endif; ?>
							</div>							
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-4">
								<button class="btn btn-block btn-primary" type="button" onclick="download_Questionnaire_form_data(<?php echo e($leadData['id']); ?>);"><i class="si si-login pull-right"></i> Download Request Questionnaire</button>
							</div>
							<div class="col-md-4">
								<button class="btn btn-block btn-primary" type="button" onclick="download_Compensation_form_data(<?php echo e($leadData['id']); ?>);"><i class="si si-login pull-right"></i> Download Workers Compensation Form</button>
							</div>
							<div class="col-md-4">
							<button class="btn btn-block btn-primary" type="submit" onclick="window.history.go(-1); return false;"><i class="si si-login pull-right"></i> Back</button>
						</div>
						</div>
					</div>
					
				</div>                                    
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javaScript">
function download_Questionnaire_form_data(formID){
	$.ajax({
	  type: "POST",
	  url: "/admin/downloadPdf",
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
	  url: "/admin/downloadPdf",
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
<!-- END Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_applist", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
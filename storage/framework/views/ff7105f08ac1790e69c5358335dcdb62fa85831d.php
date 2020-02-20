<?php $__env->startSection("content"); ?>
<style>
.autocomplete-items {position: absolute;border: 1px solid #d4d4d4;
  border-bottom: none;border-top: none;z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
 top: 100%;left: 0;right: 0;overflow: scroll;height: 300px;}

.autocomplete-items div {padding: 10px;cursor: pointer;background-color: #fff; border-bottom: 1px solid #d4d4d4; }

/*when hovering an item:*/
.autocomplete-items div:hover {background-color: #e9e9e9; }

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {background-color: DodgerBlue !important;color: #ffffff;}
</style>
                <!-- Page Content -->
                <div class="content content-boxed">
                    <div class="row">
						
                        <div class="col-sm-12 col-lg-12">

                             <!-- Block Tabs Alternative Style -->
                            <div class="block">
                                <div class="block-content tab-content">
 

                                    <div class="col-lg-12 tab-pane active" id="btabs-alt-static-profile">
										<div id="alert-danger"></div>
                                        <?php if(count($errors) > 0): ?>
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <ul>
                                                <?php foreach($errors->all() as $error): ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
									
                                 <?php if(Session::has('flash_message')): ?>
                                        <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo e(Session::get('flash_message')); ?>

                                        </div>
                                    <?php endif; ?>
	<div class="row" >	
		<div id="first_form">
		<?php echo Form::open(array('url' => 'broker/leadRegister','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'leadform1st','role'=>'form','enctype'=>'multipart/form-data')); ?>

		
		
		<div class="row">
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('first_name', 'First Name')); ?>	<span class="error" style="color: red;">*</span>			
				<?php echo e(Form::text('first_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div> 
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('last_name', 'Last Name')); ?><span class="error" style="color: red;">*</span>			
				<?php echo e(Form::text('last_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('email', 'Email')); ?><span class="error" style="color: red;">*</span>
				<?php echo e(Form::email('email', '',['class' => 'form-control', 'required' => 'required'])); ?>

			</div>
			</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('company_name', 'Company Name')); ?>	<span class="error" style="color: red;">*</span>	
				<?php echo e(Form::text('company_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('phone_number', 'Phone Number')); ?>	<span class="error" style="color: red;">*</span>		
				<?php echo e(Form::text('phone_number','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
				<strong>Preferred method of contact?</strong><span class="error" style="color: red;">*</span><br />
				<?php echo e(Form::checkbox('preferred_method_contact[]','Phone', false)); ?>

				<?php echo e(Form::label('preferred_method_contact', 'Phone')); ?>	<br />
				
				<?php echo e(Form::checkbox('preferred_method_contact[]','Email', false)); ?>

				<?php echo e(Form::label('preferred_method_contact', 'Email')); ?>	<br />
					
		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
				   <?php echo e(Form::label('job_title', 'Job Title :')); ?>	<span class="error" style="color: red;">*</span>			
				   <?php echo e(Form::select('job_title',$jobTittle, null, ['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
				   <?php echo e(Form::label('work_indstry', 'Industry you work in:')); ?><span class="error" style="color: red;">*</span>				
				   <?php echo e(Form::select('work_indstry',$workIN, null, ['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
				   <?php echo e(Form::label('country', 'Country')); ?><span class="error" style="color: red;">*</span>				
				   <?php echo e(Form::select('country',$country, null, ['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		<div class="form-group">
				   <?php echo e(Form::label('state', 'State')); ?>	<span class="error" style="color: red;">*</span>	
					<?php echo e(Form::select('state',$state, null, ['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
				   <?php echo e(Form::label('city', 'City')); ?>	<span class="error" style="color: red;">*</span>	
					<?php echo e(Form::select('city',$city,null, ['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		 <div class="form-group">
			<?php echo e(Form::label('total_employee', 'Number Of Employees')); ?>	<span class="error" style="color: red;">*</span>			
			<?php echo e(Form::number('total_employee','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div> 
		</div>
		</div>
		<div class="row">
		<div class="col-md-6 col-lg-6">
		<div class="form-group">
					<strong>What type of services are you interested in? (Select any one)</strong><span class="error" style="color: red;">*</span><br />
					<?php echo e(Form::label('service_type', 'PEO (Professional Employer Organization)')); ?>

					<?php echo e(Form::radio('service_type', 'PEO' ,'false')); ?><br />
					<?php echo e(Form::label('service_type', 'HR Outsourcing')); ?>

					<?php echo e(Form::radio('service_type', 'HR', 'false')); ?>

		</div>		
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong>When do you expect to make a decision?</strong><span class="error" style="color: red;">*</span><br />
					<?php echo e(Form::label('expected_decision_time', 'ASAP')); ?>

					<?php echo e(Form::radio('expected_decision_time', 'ASAP' ,'false')); ?><br />
					<?php echo e(Form::label('expected_decision_time', 'In one month')); ?>

					<?php echo e(Form::radio('expected_decision_time', 'In one month', 'false')); ?><br />
					<?php echo e(Form::label('expected_decision_time', 'In two months or more')); ?>

					<?php echo e(Form::radio('expected_decision_time', 'In two months or more', 'false')); ?><br />
		</div>	 
		</div>
		</div>
		
		 
		<div class="row">
		<div class="col-lg-6">
		<div class="form-group">
				<strong>What is the main reason for your interest in services?</strong><span class="error" style="color: red;">*</span><br />
				<?php echo e(Form::checkbox('reason[]',1, false)); ?>

				<?php echo e(Form::label('reason', 'Workers Compensation Coverage')); ?>	<br />
				
				<?php echo e(Form::checkbox('reason[]',2, false)); ?>

				<?php echo e(Form::label('reason', 'Payroll/Technology')); ?>	<br />
				
				<?php echo e(Form::checkbox('reason[]',3, false)); ?>

				<?php echo e(Form::label('reason', 'Multi-state')); ?>	<br />
				
				<?php echo e(Form::checkbox('reason[]',4, false)); ?>

				<?php echo e(Form::label('reason', 'Currently with a Peo and Shopping')); ?>	<br />
				
				<?php echo e(Form::checkbox('reason[]',5, false)); ?>

				<?php echo e(Form::label('reason', 'HR/Compliance')); ?>	<br />
				
				<?php echo e(Form::checkbox('reason[]',6, false)); ?>

				<?php echo e(Form::label('reason', 'Time and Attendance')); ?>	<br />	
				
				<?php echo e(Form::checkbox('reason[]',7, false)); ?>

				<?php echo e(Form::label('reason', ' Other')); ?>	<br />
					
		</div>
		</div>		
		
		
		<div class="col-lg-6">
		<div class="form-group">
				<strong>What additional benefits (if any) would you like to provide through the PEO?</strong><span class="error" style="color: red;">*</span><br />
				<?php echo e(Form::checkbox('additional_benfefits[]','Group medical/ dental/ vision insurance', false)); ?>

				<?php echo e(Form::label('additional_benfefits', 'Group medical/ dental/ vision insurance')); ?>	<br />
				
				<?php echo e(Form::checkbox('additional_benfefits[]','Group life insurance', false)); ?>

				<?php echo e(Form::label('additional_benfefits', 'Group life insurance')); ?>	<br />
				
				<?php echo e(Form::checkbox('additional_benfefits[]','Short and long-term disability', false)); ?>

				<?php echo e(Form::label('additional_benfefits', 'Short and long-term disability')); ?>	<br />
				
				<?php echo e(Form::checkbox('additional_benfefits[]','Flexible Spending Account (FSA) or Health Savings Account (HSA)', false)); ?>

				<?php echo e(Form::label('additional_benfefits', 'Flexible Spending Account (FSA) or Health Savings Account (HSA)')); ?>	<br />
				
				<?php echo e(Form::checkbox('additional_benfefits[]','401(k) programs', false)); ?>

				<?php echo e(Form::label('additional_benfefits', '401(k) programs')); ?>	<br />
				
				<?php echo e(Form::checkbox('additional_benfefits[]','Currently not offering Benefits but interested', false)); ?>

				<?php echo e(Form::label('additional_benfefits', 'Currently not offering Benefits but interested')); ?>	<br />	
				
				<?php echo e(Form::checkbox('additional_benfefits[]','Do not wish to offer Benefits', false)); ?>

				<?php echo e(Form::label('additional_benfefits', 'Do not wish to offer Benefits')); ?>	<br />
					
		</div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-sm-12 col-md-12">
		<div class="form-group">
					<button class="btn btn-block btn-primary" type="button" onclick="show_request_for_proposal();"><i class="si si-login pull-right"></i> Next</button>
		</div>
		</div>
		</div>
		<?php echo Form::close(); ?> 
		</div>
		
		<!----->
		<div style="display:none" id="request_for_proposal">
		<?php echo Form::open(array('url' => 'broker/request_for_proposal','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'request_for_proposalform','role'=>'form')); ?>

		<div class="row">
		<div class="col-sm-12 col-lg-12">
		<h4>Request for Proposal Information Questionnaire</h4>
		<p>Please e-mail to sales@netpeo.com or fax at678-377-9699 </p>
		</div>
		<div class="col-sm-12 col-lg-12">
		<div class="form-group">	 
				<?php echo e(Form::label('legal_name_dba', 'Legal Business Name and DBA:')); ?>	<span class="error" style="color: red;">*</span>		
				<?php echo e(Form::text('legal_name_dba','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('Street_Address', 'Street Address:')); ?>	<span class="error" style="color: red;">*</span>		
				<?php echo e(Form::text('Street_Address','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('city_state_zip', 'City/State/Zip:')); ?><span class="error" style="color: red;">*</span>			
				<?php echo e(Form::text('city_state_zip','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('Phone', 'Phone:')); ?>		<span class="error" style="color: red;">*</span>	
				<?php echo e(Form::text('Phone','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('Fax', 'Fax:')); ?>		<span class="error" style="color: red;">*</span>	
				<?php echo e(Form::text('Fax','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('Contact_Name', 'Contact Name: :')); ?>	<span class="error" style="color: red;">*</span>		
				<?php echo e(Form::text('Contact_Name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('Title', 'Title: :')); ?>	<span class="error" style="color: red;">*</span>		
				<?php echo e(Form::text('Title','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('Industry_desc', 'Industry (description of business):')); ?>		<span class="error" style="color: red;">*</span>	
				<?php echo e(Form::text('Industry_desc','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('Fed_Tax_id', 'Fed Tax ID #:')); ?>	<span class="error" style="color: red;">*</span>		
				<?php echo e(Form::text('Fed_Tax_id','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('Years_inBusiness', 'Years in Business: ')); ?>		<span class="error" style="color: red;">*</span>	
				<?php echo e(Form::text('Years_inBusiness','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-sm-6 col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('SIC_Code', 'SIC Code:')); ?>	<span class="error" style="color: red;">*</span>		
				<?php echo e(Form::text('SIC_Code','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		</div>
		 
		<div class="payrolltable">
		
		<h5>Payroll & Workers Compensation Information:</h5>
<p>Fill out table below or simply attach workers’ compensation declaration page/accord form for desired Information</p>
		<div class="col-lg-3">Job Description</div>
		<div class="col-lg-2">Class Code</div>
		<div class="col-lg-2">Rate/$100</div>
		<div class="col-lg-2">Annual Payroll </div>
		<div class="col-lg-2"># of EE’s</div>
		
		<div class="clearfix"></div>
		 
		<div class="col-lg-3"><input type="text" id="JobDescription1" name="JobDescription1" value="" ></div>
		<div class="col-lg-2"> 
                    <input type="text" id="classCode1"  name="ClassCode1" value="" >
                </div>
		<div class="col-lg-2"><input type="text" name="Rate100_1" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="AnnualPayroll1" value="" ></div>
		<div class="col-lg-2"><input type="text" name="noofEE1" value="" ></div>
		<div class="clearfix"></div>
		
		<div class="col-lg-3"><input type="text" id="JobDescription2" name="JobDescription2" value="" ></div>
		<div class="col-lg-2"><input id="ClassCode2ww" type="text"  name="ClassCode2" value="" ></div>
		<div class="col-lg-2"><input type="text" name="Rate100_2" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="AnnualPayroll2" value="" ></div>
		<div class="col-lg-2"><input type="text" name="noofEE2" value="" ></div>
		 <div class="clearfix"></div>
		 
		<div class="col-lg-3"><input type="text" id="JobDescription3" name="JobDescription3" value="" ></div>
		<div class="col-lg-2"><input type="text" id="classCode3"  name="ClassCode3" value="" ></div>
		<div class="col-lg-2"><input type="text" name="Rate100_3" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="AnnualPayroll3" value="" ></div>
		<div class="col-lg-2"><input type="text" name="noofEE3" value="" ></div>
		<div class="clearfix"></div>
		
		<div class="col-lg-3"><input type="text" id="JobDescription4" name="JobDescription4" value="" ></div>
		<div class="col-lg-2"><input type="text" id="ClassCode44"   name="ClassCode4" value="" ></div>
		<div class="col-lg-2"><input type="text" name="Rate100_4" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="AnnualPayroll4" value="" ></div>
		<div class="col-lg-2"><input type="text" name="noofEE4" value="" ></div>
		<div class="clearfix"></div>
		
		<div class="col-lg-3"><input type="text" id="JobDescription5" name="JobDescription5" value="" ></div>
		<div class="col-lg-2"><input type="text" id="classCode55"  name="ClassCode5" value="" ></div>
		<div class="col-lg-2"><input type="text" name="Rate100_5" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="AnnualPayroll5" value="" ></div>
		<div class="col-lg-2"><input type="text" name="noofEE5" value="" /></div>
		<div class="clearfix"></div>
		
		<div class="col-lg-3"><input type="text" id="JobDescription6" name="JobDescription6" value="" ></div>
		<div class="col-lg-2"><input type="text" id="ClassCode66"  name="ClassCode6" value="" ></div>
		<div class="col-lg-2"><input type="text" name="Rate100_6" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="AnnualPayroll6" value="" ></div>
		<div class="col-lg-2"><input type="text" name="noofEE6" value="" ></div>
		
		<div class="col-lg-3"><input type="text" id="JobDescription7" name="JobDescription7" value="" ></div>
		<div class="col-lg-2"><input type="text" id="ClassCode77"  name="ClassCode7" value="" ></div>
		<div class="col-lg-2"><input type="text" name="Rate100_7" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="AnnualPayroll7" value="" ></div>
		<div class="col-lg-2"><input type="text" name="noofEE7" value="" ></div>
		 <div class="clearfix"></div>
		
		<div class="col-lg-3">Example: Photographer</div>
		<div class="col-lg-2">4361</div>
		<div class="col-lg-2">1.08</div>
		<div class="col-lg-2">$ xx,xxx.xx </div>
		<div class="col-lg-2">5</div><hr>
		<div class="col-lg-3">Example: Clerical</div>
		<div class="col-lg-2">8810</div>
		<div class="col-lg-2">.35</div>
		<div class="col-lg-2">$ xx,xxx.xx </div>
		<div class="col-lg-2">5</div>
		
		<div class="clearfix"></div>
		
		<input type="hidden" id="lead_id_Questionnaire" name="lead_id_Questionnaire">
		</div>
		<div class="col-lg-6">
		<div class="form-group">
		<strong>Payroll Frequency:</strong><br />
				<?php echo e(Form::checkbox('PayrollFrequency[]','Weekly', false)); ?>

				<?php echo e(Form::label('PayrollFrequency', 'Weekly')); ?>	<br />
				
				<?php echo e(Form::checkbox('PayrollFrequency[]','Bi-weekly', false)); ?>

				<?php echo e(Form::label('PayrollFrequency', 'Bi-weekly')); ?>	<br />
				
				<?php echo e(Form::checkbox('PayrollFrequency[]','Semi-monthly', false)); ?>

				<?php echo e(Form::label('PayrollFrequency', 'Semi-monthly')); ?>	<br />
				
				<?php echo e(Form::checkbox('PayrollFrequency[]','Monthly', false)); ?>

				<?php echo e(Form::label('PayrollFrequency', 'Monthly')); ?>	<br />
					
		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('CurrentCostPayroll', 'Current Cost of Payroll:')); ?>			
				<?php echo e(Form::text('CurrentCostPayroll','',['class' => 'form-control', 'required' => 'required','placeholder'=>'payroll service, internal costs, etc...'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('CurrentofHR', 'Current Cost of HR:')); ?>			
				<?php echo e(Form::text('CurrentofHR','',['class' => 'form-control', 'required' => 'required','placeholder'=>'PEO, HR consulting, internal costs, etc...'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('CurrentStateUnemployment', 'Current State Unemployment Rate:')); ?>			
				<?php echo e(Form::text('CurrentStateUnemployment','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('WorkersCompensationModifier', 'Workers Compensation Modifier:')); ?>			
				<?php echo e(Form::text('WorkersCompensationModifier','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('DesiredStartDate', 'Desired Start Date:')); ?>			
				<?php echo e(Form::text('DesiredStartDate','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-12">
		<h5> General Benefit Information :</h5>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong>Does Employer Currently have Benefits? </strong><br />
					<?php echo e(Form::label('EmployerCurrentlyBenefits', 'yes')); ?>

					<?php echo e(Form::radio('EmployerCurrentlyBenefits', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('EmployerCurrentlyBenefits', 'no')); ?>

					<?php echo e(Form::radio('EmployerCurrentlyBenefits', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong>Does Employer Wish to Offer NetPEO HR Benefits?</strong><br />
					<?php echo e(Form::label('NetPEOHRBenefits', 'yes')); ?>

					<?php echo e(Form::radio('NetPEOHRBenefits', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('NetPEOHRBenefits', 'no')); ?>

					<?php echo e(Form::radio('NetPEOHRBenefits', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong>Does Employer Currently have a 401(k)? </strong><br />
					<?php echo e(Form::label('EmployerCurrently401', 'yes')); ?>

					<?php echo e(Form::radio('EmployerCurrently401', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('EmployerCurrently401', 'no')); ?>

					<?php echo e(Form::radio('EmployerCurrently401', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong>Does Employer Wish to Offer NetPEO HR 401(k)? </strong><br />
					<?php echo e(Form::label('NetPEOHR401', 'yes')); ?>

					<?php echo e(Form::radio('NetPEOHR401', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('NetPEOHR401', 'no')); ?>

					<?php echo e(Form::radio('NetPEOHR401', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-12">
		<p> <b> Final terms and rates are subject to underwriting. All quoted rates are based on the information provided. Items listed below will
be required prior to final underwriting. To insure a more accurate quote please provide these items with this RFP.</b></p>
<ul style="list-style-type: square;"> 
<li>State Unemployment Reports (last two quarters)</li>
<li>Health Insurance Invoice (if applicable)</li>
<li>Workers' Compensation Declaration page (Annual premium statement showing w/c codes, rates, experience modification, discounts)</li>
<li>3 Years of Workers' Compensation Loss Runs (valued to 60 days)</li>
<li> PEO Billing Statement (if current PEO client)
</li>
</ul>
		</div>
		<div class="form-group">
					<button class="btn btn-block btn-primary" type="button" onclick="work_compansation_form();"><i class="si si-login pull-right"></i> Next</button>
		</div>	
		<?php echo Form::close(); ?>

		</div>
		
		
		<div style="display:none" id="work_compansation_form">
		<?php echo Form::open(array('url' => 'broker/request_for_compansation','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'request_for_compansation','role'=>'form','enctype'=>'multipart/form-data')); ?>

		<div class="col-lg-12">
		<h5>WORKERS COMPENSATION APPLICATION</h5>
		</div>
		<hr>
		<div class="col-lg-6">
		
		<div class="form-group">
		  <?php echo Form::label('acc_agency_and_address','AGENCY NAME AND ADDRESS'); ?>

		  <?php echo Form::textarea('acc_agency_and_address',null,['class'=>'form-control','rows' => 4,]); ?>

		</div>
		</div>
		<input type="hidden" id="lead_WORKERSCOMPENSATION_id" name="lead_WORKERSCOMPENSATION_id">
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_producer_name', 'PRODUCER NAME:')); ?>			
				<?php echo e(Form::text('acc_producer_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_repersantive_name', 'CS REPRESENTATIVE NAME:')); ?>			
				<?php echo e(Form::text('acc_repersantive_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_agency_office_name', 'OFFICE PHONE (A/C, No, Ext):')); ?>			
				<?php echo e(Form::text('acc_agency_office_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_agency_mobile_name', 'MOBILE PHONE:')); ?>			
				<?php echo e(Form::text('acc_agency_mobile_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_agency_fax_no', 'FAX(A/C, No):')); ?>			
				<?php echo e(Form::text('acc_agency_fax_no','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<!--<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_agency_fax_no', 'FAX(A/C, No):')); ?>			
				<?php echo e(Form::text('acc_agency_fax_no','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>-->
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_agency_email', 'E-MAIL ADDRESS:')); ?>			
				<?php echo e(Form::text('acc_agency_email','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_agency_code', 'CODE:')); ?>			
				<?php echo e(Form::text('acc_agency_code','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_agency_sub_code', 'SUB CODE:')); ?>			
				<?php echo e(Form::text('acc_agency_sub_code','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_agency_customer_id', 'AGENCY CUSTOMER ID:')); ?>			
				<?php echo e(Form::text('acc_agency_customer_id','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		
		
		
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_company', 'Company')); ?>			
				<?php echo e(Form::text('acc_company','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_underwriter', 'UNDERWRITER')); ?>			
				<?php echo e(Form::text('acc_underwriter','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_applicant_name', 'APPLICANT NAME:')); ?>			
				<?php echo e(Form::text('acc_applicant_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_office_phone', 'OFFICE PHONE:')); ?>			
				<?php echo e(Form::text('acc_office_phone','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_mobile_phone', 'MOBILE PHONE:')); ?>			
				<?php echo e(Form::text('acc_mobile_phone','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		
		<div class="form-group">
		  <?php echo Form::label('acc_mailing_address','MAILING ADDRESS (including ZIP  + 4 or Canadian Postal Code)'); ?>

		  <?php echo Form::textarea('acc_mailing_address',null,['class'=>'form-control','rows' => 4,]); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_yrs_in_bus', 'YRS IN BUS:')); ?>			
				<?php echo e(Form::text('acc_yrs_in_bus','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		<div class="form-group">	 
				<?php echo e(Form::label('acc_sic', 'SIC:')); ?>			
				<?php echo e(Form::text('acc_sic','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_naics', 'NAICS:')); ?>			
				<?php echo e(Form::text('acc_naics','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_web_adderss', 'WEBSITE ADDRESS:')); ?>			
				<?php echo e(Form::text('acc_web_adderss','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_company_email_address', 'E-MAIL ADDRESS:')); ?>			
				<?php echo e(Form::text('acc_company_email_address','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		
		<div class="form-group">	 
				<?php echo e(Form::label('acc_company_credit_bureau_name', 'CREDIT BUREAU NAME:')); ?>			
				<?php echo e(Form::text('acc_company_credit_bureau_name','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
				<?php echo e(Form::checkbox('company_etra_details[]','SOLE PROPRIETOR', false)); ?>

				<?php echo e(Form::label('company_etra_details', 'SOLE PROPRIETOR')); ?>	<br />
				
				<?php echo e(Form::checkbox('company_etra_details[]','PARTNERSHIP', false)); ?>

				<?php echo e(Form::label('company_etra_details', 'PARTNERSHIP')); ?>	<br />
				
				<?php echo e(Form::checkbox('company_etra_details[]','SUBCHAPTER "S" CORP', false)); ?>

				<?php echo e(Form::label('company_etra_details', 'SUBCHAPTER "S" CORP')); ?>	<br />
				
				<?php echo e(Form::checkbox('company_etra_details[]','LLC', false)); ?>

				<?php echo e(Form::label('company_etra_details', 'LLC')); ?>	<br />
				
				<?php echo e(Form::checkbox('company_etra_details[]','JOINT VENTURE', false)); ?>

				<?php echo e(Form::label('company_etra_details', 'JOINT VENTURE')); ?>	<br />
				
				<?php echo e(Form::checkbox('company_etra_details[]','TRUST', false)); ?>

				<?php echo e(Form::label('company_etra_details', 'TRUST')); ?>	<br />
				
				<?php echo e(Form::checkbox('company_etra_details[]','OTHER', false)); ?>

				<?php echo e(Form::label('company_etra_details', 'OTHER')); ?>	<br />
				
				<?php echo e(Form::checkbox('company_etra_details[]','UNINCORPORATED ASSOCIATION', false)); ?>

				<?php echo e(Form::label('company_etra_details', 'UNINCORPORATED ASSOCIATION')); ?>	<br />
					
		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_company_id_number', 'ID NUMBER:')); ?>			
				<?php echo e(Form::text('acc_company_id_number','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_fedral_no', 'FEDERAL EMPLOYER ID NUMBER')); ?>			
				<?php echo e(Form::text('acc_fedral_no','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_ncci_risk_no', 'NCCI RISK ID NUMBER')); ?>			
				<?php echo e(Form::text('acc_ncci_risk_no','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_other_bureau_id', 'OTHER RATING BUREAU ID OR STATE EMPLOYER REGISTRATION NUMBER')); ?>			
				<?php echo e(Form::text('acc_other_bureau_id','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		
		
			<div class="col-lg-6">
		<div class="form-group">
		<strong>STATUS OF SUBMISSION</strong><br />
				<?php echo e(Form::checkbox('acc_status_submission[]','QUOTE', false)); ?>

				<?php echo e(Form::label('acc_status_submission', 'QUOTE')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_status_submission[]','ISSUE POLICY', false)); ?>

				<?php echo e(Form::label('acc_status_submission', 'ISSUE POLICY')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_status_submission[]','BOUND (Give date and/or attach copy)', false)); ?>

				<?php echo e(Form::label('acc_status_submission', 'BOUND (Give date and/or attach copy)')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_status_submission[]','ASSIGNED RISK (Attach ACORD 133)', false)); ?>

				<?php echo e(Form::label('acc_status_submission', 'ASSIGNED RISK (Attach ACORD 133)')); ?>	<br />
				
				
					
		</div>
		</div>
		
			<div class="col-lg-6">
		<div class="form-group">
		<strong>BILLING PLAN</strong><br />
				<?php echo e(Form::checkbox('acc_billing_plan[]','AGENCY BILL', false)); ?>

				<?php echo e(Form::label('acc_billing_plan', 'AGENCY BILL')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_billing_plan[]','DIRECT BILL', false)); ?>

				<?php echo e(Form::label('acc_billing_plan', 'DIRECT BILL')); ?>	<br />
				
				
				
					
		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
		<strong>PAYMENT PLAN</strong><br />
				<?php echo e(Form::checkbox('acc_payment_plan[]','ANNUAL', false)); ?>

				<?php echo e(Form::label('acc_payment_plan', 'ANNUAL')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_payment_plan[]','SEMI-ANNUAL', false)); ?>

				<?php echo e(Form::label('acc_payment_plan', 'SEMI-ANNUAL')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_payment_plan[]','QUARTERLY', false)); ?>

				<?php echo e(Form::label('acc_payment_plan', 'QUARTERLY')); ?>	<br />
					
		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
		<strong>AUDIT </strong><br />
				<?php echo e(Form::checkbox('acc_audit[]','AT EXPIRATION', false)); ?>

				<?php echo e(Form::label('acc_audit', 'AT EXPIRATION')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_audit[]','SEMI-ANNUAL', false)); ?>

				<?php echo e(Form::label('acc_audit', 'SEMI-ANNUAL')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_audit[]','QUARTERLY', false)); ?>

				<?php echo e(Form::label('acc_audit', 'QUARTERLY')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_audit[]','MONTHLY', false)); ?>

				<?php echo e(Form::label('acc_audit', 'MONTHLY')); ?>	<br />
					
		</div>
		</div>
		<div class="col-lg-12">
		<h4> POLICY INFORMATION</h4>
		</div>
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_PROPOSED_eff_date', 'PROPOSED EFF DATE')); ?>			
				<?php echo e(Form::text('acc_PROPOSED_eff_date','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_PROPOSED_exp_date', 'PROPOSED EXP DATE')); ?>			
				<?php echo e(Form::text('acc_PROPOSED_exp_date','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_annivertsary_date', 'NORMAL ANNIVERSARY RATING DATE')); ?>			
				<?php echo e(Form::text('acc_annivertsary_date','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_retro_plan', 'RETRO PLAN')); ?>			
				<?php echo e(Form::text('acc_retro_plan','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong>PARTICIPATING</strong><br />
					<?php echo e(Form::label('acc_PARTICIPATING', 'PARTICIPATING')); ?>

					<?php echo e(Form::radio('acc_PARTICIPATING', 'PARTICIPATING' ,'false')); ?><br />
					<?php echo e(Form::label('acc_PARTICIPATING', 'NON-PARTICIPATING')); ?>

					<?php echo e(Form::radio('acc_PARTICIPATING', 'NON-PARTICIPATING', 'false')); ?>

		</div>
		</div>
		
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_WORKERSCOMPENSATION_state', 'PART 1 - WORKERSCOMPENSATION (States)')); ?>			
				<?php echo e(Form::text('acc_WORKERSCOMPENSATION_state','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		
		<div class="col-lg-6">
		<div class="form-group">	
            <h6>PART 2 - EMPLOYER'S LIABILITY</h6>		
				<div class="col-lg-4">
				<?php echo e(Form::text('acc_par2_liblaty_each_accident','',['class' => 'form-control', 'required' => 'required','placeholder'=>'EACH ACCIDENT'])); ?>

				</div>
				<div class="col-lg-4">
				<?php echo e(Form::text('acc_par2_liblaty_diseases_pol','',['class' => 'form-control', 'required' => 'required','placeholder'=>'DISEASE-POLICY LIMIT '])); ?>

				</div>
				<div class="col-lg-4">
				<?php echo e(Form::text('acc_par2_liblaty_diseses_each_emp','',['class' => 'form-control', 'required' => 'required','placeholder'=>'DISEASE-EACH EMPLOYEE'])); ?>

				</div>
		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_OTHERSTATES_ins', 'PART 3 - OTHERSTATES INS')); ?>			
				<?php echo e(Form::text('acc_OTHERSTATES_ins','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_AMOUNT_na_wi', 'AMOUNT / %(N / A in WI)')); ?>			
				<?php echo e(Form::text('acc_AMOUNT_na_wi','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		<div class="col-lg-6">
		<div class="form-group">
		<strong>DEDUCTIBLES (N / A in WI) </strong><br />
				<?php echo e(Form::checkbox('acc_DEDUCTIBLES_wi[]','MEDICAL', false)); ?>

				<?php echo e(Form::label('acc_DEDUCTIBLES_wi', 'MEDICAL')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_DEDUCTIBLES_wi[]','INDEMNITY', false)); ?>

				<?php echo e(Form::label('acc_DEDUCTIBLES_wi', 'INDEMNITY')); ?>	<br />
				
					
		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
		<strong>OTHER COVERAGES</strong><br />
				<?php echo e(Form::checkbox('acc_other_coverage[]','U.S.L. & H', false)); ?>

				<?php echo e(Form::label('acc_other_coverage', 'U.S.L. & H')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_other_coverage[]','VOLUNTARY COMP', false)); ?>

				<?php echo e(Form::label('acc_other_coverage', 'VOLUNTARY COMP')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_other_coverage[]','FOREIGN COV', false)); ?>

				<?php echo e(Form::label('acc_other_coverage', 'FOREIGN COV')); ?>	<br />
				
				<?php echo e(Form::checkbox('acc_other_coverage[]','MANAGED CARE OPTION', false)); ?>

				<?php echo e(Form::label('acc_other_coverage', 'MANAGED CARE OPTION')); ?>	<br />
					
		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_DIVIDEND_safty_group', 'DIVIDEND PLAN/SAFETY GROUP')); ?>			
				<?php echo e(Form::text('acc_DIVIDEND_safty_group','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		
		<div class="col-lg-6">
		<div class="form-group">	 
				<?php echo e(Form::label('acc__additional_company_issuie', 'ADDITIONAL COMPANY INFORMATION')); ?>			
				<?php echo e(Form::text('acc__additional_company_issuie','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		
		<div class="col-lg-12">
		<div class="form-group">	 
				<?php echo e(Form::label('acc__specify_additional_coverage', 'SPECIFY ADDITIONAL COVERAGES / ENDORSEMENTS (Attach ACORD 101, Additional Remarks Schedule, if more space is required)')); ?>			
				<?php echo e(Form::text('acc__specify_additional_coverage','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div> 
		<div class="col-lg-12">
		<h5> TOTAL ESTIMATED ANNUAL PREMIUM - ALL STATES</h5>
		</div>
		<div class="col-lg-12 payrolltable" style="">
		
		
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_total_estimate_annual', 'TOTAL ESTIMATED ANNUAL PREMIUM - ALL STATES')); ?>			
				<?php echo e(Form::text('acc_total_estimate_annual','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_total_minimum_premium', 'TOTAL MINIMUM PREMIUM ALL STATES')); ?>			
				<?php echo e(Form::text('acc_total_minimum_premium','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_total_deposite_premium', 'TOTAL DEPOSIT PREMIUM ALL STATES')); ?>			
				<?php echo e(Form::text('acc_total_deposite_premium','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		</div>
		<div class="col-lg-12">
		<h5>CONTACT INFORMATION</h5>
		</div>
		<div class="col-lg-12 payrolltable" style="">
		<div class="col-lg-2">TYPE</div>
		<div class="col-lg-3">NAME</div>
		<div class="col-lg-2">OFFICE PHONE</div>
		<div class="col-lg-2">MOBILE PHONE</div>
		<div class="col-lg-2">E-MAIL</div>
		
		<div class="col-lg-2">INSPECTION</div>
		<div class="col-lg-3"><input type="text" name="contact_info_name1" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_office_phone1" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="contact_info_mobile_1" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_email_1" value="" ></div>
		
		<div class="col-lg-2">ACCTNG</div>
		<div class="col-lg-3"><input type="text" name="contact_info_name2" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_office_phone2" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="contact_info_mobile_2" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_email_2" value="" ></div>
		
		<div class="col-lg-2">RECORD</div>
		<div class="col-lg-3"><input type="text" name="contact_info_name3" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_office_phone3" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="contact_info_mobile_3" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_email_3" value="" ></div>
		
		<div class="col-lg-2">CLAIMS</div>
		<div class="col-lg-3"><input type="text" name="contact_info_name4" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_office_phone4" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="contact_info_mobile_4" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_email_4" value="" ></div>
		
		<div class="col-lg-2">INFO</div>
			<div class="col-lg-3"><input type="text" name="contact_info_name5" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_office_phone5" value="" ></div>
		<div class="col-lg-2"> <input type="text" name="contact_info_mobile_5" value="" ></div>
		<div class="col-lg-2"><input type="text" name="contact_info_email_5" value="" ></div>
		
		</div>
		<div class="col-lg-12">
		<h5>INDIVIDUALS INCLUDED / EXCLUDED</h5>
		</div>
		<div class="col-lg-12 payrolltable" style="">
		<p>PARTNERS, OFFICERS, RELATIVES ( Must be employed by business operations) TO BE INCLUDED OR EXCLUDED (Remuneration/Payroll to be included must be part of rating information section.)
Exclusions in Missouri must meet the requirements of Section 287.090 RSMo. </p>
		<div class="col-lg-12"> 
		<div class="col-lg-1">STATE</div>
		<div class="col-lg-1">LOC #</div>
		<div class="col-lg-1">NAME</div>
		<div class="col-lg-1">DOB</div>
		<div class="col-lg-1">TITLE</div>
		<div class="col-lg-1">OWNER-SHIP%</div>
		<div class="col-lg-1">DUTIES</div>
		<div class="col-lg-1">INC/EXC</div>
		<div class="col-lg-1">CLASS CODE</div>
		<div class="col-lg-1">REMUNERATION</div>
		</div>
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_state1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_loc1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_name1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_dob1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_title1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_ownership1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_duty1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_inc1" value="" ></div>
		<div class="col-lg-1"><input type="text" id="INDIVIDUALS_INCLUDED_class1" name="INDIVIDUALS_INCLUDED_class1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_payrol1" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_state2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_loc2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_name2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_dob2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_title2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_ownership2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_duty2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_inc2" value="" ></div>
		<div class="col-lg-1"><input type="text"id="INDIVIDUALS_INCLUDED_class2" name="INDIVIDUALS_INCLUDED_class2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_payrol2" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_state3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_loc3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_name3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_dob3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_title3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_ownership3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_duty3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_inc3" value="" ></div>
		<div class="col-lg-1"><input type="text" id="INDIVIDUALS_INCLUDED_class3" name="INDIVIDUALS_INCLUDED_class3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_payrol3" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_state4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_loc4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_name4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_dob4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_title4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_ownership4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_duty4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_inc4" value="" ></div>
		<div class="col-lg-1"><input type="text" id="INDIVIDUALS_INCLUDED_class4" name="INDIVIDUALS_INCLUDED_class4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="INDIVIDUALS_INCLUDED_payrol4" value="" ></div>
		</div>
		
		
		</div>
		<div class="col-lg-12"> 
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_STATERATINGSHEET', 'STATE RATING SHEET #')); ?>			
				<?php echo e(Form::text('acc_STATERATINGSHEET','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-3">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_SHEETS', 'SHEETS')); ?>			
				<?php echo e(Form::text('acc_SHEETS','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_AGENCYCUSTOMERid', 'AGENCY CUSTOMER ID:')); ?>			
				<?php echo e(Form::text('acc_AGENCYCUSTOMERid','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		</div>
		
		<div class="col-lg-12 payrolltable" style=""> 
		<h5><center>STATE RATING WORKSHEET</center></h5>
		<h5>FOR MULTIPLE STATES, ATTACH AN ADDITIONAL PAGE 2 OF THIS FORM</h5>
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('acc_RATINGINFORMATIONstate', 'RATING INFORMATION - STATE:')); ?>			
				<?php echo e(Form::text('acc_RATINGINFORMATIONstate','',['class' => 'form-control', 'required' => 'required'])); ?>

		</div>
		</div>
		<div class="col-lg-12"> 
		<div class="col-lg-1">LOC #</div>
		<div class="col-lg-1">CLASS CODE</div>
		<div class="col-lg-1">DESCR CODE</div>
		<div class="col-lg-1">CATEGORIES</div>
		<div class="col-lg-1"># FULL TIME EMP</div>
		<div class="col-lg-1"># PART TIME EMP</div>
		<div class="col-lg-1">SIC</div>
		<div class="col-lg-1">NAICS</div>
		<div class="col-lg-1">ANNUAL PAYROLL</div>
		<div class="col-lg-1">RATE</div>
		<div class="col-lg-1">ANNUAL PREMIUM</div>
		</div>
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no1" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code1" name="RATING_class_code1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM1" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no2" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code2" name="RATING_class_code2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM2" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no3" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code3" name="RATING_class_code3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM3" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no4" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code4" name="RATING_class_code4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM4" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no5" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code5" name="RATING_class_code5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM5" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no6" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code6" name="RATING_class_code6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM6" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no7" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code7" name="RATING_class_code7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM7" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no8" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code8" name="RATING_class_code8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM8" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no9" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code9" name="RATING_class_code9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM9" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no10" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code10" name="RATING_class_code10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM10" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no11" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code11" name="RATING_class_code11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE11" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM11" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no12" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code12" name="RATING_class_code12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE12" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM12" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no13" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code13" name="RATING_class_code13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE13" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM13" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="RATING_LOC_no14" value="" ></div>
		<div class="col-lg-1"><input type="text" id="RATING_class_code14" name="RATING_class_code14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_DESCR_code14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_CATEGORIES14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_fullemp14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_partemp14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_sic14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_NAICS14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PAYROLL14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_RATE14" value="" ></div>
		<div class="col-lg-1"><input type="text" name="RATING_PREMIUM14" value="" ></div>
		</div>
		
		</div>
		<div class="col-lg-12">
		<h5>PREMIUM</h5>
		</div>
		<div class="col-lg-12 payrolltable" style="">
		
		
		<div class="col-lg-12">
		<div class="col-lg-2">STATE</div>
		<div class="col-lg-1">FACTOR</div>
		<div class="col-lg-2">FACTORED PREMIUM</div>
		<div class="col-lg-2"></div>
		<div class="col-lg-2">FACTOR</div>
		<div class="col-lg-2">FACTORED PREMIUM</div>
		</div>
		
		<div class="col-lg-12">
		<div class="col-lg-2">TOTAL</div>
		<div class="col-lg-1"><input type="text" disabled value="N/A"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_STATEFACTORED1" value=""  placeholder="$"></div>
		<div class="col-lg-2"><input type="text" disabled value=""></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTOR1" value=""  ></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTORED1" value=""  placeholder="$"></div>
		</div>
		
		<div class="col-lg-12">
		<div class="col-lg-2">INCREASED LIMITS</div>
		<div class="col-lg-1"><input type="text" name="PREMIUM_STATEFACTOR2" value=""  placeholder="$"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_STATEFACTORED2" value=""  placeholder="$"></div>
		<div class="col-lg-2"> <input type="text" disabled value="SCHEDULE RATING *"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTOR2" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTORED2" value=""  placeholder="$"></div>
		</div>
		
		<div class="col-lg-12">
		<div class="col-lg-2">DEDUCTIBLE * </div>
		<div class="col-lg-1"><input type="text" name="PREMIUM_STATEFACTOR3" value=""  placeholder="$"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_STATEFACTORED3" value=""  placeholder="$"></div>
		<div class="col-lg-2"> <input type="text" disabled value="CCPAP"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTOR3" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTORED3" value=""  placeholder="$"></div>
		</div>
		
		<div class="col-lg-12">
		<div class="col-lg-2"><input type="text" disabled value=""></div>
		<div class="col-lg-1"><input type="text" name="PREMIUM_STATEFACTOR4" value=""  placeholder="$"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_STATEFACTORED4" value=""  placeholder="$"></div>
		<div class="col-lg-2"> <input type="text" disabled value="STANDARD PREMIUM"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTOR4" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTORED4" value=""  placeholder="$"></div>
		</div>
		
		<div class="col-lg-12">
		<div class="col-lg-2"><input type="text" disabled value="MERIT MODIFICATION "></div>
		<div class="col-lg-1"><input type="text" name="PREMIUM_STATEFACTOR5" value=""  placeholder="$"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_STATEFACTORED5" value=""  placeholder="$"></div>
		<div class="col-lg-2"> <input type="text" disabled value="PREMIUM DISCOUNT5"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTOR5" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTORED5" value=""  placeholder="$"></div>
		</div>
		<div class="col-lg-12">
		<div class="col-lg-2"><input type="text" disabled value=""></div>
		<div class="col-lg-1"><input type="text" name="PREMIUM_STATEFACTOR6" value=""  placeholder="$"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_STATEFACTORED6" value=""  placeholder="$"></div>
		<div class="col-lg-2"> <input type="text" disabled value="EXPENSE CONSTANT"></div>
		<div class="col-lg-2"><input type="text" disabled value="N/A"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTORED6" value=""  placeholder="$"></div>
		</div>
		<div class="col-lg-12">
		<div class="col-lg-2"><input type="text" disabled value="RISK SURCHARGE *"></div>
		<div class="col-lg-1"><input type="text" name="PREMIUM_STATEFACTOR7" value=""  placeholder="$"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_STATEFACTORED7" value=""  placeholder="$"></div>
		<div class="col-lg-2"> <input type="text" disabled value="PREMIUM DISCOUNT7"></div>
		<div class="col-lg-2"><input type="text" disabled value="N/A"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTORED7" value=""  placeholder="$"></div>
		</div>
		<div class="col-lg-12">
		<div class="col-lg-2"><input type="text" disabled value="ARAP *"></div>
		<div class="col-lg-1"><input type="text" name="PREMIUM_STATEFACTOR8" value=""  placeholder="$"></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_STATEFACTORED8" value=""  placeholder="$"></div>
		<div class="col-lg-2"> <input type="text" disabled value=""></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTOR8" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PREMIUM_FACTORED8" value=""  placeholder="$"></div>
		</div>
		<div class="col-lg-12">
		<div class="col-lg-2"><input type="text" disabled value="* N/A in Wisconsin"></div>
		<div class="col-lg-1"><input type="text" disabled value=""></div>
		<div class="col-lg-2"><input type="text" disabled value=""></div>
		<div class="col-lg-2"> <input type="text" disabled value=""></div>
		<div class="col-lg-2"><input type="text" disabled value=""></div>
		<div class="col-lg-2"><input type="text" disabled value=""></div>
		</div>
		<div class="col-lg-12">
		
		
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('PREMIUM_total_ANNUAL_P', 'TOTAL ESTIMATED ANNUAL PREMIUM')); ?>			
				<?php echo e(Form::text('PREMIUM_total_ANNUAL_P','',['class' => 'form-control', 'required' => 'required','placeholder'=>'$'])); ?>

		</div>
		</div>
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('PREMIUM_MINIMUM_P', 'MINIMUM PREMIUM ')); ?>			
				<?php echo e(Form::text('PREMIUM_MINIMUM_P','',['class' => 'form-control', 'required' => 'required','placeholder'=>'$'])); ?>

		</div>
		</div>
		<div class="col-lg-4">
		<div class="form-group">	 
				<?php echo e(Form::label('PREMIUM_DEPOSIT_P', 'DEPOSIT PREMIUM')); ?>			
				<?php echo e(Form::text('PREMIUM_DEPOSIT_P','',['class' => 'form-control', 'required' => 'required','placeholder'=>'$'])); ?>

		</div>
		</div>
		</div>
		
		</div>
		<div class="col-lg-12">
		
		<div class="form-group">
		  <?php echo Form::label('acc_remarks','REMARKS (ACORD 101, Additional Remarks Schedule, may be attached if more space is required)'); ?>

		  <?php echo Form::textarea('acc_remarks',null,['class'=>'form-control','rows' => 4,]); ?>

		</div>
		</div>
		<div class="col-lg-12">
		<h5>PRIOR CARRIER INFORMATION / LOSS HISTORY</h5>
		</div>
		<div class="col-lg-12 payrolltable" style="">
		<p> PROVIDE INFORMATION FOR THE PAST 5 YEARS AND USE THE REMARKS SECTION FOR LOSS DETAILS</p>
		
		<div class="col-lg-12">
		<div class="col-lg-1">YEAR</div>
		<div class="col-lg-2">CARRIER & POLICY NUMBER</div>
		<div class="col-lg-2">ANNUAL PREMIUM</div>
		<div class="col-lg-1">MOD</div>
		<div class="col-lg-1"># CLAIMS</div>
		<div class="col-lg-2">AMOUNT PAID</div>
		<div class="col-lg-1">RESERVE </div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR1 " value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo1" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS1" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID1" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE1" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR2 " value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo2" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS2" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID2" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE2" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR3 " value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo3" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS3" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID3" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE3" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR4" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo4" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS4" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID4" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE4" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR5" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo5" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS5" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID5" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE5" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR6" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo6" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS6" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID6" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE6" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR7" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo7" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS7" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID7" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE7" value="" ></div>
		</div>
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR8" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo8" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS8" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID8" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE8" value="" ></div>
		</div>
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR9" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo9" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS9" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID9" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE9" value="" ></div>
		</div>
		
		<div class="col-lg-12"> 
		<div class="col-lg-1"><input type="text" name="PRIOR_YEAR10" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_CARRIERNo10" value="" placeholder=""></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_ANNUALPREMIUM10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_MOD10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_CLAIMS10" value="" ></div>
		<div class="col-lg-2"><input type="text" name="PRIOR_AMOUNTPAID10" value="" ></div>
		<div class="col-lg-1"><input type="text" name="PRIOR_RESERVE10" value="" ></div>
		</div>
		
		</div>
		<div class="col-lg-12">
		<h5>NATURE OF BUSINESS / DESCRIPTION OF OPERATIONS</h5>
		<div class="form-group">
		  <?php echo Form::label('acc_nature_description','GIVE COMMENTS AND DESCRIPTIONS OF BUSINESS, OPERATIONS AND PRODUCTS: MANUFACTURING - RAW MATERIALS, PROCESSES, PRODUCT, EQUIPMENT; CONTRACTOR - TYPE OF WORK, SUB-CONTRACTS; MERCANTILE - MERCHANDISE, CUSTOMERS, DELIVERIES; SERVICE - TYPE, LOCATION; FARM - ACREAGE, ANIMALS, MACHINERY, SUB-CONTRACTS.'); ?>

		  <?php echo Form::textarea('acc_nature_description',null,['class'=>'form-control','rows' => 4,]); ?>

		</div>
		</div>
		<div class="col-lg-12">
		<h4> GENERAL INFORMATION</h4>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong>1). DOES APPLICANT OWN, OPERATE OR LEASE AIRCRAFT / WATERCRAFT?</strong><br />
					<?php echo e(Form::label('acc_watercraft_yes_no', 'yes')); ?>

					<?php echo e(Form::radio('acc_watercraft_yes_no', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_watercraft_yes_no', 'no')); ?>

					<?php echo e(Form::radio('acc_watercraft_yes_no', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 2). DO / HAVE PAST, PRESENT OR DISCONTINUED OPERATIONS INVOLVE(D) STORING, TREATING, DISCHARGING, APPLYING, DISPOSING, ORTRANSPORTING OF HAZARDOUS MATERIAL? (e.g. landfills, wastes, fuel tanks, etc)</strong><br />
					<?php echo e(Form::label('acc_DISCONTINUED_OPERATIONS', 'yes')); ?>

					<?php echo e(Form::radio('acc_DISCONTINUED_OPERATIONS', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_DISCONTINUED_OPERATIONS', 'no')); ?>

					<?php echo e(Form::radio('acc_DISCONTINUED_OPERATIONS', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 3). ANY WORK PERFORMED UNDERGROUND OR ABOVE 15 FEET?</strong><br />
					<?php echo e(Form::label('acc_above_under15', 'yes')); ?>

					<?php echo e(Form::radio('acc_above_under15', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_above_under15', 'no')); ?>

					<?php echo e(Form::radio('acc_above_under15', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 4). ANY WORK PERFORMED ON BARGES, VESSELS, DOCKS, BRIDGE OVER WATER?</strong><br />
					<?php echo e(Form::label('acc_BRIDGE_over_water', 'yes')); ?>

					<?php echo e(Form::radio('acc_BRIDGE_over_water', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_BRIDGE_over_water', 'no')); ?>

					<?php echo e(Form::radio('acc_BRIDGE_over_water', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 5). IS APPLICANT ENGAGED IN ANY OTHER TYPE OF BUSINESS?</strong><br />
					<?php echo e(Form::label('acc_any_other_busness', 'yes')); ?>

					<?php echo e(Form::radio('acc_any_other_busness', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_any_other_busness', 'no')); ?>

					<?php echo e(Form::radio('acc_any_other_busness', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 6). ARE SUB-CONTRACTORS USED? (If "YES", give % of work subcontracted)</strong><br />
					<?php echo e(Form::label('acc_sub_contracted', 'yes')); ?>

					<?php echo e(Form::radio('acc_sub_contracted', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_sub_contracted', 'no')); ?>

					<?php echo e(Form::radio('acc_sub_contracted', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 7). ANY WORK SUBLET WITHOUT CERTIFICATES OF INSURANCE?  (If "YES", payroll for this work must be included in the State Rating Worksheet on Page 2)</strong><br />
					<?php echo e(Form::label('acc_without_insurance', 'yes')); ?>

					<?php echo e(Form::radio('acc_without_insurance', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_without_insurance', 'no')); ?>

					<?php echo e(Form::radio('acc_without_insurance', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 8). IS A WRITTEN SAFETY PROGRAM IN OPERATION?</strong><br />
					<?php echo e(Form::label('acc_writen_safty_program', 'yes')); ?>

					<?php echo e(Form::radio('acc_writen_safty_program', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_writen_safty_program', 'no')); ?>

					<?php echo e(Form::radio('acc_writen_safty_program', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 9). ANY GROUP TRANSPORTATION PROVIDED?</strong><br />
					<?php echo e(Form::label('acc_group_transportation', 'yes')); ?>

					<?php echo e(Form::radio('acc_group_transportation', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_group_transportation', 'no')); ?>

					<?php echo e(Form::radio('acc_group_transportation', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 10).ANY EMPLOYEES UNDER 16 OR OVER 60 YEARS OF AGE?</strong><br />
					<?php echo e(Form::label('acc_employees_under16', 'yes')); ?>

					<?php echo e(Form::radio('acc_employees_under16', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_employees_under16', 'no')); ?>

					<?php echo e(Form::radio('acc_employees_under16', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 11).ANY SEASONAL EMPLOYEES?</strong><br />
					<?php echo e(Form::label('acc_seasonal_employee', 'yes')); ?>

					<?php echo e(Form::radio('acc_seasonal_employee', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_seasonal_employee', 'no')); ?>

					<?php echo e(Form::radio('acc_seasonal_employee', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 12).IS THERE ANY VOLUNTEER OR DONATED LABOR?  (If "YES", please specify)</strong><br />
					<?php echo e(Form::label('acc_volunteer_donated', 'yes')); ?>

					<?php echo e(Form::radio('acc_volunteer_donated', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_volunteer_donated', 'no')); ?>

					<?php echo e(Form::radio('acc_volunteer_donated', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 13).ANY EMPLOYEES WITH PHYSICAL HANDICAPS?</strong><br />
					<?php echo e(Form::label('acc_employees_handicaped', 'yes')); ?>

					<?php echo e(Form::radio('acc_employees_handicaped', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_employees_handicaped', 'no')); ?>

					<?php echo e(Form::radio('acc_employees_handicaped', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 14).DO EMPLOYEES TRAVEL OUT OF STATE?  (If "YES", indicate state(s) of travel and frequency)</strong><br />
					<?php echo e(Form::label('acc_employees_travel_out_state', 'yes')); ?>

					<?php echo e(Form::radio('acc_employees_travel_out_state', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_employees_travel_out_state', 'no')); ?>

					<?php echo e(Form::radio('acc_employees_travel_out_state', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 15).ARE ATHLETIC TEAMS SPONSORED?</strong><br />
					<?php echo e(Form::label('acc_atheletic_team', 'yes')); ?>

					<?php echo e(Form::radio('acc_atheletic_team', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_atheletic_team', 'no')); ?>

					<?php echo e(Form::radio('acc_atheletic_team', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 16).ARE PHYSICALS REQUIRED AFTER OFFERS OF EMPLOYMENT ARE MADE?</strong><br />
					<?php echo e(Form::label('acc_physical_required', 'yes')); ?>

					<?php echo e(Form::radio('acc_physical_required', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_physical_required', 'no')); ?>

					<?php echo e(Form::radio('acc_physical_required', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 17).ANY OTHER INSURANCE WITH THIS INSURER?</strong><br />
					<?php echo e(Form::label('acc_other_insurance', 'yes')); ?>

					<?php echo e(Form::radio('acc_other_insurance', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_other_insurance', 'no')); ?>

					<?php echo e(Form::radio('acc_other_insurance', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 18).ANY PRIOR COVERAGE DECLINED / CANCELLED / NON-RENEWED IN THE LAST THREE (3) YEARS? (Missouri Applicants - Do not answer this question)</strong><br />
					<?php echo e(Form::label('acc_prior_coverage', 'yes')); ?>

					<?php echo e(Form::radio('acc_prior_coverage', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_prior_coverage', 'no')); ?>

					<?php echo e(Form::radio('acc_prior_coverage', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 19).ARE EMPLOYEE HEALTH PLANS PROVIDED?</strong><br />
					<?php echo e(Form::label('acc_employees_health_plan', 'yes')); ?>

					<?php echo e(Form::radio('acc_employees_health_plan', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_employees_health_plan', 'no')); ?>

					<?php echo e(Form::radio('acc_employees_health_plan', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 20).DO ANY EMPLOYEES PERFORM WORK FOR OTHER BUSINESSES OR SUBSIDIARIES?</strong><br />
					<?php echo e(Form::label('acc_employees_buisness_subdieries', 'yes')); ?>

					<?php echo e(Form::radio('acc_employees_buisness_subdieries', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_employees_buisness_subdieries', 'no')); ?>

					<?php echo e(Form::radio('acc_employees_buisness_subdieries', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 21).DO YOU LEASE EMPLOYEES TO OR FROM OTHER EMPLOYERS?</strong><br />
					<?php echo e(Form::label('acc_employees_lease', 'yes')); ?>

					<?php echo e(Form::radio('acc_employees_lease', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_employees_lease', 'no')); ?>

					<?php echo e(Form::radio('acc_employees_lease', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 22).DO ANY EMPLOYEES PREDOMINANTLY WORK AT HOME?  If "YES", # of Employees:</strong><br />
					<?php echo e(Form::label('acc_employees_PREDOMINANTLY_work', 'yes')); ?>

					<?php echo e(Form::radio('acc_employees_PREDOMINANTLY_work', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_employees_PREDOMINANTLY_work', 'no')); ?>

					<?php echo e(Form::radio('acc_employees_PREDOMINANTLY_work', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 23).ANY TAX LIENS OR BANKRUPTCY WITHIN THE LAST FIVE (5) YEARS?  (If "YES", please specify):</strong><br />
					<?php echo e(Form::label('acc_tax_liens_5hours', 'yes')); ?>

					<?php echo e(Form::radio('acc_tax_liens_5hours', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_tax_liens_5hours', 'no')); ?>

					<?php echo e(Form::radio('acc_tax_liens_5hours', 'no', 'false')); ?>

		</div>
		</div>
		
		<div class="col-lg-6">
		<div class="form-group">
					<strong> 24).ANY UNDISPUTED AND UNPAID WORKERS COMPENSATION PREMIUM DUE FROM YOU OR ANY COMMONLY MANAGED OR OWNED ENTERPRISES?IF YES, EXPLAIN INCLUDING ENTITY NAME(S) AND POLICY NUMBER(S):</strong><br />
					<?php echo e(Form::label('acc_UNDISPUTED_unpaid_work', 'yes')); ?>

					<?php echo e(Form::radio('acc_UNDISPUTED_unpaid_work', 'yes' ,'false')); ?><br />
					<?php echo e(Form::label('acc_UNDISPUTED_unpaid_work', 'no')); ?>

					<?php echo e(Form::radio('acc_UNDISPUTED_unpaid_work', 'no', 'false')); ?>

		</div>
		</div>
		<div class="col-lg-6">
		<div class="form-group payrolltable">
		<strong>Add Attachments</strong> 
		<input type="file" name="icon[]" multiple>
		</div>
		</div>
		<div class="col-lg-12">
		<h4> SIGNATURE</h4><hr>
		<p>Copy of the Notice of Information Practices (Privacy) has been given to the applicant. (Not required in all states, contact your agent or broker for your state's requirements.)</p><hr>
		<p>PERSONAL  INFORMATION  ABOUT  YOU,  INCLUDING  INFORMATION  FROM  A  CREDIT  OR  OTHER  INVESTIGATIVE  REPORT,  MAY  BE  COLLECTED  FROM  PERSONSOTHER THAN YOU IN CONNECTION WITH THIS APPLICATION FOR INSURANCE AND SUBSEQUENT AMENDMENTS AND RENEWALS.  SUCH INFORMATION AS WELL ASOTHER  PERSONAL  AND  PRIVILEGED  INFORMATION  COLLECTED  BY  US  OR  OUR  AGENTS  MAY  IN  CERTAIN  CIRCUMSTANCES  BE  DISCLOSED  TO  THIRD  PARTIESWITHOUT  YOUR  AUTHORIZATION.    CREDIT  SCORING  INFORMATION  MAY  BE  USED  TO  HELP  DETERMINE  EITHER  YOUR  ELIGIBILITY  FOR  INSURANCE  OR  THEPREMIUM  YOU  WILL  BE  CHARGED.    WE  MAY  USE  A  THIRD  PARTY  IN  CONNECTION  WITH  THE  DEVELOPMENT  OF  YOUR  SCORE.    YOU  MAY  HAVE  THE  RIGHT  TOREVIEW  YOUR  PERSONAL  INFORMATION  IN  OUR  FILES  AND  REQUEST  CORRECTION  OF  ANY  INACCURACIES.  YOU  MAY  ALSO  HAVE  THE  RIGHT  TO  REQUEST  INWRITING THAT WE CONSIDER EXTRAORDINARY LIFE CIRCUMSTANCES IN CONNECTION WITH THE DEVELOPMENT OF YOUR CREDIT SCORE. THESE RIGHTS MAYBE LIMITED IN SOME STATES. PLEASE CONTACT YOUR AGENT OR BROKER TO LEARN HOW THESE RIGHTS MAY APPLY IN YOUR STATE OR FOR INSTRUCTIONS ONHOW TO SUBMIT A REQUEST TO US FOR A MORE DETAILED DESCRIPTION OF YOUR RIGHTS AND OUR PRACTICES REGARDING PERSONAL INFORMATION</p>
		<p> (Not applicable in AZ, CA, DE, KS, MA, MN, ND, NY, OR, VA, or WV.  Specific ACORD 38s are available for applicants in these states.) (Applicant's Initials)</p><hr>
		
		<p><b>Applicable in AL, AR, DC, LA, MD, NM, RI and WV:</b>  Any person who knowingly (or willfully)* presents a false or fraudulent claim for payment of a loss orbenefit or knowingly (or willfully)* presents false information in an application for insurance is guilty of a crime and may be subject to fines and confinement inprison. *Applies in MD Only.<br>
		<b>Applicable  in  CO:</b>    It  is  unlawful  to  knowingly  provide  false,  incomplete,  or  misleading  facts  or  information  to  an  insurance  company  for  the  purpose  ofdefrauding  or  attempting  to  defraud  the  company.    Penalties  may  include  imprisonment,  fines,  denial  of  insurance  and  civil  damages.    Any  insurancecompany or agent of an insurance company who knowingly provides false, incomplete, or misleading facts or information to a policyholder or claimant for thepurpose  of  defrauding  or  attempting  to  defraud  the  policyholder  or  claimant  with  regard  to  a  settlement  or  award  payable  from  insurance  proceeds  shall  bereported to the Colorado Division of Insurance within the Department of Regulatory Agencies.<br>
		<b>Applicable in FL and OK: </b>  Any person who knowingly and with intent to injure, defraud, or deceive any insurer files a statement of claim or an applicationcontaining any false, incomplete, or misleading information is guilty of a felony (of the third degree)*. *Applies in FL Only.<br>
		<b>Applicable in KS:</b>  Any person who, knowingly and with intent to defraud, presents, causes to be presented or prepares with knowledge or belief that it will bepresented to or by an insurer, purported insurer, broker or any agent thereof, any written statement as part of, or in support of, an application for the issuanceof,  or  the  rating  of  an  insurance  policy  for  personal  or  commercial  insurance,  or  a  claim  for  payment  or  other  benefit  pursuant  to  an  insurance  policy  forcommercial or personal insurance which such person knows to contain materially false information concerning any fact material thereto; or conceals, for thepurpose of misleading, information concerning any fact material thereto commits a fraudulent insurance act.<br>
		<b>Applicable  in  KY,  NY,  OH  and  PA:</b>    Any  person  who  knowingly  and  with  intent  to  defraud  any  insurance  company  or  other  person  files  an  application  forinsurance or statement of claim containing any materially false information or conceals for the purpose of misleading, information concerning any fact materialthereto commits a fraudulent insurance act, which is a crime and subjects such person to criminal and civil penalties (not to exceed five thousand dollars andthe stated value of the claim for each such violation)*. *Applies in NY Only.<br>
		<b>Applicable in ME, TN, VA and WA:</b>  It is a crime to knowingly provide false, incomplete or misleading information to an insurance company for the purposeof defrauding the company.  Penalties (may)* include imprisonment, fines and denial of insurance benefits. *Applies in ME Only.<br>
		Applicable  in  NJ:    Any  person  who  includes  any  false  or  misleading  information  on  an  application  for  an  insurance  policy  is  subject  to  criminal  and  civilpenalties.<br>
		Applicable  in  OR:    Any  person  who  knowingly  and  with  intent  to  defraud  or  solicit  another  to  defraud  the  insurer  by  submitting  an  application  containing  afalse statement as to any material fact may be violating state law.<br>
		<b>Applicable in PR:</b>  Any person who knowingly and with the intention of defrauding presents false information in an insurance application, or presents, helps,or causes the presentation of a fraudulent claim for the payment of a loss or any other benefit, or presents more than one claim for the same damage or loss,shall incur a felony and, upon conviction, shall be sanctioned for each violation by a fine of not less than five thousand dollars ($5,000) and not more than tenthousand dollars ($10,000), or a fixed term of imprisonment for three (3) years, or both penalties.  Should aggravating circumstances [be] present, the penaltythus  established  may  be  increased  to  a  maximum  of  five  (5)  years,  if  extenuating  circumstances  are  present,  it  may  be  reduced  to  a  minimum  of  two  (2)years.<br>
		<b>Applicable in UT:</b> Any person who knowingly presents false or fraudulent underwriting information, files or causes to be filed a false or fraudulent claim fordisability  compensation  or  medical  benefits,  or  submits  a  false  or  fraudulent  report  or  billing  for  health  care  fees  or  other  professional  services  is  guilty  of  acrime and may be subject to fines and confinement in state prison.
		</p>
		<hr>
		<p> THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS BEEN MADE TO OBTAIN THEANSWERS  TO  QUESTIONS  ON  THIS  APPLICATION.    HE/SHE  REPRESENTS  THAT  THE  ANSWERS  ARE  TRUE,  CORRECT  AND  COMPLETE  TO  THE  BEST  OF  HIS/HERKNOWLEDGE.</p>
		</div>
		
		<div class="form-group">
					<button class="btn btn-block btn-primary" type="button" onclick="request_for_compansation();"><i class="si si-login pull-right"></i> Submit</button>
		</div>	
  <?php echo Form::close(); ?>		
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
<script>
function show_request_for_proposal()
{
	
	$.ajax({
  url: "/broker/leadregister",
  data:$("#leadform1st").serialize(),
  method: "POST",
  cache: false,
  success: function(html){
	  if(html.lead_id)
	  {
	  $("#alert-danger").empty();
	  $('#lead_id_Questionnaire').val(html.lead_id);
	  $('#lead_WORKERSCOMPENSATION_id').val(html.lead_id);
	  $("#first_form").hide();
      var contact_name = $('#first_name').val()+' '+$('#last_name').val();
	  $('#Contact_Name').val(contact_name);
	  var phone_number = $('#phone_number').val();
	  $('#Phone').val(phone_number);
	  
	  var cnt_stat_zip = Array();
	  var city = $('#city').children("option:selected").text();
	  cnt_stat_zip.push(city);
	  var state = $('#state').children("option:selected").text();
	  cnt_stat_zip.push(state);
	  var country = $('#country').children("option:selected").text();
	  cnt_stat_zip.push(country);
	  
	  var city_state_country = cnt_stat_zip.join(',');
	  $('#city_state_zip').val(city_state_country);	
	  
	  $("#request_for_proposal").show();
	  $("html, body").animate({ scrollTop: 0 }, "slow")
	  }
	  else
	  {
	  $("#alert-danger").empty();
	  $("#alert-danger").append(html);
	  $("html, body").animate({ scrollTop: 0 }, "slow")
	  }
    
  }
});

}
function work_compansation_form()
{
	
	$.ajax({
  url: "/broker/request_for_proposalform",
  data:$("#request_for_proposalform").serialize(),
  method: "POST",
  cache: false,
  success: function(html){
	  
	  if(html=='Added')
	  {
		$("#alert-danger").empty();
		$("#request_for_proposal").hide();
		
		$('#acc_company_email_address').val($('#email').val());
		$('#acc_agency_fax_no').val($('#Fax').val());
		$('#acc_company').val($('#company_name').val());
		var contact_name = $('#first_name').val()+' '+$('#last_name').val();
		$('#acc_applicant_name').val(contact_name);
		var phone_number = $('#phone_number').val();
		$('#acc_mobile_phone').val(phone_number);
		$('#acc_yrs_in_bus').val($('#Years_inBusiness').val());
		
		$("#work_compansation_form").show();
		$("html, body").animate({ scrollTop: 0 }, "slow")
	  }
	  else
	  {
	  $("#alert-danger").empty();
	  $("#alert-danger").append(html);
	  $("html, body").animate({ scrollTop: 0 }, "slow")
	  }
    
  }
});	
	
}

function request_for_compansation()
{
	$('#request_for_compansation').submit();
/* $.ajax({
  url: "/broker/request_for_compansation",
  data:$("#request_for_compansation").serialize(),
  method: "POST",
  cache: false,
  success: function(html){
	  
	  if(html.lead_id)
	  {
		lead_id=html.lead_id;
	    window.location.replace("/broker/viewLead/"+lead_id);
	  }
	  else
	  {
	  $("#alert-danger").empty();
	  $("#alert-danger").append(html);
	  $("html, body").animate({ scrollTop: 0 }, "slow")
	  }
    
  }
});	 */
	
} 

function change_description(code_id)
{
 if(code_id=='classCode1' || code_id=='ClassCode2ww' || code_id=='classCode3' || code_id=='ClassCode44' || code_id=='classCode55' || code_id=='ClassCode66'|| code_id=='ClassCode77')
 {
	 
 }	

if(code_id=='classCode1')
{
	desc_id='JobDescription1';
}
else if(code_id=='ClassCode2ww')
{
	desc_id='JobDescription2';
}
else if(code_id=='classCode3')
{
	desc_id='JobDescription3';
}
else if(code_id=='ClassCode44')
{
	desc_id='JobDescription4';
}
else if(code_id=='classCode55')
{
	desc_id='JobDescription5';
}
else if(code_id=='ClassCode66')
{
	desc_id='JobDescription6';
}
else if(code_id=='ClassCode77')
{
	desc_id='JobDescription7';
}
 code_value=$("#"+code_id).val();
 $.ajax({
  url: "/broker/search-classcode",
  data:{code:code_value},
  method: "POST",
  cache: false,
  success: function(res){
	  
	  $('#'+desc_id).val(res);
    
  }
}); 
}

</script>

<script>
function autocomplete(inp, arr) {
	input_id=inp;
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
			  input_id=inp.getAttribute('id');
			  if(input_id=='classCode1' || input_id=='ClassCode2ww' || input_id=='classCode3' || input_id=='ClassCode44' || input_id=='classCode55' || input_id=='ClassCode66'|| input_id=='ClassCode77')
			  {
				change_description(input_id);  
			  }
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var codes = [<?php echo $codes;?>];
var DescriptionArray = [<?php echo $DescriptionArray;?>];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("classCode1"), codes);
autocomplete(document.getElementById("ClassCode2ww"), codes);
autocomplete(document.getElementById("classCode3"), codes);
autocomplete(document.getElementById("classCode55"), codes);
autocomplete(document.getElementById("ClassCode44"), codes);
autocomplete(document.getElementById("ClassCode77"), codes);
autocomplete(document.getElementById("ClassCode66"), codes);

autocomplete(document.getElementById("INDIVIDUALS_INCLUDED_class1"), codes);
autocomplete(document.getElementById("INDIVIDUALS_INCLUDED_class2"), codes);
autocomplete(document.getElementById("INDIVIDUALS_INCLUDED_class3"), codes);
autocomplete(document.getElementById("INDIVIDUALS_INCLUDED_class4"), codes);

autocomplete(document.getElementById("RATING_class_code1"), codes);
autocomplete(document.getElementById("RATING_class_code2"), codes);
autocomplete(document.getElementById("RATING_class_code3"), codes);
autocomplete(document.getElementById("RATING_class_code4"), codes);
autocomplete(document.getElementById("RATING_class_code5"), codes);
autocomplete(document.getElementById("RATING_class_code6"), codes);
autocomplete(document.getElementById("RATING_class_code7"), codes);
autocomplete(document.getElementById("RATING_class_code8"), codes);
autocomplete(document.getElementById("RATING_class_code9"), codes);
autocomplete(document.getElementById("RATING_class_code10"), codes);
autocomplete(document.getElementById("RATING_class_code11"), codes);
autocomplete(document.getElementById("RATING_class_code12"), codes);
autocomplete(document.getElementById("RATING_class_code13"), codes);
autocomplete(document.getElementById("RATING_class_code14"), codes);



autocomplete(document.getElementById("JobDescription1"), DescriptionArray);
autocomplete(document.getElementById("JobDescription2"), DescriptionArray);
autocomplete(document.getElementById("JobDescription3"), DescriptionArray);
autocomplete(document.getElementById("JobDescription4"), DescriptionArray);
autocomplete(document.getElementById("JobDescription5"), DescriptionArray);
autocomplete(document.getElementById("JobDescription6"), DescriptionArray);
autocomplete(document.getElementById("JobDescription7"), DescriptionArray);


</script>
				
<?php $__env->stopSection(); ?>

<?php echo $__env->make("broker.broker_app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
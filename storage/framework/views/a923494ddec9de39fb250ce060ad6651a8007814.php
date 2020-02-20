<?php $__env->startSection("content"); ?>

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
						<h3>View Provider Details</h3>
                        <div class="col-sm-12 col-lg-12">

                             <!-- Block Tabs Alternative Style -->
                            <div class="block">
                                <div class="block-content tab-content">
 

                                    <div class="col-lg-8 tab-pane active" id="btabs-alt-static-profile">

                                      
	<div class="row" >
		
			
			<div class="form-group">	
                <div class="col-md-6">			
				<?php echo e(Form::label('email', 'Email')); ?>			
				</div>
				<div class="col-md-6">
				<?php echo e(Form::label('email', $userData['email'])); ?>		
				</div>  			
				
			</div>
			
			<div class="form-group">
			     <div class="col-md-6">			
				<?php echo e(Form::label('company_name', 'Company Name')); ?>				
				</div>
				<div class="col-md-6">
				<?php echo e(Form::label('company_name', $userData['companydetails']['company_name'])); ?>		
				</div>
				
			</div>
			
			<div class="form-group">	
                 <div class="col-md-6">			
				<?php echo e(Form::label('first_name', 'First Name')); ?>	
				</div>
				<div class="col-md-6">
				<?php echo e(Form::label('first_name', $userData['first_name'])); ?>	
				</div>			
				
			</div>
			
			<div class="form-group">	 
				<div class="col-md-6">			
				<?php echo e(Form::label('last_name', 'Last Name')); ?>				
				</div>
				<div class="col-md-6">
				<?php echo e(Form::label('last_name', $userData['last_name'])); ?>		
				</div>
			</div>
			
			<div class="form-group">	
                 <div class="col-md-6">
				<?php echo e(Form::label('address', 'Address')); ?>

				</div>
				<div class="col-md-6">
				<?php echo e(Form::label('address', $userData['address'])); ?>

				<?php echo e(Form::label('address', $userData['address2'])); ?>

				</div>			
				
			</div>
			
			<div class="form-group">
                   <div class="col-md-6">
					   <?php echo e(Form::label('country', 'Country')); ?>				
					   </div>
					   <div class="col-md-4">
					   <?php echo e(Form::select('country',$country, $userData['country'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>

					   </div>
			
				
			</div>
			
			<div class="form-group">
                <div class="col-md-6"> 
					   <?php echo e(Form::label('state', 'State')); ?>		
					   </div>
					   <div class="col-md-4">
					    
                        <?php echo e(Form::select('state',$state, $userData['state'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>						
					   </div>			
				
			</div>
			
			<div class="form-group">
                       <div class="col-md-6">
					     <?php echo e(Form::label('city', 'City')); ?>	
					   </div>
					   <div class="col-md-4">					   	
							<?php echo e(Form::select('city',$city, $userData['city'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>

					   </div>			
				
			</div>
			
			<div class="form-group">
			           <div class="col-md-6">
					     <?php echo e(Form::label('number_of_employee', 'Number Of Employees')); ?>	
					   </div>
					   <div class="col-md-4">
					        <?php echo e(Form::select('number_of_employee',$numbersOfEmployees, $userData['companydetails']['number_of_employee'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>

							
					   </div>
				
			</div>
			
			<div class="form-group">
			     <div class="col-md-6">
					     <?php echo e(Form::label('response_time', 'Response Time')); ?>		
					   </div>
					   <div class="col-md-4">					        							
							<?php echo e(Form::select('response_time',$responseTime, $userData['companydetails']['response_time'], ['class' => 'form-control',' disabled'=>' disabled'])); ?>							
					   </div>
				
			</div>
			
			<div class="form-group">
                <div class="col-md-6">
						<?php echo e(Form::label('phone_number', 'Contact Number')); ?>

						</div>
						<div class="col-md-6">
						<?php echo e(Form::label('phone_number', $userData['phone_number'])); ?>

			            </div>      			
				
			</div>
			
			<div class="form-group">
               <div class="col-md-6">
						<?php echo e(Form::label('website_url', 'Website URL')); ?>

						</div>
						<div class="col-md-6">
						<?php echo e(Form::label('website_url', $userData['companydetails']['website_url'])); ?>

			            </div>
			
				
			</div>
			
			<div class="form-group">
			    <div class="col-md-6">
						<?php echo e(Form::label('status', 'Status Time')); ?>	
						</div>
						<div class="col-md-4">
						<?php echo e(Form::select('status',$status, $userData['status'], ['class' => 'form-control','disabled'=>'disabled'])); ?>

			            </div>
				
			</div>
			
			
			<div class="form-group">
			
						<div class="form-group">
						<!--<h3><strong>What Kind of Leads do you want?</strong></h3> -->
                         <div class="col-md-6">
						<?php echo e(Form::label('preferr_number_of_employee', ' Number Of Employees')); ?>		
						</div>
						<div class="col-md-4">
						
						<?php echo e(Form::select('preferr_number_of_employee',$numbersOfEmployees, $userData['companydetails']['preferr_number_of_employee'], ['class' => 'form-control','disabled'=>'disabled' ])); ?>

			            </div>						
										
						</div>        											
			</div>
			
			<div class="form-group">
			          <div class="col-md-6">
						 <?php echo e(Form::label('preferr_state', 'Preferred Location')); ?>		
						</div>
						<div class="col-md-4">
						<?php echo e(Form::select('preferr_state',$state, $userData['companydetails']['preferr_state'], ['class' => 'form-control', 'disabled'=>'disabled','multiple'=>'multiple','name'=>'preferr_industry[]'])); ?>

			            </div>
					  		
						
			</div>
			
			<div class="form-group">
			       <div class="col-md-6">
						 <?php echo e(Form::label('preferr_interest', 'Interest of Services')); ?>				
						</div>
						<div class="col-md-6">												
						<?php echo e(Form::select('preferr_interest',$jobTittle,  $userData['companydetails']['preferr_interest'], ['class' => 'form-control', 'disabled'=>'disabled','multiple'=>'multiple','name'=>'preferr_industry[]'])); ?>

			            </div>
					
					
			</div>
			
			<div class="form-group">
			         <div class="col-md-6">
						 <?php echo e(Form::label('preferr_industry', 'Preferred Industries')); ?>				
						</div>
						<div class="col-md-6">												
						<?php echo e(Form::select('preferr_industry',$workIN,  $userData['companydetails']['preferr_industry'], ['class' => 'form-control','disabled'=>'disabled', 'multiple'=>'multiple','name'=>'preferr_industry[]'])); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_applist", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection("content"); ?>

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
		<?php echo Form::model($userData, array('url' => 'admin/updateUserData','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'loginform','role'=>'form')); ?>

			
			<div class="form-group">
						<?php echo e(Form::label('email', 'Email')); ?>

						<?php echo e(Form::email('email', $userData['username'] ,['class' => 'form-control'])); ?>

			</div>
			<div class="form-group">
					   <?php echo e(Form::label('usertype', 'User Type')); ?>		
					   <Select name="usertype" class="form-control" >
						<?php foreach($userType as $singleTypekey => $singleTypeValue): ?>
							<option <?php if($userData['usertype'] == $singleTypekey ): ?><?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($singleTypekey); ?>"> <?php echo e($singleTypeValue); ?> </option>
						<?php endforeach; ?>	
					   </select>	
			</div>
			<div class="form-group">	 
				<?php echo e(Form::label('first_name', 'First Name')); ?>				<?php echo e(Form::text('first_name',$userData['first_name'],['class' => 'form-control'])); ?>

			</div>
			
			<div class="form-group">	 
				<?php echo e(Form::label('last_name', 'Last Name')); ?>				<?php echo e(Form::text('last_name',$userData['last_name'],['class' => 'form-control'])); ?>

			</div>
			
			<div class="form-group">	 
				<?php echo e(Form::label('address', 'Address')); ?>				
				<?php echo e(Form::text('address',$userData['address'],['class' => 'form-control'])); ?>

				<?php echo e(Form::text('address2',$userData['address2'],['class' => 'form-control'])); ?>

			</div>
			
			<div class="form-group">
					   <?php echo e(Form::label('country', 'Country')); ?>				
					   <?php echo e(Form::select('country',$country, $userData['country'], ['class' => 'form-control'])); ?>

			</div>
			<div class="form-group">
					   <?php echo e(Form::label('state', 'State')); ?>		
						<?php echo e(Form::select('state',$state, $userData['state'], ['class' => 'form-control'])); ?>

			</div>
			<div class="form-group">
					   <?php echo e(Form::label('city', 'City')); ?>		
						<?php echo e(Form::select('city',$city,$userData['city'], ['class' => 'form-control'])); ?>

			</div>
			<div class="form-group">
						<?php echo e(Form::label('phone_number', 'Contact Number')); ?>				
						<?php echo e(Form::text('phone_number', $userData['phone_number'], ['class' => 'form-control'])); ?>		    											
			</div>	
		
			<div class="form-group">
					   <?php echo e(Form::label('status', 'Status')); ?>		
						<?php echo e(Form::select('status',$status,null, ['class' => 'form-control'])); ?>

						<?php echo e(Form::hidden('id',$userData['id'])); ?>

			</div>

			<div class="form-group">
				<button class="btn btn-block btn-primary" type="submit"><i class="si si-login pull-right"></i> Update</button>
			</div> 
		<?php echo Form::close(); ?> 
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
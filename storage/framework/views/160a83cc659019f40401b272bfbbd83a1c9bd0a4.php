<?php $__env->startSection('content'); ?>


     <div class="cash-pagelog" style="padding-bottom: 249px;">	 
	    <div class="container wido">
		<?php echo Form::open(array('url' => 'password/email','class'=>'','id'=>'password','role'=>'form')); ?> 
		    <div class="col-sm-12 login_page">
			<div class="head-new-title">
			
			 <h2 class="about-headline text-center">Forgot Password</h2>
			 </div>
			 
               <div class="message">
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                              <ul style="list-style: none;">
                                  <?php foreach($errors->all() as $error): ?>
                                      <li><?php echo e($error); ?></li>
                                  <?php endforeach; ?>
                              </ul>
                          </div>
                      <?php endif; ?>
            </div>
			<?php if(Session::has('flash_message')): ?>
				<div class="alert alert-success fade in">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				 <?php echo e(Session::get('flash_message')); ?> 
			   </div>             
			<?php endif; ?>
			
			<div class="form-group">
              <label class="control-label" for="email">Email<span class="required">*</span></label>
              <input id="email" name="email" type="text" placeholder="Enter mail" class="form-control input-md">
            </div>
             
            <div class="form-group">
              <button id="submit" name="submit" class="btn-primary" style="padding:10px; background-color:#0673a2; border:1px solid #0673a2;">Submit</button>
              <a href="<?php echo e(URL::to('/')); ?>" class="pull-right" style="color:#0673a2; font-size:18px;"> <small>Login ?</small></a> </div>
			<?php echo Form::close(); ?>

</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.front_head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
 

<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12 tp-title-center">
        <h1>Reset Password</h1>
      </div>
    </div>
    <div class="col-md-offset-3 col-md-6 well-box">
      <div class="tab-content ">
        <div role="tabpanel" class="tab-pane active vendor-login" id="home">
          <?php echo Form::open(array('url' => 'password/reset','class'=>'','id'=>'passwordform','role'=>'form')); ?> 

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
            <input type="hidden" name="token" value="<?php echo e($token); ?>">
            <div class="form-group">
              <label class="control-label" for="email">Email<span class="required">*</span></label>
              <input id="email" name="email" type="text" placeholder="Enter mail" class="form-control input-md">
            </div>
            <div class="form-group">
              <label class="control-label" for="password">Password<span class="required">*</span></label>
              <input id="password" name="password" type="password" placeholder="Password Minimum 6 character" class="form-control input-md">
            </div>
            <div class="form-group">
              <label class="control-label" for="password">Confirm Password<span class="required">*</span></label>
              <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Password" class="form-control input-md">
            </div>
             
            <div class="form-group">
              <button id="submit" name="submit" class="btn tp-btn-primary tp-btn-lg">Reset Password</button>
              <a href="<?php echo e(URL::to('/')); ?>" class="pull-right"> <small>Login ?</small></a> </div>
          <?php echo Form::close(); ?> 
        </div>
      </div>
       
    </div>
  </div>
</div>
 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.front_head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
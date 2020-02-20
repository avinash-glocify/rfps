 

<?php $__env->startSection('content'); ?> 
 
         
          
      <section class="sign_up_form">
      <div class="container">
               
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <?php echo e(Session::get('flash_message')); ?>

                    </div>
                    <?php endif; ?>  
      <div class="form_holder_1"><h2>Contact Us for Any kind of Questions</h2>
      <div class="personal_form">
      <?php echo Form::open(array('url' => 'support-ticket','class'=>'','id'=>'','method' => 'post','role'=>'form')); ?>

      <div class="col-md-12">
		  <label for="name"> Name</label>
           <input class="form-control" type="text" id="name" name="name" placeholder="Enter Name..">
      </div>
	  <div class="col-md-12">
		   <label for="role">Role:</label>
                       <select class="form-control" id="role" name="role">
					   <option> ---Select role---</option>
					   <option value="company"> company</option>
					   <option value="broker"> broker</option>
					   </select>
      </div>
	  <div class="col-md-12">
		  <label for="subject">Subject:</label>
                                            <input class="form-control" type="text" id="subject" name="subject" placeholder="Enter subject ">
      </div>
	  <div class="col-md-12">
		  <label for="email">Email ID:</label>
                                            <input class="form-control" type="email" id="email" name="email" placeholder="Enter email id ">
      </div>
	  <div class="col-md-12">
		  <label for="phone_number">Phone Number:</label>
                                            <input class="form-control" type="number" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
      </div>
	  
	  <div class="col-md-12">
		  <label for="message">Message:</label>
                                            <textarea class="form-control"  id="message" name="message" placeholder="Enter message"> </textarea>
      </div>
        
		  <div class="submit_button" >
		  <input type="submit" value="send" style="margin-top:30px !important;">
		  </div>
      </div>
      </div>
      </div>
	  <?php echo Form::close(); ?>

      </section>
	    <?php $__env->stopSection(); ?> 
<?php echo $__env->make('front.signin_head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
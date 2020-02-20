<?php $__env->startSection("content"); ?>
<!-- Page Content -->
<div class="content content-boxed">
	<div class="row">
		<h3>Quotes List</h3>
		<div class="col-sm-12 col-lg-12">
			
			<!-- Block Tabs Alternative Style -->
			<div class="block">
				<div class="block-content tab-content">
					
					
					<div class="col-lg-12 tab-pane active" id="btabs-alt-static-profile">
						
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
							<table id="example" class="display" style="width:100%">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Company Name</th>
										<th>Email</th>
										<th>Title</th>
										<th>Description</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								   <?php $i = 1;
								    if(!empty($getAllQuote) && isset($getAllQuote)){
                                    foreach ($getAllQuote as $key=>$c) {?>
									<tr <?php if($c->quote_status==1){?>style="background-color:#262323;color:white"<?php } ?>>
										<td><?php echo e($i++); ?></td>
										<td><?php echo e(@$c->first_name); ?> <?php echo e(@$c->last_name); ?></td>
										<td><?php echo e($c->email); ?></td>
										<td><?php echo e(str_limit($c->quote_title, $limit = 10, $end = '...')); ?></td>
										<td><?php echo e(str_limit($c->quote_description, $limit = 10, $end = '...')); ?></td>
										<td>
											<?php if($c->quote_status==0) {?>
												Pending
											<?php } elseif($c->quote_status==1) {?>
												Approved
											<?php } else {?>
												Rejected
											<?php } ?>
										</td>
										<td><a href="<?php echo e(url('broker/quotedetails', ['id' => $c->quote_id])); ?>">View</a></td>
									</tr>										
									<?php } 
									} ?>
									
								</tbody>
								
							</table>
						</div>	
						
						
						
					</div>
					
				</div>
			</div>
			<!-- END Block Tabs Alternative Style -->
		</div>
		
	</div>
	<div class="row">
		<div class="form-group">							
			<div class="col-md-4">
				<button class="btn btn-block btn-primary" type="submit" onclick="window.history.go(-1); return false;"><i class="si si-login pull-right"></i> Back</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javaScript">
function set_assigned(id,status){
	var quot_id = id;
	$.ajax({
	  type: "POST",
	  url: "/admin/set_quote_status",
	  data:{'qut_id': quot_id,'qut_status': status},	  
	  dataType: 'json',
	  cache: false,
	  success: function(response){	  
		if(response.success){
			alert(response.message);
			setTimeout(function() {
				location.reload();
			}, 5000);
		} else {
			alert(response.message);
		}
	  }
	});
}
</script>
<!-- END Page Content -->
<?php $__env->stopSection(); ?>
<?php //echo "<pre>"; print_r($getAllQuote); die;?>
<?php echo $__env->make("broker.broker_app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
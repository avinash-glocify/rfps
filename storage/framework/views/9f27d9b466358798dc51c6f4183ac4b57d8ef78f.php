<?php $__env->startSection("content"); ?>
<div class="content content-boxed">
	<div class="row qst">
		<h3>View Quote Details : </h3>
		<div class="col-sm-12 col-lg-12">
			 <!-- Block Tabs Alternative Style -->
			<div class="block">
				<div class="block-content tab-content">
					<div class="col-lg-12 tab-pane active" id="btabs-alt-static-profile">
						<div class="row">
							<div class="col-md-3">			
								<?php echo e(Form::label('Quote Title : ', 'Quote Title')); ?>	
							</div>
							<div class="col-md-9">
								<?php echo e(Form::label('first_name', $getQuote[0]->quote_title)); ?>	
							</div>								 		
						</div>
						<div class="row">	
							<div class="col-md-3">			
								<?php echo e(Form::label('Quote Description : ', 'Quote Description')); ?>	
							</div>
							<div class="col-md-9">
								<?php echo e(Form::label('quote_description', $getQuote[0]->quote_description)); ?>	
							</div>								 		
						</div>
						<div class="row">	
							<div class="col-md-3">			
								<?php echo e(Form::label('Quote Document : ', 'Quote Document')); ?>	
							</div>
							<div class="col-md-9">
								<a target="_blank" href="<?php echo e(URL::to('/')); ?>/quotes/<?php echo $getQuote[0]->document;?>">Docs</a>	
							</div>								 		
						</div>
						<div class="row">	
								<div class="col-md-3">			
									<?php echo e(Form::label('Quote Status : ', 'Quote Status')); ?>	
								</div>
								<div class="col-md-9">
									
									<?php if($getQuote[0]->quote_status == 0){ echo "Pending" ; } elseif($getQuote[0]->quote_status == 1) { echo "Approved"; } else { echo "Rejected"; }?>
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
				</div>                                    
			</div>
		</div>
	</div>
</div>
<!-- END Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("broker.broker_app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
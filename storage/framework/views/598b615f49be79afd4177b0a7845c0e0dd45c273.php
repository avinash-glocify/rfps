<?php $__env->startSection("content"); ?>

<!-- Page Header -->
<?php /*
<div class="content bg-image" style="background-image: url('{{ URL::asset('admin_assets/img/photos/bg.jpg') }}');">
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
		<h3>Prospect List</h3>
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
										<th>SrNo</th>
										<th>Name</th>
										<th>Email</th>
										<th>Service Type</th>
										<th>Created at</th>
										<th>Status</th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										
									</tr>
								</thead>
								<tbody><?php $i = 1;?>
									<?php foreach($getAllleads as $company): ?>
									 <?php if($company->notification==1): ?>
									<tr style="background-color:#262323;color:white">
										<td><?php echo e($i++); ?></td>
										<td><?php echo e($company->first_name); ?></td>
										<td><?php echo e($company->email_address); ?></td>
										<td><?php echo e($company->service_type); ?></td>
										<td><?php echo e($company->created_at); ?></td>
										<?php if($company->status == 'pending'): ?>
										<td ><a  style="color:red;" onclick="return confirm('Are you sure You want to change status pending to approved.?')" href="<?php echo e(url('admin/status', ['id' => $company->id])); ?>"><?php echo e($company->status); ?> </a></td>
										<td></td>
										<?php else: ?>
										<td >
											<a style="color:green;"  onclick="return confirm('Are you sure You want to change status approved to pending.?')" href="<?php echo e(url('admin/status', ['id' => $company->id])); ?>" > <?php echo e($company->status); ?> </a>
										</td>
										<td style="color:blue;">
											<a href="#" data-toggle="modal" onclick="return getAssignLeadCom(<?php echo e($company->id); ?>)" data-target="#history">Assign</a>
											
										</td>
										<?php endif; ?>
										<td><a onclick="return confirm('Are you sure?')" href="<?php echo e(url('admin/DeleteLead', ['id' => $company->id])); ?>">Delete</a></td>
										<td><a href="<?php echo e(url('admin/viewLead', ['id' => $company->id])); ?>">View</a></td>
										<td><a href="<?php echo e(url('admin/view_quote', ['id' => $company->id])); ?>">View Quote</a></td>
									</tr>
									<?php else: ?>
										<tr>
										<td><?php echo e($i++); ?></td>
										<td><?php echo e($company->first_name); ?></td>
										<td><?php echo e($company->email_address); ?></td>
										<td><?php echo e($company->service_type); ?></td>
										<td><?php echo e($company->created_at); ?></td>
										<?php if($company->status == 'pending'): ?>
										<td ><a style="color:red;" onclick="return confirm('Are you sure You want to change status pending to approved.?')" href="<?php echo e(url('admin/status', ['id' => $company->id])); ?>"><?php echo e($company->status); ?> </a></td>
										<td></td>
										<?php else: ?>
										<td >
											<a style="color:green;" onclick="return confirm('Are you sure You want to change status approved to pending.?')" href="<?php echo e(url('admin/status', ['id' => $company->id])); ?>" ><?php echo e($company->status); ?> </a>
										</td>
										<td style="color:blue;">
											<a href="#" data-toggle="modal" onclick="return getAssignLeadCom(<?php echo e($company->id); ?>)" data-target="#history">Assign</a>
											
										</td>
										<?php endif; ?>
										<td><a onclick="return confirm('Are you sure?')" href="<?php echo e(url('admin/DeleteLead', ['id' => $company->id])); ?>">Delete</a></td>
										<td><a href="<?php echo e(url('admin/viewLead', ['id' => $company->id])); ?>">View</a></td>
										<td><a href="<?php echo e(url('admin/view_quote', ['id' => $company->id])); ?>">View Quote</a></td>										
									</tr>
									<?php endif; ?>	
									<?php endforeach; ?>
									
								</tbody>
								
							</table>
						</div>	
						
						
						
					</div>
					
				</div>
			</div>
			<!-- END Block Tabs Alternative Style -->
		</div>
		
	</div>
</div>
<!-- END Page Content -->


<div class="modal fade" id="history" role="dialog">
    <div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Assign History</h4>
			</div>
			<div class="modal-body" id="str_rat_html">
				<!--<table class="assign_history" id="pag">
					<thead>
						<tr>
							<th>Company Name</th>
							<th>Ratings</th>
							<th> </th>
						</tr>
					</thead>
					<tbody id="str_rat_html">
						<tr id="loadingImage" ><td style="text-align:center;" colspan=3><img src="/admin_assets/img/loading.gif" alt="loading" ></td></tr>
					</tbody>
				</table>-->
			</div>
			<div class="modal-footer">
				<button type="submit" onclick="return saveAssignedLead();" class="btn btn-default">Submit</button>
			</div>
		</div>
		
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_applist", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
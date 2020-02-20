@extends("admin.admin_applist")
@section("content")
<!-- Page Content -->
<div class="content content-boxed">
	<div class="row">
		<h3>Quotes List</h3>
		<div class="col-sm-12 col-lg-12">
			
			<!-- Block Tabs Alternative Style -->
			<div class="block">
				<div class="block-content tab-content">
					
					
					<div class="col-lg-12 tab-pane active" id="btabs-alt-static-profile">
						
						@if (count($errors) > 0)
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if(Session::has('flash_message'))
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{ Session::get('flash_message') }}
						</div>
						@endif
						
						
						<div class="row" >
							<table id="example" class="display" style="width:100%">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Broker</th>
										<th>Br. Company</th>
										<th>Service Type</th>
										<th>Company</th>
										<th>Quote Title</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								   <?php $i = 1;
								    if(!empty($getAllQuote) && isset($getAllQuote)){
                                    foreach ($getAllQuote as $key=>$c) {?>
									<tr <?php if($c->quote_status==1){?>style="background-color:#262323;color:white"<?php } ?>>
										<td>{{$i++}}</td>
										<td>{{ $c->first_name}} {{ $c->last_name}}</td>
										<td>{{ $c->company_name}}</td>
										<td>{{ $c->service_type}}</td>
										<td>{{ @$c->user_firstname}} {{ @$c->user_lastname}}</td>
										<td>{{ str_limit($c->quote_title, $limit = 10, $end = '...') }}</td>
										<td>
											<?php if($c->quote_status==0) {?>
											<a href="JavaScript:void(0)" onclick="return set_assigned('<?php echo $c->quote_id;?>','1');" >Approve</a> / <a href="JavaScript:void(0)" onclick="return set_assigned('<?php echo $c->quote_id;?>','2');" >Disapprove</a>
											<?php } elseif($c->quote_status==1) {?>
												<a href="JavaScript:void(0)" onclick="return set_assigned('<?php echo $c->quote_id;?>','0');">Approved</a>
											<?php } else {?>
												<a href="JavaScript:void(0)">Rejected</a>
											<?php } ?>
										</td>
										<td><a href="{{ url('admin/viewquote', ['id' => $c->quote_id]) }}">View</a></td>
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
@endsection
<?php //echo "<pre>"; print_r($getAllQuote); die;?>
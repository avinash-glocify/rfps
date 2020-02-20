@extends("admin.admin_applist")

@section("content")
<style>
.col-lg-6.search_codes {float: right;text-align: right;}
.search_codes input[type="text"] {height: 34px;}
</style>
 <!-- Page Header --><?php /*
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
					<h3>Industry Codes</h3>
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
									<!--
									<div class="col-lg-6 import_file">
									{!! Form::open(array('url' => array('admin/rates/import_rates'),'class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
									  <div class="col-lg-2"><h6>Import CSV File</h6></div><div class="col-lg-4"><input type="file" name="csv_file"> </div>
									<div class="col-lg-2"><input type="submit" value="Import" class="btn btn-primary submitwait">
									</div>
									{!! Form::close() !!} 
									</div>
									-->
									<div class="col-lg-6 search_codes"> 
									{!! Form::open(array('url' => array('admin/all-rates'),'class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','method'=>'GET')) !!}
									 <div class="col-lg-1"><h6>Search Code</h6></div><div class="col-lg-3"><input type="text" name="search" value="{{$search}}"> </div>
									<div class="col-lg-4"><input type="submit" value="Search" class="btn btn-primary submitwait">
									</div>
									
									{!! Form::close() !!}
									</div>
										<table id="indestrycode" class="table table-bordered table-striped dataTable no-footer" style="width:100%">
											<thead>
												<tr>
													<th>Index</th>
													<th>State</th>
													<th>Code</th>
													<th>TWC</th>
													<th>WWC</th>
													<th></th>
													<th></th>
													<th></th>
	
												</tr>
											</thead>
											<tbody>
											  <?php $i = 1;?>
												@foreach ($rates as $rate)
													<tr>
														<td>{{ $rate->Index_code}}</td>
														<td>{{ $rate->State}}</td>
														<td>{{ $rate->Code}}</td>
														<td>{{ $rate->TWC}}</td>
														<td>{{ $rate->WWC}}</td>
														
														<td><a href="{{ url('admin/rates', ['id' => $rate->id]) }}">Update</a></td> 
														<td><a onclick="return confirm('Are you sure?')" href="{{ url('admin/rates/delete', ['id' => $rate->id]) }}">Delete</a></td>
														<td><a href="{{ url('admin/viewrate', ['id' => $rate->id]) }}">View</a></td> 
														
													</tr>
												@endforeach
										
											</tbody>
											
											
											
										</table>
										{{$rates->render()}}
									</div>	
										
										
										
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END Block Tabs Alternative Style -->
                        </div>
                        
                    </div>
                </div>
                <!-- END Page Content -->
@endsection

@extends("admin.admin_applist")

@section("content")

 <!-- Page Header -->
               <?php /* <div class="content bg-image" style="background-image: url('{{ URL::asset('admin_assets/img/photos/bg.jpg') }}');">
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
						<h3>Providers List</h3>
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
													<th>SrNo</th>
													<th>Name</th>
													<th>Email</th>
													<th>Created at</th>
													<th>Status</th>
													<th></th>
													<th></th>
													<th></th>
	
												</tr>
											</thead>
											<tbody><?php $i = 1;?>
												@foreach ($getALlCompanies as $company)
												 @if($company->notification==1)
													<tr style="background-color:#262323;color:white">
														<td>{{ $i++}}</td>
														<td>{{ $company->first_name}}</td>
														<td>{{ $company->email}}</td>
														<td>{{ $company->created_at}}</td>
														@if ($company->status == 'pending')
															<td style="color:red;">{{ $company->status}}</td>
														@else
															<td style="color:green;">{{ $company->status}}</td>
														@endif
														<td><a href="{{ url('admin/updateCompany', ['id' => $company->id]) }}">Update</a></td> 
														<td><a onclick="return confirm('Are you sure?')" href="{{ url('admin/DeleteCompany', ['id' => $company->id]) }}">Delete</a></td>
														<td><a href="{{ url('admin/viewCompany', ['id' => $company->id]) }}">View</a></td> 
													</tr>
												 @else
													 <tr>
														<td>{{ $i++}}</td>
														<td>{{ $company->first_name}}</td>
														<td>{{ $company->email}}</td>
														<td>{{ $company->created_at}}</td>
														@if ($company->status == 'pending')
															<td style="color:red;">{{ $company->status}}</td>
														@else
															<td style="color:green;">{{ $company->status}}</td>
														@endif
														<td><a href="{{ url('admin/updateCompany', ['id' => $company->id]) }}">Update</a></td> 
														<td><a onclick="return confirm('Are you sure?')" href="{{ url('admin/DeleteCompany', ['id' => $company->id]) }}">Delete</a></td>
														<td><a href="{{ url('admin/viewCompany', ['id' => $company->id]) }}">View</a></td> 
													</tr>
                                                 @endif 													 
												@endforeach

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
@endsection
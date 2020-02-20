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
                    <div class="row qst">
					<h3>View Industry Codes</h3>
                        <div class="col-sm-12 col-lg-12">

                             <!-- Block Tabs Alternative Style -->
                            <div class="block">
                                <div class="block-content tab-content">
 

                                    <div class="col-lg-8 tab-pane active" id="btabs-alt-static-profile">

                                       
	<div class="row" >
		
			
			<div class="form-group">
			<div class="col-md-6">
			{{Form::label('index', 'Index')}}
			</div>
			<div class="col-md-6">
				{{Form::label('index', $rate->Index_code)}}
			</div>
			</div>
			
			<div class="form-group">
			<div class="col-md-6">
			{{Form::label('State', 'State')}}
			</div>
			<div class="col-md-6">
				{{Form::label('State', $rate->State)}}
			</div>
			</div>
			<div class="form-group">
			<div class="col-md-6">
			{{Form::label('Code', 'Code')}}
			</div>
			<div class="col-md-6">
				{{Form::label('Code', $rate->Code)}}
			</div>
			</div>
			<div class="form-group">
			<div class="col-md-6">
			{{Form::label('TWC', 'TWC')}}
			</div>
			<div class="col-md-6">
				{{Form::label('TWC', $rate->TWC)}}
			</div>
			</div>
			
			<div class="form-group">
			<div class="col-md-6">
			{{Form::label('RWC', 'RWC')}}
			</div>
			<div class="col-md-6">
				{{Form::label('RWC', $rate->RWC)}}
			</div>
			</div>
			<div class="form-group">
			<div class="col-md-6">
			{{Form::label('WWC', 'WWC')}}
			</div>
			<div class="col-md-6">
				{{Form::label('WWC', $rate->WWC)}}
			</div>
			</div>
			
			<div class="form-group">
			<div class="col-md-6">
			{{Form::label('Elig', 'Elig')}}
			</div>
			<div class="col-md-6">
				{{Form::label('Elig', $rate->Elig)}}
			</div>
			</div>
			<div class="form-group">
			<div class="col-md-6">
			{{Form::label('Description', 'Description')}}
			</div>
			<div class="col-md-6">
				{{Form::label('Description', $rate->Description)}}
			</div>
			</div>

			<div class="form-group">
				<button class="btn btn-block btn-primary" type="submit" onclick="window.history.go(-1); return false;"><i class="si si-login pull-right"></i> Back</button>
			</div> 
		
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
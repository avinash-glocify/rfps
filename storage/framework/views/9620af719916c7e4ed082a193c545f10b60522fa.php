<?php $__env->startSection("content"); ?>

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
						<h3>Add New Industry Code</h3>
                        <div class="col-sm-12 col-lg-12">

                             <!-- Block Tabs Alternative Style -->
                            <div class="block">
                                <div class="block-content tab-content">
 

                                    <div class="col-lg-8 tab-pane active" id="btabs-alt-static-profile">

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
                                         <?php echo Form::open(array('url' => 'admin/add-rate','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'loginform','role'=>'form')); ?>

										 <input type="hidden" name="id" value="<?php echo e(isset($rate->id) ? $rate->id : null); ?>">
                                         <div class="form-group">
                                            <label class="control-label col-md-3">
                                            Index<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <input name="Index_code" placeholder="Index" class="form-control" value="<?php echo e(isset($rate->Index_code) ? $rate->Index_code : null); ?>" type="text" required="required">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="control-label col-md-3">
                                            State<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <input name="State" placeholder="State" class="form-control" value="<?php echo e(isset($rate->State) ? $rate->State : null); ?>" type="text" required="required">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="control-label col-md-3">
                                            Code<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <input name="Code" placeholder="Code" class="form-control" value="<?php echo e(isset($rate->Code) ? $rate->Code : null); ?>" type="text" required="required">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="control-label col-md-3">
                                            TWC<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <input name="TWC" placeholder="TWC" class="form-control" value="<?php echo e(isset($rate->TWC) ? $rate->TWC : null); ?>" type="text" required="required">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="control-label col-md-3">
                                            RWC<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <input name="RWC" placeholder="RWC" class="form-control" value="<?php echo e(isset($rate->RWC) ? $rate->RWC : null); ?>" type="text" required="required">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="control-label col-md-3">
                                            WWC<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <input name="WWC" placeholder="WWC" class="form-control" value="<?php echo e(isset($rate->WWC) ? $rate->WWC : null); ?>" type="text" required="required">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="control-label col-md-3">
                                            SWC<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <input name="SWC" placeholder="SWC" class="form-control" value="<?php echo e(isset($rate->SWC) ? $rate->SWC : null); ?>" type="text" required="required">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="control-label col-md-3">
                                            Elig<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <input name="Elig" placeholder="Elig" class="form-control" value="<?php echo e(isset($rate->Elig) ? $rate->Elig : null); ?>" type="text" required="required">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3">
                                            Description<span class="error" style="color: red;">*</span></label>
                                            <div class="col-md-9">
                                                <textarea name="Description" placeholder="Description" class="form-control" value="<?php echo e(isset($rate->Description) ? $rate->Description : null); ?>" type="text" required="required"><?php echo e(isset($rate->Description) ? $rate->Description : null); ?>

												</textarea>
                                            </div>
                                        </div>
                               <div class="col-xs-12 col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5">
                                            </label>
                                            <div class="col-md-7">
                                                <input  value="Save Changes" type="submit" class="btn btn-primary submitwait">
                                            </div>
                                        </div>
                                    </div>

                                 
                                 
                            <?php echo Form::close(); ?> 
							</div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END Block Tabs Alternative Style -->
                        </div>
                        
                    </div>
                </div>
                <!-- END Page Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_applist", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
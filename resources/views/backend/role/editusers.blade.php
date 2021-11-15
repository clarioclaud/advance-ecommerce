@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Edit Admin User</h3>
					
				</div>
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin.user.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id" class="form-control" value="{{ $adminusers->id }}">
                        <input type="hidden" name="old_image" class="form-control" value="{{ $adminusers->profile_photo_path }}">
					  <div class="row">
						<div class="col-12">

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
								<h5>Admin Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control"  value="{{ $adminusers->name }}" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
								
							    </div>

                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
								<h5>Admin Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" value="{{ $adminusers->email }}"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    </div>

                                </div>
                            </div>	

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
								<h5>Admin Phone <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="phone" class="form-control" value="{{ $adminusers->phone }}" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
								
							    </div>

                                </div>                               
                            </div>	

                            <div class="row">
                                <div class="col-md-6">
                                    	
							        <div class="form-group">
							        	<h5>Admin Profile Photo <span class="text-danger">*</span></h5>
								        <div class="controls">
								        	<input type="file" id="image" name="profile_photo_path" class="form-control"  > <div class="help-block"></div></div>
							            </div>
                                </div>

                                <div class="col-md-6">
                                    <img id="showimage" src="{{ !empty($adminusers->profile_photo_path) ? url($adminusers->profile_photo_path) : url('uploads/no_image.jpg')  }}" width="100px" height="100px">
                                </div>

                            </div>
                            
                            <div class="row"> <!--// start  row 9-->
						        <div class="col-md-4">
						            <div class="form-group">
								
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" name="brands" value="1" {{ $adminusers->brands==1 ? 'checked' : '' }} >
											<label for="checkbox_2">Brands</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="categories"  value="1" {{ $adminusers->categories==1 ? 'checked' : '' }} >
											<label for="checkbox_3">Categories</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_4" name="products"  value="1" {{ $adminusers->products==1 ? 'checked' : '' }}>
											<label for="checkbox_4">Products</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_5" name="slider"  value="1" {{ $adminusers->slider==1 ? 'checked' : '' }}>
											<label for="checkbox_5">Slider</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $adminusers->coupons==1 ? 'checked' : '' }}>
											<label for="checkbox_6">Coupons</label>
										</fieldset>
									</div>
							    </div>
                        
                            </div>

                            <div class="col-md-4">
							<div class="form-group">
								
									<div class="controls">
										
										<fieldset>
											<input type="checkbox" id="checkbox_7" name="shipping" value="1" {{ $adminusers->shipping==1 ? 'checked' : '' }} >
											<label for="checkbox_7">Shipping</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $adminusers->blog==1 ? 'checked' : '' }}>
											<label for="checkbox_8">Blog</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_9" name="site" value="1" {{ $adminusers->site==1 ? 'checked' : '' }}>
											<label for="checkbox_9">Site</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_10" name="returnorders" value="1" {{ $adminusers->returnorders==1 ? 'checked' : '' }}>
											<label for="checkbox_10">Return Orders</label>
										</fieldset>                    
                                        <fieldset>
											<input type="checkbox" id="checkbox_11" name="review" value="1" {{ $adminusers->review==1 ? 'checked' : '' }}>
											<label for="checkbox_11">Review</label>
										</fieldset>
                                        
									</div>
							</div>
                        
                            </div>

                            <div class="col-md-4">
							<div class="form-group">
								
									<div class="controls">
                                        <fieldset>
											<input type="checkbox" id="checkbox_12" name="orders" value="1" {{ $adminusers->orders==1 ? 'checked' : '' }} >
											<label for="checkbox_12">Orders</label>
										</fieldset>					
                                        <fieldset>
											<input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $adminusers->stock==1 ? 'checked' : '' }} >
											<label for="checkbox_13">Stock</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_14" name="reports" value="1" {{ $adminusers->reports==1 ? 'checked' : '' }}>
											<label for="checkbox_14">Reports</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_15" name="allusers"  value="1" {{ $adminusers->allusers==1 ? 'checked' : '' }}>
											<label for="checkbox_15">All Users</label>
										</fieldset>
                                        <fieldset>
											<input type="checkbox" id="checkbox_16" name="adminuserrole"  value="1" {{ $adminusers->adminuserrole==1 ? 'checked' : '' }}>
											<label for="checkbox_16">Admin User Role</label>
										</fieldset>
									</div>
							</div>
                        
                            </div>
                        </div>	<!--end row 9-->
													
							
						<div class="text-xs-right">
							<input type="submit" name="submit" class="btn btn-rounded btn-primary mb-5" value="Edit Admin User">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
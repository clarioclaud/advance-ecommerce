@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Admin Profile Edit</h3>
					
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
					<form action="{{ route('admin.update.password') }}" method="post">
                    @csrf
					  <div class="row">
						<div class="col-12">

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
								<h5>Current Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" id="current_password" name="old_password" class="form-control"  required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    	@error('old_password')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>New Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" id="password" name="password" class="form-control"  required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('password')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Confirm Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" id="password_confirmation" name="password_confirmation" class="form-control"  required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('password_confirmation')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>

                                </div>

                                
                            </div>	

                         
						<div class="text-xs-right">
							<input type="submit" name="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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


@endsection
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
					<form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
					  <div class="row">
						<div class="col-12">

                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
								<h5>Admin Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control"  value="{{ $editData->name }}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
								
							    </div>

                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
								<h5>Admin Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" value="{{ $editData->email }}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
                                    <img id="showimage" src="{{ !empty($editData->profile_photo_path) ? url('uploads/admin_images/'.$editData->profile_photo_path) : url('uploads/no_image.jpg')  }}" width="100px" height="100px">
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
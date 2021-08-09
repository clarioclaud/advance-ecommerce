@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<!-- /.col -->

			<!--add brand------>

			<div class="col-12">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Edit Brand</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('brand.update') }}" method="post" enctype="multipart/form-data">
                    @csrf  
					<input type="hidden" value="{{ $brand->id }}" name="id" >
					<input type="hidden" value="{{ $brand->brand_image }}" name="old_image">
                                <div class="form-group">
								<h5>Brand Name in English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="brand_name_en" class="form-control" value="{{ $brand->brand_name_en }}"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    	@error('brand_name_en')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Brand Name in Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="brand_name_hin" class="form-control" value="{{ $brand->brand_name_hin }}"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('brand_name_hin')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Brand Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="brand_image" class="form-control"   data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('brand_image')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>

                         
						<div class="text-xs-right">
							<input type="submit" name="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
						</div>
					</form>


	   </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

 <!-- /.box -->          
</div>
<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>  


@endsection
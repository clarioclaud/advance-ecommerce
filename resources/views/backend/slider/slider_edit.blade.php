@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Edit Slider</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('slider.update') }}" method="post" enctype="multipart/form-data">
                    @csrf  
					<input type="hidden" value="{{ $slider->id }}" name="id" >
					<input type="hidden" value="{{ $slider->slider_img }}" name="old_image">
                                <div class="form-group">
								<h5>Slider Titla <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="title" class="form-control" value="{{ $slider->title }}"  > <div class="help-block"></div></div>
							    	
								</div>
								<div class="form-group">
								<h5>Slider Description <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="description" class="form-control" value="{{ $slider->description }}"> <div class="help-block"></div></div>
						
								</div>
								<div class="form-group">
								<h5>Slider Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="slider_img" class="form-control"> <div class="help-block"></div></div>
									@error('slider_img')
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
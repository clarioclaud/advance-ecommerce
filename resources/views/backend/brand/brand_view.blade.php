@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
  

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Brand List <span class="badge badge-pill badge-danger">{{ count($brands) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand En</th>
								<th>Brand Hin</th>
								<th>Brand Image</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($brands as $brand)
							<tr>
								<td>{{ $brand->brand_name_en }}</td>
								<td>{{ $brand->brand_name_hin }}</td>
								<td>
                                    <img src="{{ asset( $brand->brand_image ) }}" height="70px" width="40px">
                                </td>
								<td>
                                    <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('brand.delete',$brand->id) }}" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
                                </td>
								
							</tr>
						@endforeach	
						</tbody>
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  <!-- /.box -->          
			</div>
			<!-- /.col -->

			<!--add brand------>

			<div class="col-4">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Add Brand</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf  
                                <div class="form-group">
								<h5>Brand Name in English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="brand_name_en" class="form-control"   data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    	@error('brand_name_en')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Brand Name in Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="brand_name_hin" class="form-control"  required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('brand_name_hin')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Brand Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="brand_image" class="form-control"  required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('brand_image')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>

                         
						<div class="text-xs-right">
							<input type="submit" name="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
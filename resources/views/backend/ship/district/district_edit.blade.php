@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<!--edit district------>

			<div class="col-6">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Edit District</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('district.update',$district->id) }}" method="post">
                    @csrf  

                            <div class="form-group">
								<h5>District Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id" class="form-control" aria-invalid="false">
										
										<option value="" selected="" disabled="">Select Your Division</option>
										@foreach($divisions as $div)
										<option value="{{ $div->id }}" {{$div->id == $district->division_id?'selected':''}}>{{ $div->division_name }}</option>
										@endforeach
									</select>
								</div>
                                @error('division_id')
										<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
                                <div class="form-group">
								<h5>District Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="district_name" class="form-control"  value="{{ $district->district_name }}"> <div class="help-block"></div></div>
							    	@error('district_name')
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
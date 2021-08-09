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
				  <h3 class="box-title">District List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col">Division Name</th>
                                <th scope="col">District Name</th>
								<th scope="col">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($districts as $item)
							<tr>
								<td>{{ $item->division->division_name }}</td>
                                <td>{{ $item->district_name }}</td>
								<td width="40%">
                                    <a href="{{ route('district.edit',$item->id) }}" class="btn btn-info" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('district.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
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

			<!--add district------>

			<div class="col-4">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Add District</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('district.store') }}" method="post">
                    @csrf  

                            <div class="form-group">
								<h5>Division Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id" class="form-control" aria-invalid="false">
										
										<option value="" selected="" disabled="">Select Your Division</option>
										@foreach($divisions as $div)
										<option value="{{ $div->id }}" >{{ $div->division_name }}</option>
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
									<input type="text" name="district_name" class="form-control"   data-validation-required-message="This field is required"> <div class="help-block"></div></div>
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
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
				  <h3 class="box-title">SubCategory List <span class="badge badge-pill badge-danger">{{ count($subcategory) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col" width="5%">Category Id</th>
								<th scope="col" width="15%">Subcategory Name En</th>
								<th scope="col" width="15%">subcategory Name Hin</th>
								<th scope="col" width="15%">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($subcategory as $item)
							<tr>
								<td>{{ $item['Category']['category_name_en'] }}</td>
								<td>{{ $item->subcategory_name_en }}</td>
								<td>{{ $item->subcategory_name_hin }}</td>
								<td>
                                    <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-info" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
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

			<!--add category------>

			<div class="col-4">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Add SubCategory</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('subcategory.store') }}" method="post">
                    @csrf  
                            <div class="form-group">
								<h5>Category Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control" aria-invalid="false">
										
										<option value="" selected="" disabled="">Select Your City</option>
										@foreach($category as $cat)
										<option value="{{ $cat->id }}" >{{ $cat->category_name_en }}</option>
										@endforeach
									</select>
								</div>
                                @error('category_id')
										<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
                                <div class="form-group">
								<h5>SubCategory Name in English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subcategory_name_en" class="form-control"   data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    	@error('subcategory_name_en')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>SubCategory Name in Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subcategory_name_hin" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('subcategory_name_hin')
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
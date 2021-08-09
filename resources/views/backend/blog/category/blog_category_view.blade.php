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
				  <h3 class="box-title">Blog Category List <span class="badge badge-pill badge-danger">{{ count($blogcategory) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col" width="15%">Blog Category Name En</th>
								<th scope="col" width="15%">Blog Category Name Hin</th>
								<th scope="col" width="15%">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($blogcategory as $item)
							<tr>
								<td>{{ $item->blog_category_name_en }}</td>
								<td>{{ $item->blog_category_name_hin }}</td>
								<td>
                                    <a href="{{ route('blogcategory.edit',$item->id) }}" class="btn btn-info" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('blogcategory.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
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

			<!--add  blog category------>

			<div class="col-4">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Add Blog Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('blogcategory.store') }}" method="post">
                    @csrf  
                                <div class="form-group">
								<h5>Blog Category Name in English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="blog_category_name_en" class="form-control"   data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    	@error('blog_category_name_en')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Blog Category Name in Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="blog_category_name_hin" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('blog_category_name_hin')
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
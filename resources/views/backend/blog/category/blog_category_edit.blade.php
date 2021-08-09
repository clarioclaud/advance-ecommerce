@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

			<!--edit  blog category------>

			<div class="col-12">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Edit Blog Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('blogcategory.update') }}" method="post">
                    @csrf  
                    <input type="hidden" name="id" value="{{ $blogcategory->id }}">
                                <div class="form-group">
								<h5>Blog Category Name in English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="blog_category_name_en" class="form-control" value="{{ $blogcategory->blog_category_name_en }}" > <div class="help-block"></div></div>
							    	@error('blog_category_name_en')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Blog Category Name in Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="blog_category_name_hin" class="form-control" value="{{ $blogcategory->blog_category_name_hin }}"  > <div class="help-block"></div></div>
									@error('blog_category_name_hin')
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
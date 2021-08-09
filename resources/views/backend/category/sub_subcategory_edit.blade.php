@extends('admin.admin_master')
@section('admin')


<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<!--edit subsubcategory------>

			<div class="col-12">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Edit Sub->SubCategory</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('subsubcategory.update') }}" method="post">
                    @csrf  
                    <input type="hidden" name="id" value="{{ $subsubcategory->id }}">
                            <div class="form-group">
								<h5>Category Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control" aria-invalid="false">
										
										<option value="" selected="" disabled="">Select Category</option>
										@foreach($category as $cat)
										<option value="{{ $cat->id }}" {{ $cat->id==$subsubcategory->category_id ? 'selected': ''  }}>{{ $cat->category_name_en }}</option>
										@endforeach
									</select>
								</div>
                                @error('category_id')
										<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
                            
                            <div class="form-group">
								<h5>SubCategory Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control" aria-invalid="false">
										<option value="" selected="" disabled="">Select subcategory</option>
                                        @foreach($subcategory as $subcat)
										<option value="{{ $subcat->id }}" {{ $subcat->id==$subsubcategory->subcategory_id ? 'selected': ''  }}>{{ $subcat->subcategory_name_en }}</option>
										@endforeach
									</select>
								</div>
                                @error('subcategory_id')
										<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
                                <div class="form-group">
								<h5>Sub SubCategory Name in English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategory->subsubcategory_name_en }}"   data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    	@error('subsubcategory_name_en')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Sub SubCategory Name in Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subsubcategory_name_hin" class="form-control" value="{{ $subsubcategory->subsubcategory_name_hin }}"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('subsubcategory_name_hin')
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
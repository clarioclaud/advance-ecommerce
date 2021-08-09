@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
  

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub->SubCategory List <span class="badge badge-pill badge-danger">{{ count($subsubcategory) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col" width="5%">Category Name</th>
								<th scope="col" width="15%">Subcategory Name </th>
								<th scope="col" width="15%">Sub-subcategory English</th>
								<th scope="col" width="15%">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($subsubcategory as $item)
							<tr>
								<td>{{ $item['Category']['category_name_en'] }}</td>
								<td>{{ $item['SubCategory']['subcategory_name_en'] }}</td>
								<td>{{ $item->subsubcategory_name_en }}</td>
								<td>
                                    <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('subsubcategory.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
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
	 <h3 class="box-title">Add Sub->SubCategory</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('subsubcategory.store') }}" method="post">
                    @csrf  
                            <div class="form-group">
								<h5>Category Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control" aria-invalid="false">
										
										<option value="" selected="" disabled="">Select Category</option>
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
								<h5>SubCategory Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control" aria-invalid="false">
										<option value="" selected="" disabled="">Select subcategory</option>

									</select>
								</div>
                                @error('subcategory_id')
										<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
                                <div class="form-group">
								<h5>Sub SubCategory Name in English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subsubcategory_name_en" class="form-control"   data-validation-required-message="This field is required"> <div class="help-block"></div></div>
							    	@error('subsubcategory_name_en')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
								<h5>Sub SubCategory Name in Hindi <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="subsubcategory_name_hin" class="form-control"  data-validation-required-message="This field is required"> <div class="help-block"></div></div>
									@error('subsubcategory_name_hin')
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

<script type="text/javascript">
	$(document).ready(function(){
		$('select[name="category_id"]').on('change',function(){
			var category_id = $(this).val();
			if(category_id){
				$.ajax({
					url:"{{ url('/categories/subcategory/ajax') }}/"+ category_id,
					type:"GET",
					dataType:"json",
					success:function(data){
						var d = $('select[name="subcategory_id"]').empty();
						$.each(data,function(key,value){
							$('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.subcategory_name_en +'</option>');
						});
					},
				});
			}else{
				alert('danger');
			}
		});
});


</script>

@endsection
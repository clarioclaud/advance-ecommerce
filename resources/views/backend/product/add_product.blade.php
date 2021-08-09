@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
					  @csrf
					  <div class="row">
						<div class="col-12">

                        <div class="row"> <!--// start  row 1-->
                            <div class="col-md-4">
                            <div class="form-group">
								<h5>Brand Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="brand_id" class="form-control" aria-invalid="false" required="">
										
										<option value="" selected="" disabled="">Select Brand</option>
										@foreach($brands as $brand)
										<option value="{{ $brand->id }}" >{{ $brand->brand_name_en }}</option>
										@endforeach
									</select>
								</div>
                                @error('brand_id')
										<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
                        
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
								<h5>Category Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control" aria-invalid="false" required="">
										
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
                        
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
								<h5>Subcategory Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control" aria-invalid="false" required="">
										
										<option value="" selected="" disabled="">Select SubCategory</option>
										
									</select>
								</div>
                                @error('subcategory_id')
										<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
                        
                            </div>
                        </div>	<!--end row 1-->	

                        <div class="row"> <!--// start  row 2-->
                            <div class="col-md-4">
                            <div class="form-group">
								<h5>Sub-subCategory Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subsubcategory_id" class="form-control" aria-invalid="false" required="">
										
										<option value="" selected="" disabled="">Select Sub-subcategory</option>
									
									</select>
								</div>
                                @error('subsubcategory_id')
										<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
                        
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
								<h5>Product Name En <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_en" class="form-control" required="" > 
                                </div>
                                @error('product_name_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                            </div>

                        
                           

                            <div class="col-md-4">
                            <div class="form-group">
								<h5>Product Name Hin <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_name_hin" class="form-control" required="" > 
                                </div>
                                @error('product_name_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>
                        </div>	<!--end row 2-->	

						<div class="row"> <!--// start  row 3-->
							<div class="col-md-4">
                                <div class="form-group">
								<h5>Product Code<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_code" class="form-control" required=""> 
                                </div>
                                @error('product_code')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
								</div>
							</div>

                            <div class="col-md-4">
                                <div class="form-group">
								<h5>Product Quantity <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="number" name="product_qty" class="form-control" required=""> 
                                </div>
                                @error('product_qty')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                            </div>

                        
                           

                            <div class="col-md-4">
                            <div class="form-group">
								<h5>Product Tags En <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_tags_en" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control" required="" > 
                                </div>
                                @error('product_tags_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>
                        </div>	<!--end row 3-->	


						<div class="row"> <!--// start  row 4-->
						<div class="col-md-4">
                            <div class="form-group">
								<h5>Product Tags Hin <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_tags_hin" value="Lorem,Ipsum,Amet" data-role="tagsinput"  class="form-control" required=""> 
                                </div>
                                @error('product_tags_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            <div class="col-md-4">
							<div class="form-group">
								<h5>Product Size En <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_size_en" value="Small,Medium,Large" data-role="tagsinput"  class="form-control" required="" > 
                                </div>
                                @error('product_size_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                            </div>

                            <div class="col-md-4">
							<div class="form-group">
								<h5>Product Size Hin <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_size_hin" value="Small,Medium,Large" data-role="tagsinput" class="form-control" required=""> 
                                </div>
                                @error('product_size_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>
                        </div>	<!--end row 4-->	

						<div class="row"> <!--// start  row 5-->
						<div class="col-md-4">
                            <div class="form-group">
								<h5>Product Color En <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_color_en" value="Red,Blue,Black" data-role="tagsinput"  class="form-control" required=""> 
                                </div>
                                @error('product_color_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            <div class="col-md-4">
							<div class="form-group">
								<h5>Product Color Hin <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_color_hin" value="Red,Blue,Black" data-role="tagsinput"  class="form-control" required=""> 
                                </div>
                                @error('product_color_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            <div class="col-md-4">
							<div class="form-group">
								<h5>Selling Price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="selling_price" class="form-control" required=""> 
                                </div>
                                @error('selling_price')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>
                        </div>	<!--end row 5-->	

						<div class="row"> <!--// start  row 6-->
						<div class="col-md-4">
						<div class="form-group">
								<h5>Discount Price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="discount_price" class="form-control" required=""> 
                                </div>
                                @error('discount_price')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            <div class="col-md-4">
							<div class="form-group">
								<h5>Product Thumbnail<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="product_thumbnail" class="form-control" onchange="ImageUrl(this);" required=""> 
								</div>
								@error('product_thumbnail')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
								<img src="" id="img">
							</div>
                        
                            </div>

                            <div class="col-md-4">
							<div class="form-group">
								<h5>Product multi image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="multi_img[]" id="multiImg" class="form-control" multiple="" required=""> 
								</div>
								@error('multi_img')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
								<div class="row" id="preview_img"></div>
							</div>
                        
                            </div>
                        </div>	<!--end row 6-->	

						

						<div class="row"> <!--// start  row 7-->
						<div class="col-md-6">
						<div class="form-group">
								<h5>Short Description En <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_descp_en" class="form-control" required=""></textarea>
								</div>
                                @error('short_descp_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            <div class="col-md-6">
							<div class="form-group">
								<h5>Short Description Hin<span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_descp_hin" class="form-control" required=""></textarea>
								</div>
								@error('short_descp_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							</div>
                        
                            </div>
                        </div>	<!--end row 7-->	

						<div class="row"> <!--// start  row 8-->
						<div class="col-md-6">
						<div class="form-group">
								<h5>Long Description En <span class="text-danger">*</span></h5>
								<div class="controls">
								<textarea id="editor1" name="long_descp_en" rows="10" cols="80" required="">
											
								</textarea>
								</div>
                                @error('long_descp_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            <div class="col-md-6">
							<div class="form-group">
								<h5>Long Description Hin<span class="text-danger">*</span></h5>
								<div class="controls">
								<textarea id="editor2" name="long_descp_hin" rows="10" cols="80" required="">
												
								</textarea>
								</div>
								@error('long_descp_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							</div>
                        
                            </div>
                        </div>	<!--end row 8-->

						<hr>

						<div class="row"> <!--// start  row 9-->
						<div class="col-md-6">
						<div class="form-group">
								
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" name="hot_deals" value="1" >
											<label for="checkbox_2">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="featured"  value="1">
											<label for="checkbox_3">Featured</label>
										</fieldset>
									</div>
							    </div>
                        
                            </div>

                            <div class="col-md-6">
							<div class="form-group">
								
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="special_offer" value="1">
											<label for="checkbox_4">Special offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_5" name="special_deals" value="1">
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
							</div>
                        
                            </div>
                        </div>	<!--end row 9-->
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" name="submit" value="Add Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

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
						var d = $('select[name="subsubcategory_id"]').html('');
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

		$('select[name="subcategory_id"]').on('change',function(){
			var subcategory_id = $(this).val();
			if(subcategory_id){
				$.ajax({
					url:"{{ url('/categories/subsubcategory/ajax') }}/"+ subcategory_id,
					type:"GET",
					dataType:"json",
					success:function(data){
						var d = $('select[name="subsubcategory_id"]').empty();
						$.each(data,function(key,value){
							$('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">'+ value.subsubcategory_name_en +'</option>');
						});
					},
				});
			}else{
				alert('danger');
			}
		});
	});

</script>

<script type="text/javascript">
	function ImageUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader;
			reader.onload = function(e){
				$("#img").attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}

	}
</script>

<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>


@endsection
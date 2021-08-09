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
			  <h4 class="box-title">Edit Product</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('update.product') }}" method="post" >
					  @csrf
					  <input type="hidden" name="id" value="{{ $product->id }}">
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
										<option value="{{ $brand->id }}" {{$brand->id == $product->brand_id ? 'selected':''}} >{{ $brand->brand_name_en }}</option>
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
										<option value="{{ $cat->id }}" {{$cat->id==$product->category_id ?'selected':''}} >{{ $cat->category_name_en }}</option>
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
                                        @foreach($subcategory as $subcat)
										<option value="{{ $subcat->id }}" {{$subcat->id==$product->subcategory_id ?'selected':''}} >{{ $subcat->subcategory_name_en }}</option>
										@endforeach
										
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
                                        @foreach($subsubcategory as $subsubcat)
										<option value="{{ $subsubcat->id }}" {{$subsubcat->id==$product->subsubcategory_id ?'selected':''}} >{{ $subsubcat->subsubcategory_name_en }}</option>
										@endforeach
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
									<input type="text" name="product_name_en" class="form-control" value="{{ $product->product_name_en }}" required="" > 
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
									<input type="text" name="product_name_hin" class="form-control" value="{{ $product->product_name_hin }}" required="" > 
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
									<input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}" required=""> 
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
									<input type="number" name="product_qty" class="form-control" value="{{ $product->product_qty }}" required=""> 
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
									<input type="text" name="product_tags_en" value="{{ $product->product_tags_en }}" data-role="tagsinput" class="form-control" required="" > 
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
									<input type="text" name="product_tags_hin" value="{{ $product->product_tags_hin }}" data-role="tagsinput"  class="form-control" required=""> 
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
									<input type="text" name="product_size_en"value="{{ $product->product_size_en }}" data-role="tagsinput"  class="form-control"  > 
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
									<input type="text" name="product_size_hin" value="{{ $product->product_size_hin }}" data-role="tagsinput" class="form-control" > 
                                </div>
                                @error('product_size_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>
                        </div>	<!--end row 4-->	

						<div class="row"> <!--// start  row 5-->
						<div class="col-md-6">
                            <div class="form-group">
								<h5>Product Color En <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_color_en" value="{{ $product->product_color_en }}" data-role="tagsinput"  class="form-control" required=""> 
                                </div>
                                @error('product_color_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            <div class="col-md-6">
							<div class="form-group">
								<h5>Product Color Hin <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="product_color_hin" value="{{ $product->product_color_hin }}" data-role="tagsinput"  class="form-control" required=""> 
                                </div>
                                @error('product_color_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            
                        </div>	<!--end row 5-->	

						<div class="row"> <!--// start  row 6-->

                        <div class="col-md-6">
							<div class="form-group">
								<h5>Selling Price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control" required=""> 
                                </div>
                                @error('selling_price')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>
						<div class="col-md-6">
						<div class="form-group">
								<h5>Discount Price <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="discount_price" value="{{ $product->discount_price }}" class="form-control" > 
                                </div>
                                @error('discount_price')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>
                        </div>	<!--end row 6-->	

						

						<div class="row"> <!--// start  row 7-->
						<div class="col-md-6">
						<div class="form-group">
								<h5>Short Description En <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="short_descp_en" class="form-control" required="">{!! $product->short_descp_en !!}</textarea>
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
									<textarea name="short_descp_hin" class="form-control" required="">{!! $product->short_descp_hin !!}</textarea>
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
                                {!! $product->long_descp_en !!}		
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
                                {!! $product->long_descp_hin !!}			
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
											<input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{$product->hot_deals==1 ? 'checked':''}} >
											<label for="checkbox_2">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="featured"  value="1" {{$product->featured==1 ? 'checked':''}}>
											<label for="checkbox_3">Featured</label>
										</fieldset>
									</div>
							    </div>
                        
                            </div>

                            <div class="col-md-6">
							<div class="form-group">
								
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{$product->special_offer==1 ? 'checked':''}}>
											<label for="checkbox_4">Special offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{$product->special_deals==1 ? 'checked':''}}>
											<label for="checkbox_5">Special Deals</label>
										</fieldset>
									</div>
							</div>
                        
                            </div>
                        </div>	<!--end row 9-->
						
						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" name="submit" value="Update Product">
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

		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box bt-3 border-info">
				  		<div class="box-header">
							<h4 class="box-title">Product Multiple Image<strong>Update</strong></h4>
				  		</div>
							<form method="post" action="{{ route('image.update') }}" enctype="multipart/form-data">
							@csrf
								<div class="row">
									@foreach($multimg as $img)
									<div class="col-md-3">									
									<div class="card">
										<img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height:100px; width:100px" >
										<div class="card-body">
											<h5 class="card-title">
												<a href="{{ route('image.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
											</h5>
											<p class="card-text">
												<div class="form-group">
													<label class="form-control-label">Change Image<span class="text-danger">*</span></label>
													<input type="file" class="form-control" name="multi_img[{{$img->id}}]">
												</div>
											</p>
										</div>	
									</div>									
									</div>
									@endforeach
								</div>

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-info" name="submit" value="Update Product Images">
								</div>
							</form>
						<br><br>
					</div>
				</div>
			</div>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box bt-3 border-info">
				  		<div class="box-header">
							<h4 class="box-title">Product Thumbnail Image<strong>Update</strong></h4>
				  		</div>
							<form method="post" action="{{ route('thumbnail.image.update') }}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{$product->id}}">
							<input type="hidden" name="pro_image" value="{{ $product->product_thumbnail }}">
								<div class="row">
									
									<div class="col-md-3">									
									<div class="card">
										<img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" style="height:100px; width:100px" >
										<div class="card-body">
											
											<p class="card-text">
												<div class="form-group">
													<label class="form-control-label">Change Image<span class="text-danger">*</span></label>
													<input type="file" class="form-control" name="product_thumbnail" onchange="ImageUrl(this)">
													<img src="" id="img">
												</div>
											</p>
										</div>	
									</div>									
									</div>
									
								</div>

								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-info" name="submit" value="Update Product Thumbnail Image">
								</div>
							</form>
						<br><br>
					</div>
				</div>
			</div>
		</section>
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
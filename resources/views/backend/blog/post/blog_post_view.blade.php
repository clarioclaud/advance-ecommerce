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
			  <h4 class="box-title">Add Blog Post</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('store.blogpost') }}" method="post" enctype="multipart/form-data">
					  @csrf	

                        <div class="row"> <!--// start  row 2-->

                            <div class="col-md-6">
                                <div class="form-group">
								<h5>Blog Post Name En <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="blog_title_en" class="form-control" required="" > 
                                </div>
                                @error('blog_title_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                            </div>

                        
                           

                            <div class="col-md-6">
                            <div class="form-group">
								<h5>Blog Post Name Hin <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="blog_title_hin" class="form-control" required="" > 
                                </div>
                                @error('blog_title_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>
                        </div>	<!--end row 2-->



						
						<div class="row"> <!--// start  row 6-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Blog Category Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control" aria-invalid="false" required="">
                                            
                                            <option value="" selected="" disabled="">Select Blog category</option>
                                            @foreach($blogcategory as $cat)
                                            <option value="{{ $cat->id }}" >{{ $cat->blog_category_name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            
                            </div>
					
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Blog Post Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="blog_image" class="form-control" onchange="ImageUrl(this);" required=""> 
                                    </div>
                                    @error('blog_image')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                    <img src="" id="img">
							    </div>
                        
                            </div>

                            
                        </div>	<!--end row 6-->	

						<div class="row"> <!--// start  row 8-->
						<div class="col-md-6">
							<div class="form-group">
								<h5>Blog Post Description En <span class="text-danger">*</span></h5>
								<div class="controls">
								<textarea id="editor1" name="blog_details_en" rows="10" cols="80" required="">
											
								</textarea>
								</div>
                                @error('blog_details_en')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							    </div>
                        
                            </div>

                            <div class="col-md-6">
							<div class="form-group">
								<h5>Blog Post Description Hin<span class="text-danger">*</span></h5>
								<div class="controls">
								<textarea id="editor2" name="blog_details_hin" rows="10" cols="80" required="">
												
								</textarea>
								</div>
								@error('blog_details_hin')
										<span class="text-danger">{{ $message }}</span>
								@enderror 
							</div>
                        
                            </div>
                        </div>	<!--end row 8-->

						<hr>

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" name="submit" value="Add Blog Post">
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


@endsection
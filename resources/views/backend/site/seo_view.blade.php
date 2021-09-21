@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Site Settings Update</h3>
					
				</div>
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('seo.setting.update') }}" method="post" >
                    @csrf
					  <div class="row">
						<div class="col-12">
                            <input type="hidden" name="id" class="form-control" value="{{ $seo->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                
                                    <div class="form-group">
                                        <h5>Meta Title <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="meta_title" class="form-control"  value="{{ $seo->meta_title }}">
                                        </div>
                                            
                                    </div>
                                    <div class="form-group">
                                        <h5>Meta Author <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="meta_author" class="form-control"  value="{{ $seo->meta_author }}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Meta Keywords <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="meta_keyword" class="form-control"  value="{{ $seo->meta_keyword }}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Meta Description<span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <textarea name="meta_description" class="form-control">{{ $seo->meta_description }}</textarea>
                                        </div>
                               
							        </div>
                                    <div class="form-group">
                                        <h5>Google Analytics <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <textarea name="google_analytics" class="form-control">{{ $seo->google_analytics }}</textarea>
                                        </div>
                                        
                                    </div>
                                   

                                </div>

                                
                            </div>	

                         
						<div class="text-xs-right">
							<input type="submit" name="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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


@endsection
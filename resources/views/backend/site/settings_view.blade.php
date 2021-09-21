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
					<form action="{{ route('site.setting.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
					  <div class="row">
						<div class="col-12">
                            <input type="hidden" name="id" class="form-control" value="{{ $settings->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Logo <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="file" name="logo" class="form-control"  >
                                        </div>                                
                                    </div>
                                    <div class="form-group">
                                        <h5>Phone One <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="phone_one" class="form-control"  value="{{ $settings->phone_one }}">
                                        </div>
                                            
                                    </div>
                                    <div class="form-group">
                                        <h5>Phone Two <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="phone_two" class="form-control"  value="{{ $settings->phone_two }}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="email"  name="email" class="form-control"  value="{{ $settings->email }}">
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Company Name <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="company_name" class="form-control" value="{{ $settings->company_name }}" >
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Company Address <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="company_address" class="form-control" value="{{ $settings->company_address }}" >
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Facebook <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="facebook" class="form-control" value="{{ $settings->facebook }}" >
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Twitter <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="twitter" class="form-control" value="{{ $settings->twitter }}" >
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Linked In<span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="linked_in" class="form-control" value="{{ $settings->linked_in }}"  >
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <h5>Youtube <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text"  name="youtube" class="form-control" value="{{ $settings->youtube }}" >
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
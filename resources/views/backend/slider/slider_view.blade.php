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
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Slider Image</th>
								<th>Slider Title</th>
								<th>Description</th>
                                <th>Status</th>
								<th width="30%">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($sliders as $item)
							<tr>
                                <td>
                                    <img src="{{ asset( $item->slider_img ) }}" height="70px" width="40px">
                                </td>
								<td>
                                    @if($item->title == NULL)
                                        <span class="badge badge-pill badge-danger">No Title</span>
                                    @else
                                        {{ $item->title }}
                                    @endif
                               
                                </td>
								<td>{{ $item->description }}</td>
								<td>
                                    @if($item->status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Deactive</span>
                                    @endif
                                </td>
								<td> 
                                    <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
                                    @if($item->status == 1)
                                        <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive slider"><i class="fa fa-arrow-down"></i></a>
                                    @else
                                        <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Active slider"><i class="fa fa-arrow-up"></i></a>
                                    @endif
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

			<!--add slider------>

			<div class="col-4">

<div class="box">
   <div class="box-header with-border">
	 <h3 class="box-title">Add Slider</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
	   <div class="table-responsive">
	   <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf  
                                <div class="form-group">
								<h5>Slider Title<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="title" class="form-control" > </div>
							    	
								</div>
								<div class="form-group">
								<h5>Slider Description <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="description" class="form-control"> </div>
								
								</div>
								<div class="form-group">
								<h5>Slider Image<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="slider_img" class="form-control"  > </div>
									@error('slider_img')
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
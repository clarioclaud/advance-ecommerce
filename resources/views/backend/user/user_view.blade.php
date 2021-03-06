@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
  

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Total Users <span class="badge badge-pill badge-danger">{{ count($users) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($users as $user)
							<tr>
                                <td>
                                    <img src="{{ !empty($user->profile_photo_path) ? url('uploads/user_images/'.$user->profile_photo_path): url('uploads/no_image.jpg') }}" height="50px" width="50px">
                                </td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->phone }}</td>
                                <td>
                                    @if($user->UserOnline())    
                                    <span class="badge badge-pill badge-success">Active Now</span></td>
                                    @else
                                    <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span></td>
                                    @endif
								<td>
                                    <a href="{{ route('brand.edit',$user->id) }}" class="btn btn-info" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('brand.delete',$user->id) }}" class="btn btn-danger" id="delete" title="Delete data"><i class="fa fa-trash"></i></a>
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


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>  


@endsection
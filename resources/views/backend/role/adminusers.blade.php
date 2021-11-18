@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
  

			<div class="col-md-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Admin User Roles</h3>
                  <a href="{{ route('add.admin.user') }}" class="btn btn-danger" style="float:right">Add Admin User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col">Image</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
                                <th scope="col">Access</th>
								<th scope="col">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($adminusers as $item)
							<tr>
								<td><img src="{{ asset($item->profile_photo_path) }}" style="width:50px;height=50px;"></td>
								<td>{{ $item->name}}</td>
								<td>{{ $item->email}}</td>
                                <td>
                                    @if($item->brands == 1)
                                        <span class="badge btn-primary">Brands</span>
                                    @else
                                    @endif

                                    @if($item->categories == 1)
                                        <span class="badge btn-secondary">Categories</span>
                                    @else
                                    @endif

                                    @if($item->products == 1)
                                        <span class="badge btn-success">Products</span>
                                    @else
                                    @endif

                                    @if($item->slider == 1)
                                        <span class="badge btn-danger">Slider</span>
                                    @else
                                    @endif

                                    @if($item->coupons == 1)
                                        <span class="badge btn-info">Coupons</span>
                                    @else
                                    @endif

                                    @if($item->shipping == 1)
                                        <span class="badge btn-dark">Shipping</span>
                                    @else
                                    @endif

                                    @if($item->blog == 1)
                                        <span class="badge btn-light">Blog</span>
                                    @else
                                    @endif

                                    @if($item->site == 1)
                                        <span class="badge btn-primary">Site</span>
                                    @else
                                    @endif

                                    @if($item->returnorders == 1)
                                        <span class="badge btn-secondary">Return Orders</span>
                                    @else
                                    @endif

                                    @if($item->review == 1)
                                        <span class="badge btn-success">Review</span>
                                    @else
                                    @endif

                                    @if($item->orders == 1)
                                        <span class="badge btn-danger">Orders</span>
                                    @else
                                    @endif

                                    @if($item->stock == 1)
                                        <span class="badge btn-info">Stock</span>
                                    @else
                                    @endif

                                    @if($item->reports == 1)
                                        <span class="badge btn-warning">Reports</span>
                                    @else
                                    @endif

                                    @if($item->allusers == 1)
                                        <span class="badge btn-light">All users</span>
                                    @else
                                    @endif

                                    @if($item->adminuserrole == 1)
                                        <span class="badge btn-dark">Adminuserrole</span>
                                    @else
                                    @endif
                                </td>
                               
								<td width="30%">
                                    <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-info" title="Edit data"><i class="fa fa-pencil"></i></a>
                                    <a target="_blank" href="{{ route('delete.admin.user',$item->id) }}" class="btn btn-danger" title="Delete data" id="delete"><i class="fa fa-trash"></i></a>
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

			<!--add coupon------>

			
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>  


@endsection
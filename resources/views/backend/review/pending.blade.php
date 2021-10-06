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
				  <h3 class="box-title">Pending Reviews List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col">Summary</th>
								<th scope="col">Comment</th>
								<th scope="col">User Name</th>
                                <th scope="col">Product</th>
                                <th scope="col">Status</th>
								<th scope="col">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($reviews as $item)
							<tr>
								<td>{{ $item->summary }}</td>
								<td>{{ $item->review }}</td>
								<td>{{ $item->user->name }}</td>
                                <td>{{ $item->product->product_name_en }}</td>
                                <td>
                                    @if($item->status == 0)
                                    <span class="badge badge-pill badge-primary">Pending</span>
                                    @elseif($item->status == 1)
                                    <span class="badge badge-pill badge-success">Publish</span>
                                    @endif
                                </td>
								<td width="30%">
                                    <a href="{{ route('review.approve',$item->id) }}" class="btn btn-danger" title="View data">Approve</a>    
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
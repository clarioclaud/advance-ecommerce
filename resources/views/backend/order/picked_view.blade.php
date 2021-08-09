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
				  <h3 class="box-title">Picked Orders List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col">Order Date</th>
								<th scope="col">Invoice</th>
								<th scope="col">Payment</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
								<th scope="col">Action</th>
								
							</tr>
						</thead>
						<tbody>
                        @foreach($order as $item)
							<tr>
								<td>{{ $item->order_date }}</td>
								<td>{{ $item->invoice_no}}</td>
								<td>{{ $item->payment_method}}</td>
                                <td>${{ $item->amount}}</td>
                                <td><span class="badge badge-pill badge-primary">{{ $item->status}}</span></td>
								<td width="30%">
                                    <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="View data"><i class="fa fa-eye"></i></a>
                                    <a target="_blank" href="{{ route('admin.invoice',$item->id) }}" class="btn btn-danger" title="Invoice Download"><i class="fa fa-download"></i></a>
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
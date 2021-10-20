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
				  <h3 class="box-title">Product List <span class="badge badge-pill badge-danger">{{ count($products) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col" width="5%">Product Image</th>
								<th scope="col" width="15%">Product Name En</th>
								<th scope="col" width="15%">Quantity</th>
								<th scope="col" width="15%">Product Price</th>
                                <th scope="col" width="15%">Discount Price</th>
								<th scope="col" width="15%">Status</th>								
								
							</tr>
						</thead>
						<tbody>
                        @foreach($products as $item)
							<tr>
								<td><span><img src="{{ asset($item->product_thumbnail) }}" width="50px" height="50px"></span></td>
								<td>{{ $item->product_name_en }}</td>
                                <td>{{ $item->product_qty }}</td>
								<td>{{ $item->selling_price }}$</td>
								<td>
									@if($item->discount_price == NULL)
										<span class="badge badge-pill badge-danger">No Discount</span>	
									@else
										@php
											$amount = $item->selling_price - $item->discount_price;
											$discount_amount = ($amount/$item->selling_price) * 100;
										@endphp
										<span class="badge badge-pill badge-danger">{{ round($discount_amount) }}%</span>
									@endif
									
								</td>
								<td>
									@if($item->status== 1)
										<span class="badge badge-pill badge-success">Active</span>
									@else
										<span class="badge badge-pill badge-danger">Deactive</span>	
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

  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>  


@endsection
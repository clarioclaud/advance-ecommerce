@extends('admin.admin_master')
@section('admin')
<script src="{{ asset('backend/js/code.js') }}" type="text/javascript"></script>
	

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Order Details</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                    <h4 class="box-title"><strong>Shipping Details</strong> </h4>
                    </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Shipping Name:</th>
                                    <th>{{ $order->name }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Email:</th>
                                    <th>{{ $order->email }}</th>
                                </tr>
                                <tr>
                                    <th>Shipping Phone:</th>
                                    <th>{{ $order->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Division Name:</th>
                                    <th>{{ $order->division->division_name }}</th>
                                </tr>
                                <tr>
                                    <th>District Name:</th>
                                    <th>{{ $order->district->district_name }}</th>
                                </tr>
                                <tr>
                                    <th>State Name:</th>
                                    <th>{{ $order->state->state_name }}</th>
                                </tr>
                                <tr>
                                    <th>Postal Code:</th>
                                    <th>{{ $order->post_code }}</th>
                                </tr>
                                <tr>
                                    <th>Order Date:</th>
                                    <th>{{ $order->order_date }}</th>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong> <span class="text-danger">Invoice No: {{ $order->invoice_no }}</span> </h4>
				  </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <th>{{ $order->user->name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <th>{{ $order->user->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Payment Method:</th>
                                    <th>{{ $order->payment_method }}</th>
                                </tr>
                                <tr>
                                    <th>Transaction Id:</th>
                                    <th>{{ $order->transaction_id }}</th>
                                </tr>
                                <tr>
                                    <th>Invoice No:</th>
                                    <th><span class="text-danger">{{ $order->invoice_no }}</span></th>
                                </tr>
                                <tr>
                                    <th>Order Total:</th>
                                    <th>${{ $order->amount }}</th>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <th><span class="badge badge-pill badge-primary" style="background:indigo">{{ $order->status }}</span></th>
                                </tr>
                                @if($order->status == 'pending')
                                <tr>
                                    <th></th>
                                    <th><a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm" >Confirm Order</a></th>
                                </tr>
                                @elseif($order->status == 'confirm')
                                <tr>
                                    <th></th>
                                    <th><a href="{{ route('confirm-process',$order->id) }}" class="btn btn-block btn-success" id="process" >Processing Order</a></th>
                                </tr>
                                @elseif($order->status == 'processing')
                                <tr>
                                    <th></th>
                                    <th><a href="{{ route('process-picked',$order->id) }}" class="btn btn-block btn-success" id="picked" >Picked Order</a></th>
                                </tr>
                                @elseif($order->status == 'picked')
                                <tr>
                                    <th></th>
                                    <th><a href="{{ route('picked-shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped" >Shipped Order</a></th>
                                </tr>
                                @elseif($order->status == 'shipped')
                                <tr>
                                    <th></th>
                                    <th><a href="{{ route('shipped-delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered" >Delivered Order</a></th>
                                </tr>
                                @elseif($order->status == 'delivered')
                                <tr>
                                    <th></th>
                                    <th><a href="{{ route('delivered-cancel',$order->id) }}" class="btn btn-block btn-success" id="cancel" >Cancel Order</a></th>
                                </tr>
                                @endif
                            </tbody>
                        </table>
				</div>
			</div>

            <div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Ordered Product Details</strong></h4>
				  </div>
				        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-md-2"><label for="">Image</label></td>
                                    <td class="col-md-2"><label for="">Product Name</label></td>
                                    <td class="col-md-2"><label for="">Product Code </label></td>
                                    <td class="col-md-1"><label for="">Color</label></td>
                                    <td class="col-md-1"><label for="">Size</label></td>
                                    <td class="col-md-2"><label for="">Quantity</label></td>
                                    <td class="col-md-2"><label for="">Price</label></td>
                                </tr>
                                
                                @foreach($orderitem as $item)
                                <tr>
                                    <td class="col-md-2"><label for=""><img src="{{ asset($item->product->product_thumbnail) }}" height="50px" width="50px"></label></td>
                                    <td class="col-md-2"><label for="">{{ $item->product->product_name_en }}</label></td>
                                    <td class="col-md-2"><label for="">{{ $item->product->product_code }}</label></td>
                                    <td class="col-md-1"><label for="">{{ $item->color }}</label></td>
                                    @if($item->size == null)
                                    <td class="col-md-1"><label for="">---</label></td>
                                    @else
                                    <td class="col-md-1"><label for="">{{ $item->size }}</label></td>
                                    @endif
                                    <td class="col-md-2"><label for="">{{ $item->qty }}</label></td>
                                    <td class="col-md-2"><label for="">${{ $item->price }} (${{ $item->price}} * {{$item->qty }})</label></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
				</div>
			</div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
	  
</div>  


@endsection
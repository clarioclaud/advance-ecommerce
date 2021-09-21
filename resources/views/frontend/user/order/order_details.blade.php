@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <!-- user sidebar-->
                @include('frontend.common.user_sidebar')
            <!--user sidebar end -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><h4>Shipping Details</h4></div>
                    <hr>
                    <div class="card-body">
                        <table class="table" style="background:#d4d2d2">
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
            </div> <!-- end col md 5 -->

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><h4>Order Details <span class="text-danger">Invoice No: {{ $order->invoice_no }}</span></h4></div>
                    <hr>
                    <div class="card-body">
                        <table class="table" style="background:#d4d2d2">
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
                                    <th>Amount:</th>
                                    <th>${{ $order->amount }}</th>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col md 5 -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr style="background:#d4d2d2">
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
            </div><!--End row--->
            @if($order->status !== "delivered")

            @else
                @php
                    $order = App\Models\Order::where('id',$order->id)->where('user_id',Auth::id())->where('return_reason','=',NULL)->first();
                @endphp
                @if($order)
                <form action="{{ route('return.reason',$order->id) }}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="label">Order Return Reason</label>
                    <textarea class="form-control" name="return_reason" id="" cols="30" rows="05">Return Reason</textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                </form >
                @else
                    <span class="badge badge-pill badge-warning" style="background:red;">You Have Send Return Order Request For This Product</span>
                @endif
            @endif
            <br><br>
        </div><!--End row--->
    </div>
</div>

@endsection
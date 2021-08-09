@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <!-- user sidebar-->
                @include('frontend.common.user_sidebar')
            <!--user sidebar end -->
            <div class="col-md-1"></div>
            <div class="col-md-9">
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr style="background:#dbd6d6">
                                <td class="col-md-2"><label for="">Order Date</label></td>
                                <td class="col-md-2"><label for="">Amount</label></td>
                                <td class="col-md-2"><label for="">Payment </label></td>
                                <td class="col-md-2"><label for="">Invoice No</label></td>
                                <td class="col-md-2"><label for="">Status</label></td>
                                <td class="col-md-3"><label for="">Action</label></td>
                            </tr>
                            
                            @forelse($order as $item)
                            <tr>
                                <td class="col-md-2"><label for="">{{ $item->order_date }}</label></td>
                                <td class="col-md-2"><label for="">${{ $item->amount }}</label></td>
                                <td class="col-md-2"><label for="">{{ $item->payment_method }}</label></td>
                                <td class="col-md-2"><label for="">{{ $item->invoice_no }}</label></td>
                                <td class="col-md-2"><label for=""><span class="badge badge-pill badge-warning" style="background:#4e7ee9">{{ $item->status }}</span></td>
                                <td class="col-md-3"><label for="">
                                        <a href="{{ url('/user/order/view/'.$item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>
                                        <a target="_blank" href="{{ url('/user/invoice/download/'.$item->id) }}" class="btn btn-sm btn-danger" style="margin-top:5px"><i class="fa fa-download"></i>Invoice</a>
                                </label></td>
                            </tr>
                            @empty
                                <h2 class="text-danger">Order Not Found</h2>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
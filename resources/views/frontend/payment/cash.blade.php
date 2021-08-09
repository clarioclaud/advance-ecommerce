@extends('frontend.main_master')
@section('content')

@section('title')
Cash On Delivery
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Cash On Delivery</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Payment</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                    
                    <hr>
                    @if(Session::has('coupon'))  
                        <li><strong>Sub Total:</strong> ${{ $carttotal }}</li><hr>                     
                        <li><strong>Coupon Name:</strong> {{ session()->get('coupon')['coupon_name'] }} ({{ session()->get('coupon')['coupon_discount'] }}%)</li><hr>
                        <li><strong>Discount Amount:</strong> ${{ session()->get('coupon')['discount_amount'] }}</li><hr>
                        <li><strong>Grand Total:</strong> ${{ session()->get('coupon')['total_amount'] }}</li><hr>
                    @else
                        <li><strong>Sub Total:</strong> ${{ $carttotal }}</li><hr>
                        <li><strong>Grand Total:</strong> ${{ $carttotal }}</li>
                    @endif
					
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->	</div>
<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Payment Method</h4>
		    </div>
		    <div class="">
            <form action="{{ route('cash.payment') }} " method="post" id="payment-form">
                    @csrf
                <div class="form-row">
                    <img src="{{ asset('frontend/assets/images/payments/cash.png') }}">
                    <label for="card-element">
                    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                    <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                    <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                    <input type="hidden" name="post_code" value="{{ $data['postcode'] }}">
                    <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                    <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                    <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                    <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                    </label>
                        
                </div>
                <br>
                <button class="btn btn-primary">Cash On Delivery</button>
            </form>
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->	</div>
</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
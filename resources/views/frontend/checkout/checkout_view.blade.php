@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title')
  My Checkout Page
@endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		
                <h4 class="checkout-subtitle text-center"><strong>Shipping Details</strong></h4>
				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 already-registered-login">
					
					
					<form action="{{ route('checkout.store') }}" method="POST">
						@csrf
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Shipping Name </b><span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Shipping name" name="shipping_name" value="{{ Auth::user()->name }}" required="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Email Address </b><span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Email" name="shipping_email" value="{{ Auth::user()->email }}" required=""> 
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Phone </b><span>*</span></label>
					    <input type="number" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Phone" name="shipping_phone" value="{{ Auth::user()->phone }}" required="">
					  </div>
                      <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Post Code </b><span>*</span></label>
					    <input type="number" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Enter Post Code" name="postcode" required="">
					  </div>
					  
					  
				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
                    <br>
					<div class="form-group">
						<h5>Shipping Division<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="division_id" class="form-control" aria-invalid="false" required="">
								
								<option value="" selected="" disabled="">Select Division</option>
								@foreach($divisions as $item)
								<option value="{{ $item->id }}" >{{ $item->division_name }}</option>
								@endforeach
							</select>
						</div>
						@error('division_id')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Shipping District<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="district_id" class="form-control" aria-invalid="false" required="">
								
								<option value="" selected="" disabled="">Select District</option>
								
							</select>
						</div>
						@error('district_id')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
					<div class="form-group">
						<h5>Shipping State<span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="state_id" class="form-control" aria-invalid="false" required="">
								
								<option value="" selected="" disabled="">Select State</option>
								
							</select>
						</div>
						@error('state_id')
								<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>
                    <div class="form-group">
                        <label class="info-title control-label">Notes<span></span>*</label>
                        <textarea class="form-control" name="notes" row="14" col="10"></textarea>
                    </div>
					 
					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                    @foreach($cartcontent as $cart)
					<li><strong>Image:</strong>
                    <img src="{{ asset($cart->options->image) }}" style="height:50px;width:50px"></li>
                    <li>
                        <strong>Quantity:</strong> ({{ $cart->qty }})
                        <strong>Color:</strong> {{ $cart->options->color }}
                        @if($cart->options->size =="")
                        
                        @else
                        <strong>Size:</strong> {{ $cart->options->size }}
                        @endif
                        
                    </li><br>
                    @endforeach
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
<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Payment Method</h4>
		    </div>
		    <div class="">
				<div class="row">
					<div class="col-md-3">
						<label for="stripe">Stripe</label>
						<input type="radio" name="payment_method" value="stripe">
						<img src="{{ asset('frontend/assets/images/payments/4.png') }}">
					</div>
					<div class="col-md-3">
						<label for="paypal">Paypal</label>
						<input type="radio" name="payment_method" value="paypal">
						<img src="{{ asset('frontend/assets/images/payments/4.png') }}">
					</div>
					<div class="col-md-3">
						<label for="stripe">Card</label>
						<input type="radio" name="payment_method" value="card">
						<img src="{{ asset('frontend/assets/images/payments/3.png') }}">
					</div>
					<div class="col-md-3">
						<label for="stripe">Cash</label>
						<input type="radio" name="payment_method" value="cash">
						<img src="{{ asset('frontend/assets/images/payments/6.png') }}">
					</div>
				</div>
				<hr>
				<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Make Payment</button>
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


<script type="text/javascript">
	$(document).ready(function(){
		$('select[name="division_id"]').on('change',function(){
			var division_id = $(this).val();
			if(division_id){
				$.ajax({
					url:"{{ url('/get-district/ajax') }}/"+ division_id,
					type:"GET",
					dataType:"json",
					success:function(data){
						$('select[name="state_id"]').empty();
						$('select[name="district_id"]').empty();
						$.each(data,function(key,value){
							$('select[name="district_id"]').append('<option value="'+ value.id +'">'+ value.district_name +'</option>');
						});
					},
				});
			}else{
				alert('danger');
			}
		});

		$('select[name="district_id"]').on('change',function(){
			var district_id = $(this).val();
			if(district_id){
				$.ajax({
					url:"{{ url('/get-state/ajax') }}/"+ district_id,
					type:"GET",
					dataType:"json",
					success:function(data){
						$('select[name="state_id"]').empty();
						$.each(data,function(key,value){
							$('select[name="state_id"]').append('<option value="'+ value.id +'">'+ value.state_name +'</option>');
						});
					},
				});
			}else{
				alert('danger');
			}
		});
	});

</script>


@endsection
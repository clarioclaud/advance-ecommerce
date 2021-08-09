@extends('frontend.main_master')
@section('content')
@section('title')
  My Payment Page
@endsection



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Payment</li>
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
            <form action="" method="post" id="payment-form">
                    @csrf
                <div class="form-row">
                    <label for="card-element">
                    <input type="hidden" name="name" id="name" value="{{ $data['shipping_name'] }}">
                    <input type="hidden" name="email" id="email" value="{{ $data['shipping_email'] }}">
                    <input type="hidden" name="phone" id="phone" value="{{ $data['shipping_phone'] }}">
                    <input type="hidden" name="post_code" id="post_code" value="{{ $data['postcode'] }}">
                    <input type="hidden" name="division_id" id="division_id" value="{{ $data['division_id'] }}">
                    <input type="hidden" name="district_id" id="district_id" value="{{ $data['district_id'] }}">
                    <input type="hidden" name="state_id" id="state_id" value="{{ $data['state_id'] }}">
                    <input type="hidden" name="notes"  id="notes" value="{{ $data['notes'] }}">
                    @if(Session::has('coupon'))
                    <input type="hidden" name="amount" id="amount" value="{{ session()->get('coupon')['total_amount'] }}">
                    @else
                    <input type="hidden" name="amount" id="amount" value="{{ $carttotal }}">
                    @endif
                    </label>
                    <div id="smart-button-container">
                      <div style="text-align: center;">
                        <div id="paypal-button-container"></div>
                      </div>
                    </div>
                    
                </div>
                <br>
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

  <script src="https://www.paypal.com/sdk/js?client-id=ARotoOKoWA1ch0pwtNtLAczFNN5urbPyN3iubRJNjiB512UTFK7yFu5o-LcjHrz-Z9ty_ZeOd3UyDOpZ&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":amount}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
            // var amount = $('#amount').val();
            // var name = $('#name').text();
            // var email = $('#email').text();
            // var phone = $('#phone').val();
            // var post_code = $('#post_code').val();
            // var division_id = $('#division_id').val();
            // var district_id = $('#district_id').val();
            // var state_id = $('#state_id').val();
            // var notes = $('#notes').val();
            // $.ajax({
            //   type: 'POST',
            //   url: '/user/paypal/payment',
            //   dataType: 'json',
            //   data: { amount:amount, name:name, email:email, phone:phone, post_code:post_code, division_id:division_id, district_id:district_id, state_id:state_id, notes:notes, transaction_id:details.payments.captures.id, currency:details.payments.captures.amount.currency_code, order_number:details.id}
            //   success: function(details){
            //       var url ="/dashboard";
            //       $('location').attr('href',url);
            //       toastr.success(details.message);
            //   }
            // })
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>


@endsection
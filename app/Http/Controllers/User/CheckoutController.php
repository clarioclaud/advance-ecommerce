<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function GetDistrictAjax($division_id)
    {
        $distict = ShippingDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($distict);
    }

    public function GetStateAjax($district_id)
    {
        $state = ShippingState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($state);
    }

    public function CheckoutStore(Request $request)
    {
        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['postcode'] = $request->postcode;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
        $data['payment_method'] = $request->payment_method;
        $carttotal = Cart::total();
       if ($request->payment_method == 'stripe') {
           return view('frontend.payment.stripe', compact('data','carttotal'));
       }elseif ($request->payment_method == 'card') {
           return 'card';
       }elseif ($request->payment_method == 'paypal') {
           return view('frontend.payment.paypal',compact('data','carttotal'));
       }else {
        return view('frontend.payment.cash', compact('data','carttotal'));
       }
    }
}

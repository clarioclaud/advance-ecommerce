<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class CartpageController extends Controller
{
    public function Cartpage_view(){
        return view('frontend.wishlist.cartpage_view');
    }

    public function Get_Mycart(){
        $cartcontent = Cart::content();
        $cartqty = Cart::count();
        $carttotal = Cart::total();
        return response()->json(array(
            'cartcontent' => $cartcontent,
            'cartqty' => $cartqty,
            'carttotal' => round($carttotal),
        ));
    }

    public function Remove_Mycart($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success' => 'Product Removed in Your Cart Successfully']);
    
    }

    public function Increment_Mycart($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty+1);
        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);
        }
        return response()->json('increment');
    }

    public function Decrement_Mycart($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty-1);
        if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100),
            ]);
        }
        return response()->json('decrement');
    }
   
}

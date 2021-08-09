<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\ShippingDivision;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id){
        if(Session::has('coupon')){
            session()->forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $request->product_id, 
                'name' => $request->product_name, 
                'qty' => $request->qty, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ]);

        return response()->json(['success' => 'Product Added To Cart Successfully']);
        } else {
            Cart::add([
                'id' => $request->product_id, 
                'name' => $request->product_name, 
                'qty' => $request->qty, 
                'price' => $product->discount_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ]);
        return response()->json(['success'=>'Product Added To Cart Successfully']);
        }
        
    }

    public function AddToMiniCart(){
        $cartcontent = Cart::content();
        $cartqty = Cart::count();
        $carttotal = Cart::total();
        return response()->json(array(
            'cartcontent' => $cartcontent,
            'cartqty' => $cartqty,
            'carttotal' => round($carttotal),
        ));
    }


    public function MiniCartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Removed Successfully']);
    }


    public function AddToWishlist(Request $request, $product_id){
        if (Auth::check()) {
            $exist = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if (!$exist) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success' => 'Wishlist added successfully']);
            } else {
                return response()->json(['error' => 'This Product is Already Added On Your Wishlist']);
            }
            
              
        } else {
            return response()->json(['error' => 'You must Login First']);
        }
            
    }

    public function ApplyCoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount/100)),
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
        
    }

    public function CalculateCoupon()
    {
        if(Session::has('coupon')){
            return response()->json(array(
                'coupon_subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'grand_total' => session()->get('coupon')['total_amount']
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    }


    public function RemoveCoupon()
    {
        session()->forget('coupon');
        return response()->json(array(
            'success' => 'Coupon Removed Successfully'
        ));
    }

    public function CheckoutView()
    {
        if(Auth::check()){
            if (Cart::total() > 0) {
                $cartcontent = Cart::content();
                $cartqty = Cart::count();
                $carttotal = Cart::total();
                $divisions = ShippingDivision::orderBy('division_name','ASC')->get();
                return view('frontend.checkout.checkout_view',compact('cartcontent','cartqty','carttotal','divisions'));
            } else {
                $notification =array(
                    'message' => 'Shop Atleast One Product',
                    'alert-type' => 'error',
                );
                return redirect('/')->with($notification);
            }
            
        }else{
            $notification =array(
                'message' => 'You must Login First',
                'alert-type' => 'error',
            );
            return redirect()->route('login')->with($notification);
        }
    }
    


}

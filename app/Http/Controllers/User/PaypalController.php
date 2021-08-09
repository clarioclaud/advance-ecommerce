<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function PaypalPayment(Request $request)
    {
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Paypal',
            'payment_method' => 'Paypal',
            'payment_type' => 'Paypal',
            'transaction_id' => $request->transaction_id,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'order_number' => $request->id,
            'invoice_no' => 'FS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now()
        ]);

        $details = Order::findOrFail($order_id);
        $data = array(
            'invoice_no' => $details->invoice_no,
            'Amount' => $details->amount,
            'name' => $details->name,
            'email' => $details->email,
            'phone' => $details->phone,
            'payment_method' => 'Stripe',
        );
        Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Order Placed Successfully',
            'alert-type' => 'success'
        );

        return response()->json($notification);

    }
}

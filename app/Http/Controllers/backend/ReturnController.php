<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ReturnController extends Controller
{
    public function ReturnOrders()
    {
        $order = Order::where('return_order',1)->orderBy('id','DESC')->get();
        return view('backend.return_order.return_request', compact('order'));
    }

    public function ReturnOrdersApprove($order_id)
    {
        Order::findOrFail($order_id)->update(['return_order' => 2]);

        $notification = array(
            'message' => 'Return Order Approved Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function AllReturnOrders(Type $var = null)
    {
        $order = Order::where('return_order',2)->orderBy('id','DESC')->get();
        return view('backend.return_order.all_request', compact('order'));
    }
}

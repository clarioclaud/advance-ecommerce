<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use PDF;


class AllUserController extends Controller
{
    public function MyOrders()
    {
        $order = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('order'));
    }

    public function OrderView($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_details',compact('order','orderitem'));
    }

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        //return view('frontend.user.order.invoice_download',compact('order','orderitem'));
        $pdf = PDF::loadView('frontend.user.order.invoice_download', compact('order','orderitem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

    }

    public function ReturnReason(Request $request,$order_id)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);
        $notification = array(
            'message' => 'Return Reason Request Send Successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('my.orders')->with($notification);
    }

    public function ReturnOrders()
    {
        $order = Order::where('user_id',Auth::id())->where('return_reason','!=','NULL')->orderBy('id','DESC')->get();
        return view('frontend.user.order.return_view',compact('order'));
    }

    public function CancelOrders()
    {
        $order = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.user.order.cancel_view',compact('order'));
    }
}

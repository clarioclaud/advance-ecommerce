<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use PDF;

class OrderController extends Controller
{
    public function PendingOrder()
    {
        $order = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.order.pending_view',compact('order'));
    }

    public function PendingOrderDetails($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('backend.order.pending_order_details',compact('order','orderitem'));
    }

    public function ConfirmedOrder()
    {
        $order = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.order.confirmed_view',compact('order'));
    }

    public function ProcessingOrder()
    {
        $order = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.order.processing_view',compact('order'));
    }

    public function PickedOrder()
    {
        $order = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.order.picked_view',compact('order'));
    }

    public function ShippedOrder()
    {
        $order = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.order.shipped_view',compact('order'));
    }

    public function DeliveredOrder()
    {
        $order = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.order.delivered_view',compact('order'));
    }

    public function CancelOrder()
    {
        $order = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.order.cancel_view',compact('order'));
    }

    public function PendingToConfirm($order_id)
    {
        $order = Order::findOrFail($order_id)->update(['status' => 'confirm']);
        $notification = array(
            'message' => 'Order confirmed successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('pending.orders')->with($notification);
    }

    public function ConfirmToProcessing($order_id)
    {
        $order = Order::findOrFail($order_id)->update(['status' => 'processing']);
        $notification = array(
            'message' => 'Order Processing successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('confirmed.orders')->with($notification);
    }

    public function ProcessingToPicked($order_id)
    {
        $order = Order::findOrFail($order_id)->update(['status' => 'picked']);
        $notification = array(
            'message' => 'Order Picked successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('processing.orders')->with($notification);
    }

    public function PickedToShipped($order_id)
    {
        $order = Order::findOrFail($order_id)->update(['status' => 'shipped']);
        $notification = array(
            'message' => 'Order Shipped successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('picked.orders')->with($notification);
    }

    public function ShippedToDelivered($order_id)
    {
        $order = Order::findOrFail($order_id)->update(['status' => 'delivered']);
        $notification = array(
            'message' => 'Order Delivered successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('shipped.orders')->with($notification);
    }

    public function DeliveredToCancel($order_id)
    {
        $order = Order::findOrFail($order_id)->update(['status' => 'cancel']);
        $notification = array(
            'message' => 'Order Cancelled successfully',
            'alert-type' => 'success',
        );
        return Redirect()->route('delivered.orders')->with($notification);
    }

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderitem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        //return view('frontend.user.order.invoice_download',compact('order','orderitem'));
        $pdf = PDF::loadView('backend.order.invoice_download', compact('order','orderitem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}

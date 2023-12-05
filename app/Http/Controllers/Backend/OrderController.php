<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-order', ['only', ['orders']]);
        $this->middleware('permission:order-payment-status', ['only', ['payment_status']]);
        $this->middleware('permission:delivery_status', ['only', ['delivery_status']]);
        $this->middleware('permission:order-invoice', ['only', ['invoice']]);
        $this->middleware('preventBackHistory');
    }
    //--orders
    public function orders()
    {
        $orders = Order::latest()->paginate(20);
        return view('Backend.order.index', compact('orders'));
    }
    //--payment_status
    public function payment_status($id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->payment_status == 0) {
            $order->payment_status = 1;
            $order->save();
            return redirect()->back()->with('success', 'Payment Status Paid!');
        } else {
            $order->payment_status = 0;
            $order->save();
            return redirect()->back()->with('success', 'Payment Status Unpaid!');
        }
    }

    //--delivery_status
    public function delivery_status(Request $request)
    {
        $order_id = $request->order_id;
        $status = $request->status;
        $order = Order::where('id', $order_id)->first();
        //pending to processing
        if ($order->delivery_status == 0 && $status == 'processing') {
            $order->delivery_status = 1;
            $order->save();
            return response()->json('Delivery Status Update Pending To Processing!');
        }
        //--pending to canceled
        elseif ($order->delivery_status == 0 && $status == 'canceled') {
            $order->delivery_status = 3;
            $order->save();
            return response()->json('Delivery Status Update Pending To Canceled!');
        }
        //--Processing To Delivered
        elseif ($order->delivery_status == 1 && $status == 'delivered') {
            $order->delivery_status = 2;
            $order->save();
            return response()->json('Delivery Status Update Processing To Delivered!');
        }
        //--Processing To Canceled
        elseif ($order->delivery_status == 1 && $status == 'canceled') {
            $order->delivery_status = 3;
            $order->save();
            return response()->json('Delivery Status Update Processing To Canceled!');
        }
        //--Canceled To Pending
        elseif ($order->delivery_status == 3 && $status == 'pending') {
            $order->delivery_status = 0;
            $order->save();
            return response()->json('Delivery Status Update Canceled To Pending!');
        }
        //--Canceled To Processing
        elseif ($order->delivery_status == 3 && $status == 'processing') {
            $order->delivery_status = 1;
            $order->save();
            return response()->json('Delivery Status Update Canceled To Processing!');
        }
        //--Canceled To Delivered
        elseif ($order->delivery_status == 3 && $status == 'delivered') {
            $order->delivery_status = 2;
            $order->save();
            return response()->json('Delivery Status Update Canceled To Delivered!');
        } else {
            return response()->json('Data Not Found!');
        }
    }
    //--invoice 
    public function invoice($trnx_id)
    {
        $order = Order::where('trnx_id', $trnx_id)->with('OrderProductDetail')->first();
        return view('Backend.order.invoice', compact('order'));
    }
}

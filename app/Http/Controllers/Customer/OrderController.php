<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $userOrders = Order::where('user_id', $user->id)->latest()->paginate(10);
        return view('frontend.customer.order', compact('userOrders'));
    }

    public function orderTrack($trnx_id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $order = Order::where('user_id', $user->id)->where('trnx_id', $trnx_id)->first();
        return view('frontend.customer.track', compact('order'));
    }

    public function invoice($trnx_id)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $order = Order::where('user_id', $user->id)->where('trnx_id', $trnx_id)->first();
        return view('frontend.customer.invoice', compact('order'));
    }
}

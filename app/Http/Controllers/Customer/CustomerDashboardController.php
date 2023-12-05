<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    //customer_dashboard
    public function customer_dashboard()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $userOrders = Order::where('user_id', $user->id)->latest()->take(5)->get();

        $pendingOrders = $userOrders->where('delivery_status', '0')->count();
        $processedOrders = $userOrders->where('delivery_status', '1')->count();
        $deliveredOrders = $userOrders->where('delivery_status', '2')->count();
        $canceledOrders = $userOrders->where('delivery_status', '3')->count();
        return view('frontend.customer.dashboard', compact('user', 'userOrders', 'pendingOrders', 'processedOrders', 'deliveredOrders', 'canceledOrders'));
    }
}

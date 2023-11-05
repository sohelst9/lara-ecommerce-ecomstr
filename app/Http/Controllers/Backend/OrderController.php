<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('preventBackHistory');
    }
    //--orders
    public function orders()
    {
        $orders = User::paginate(20);
        return view('Backend.order.index', compact('orders'));
    }
}

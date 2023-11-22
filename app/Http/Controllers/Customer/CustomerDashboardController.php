<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    //customer_dashboard
    public function customer_dashboard()
    {
        return view('frontend.customer.dashboard');
    }
}

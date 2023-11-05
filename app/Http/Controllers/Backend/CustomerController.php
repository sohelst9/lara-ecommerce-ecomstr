<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
     public function __construct() {
        $this->middleware('permission:view-customer', ['only', ['index']]);
        $this->middleware('preventBackHistory');
    }
    //---index
    public function index()
    {
        $customers = User::latest()->paginate(20);
        return view('Backend.customer.index', compact('customers'));
    }
}

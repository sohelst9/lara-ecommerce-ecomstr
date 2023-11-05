<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('preventBackHistory');
    }
    //--dashboard
    public function dashboard()
    {
        return view('Backend.dashboard');
    }

    //---logout
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login')->with('error', 'You Are Already Logout. Please Login Here!');
    }
}

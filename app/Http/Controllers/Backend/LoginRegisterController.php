<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct() {
        $this->middleware('preventBackHistory');
    }
    //--login
    public function login()
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('dashboard');
        }
        return view('Backend.auth.login');
    }
    //--login_store
    public function login_store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Login Successfully!');
        } else {
            return back()->with('error', 'Login Details Are Not Valid. Please Valid Email & Password!');
        }
    }
    //--register
    public function register()
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('dashboard');
        }
        return view('Backend.auth.register');
    }
    //--register_store
    public function register_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:14',
        ]);

        $admin  = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        if ($admin->save()) {
            return back()->with('success', $request->name . ', Your Registration Has Been Successfully!');
        } else {
            return back()->with('error', 'Something Wrong. Please Try Again!');
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
    }
    //--index
    public function index()
    {
        $user = auth()->guard('admin')->user();
        return view('Backend.profile.index', compact('user'));
    }
    //--change
    public function change(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|mimes:png,jpg,webp,jpeg',
        ]);
        $user = Admin::where('id', $id)->first();
        if ($request->hasFile('image')) {
            if ($user->image) {
                File::delete(public_path($user->image));
            }
            $image = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'Uploads/Admin/' . $image;
            $request->file('image')->move(public_path('Uploads/Admin'), $image);
            $user->update([
                'image' => $path,
            ]);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with('success', 'Profile Updated Successfully!');
    }

    //-----change_password
    public function change_password()
    {
        $user = auth()->guard('admin')->user();
        return view('Backend.profile.chnage_password', compact('user'));
    }
    //-----change_password_update
    public function change_password_update(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        $user = Admin::where('id', $id)->first();
        $user->update([
            'password' => Hash::make($request->password),
        ]);
        return back()->with('success', 'Password Change Successfully!');
    }
}

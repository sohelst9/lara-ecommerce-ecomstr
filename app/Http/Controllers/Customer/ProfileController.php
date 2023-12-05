<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('frontend.customer.profile.index', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'image' => 'image|mimes:png,jpg,jpeg,webp,gif,svg|max:1024'
        ]);
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalExtension();
            $file_name = Str::slug($request->name).'-' .uniqid(). '.' . $image;
            $image_path_name = 'Uploads/Customer/' . $file_name;
            $request->file('image')->move(public_path('Uploads/Customer'), $file_name);
            $user->image = $image_path_name;
        }
        if ($user->save()) {
            return back()->with('success', 'Profile Updated Successfully!');
        }
    }

    //--change_password
    public function change_password(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
        ]);
        $user = User::where('id', $id)->first();
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return back()->with('success', 'Password Updated Successfully!');
        }else{
            return back()->with('error', 'Old Password Wrong!');
        }
    }
}

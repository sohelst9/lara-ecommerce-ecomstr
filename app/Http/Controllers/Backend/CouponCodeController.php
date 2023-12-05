<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Coupon;
use Illuminate\Http\Request;

class CouponCodeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view-coupon|create-coupon|edit-coupon|delete-coupon', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-coupon', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-coupon', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-coupon', ['only' => ['delete']]);
        $this->middleware('permission:show-coupon', ['only' => ['index', 'show']]);
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('Backend.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('Backend.coupon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'validity' => 'required',
            'discount' => 'required',
        ]);
        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->validity = $request->validity;
        $coupon->discount = $request->discount;
        $coupon->save();
        return redirect()->route('coupon.index')->with('success', 'Coupon Added Successfully!');
    }

    public function show(Coupon $coupon)
    {
        if ($coupon->status == 0) {
            $coupon->status = 1;
            $coupon->save();
            return redirect()->route('coupon.index')->with('success', 'Coupon Status Active !');
        } else {
            $coupon->status = 0;
            $coupon->save();
            return redirect()->route('coupon.index')->with('success', 'Coupon Status Deactive !');
        }
    }

    public function edit(Coupon $coupon)
    {
        return view('Backend.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'validity' => 'required',
            'discount' => 'required',
        ]);
        $coupon = Coupon::where('id', $id)->first();
        $coupon->name = $request->name;
        $coupon->validity = $request->validity;
        $coupon->discount = $request->discount;
        $coupon->save();
        return redirect()->route('coupon.index')->with('success', 'Coupon Updated Successfully!');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupon.index')->with('success', 'Coupon Deleted Successfully!');
    }
}

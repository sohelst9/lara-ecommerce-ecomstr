<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductVariation;
use App\Models\Cart;
use App\Models\District;
use App\Models\Division;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderProductDetail;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    //--index
    public function index()
    {
        $divisions = Division::all();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('frontend.product.checkout', compact('carts', 'divisions'));
    }

    public function district(Request $request)
    {
        $districts = District::where('division_id', $request->division_id)->get();
        $store = '<option value="">-Select-</option>';
        foreach ($districts as $district) {
            $store .= '<option value="' . $district->id . '">' . $district->name . '</option>';
        }
        echo $store;
    }

    //sub_district
    public function sub_district(Request $request)
    {
        $sub_districts = Upazila::where('district_id', $request->district_id)->get();
        $store = '<option value="">-Select-</option>';
        foreach ($sub_districts as $sub_district) {
            $store .= '<option value="' . $sub_district->id . '">' . $sub_district->name . '</option>';
        }
        echo $store;
    }
    //---order 
    public  function order(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'division' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'delevery_charge' => 'required',
            'payment_type' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $trnx_id = 'ECOM_'.Str::random(8);
        $cart_items = Cart::where('user_id', $user_id)->get();
        $order = new Order();
        $order->user_id = $user_id;
        $order->trnx_id = $trnx_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->division_id = $request->division;
        $order->district_id = $request->district;
        $order->upazila_id = $request->sub_district;
        $order->zip_code = $request->zip_code;
        $order->address = $request->address;
        $order->order_note = $request->order_note;
        $order->payment_type = $request->payment_type;
        $order->sub_total = $request->subTotal;
        $order->discount = $request->discount;
        $order->delivery_charge = $request->delevery_charge;
        $order->total = $request->total + $request->delevery_charge;
        if ($order->save()) {
            //order product details table
            $cart_items = Cart::where('user_id', $user_id)->get();
            foreach ($cart_items as $cart) {
                OrderProductDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'color_id' => $cart->color_id ?? null,
                    'size_id' => $cart->size_id ?? null,
                    'product_name' => $cart->Product->name,
                    'product_price' => $cart->Product->discount_price,
                    'quantity' => $cart->quantity,
                ]);
            }
            //payment method cash on delevery
            if ($request->payment_type == 'cash_on_delivery') {
                //delete all cart item
                $cart_delete = Cart::where('user_id', $user_id);
                $cart_delete->delete();
                return redirect()->route('order.confirm.msg');
            }
        }
    }
    //--order_success
    public function order_success()
    {
        $order = Order::where('user_id', auth()->user()->id)->latest()->first();
        return 'Hello '. auth()->user()->name .'Your Order has been Successfully! Your Order Id '.$order->trnx_id.'You will be receiving an email shortly with confirmation of your order.';
    }
}

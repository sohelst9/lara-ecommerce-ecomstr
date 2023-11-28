<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Coupon;
use App\Models\Backend\Product;
use App\Models\Backend\ProductVariation;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //--index
    public function index($coupon_code = '')
    {
        if ($coupon_code == '') {
            $discount = 0;
        } else {
            $c_code = Coupon::where('name', $coupon_code)->first();
            if ($c_code) {
                if (Carbon::now()->format('Y-m-d') > $c_code->validity) {
                    return back()->with('msg', 'Coupon Code Expired');
                } else {
                    $discount = $c_code->discount;
                }
            } else {
                return back()->with('msg', 'Invalid Coupon Code');
            }
        }
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('frontend.product.cart', compact('carts', 'discount', 'coupon_code'));
    }
    //--store
    public function store(Request $request)
    {
        if ($request->quantity <= 0) {
            return redirect()->back()->with('error', 'Quantity must be greater than 0');
        }
        // return $request->all();
        $user_id = auth()->user()->id;
        $same_info = Cart::where([
            'user_id' => $user_id,
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ]);
        $variation = ProductVariation::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ]);
        if ($same_info->exists()) {
            Cart::where('product_id', $request->product_id)->increment('quantity', $request->quantity);
            Product::where('id', $request->product_id)->decrement('quantity', $request->quantity);
            $variation->decrement('quantity', $request->quantity);
            return back()->with('success', 'Cart Added Successfully.');
        } else {
            $cart = Cart::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'quantity' => $request->quantity
            ]);
            if ($cart) {
                Product::where('id', $request->product_id)->decrement('quantity', $request->quantity);
                $variation->decrement('quantity', $request->quantity);
            }
            return back()->with('success', 'Cart Added Successfully.');
        }
    }
    //---remove_cart
    public function remove_cart($id)
    {
        $cart = Cart::where('id', $id)->first();
        $product_variation = ProductVariation::where([
            'product_id' => $cart->product_id,
            'color_id' => $cart->color_id,
            'size_id' => $cart->size_id,
        ]);
        if ($cart) {
            Product::where('id', $cart->product_id)->increment('quantity', $cart->quantity);
            $product_variation->increment('quantity', $cart->quantity);
            $cart->delete();
            return response()->json([
                'success' => true,
                'message' => 'Cart Item Deleted Successfully.',
            ]);
        } else {
            return response()->json([
                'error' => 'Cart Item Not found!'
            ]);
        }
    }
    //---update
    public function update(Request $request)
    {
        foreach ($request->quantity as $cart_id => $quatity) {
            Cart::find($cart_id)->update([
                'quantity' => $quatity,
            ]);
        }
        return back()->with('success', 'Cart Updated Success');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ProductVariation;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //--index
    public function index()
    {
        $discount = 0;
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('frontend.product.cart', compact('carts', 'discount'));
    }
    //--store
    public function store(Request $request)
    {
        if($request->quantity <= 0){
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
            if ($variation) {
                $variation->decrement('quantity', $request->quantity);
            }
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
                if ($variation) {
                    $variation->decrement('quantity', $request->quantity);
                }
            }
            return back()->with('success', 'Cart Added Successfully.');
        }
    }
}

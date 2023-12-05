<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //--index
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->with('Product')->get();
        return view('frontend.product.wishlist', compact('wishlists'));
    }
    //--store_wishlist
    public function store_wishlist(Request $request)
    {
        $product_id = $request->product_id;
        $user_id = $request->user_id;
        $same_product = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if($same_product){
            $same_product->delete();
            return response()->json('Favorite Product Remove Successfully.');
        }else{
            $wishlist = new Wishlist();
            $wishlist->user_id = $user_id;
            $wishlist->product_id = $product_id;
            if($wishlist->save()){
                return response()->json('Favorite Product Added Successfully.');
            }else{
                return response()->json('Something Wrong!.');
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Backend\Product;
use App\Models\Backend\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SingleProductController extends Controller
{
    //---single_product
    public function single_product($slug)
    {
        $product = Product::where('slug', $slug)->with('gallery_images', 'ProductVariation')->first();
        $randomProducts = Product::inRandomOrder()
            ->select('id', 'name', 'slug', 'category_id', 'thumbnail', 'price', 'discount', 'discount_price', 'is_feature', 'just_for_you')
            ->take(20)
            ->get();
        $products_colors = ProductVariation::with('Color')
            ->where('product_id', $product->id)
            ->groupBy('color_id')
            ->selectRaw('count(*) as total, color_id')
            ->get();
        return view('frontend.product.single_product', compact('product', 'randomProducts', 'products_colors'));
    }
    //--get_size
    public function get_size(Request $request)
    {
        $color_id = $request->color_id;
        $product_id = $request->product_id;
        $sizes = DB::table('product_variations')
            ->join('sizes', 'product_variations.size_id', '=', 'sizes.id')
            ->where('product_variations.product_id', $product_id)
            ->where('product_variations.color_id', $color_id)
            ->get();
        $store = '<option value="">-Select-</option>';
        foreach ($sizes as $size) {
            $store .= '<option value="' . $size->size_id . '">' . $size->name . '</option>';
        }
        echo $store;
    }
    //--get_quantity
    public function get_quantity(Request $request)
    {
        $quantity = ProductVariation::where([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
        ])->first(['quantity']);
        echo $quantity->quantity;
    }
}

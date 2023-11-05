<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //--all_product
    public function all_product()
    {
        $products = Product::latest()
            ->select('id', 'name', 'slug', 'category_id', 'thumbnail', 'price', 'discount', 'discount_price', 'is_feature', 'just_for_you')
            ->paginate(40);
        return view('frontend.product.all_product', compact('products'));
    }

    //---search
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('name', 'like', "%$keyword%")
            ->orWhereHas('Category', function ($query) use ($keyword) {
                $query->where('title', 'like', "%$keyword%");
            })
            ->paginate(52)->withQueryString();
        return view('frontend.product.search_product', compact('products', 'keyword'));
    }
    //--category_based_product
    public function category_based_product($slug)
    {
        $category = Category::where('slug', $slug)
            ->first();
        $category_products = Product::where('category_id', $category->id)
            ->select('id', 'name', 'category_id', 'slug', 'thumbnail', 'price', 'discount', 'discount_price', 'is_feature', 'just_for_you')
            ->paginate(40);
        return view('frontend.product.category_product', compact('category', 'category_products'));
    }
}

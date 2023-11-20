<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Banner;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //---index
    public function index()
    {
        $popular_products = Product::where('is_feature', 1)
            ->select('id', 'name', 'slug', 'thumbnail', 'price', 'discount', 'discount_price', 'is_feature')
            ->take(20)
            ->get();
        $justforyou_products = Product::where('just_for_you', 1)
            ->select('id', 'name', 'slug', 'thumbnail', 'price', 'discount', 'discount_price', 'just_for_you')
            ->take(30)
            ->get();
        $banners = Banner::where('status', 1)->get();
        return view('frontend.home.index', [
            'popular_products' => $popular_products,
            'justforyou_products' => $justforyou_products,
            'banners' => $banners,
        ]);
    }
}

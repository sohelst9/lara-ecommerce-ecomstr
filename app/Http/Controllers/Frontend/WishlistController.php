<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    //--index
    public function index()
    {
        return view('frontend.product.wishlist');
    }
}
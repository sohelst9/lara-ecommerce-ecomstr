<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //--about_us
    public function about_us()
    {
        return view('frontend.page.about_us');
    }
    //--contact_us
    public function contact_us()
    {
        return view('frontend.page.contact');
    }
    //--faq
    public function faq()
    {
        return view('frontend.page.faq');
    }
    //--privacy_policy
    public function privacy_policy()
    {
        return view('frontend.page.privacy_policy');
    }
    //--term_condition
    public function term_condition()
    {
        return view('frontend.page.term_condition');
    }
}

<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Member;
use App\Testimonial;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    
    public function index()
    {
        $testimonials=Testimonial::where('status','active')->latest()->take(4)->get();
        $brands=Brand::latest()->take(5)->get();
        $members=Member::latest()->take(3)->get();

        return view('about',compact('testimonials','brands','members'));
    }
    
}

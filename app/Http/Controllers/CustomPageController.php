<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class CustomPageController extends Controller
{
    public function index($slug){
        $page=Page::where('slug',$slug)->where('status','=','active')->firstorfail();
        
        return view('page',compact('page'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Models\Category;

class ShopPageController extends Controller
{
    public function index(){
        $products=Product::latest()->paginate(9);
        $categories=Category::all();
        return view('shop',compact('products','categories'));
    }
    public function search(Request $request){
        $validator=Validator::make($request->all(),[
            'query'=>'nullable|min:3'
        ]);

        if($validator->fails()){
            notify()->error('Search requires minimum 3 characters');
            return back();
        }

        $query=$request->input('query');
        
        $products=Product::query()
        ->where('title', 'LIKE', "%{$query}%") 
        ->paginate(10);
        
        $categories=Category::all();
        return view('shop',compact('products','categories'));
    }
    public function category(Request $request){
        $category=Category::where('slug',$request->category)->first();

        $query=$request->input('query');
        if($query){
            $products=Product::query()
            ->where('category_id',$category->id)
            ->where('title', 'LIKE', "%{$query}%") 
            ->paginate(10);
        }
        else{
            $products=Product::where('category_id',$category->id)->paginate(10);
        }
        $categories=Category::all();

        $cat_name=$category->name;
        return view('shop',compact('products','categories','cat_name'));
    }
}

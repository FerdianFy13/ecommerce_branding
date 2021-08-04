<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class PostController extends Controller
{
    public function posts(){
        $posts=Post::where('status','published')->orderBy('created_at','DESC')->paginate(7);
        $featured_posts=Post::where('status','published')->where('featured','1')->orderBy('created_at','DESC')->take(2)->get();
        return view('posts',compact('posts','featured_posts'));
    }

    public function singlePost($slug){
        $post=Post::where('status','published')->where('slug',$slug)->firstorfail();
        $related_posts=Post::where('status','published')->where('category_id',$post->category_id)->where('id','!=',$post->id)->orderBy('created_at','DESC')->take(2)->get();
        return view('post',compact('post','related_posts'));
    }
}

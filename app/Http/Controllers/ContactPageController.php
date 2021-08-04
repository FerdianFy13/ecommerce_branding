<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactPageController extends Controller
{
    public function index(){
        $brands=Brand::latest()->take(5)->get();
        return view('contact',compact('brands'));
    }

    public function contact(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required|max:255',
        ]);

        $contact=([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);

        try{
            Mail::to(setting('contact.email'))->send(new ContactMail($contact));

            return back()->with('success','Thanks for contacting us.');
        }catch(\Exception $e){
            return back()->withErrors('Something went wrong. Try again.');
        } 
        
    }
}

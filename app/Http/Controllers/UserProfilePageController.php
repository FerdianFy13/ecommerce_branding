<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserProfilePageController extends Controller
{
    public function index()
    {
        return view('profile.dashboard');
    }
    public function editInfo()
    {
        return view('profile.user-info-edit');
    }
    public function avatar(Request $request){
        $request->validate([
            'avatar'=>'required|image|max:10000|mimes:jpg,jpeg,png'
        ]);

        $file = $request->file('avatar');
        $path = 'public/users/'.date('FY');

        if(auth()->user()->avatar!='users/default.png'){
            if(file_exists(storage_path('app/public/'.auth()->user()->avatar)))
            unlink(storage_path('app/public/'.auth()->user()->avatar));
        }

        $store_path  = Storage::putFile($path, $file);
        $store_path_without_public=str_replace('public/','',$store_path);
        
        User::where('id',auth()->user()->id)->update([
            'avatar'=> $store_path_without_public
        ]);

        return back()->with('success','Uploaded successfully');
            
    }

    protected function infoChange(Request $request){
        $request->validate([
            'name' => ['nullable','string', 'max:255'],
            'email' => ['nullable','string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable','string', 'min:8'],
        ]);

        if($request->password){
            $pass=Hash::make($request->password);
            User::where('id',auth()->user()->id)->update([
                'password'=>$pass
            ]);
        }
        if($request->email){
            User::where('id',auth()->user()->id)->update([
                'email'=>$request->email
            ]);
        }
        if($request->name){
            User::where('id',auth()->user()->id)->update([
                'name'=>$request->name
            ]);
        }

        return back()->with('success', 'Info updated');

    }

    public function avatar_remove(){
        if(auth()->user()->avatar!='users/default.png'){
            if(file_exists(storage_path('app/public/'.auth()->user()->avatar)))
            unlink(storage_path('app/public/'.auth()->user()->avatar));
        }

        User::where('id',auth()->user()->id)->update([
            'avatar'=>'users/default.png'
        ]);

        notify()->success('Avatar removed');
        return back();
    }
}

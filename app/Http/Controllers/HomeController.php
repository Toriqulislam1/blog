<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
//user
 public function edit_profile(){


    return view('layouts.editprofile');
 }

public function update_profile(Request $request){

    if($request->current_password==''){

        User::find(Auth::id())->update([
            'name'=>$request->name,
            'email'=>$request->email

        ]);

    }else{
        if(Hash::check($request->old_password,Auth::user()->password)){
        User::find(Auth::id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->current_password),

        ]);


        }
        else{
            return back()->with('old_pass','old password does not match');
        }
}

}

        public  function update_picture(Request $request){
        $file_upload = $request->picture;
        $extension =$file_upload->getClientOriginalExtension();

        $file_name = Auth::user()->id.'.'.$extension;
        $img = Image::make($file_upload)->save(public_path("uploads/user/".$file_name));
        user::find(Auth::id())->update([
            'image'=> $request->picture,
        ]);

}



























}

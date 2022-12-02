<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\tag;
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


public function user_list(){
   $user = user::all();

   return view('admin.userlist',['user'=>$user]);
}







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
            'image'=> $file_name,
        ]);


    }







//catagory
public function addcatagory(){

 $catagory = catagory::all();



    return view('admin.catagory',['catagory'=>$catagory]);
 }



  public function catagory_store(Request $req){




  $id = catagory::insertGetId([

        'catagory_name'=>$req->catagory_name,

    ]);

    $upload_file = $req->catagory_image;
    $extention = $upload_file->getClientOriginalExtension();
    $file_name = time().'.'.$extention;
    Image::make( $upload_file)->save(public_path('uploads/catagory/'. $file_name ));

    catagory::find($id)->update(
        [
            'catagory_image' =>$file_name,
        ]);
        return back();
  }
 //show catagory
  function show_catagory(){

    $catagory = catagory::all();

    return view('admin.showcatagory',['catagory'=>$catagory]);
  }

  //delte catagory
   function delete_catagory($id){
    catagory::find($id)->delete();
    return back();

   }
   //edit catagory
    function edit_catagory($id){
        $edit = catagory::find($id);

        return view('admin.editCatagory',['edit'=>$edit]);
    }


    function update_catagory(Request $request){



                $update = catagory::find($request->catagory_id);

                 $update->update([
                'catagory_name'=>$request->cata_name,
            ]);



                $upload_file = $request->catagory_image;
                $extention = $upload_file->getClientOriginalExtension();
                $file_name = time().'.'.$extention;
                Image::make( $upload_file)->save(public_path('uploads/catagory/'. $file_name ));
                $update = catagory::find($request->catagory_id);
                $update->update([
                    'catagory_name'=>$request->cata_name,
                    'catagory_image'=> $file_name,
                ]);
          }


                function tag(){
                    $user = tag::all();

                    return view('admin.tag',['user'=>$user]);
                }


                function tag_store(Request $request){

                  tag::insert([
                    'tag_name'=>$request->tag_name,
                  ]);

                  return back()->with('tas','tag submit succesfully');
                }

                function delete_tag($id){
                    tag::find($id)->delete();
                    return back();

                }
                function role (){


                  return  view('role.role');
                }




}




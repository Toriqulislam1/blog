<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Models\catagory;
use App\Models\tag;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;
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
   $user = user::where('id', '!=', Auth::user()->id )->orderBy('name','ASC')->get();
   $total = User::count();

   return view('admin.userlist',[
    'user'=>$user,
    'total'=>$total,
]);
}

//delete user
public function user_delete($user_delete){

    User::find($user_delete)->delete();

    return back()->withuserdelete('user delete successfully');


}

// check all delete
function check_delete(Request $request){

    foreach($request->check as $check_user){
    User::find($check_user)->delete();

    return back();

}

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
        return back()->with('addcatagory', 'catagory add successfully');
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
                //role
                function role (){
               $permi = permission::all();

               $role = role::all();

               $user = user::all();

                  return  view('role.role',[
                   'permi'=>$permi,
                   'aa'=>$role,
                   'user'=>$user,
                  ]);
                }

                function permission (Request $request){

                    Permission::create(['name' => $request->permission_name]);

                  return back();
                }

                function role_store(Request $request){
                    $role = Role::create(['name' => $request->role_name]);

                    $role->givePermissionTo($request->perm);
                    return back();

                }


}




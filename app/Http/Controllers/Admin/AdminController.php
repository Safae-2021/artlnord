<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Training,Registration,Rental,Teacher,TodoList,User,Admin};
use Session;
use Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    // public function index()
    // {
    //     return view('layouts.admin');
    // }

    public function adminDashboard()
    {
        $selectStudent  = Registration::whereNotNull('group_id')->get();
        $selectRental  = Rental::where('status',true)->get();
        $selectTeacher  = Teacher::where('status',true)->get();
        $selectTodoList  = TodoList::paginate(5);

        // dd($selectRental);
        return view('Admin.pages.dashboard',compact('selectStudent','selectRental','selectTeacher','selectTodoList') );       
    }


    public function storeTodoList(Request $req)
    {
       $getText = $req->text;

      $this->validate($req, [
       'text' => 'required',
        ]);
          TodoList::create([
              'text' => $getText,
          ]);
    return redirect()->back();
    }
    public function deleteTodolist($todolist_id)
    {
        TodoList::where('id',$todolist_id)->delete();
        return redirect()->back();
    }
   
    public function adminRegistration()
    {
       return  view('Admin.pages.admin.adminregistration');
    }

    public function deleteSessionAdmin()
    {
        Session::forget('user'); 
        return redirect()->route('acceuil');
    }

    public function adminEditeProfile()
    {
    //    dd( Session::get('user'));
   if (Session::has('user')){
     foreach (Session::get('user') as $item ){
             if ($item->role_id == 1){
                   $selectAdmin = User::where('id',$item->id)->get();
                //   dd(  $selectAdmin);
             }
     
     }

   }
        return  view('Admin.pages.admin.adminprofileupdate',compact('selectAdmin'));
    }

    public function adminUpdateProfile(Request $req ,$user_id)
    {
        $getName            =$req->name;
        $getEmail           =$req->email;
        $getAddress         =$req->address;
        $getPhone           =$req->phone;
        $getPhoto           =$req->photo;
        $getPassword          =$req->password;
        $getCin             =$req->cin;
        // $getStatus          = $req->status;

        $selectAdmin = Admin::where('user_id', $user_id) ->get();
        $getAdminPhoto = $selectAdmin[0]->photo_path;

        $path = 'public/images/admins';

        $adminPhotoFolder = $getAdminPhoto;
        $name = explode('/', $adminPhotoFolder);
        $folderName = $name[0];
        $fileName = $name[1];
 ////// add it into storage ////

 $photoFile = $req->file('photo');

 $adminFolder = Str::random(8);
 
 if ($req->hasFile('photo')) {
    Storage::delete($path . '/' . $getAdminPhoto);
     // Save the file                                folder , file
 // Generate a file name with extension
 $photoName = $adminFolder . '/admin-' . time() . '.' . $photoFile->getClientOriginalExtension();

     $photoPath = $photoFile->storeAs('public/images/admins', $photoName);
     User::where('id', $user_id)->update([
        'name'            => $getName  ,
        'email'           => $getEmail,
        'address'         => $getAddress,
        'phone'           => $getPhone,
        'password'        => $getPassword,
        'cin'             => $getCin,
        'status'          => true,
        'role_id'         => 1,
    ]);

    Admin::where('user_id', $user_id)->update([
        'photo_path'            => $photoName  ,
    ]);

 }else{
    User::where('id', $user_id)->update([
        'name'            => $getName  ,
        'email'           => $getEmail,
        'address'         => $getAddress,
        'phone'           => $getPhone,
        'password'        => $getPassword,
        'cin'             => $getCin,
        'status'          => true,
        'role_id'         => 1,
    ]);
 }

 ////

 return redirect()->route('admin.edite.profile');
    }
}

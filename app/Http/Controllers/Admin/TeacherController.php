<?php

namespace App\Http\Controllers\Admin;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Controllers\Controller;
use Str;

class TeacherController extends Controller
{
    //
    public function indexTeacher()
    {
        // get the images from storage
    //    $img= Storage::get('images/teachers/profile-372280.jpg');
        // paginate 
        $selectTeachers = Teacher::where('status',true)->paginate(5);
        return view('Admin.pages.teachers.teacherslist',compact('selectTeachers'));
    }

    public function addTeacher()
    {
        return view('Admin.pages.teachers.addteachers');       
    }
    public function storeTeacher(Request $req )
    {
        $getName            =$req->name;
        $getEmail           =$req->email;
        $getAddress         =$req->address;
        $getPhone           =$req->phone;
        $getPhoto           =$req->photo;
        $getCin             =$req->cin;
        $getScanCin         =$req->scan_cin;
        $getStatus          = $req->status;

        $this->validate($req,[
            'name'         => 'required',
            'email'        => 'required|email',
            'cin'          => 'required|unique:users,cin',
            'address'      => 'required',
            'phone'        => 'required|max:12',
            'photo'        => 'required',
            'scan_cin'     => 'required',
            ]);
   
   
////// add it into storage ////
            $photoFile = $req->file('photo');
            $scanCinFile = $req->file('scan_cin');
                   
             $teacherFolder = Str::random(8);  
            // Generate a file name with extension
            $photoName = $teacherFolder .'/profile-'.time().'.'.$photoFile->getClientOriginalExtension();
            $scanCinName = $teacherFolder . '/cin-'.time().'.'.$scanCinFile->getClientOriginalExtension();
             
        if($req->hasFile('photo') && $req->hasFile('scan_cin')){
                         
            // Save the file                                folder , file
            $photoPath = $photoFile->storeAs('public/images/teachers', $photoName);
            $scanCinPath = $scanCinFile->storeAs('public/images/teachers', $scanCinName);
        }
    
////       

        if( $getStatus){
        Teacher::create([
            'name'      =>$getName,
            'email'     =>$getEmail,
            'phone'     =>$getPhone,
            'cin'       =>$getCin,
            'photo'     =>$photoName,
            'address'   =>$getAddress,
            'scan_cin'  => $scanCinName,
            'status'    =>true,
        ]);

        }else{
        Teacher::create([
            'name'      =>$getName,
            'email'     =>$getEmail,
            'phone'     =>$getPhone,
            'cin'       =>$getCin,
            'photo'     =>$photoName,
            'address'   =>$getAddress,
            'scan_cin'  => $scanCinName,
            'status'    =>false,
        ]);
    }
        return redirect()->route('teachers.list');
    }



    public function editeTeacher($teacher_id)
    {
        $selectTeacherInfo=Teacher::where('id',$teacher_id)->get();
        return view('Admin.pages.teachers.editeteachers',compact('teacher_id','selectTeacherInfo'));    
    }

    public function updateTeacher(Request $req , $teacher_id)
    {      
        $getName        =$req->name;
        $getEmail       =$req->email;
        $getAddress     =$req->address;
        $getPhone       =$req->phone;
        $getPhoto       =$req->photo;
        $getCin         =$req->cin;
        $getScanCin     =$req->scan_cin;

        $this->validate($req,[
            'name'       => 'required',
            'email'      => 'required|email',
            'cin'        => 'required|unique:users,cin',
            'address'    => 'required',
            'phone'      => 'required|max:12',
            // 'photo'      => 'required',
            // 'scan_cin'   => 'required',
            ]);

        $selectTeacher =   Teacher::where('id',$teacher_id)->get()->first();
        $getTeacherPhoto=$selectTeacher->photo;
        $getTeacherScanCin=$selectTeacher->scan_cin;

        $path='public/images/teachers';
        // # $contents       = Storage::get($path.'/'.$getTeacherPhoto);
        // $existsPhoto    = Storage::exists($path.'/'.$getTeacherPhoto);
        // $existsScanCin  = Storage::exists($path.'/'.$getTeacherScanCin);


        ////// add it into storage ////

        $TeacherPhotoFolder = $getTeacherPhoto;
        $name = explode('/',$TeacherPhotoFolder);
        $folderName = $name[0];
        $fileName = $name[1];
        // dd($folderName);

        $photoFile      = $req->file('photo');
        $scanCinFile    = $req->file('scan_cin');


        if($req->hasFile('photo') && $req->hasFile('scan_cin')){
           
            Storage::delete($path.'/'.$getTeacherPhoto);
            Storage::delete($path.'/'.$getTeacherScanCin);
           
            // Generate a file name with extension
            $photoName       = $folderName .'/profile-'.time().'.'.$photoFile->getClientOriginalExtension();
            $scanCinName     = $folderName . '/cin-'.time().'.'.$scanCinFile->getClientOriginalExtension();

            // Save the file                                folder , file
            $photoPath        = $photoFile->storeAs('public/images/teachers', $photoName);
            $scanCinPath      = $scanCinFile->storeAs('public/images/teachers', $scanCinName);

            Teacher::where('id',$teacher_id)
                ->update([
                    'name'       =>$getName,
                    'email'      =>$getEmail,
                    'address'    =>$getAddress,
                    'phone'      =>$getPhone,
                    'photo'      =>$photoName,
                    'cin'        =>$getCin,
                    'scan_cin'   =>$scanCinName,                  
                ]);
           
        }elseif($req->hasFile('photo')){
            Storage::delete($path.'/'.$getTeacherPhoto);
            $photoName       = $folderName .'/profile-'.time().'.'.$photoFile->getClientOriginalExtension();
            $photoPath        = $photoFile->storeAs('public/images/teachers', $photoName);
            Teacher::where('id',$teacher_id)
            ->update([
                'name'       =>$getName,
                'email'      =>$getEmail,
                'address'    =>$getAddress,
                'phone'      =>$getPhone,
                'photo'      =>$photoName,
                'cin'        =>$getCin,
                'scan_cin'   =>$getTeacherScanCin,                  
            ]);

        }elseif($req->hasFile('scan_cin')){
            Storage::delete($path.'/'.$getTeacherScanCin);
            $scanCinName     = $folderName . '/cin-'.time().'.'.$scanCinFile->getClientOriginalExtension();
            $scanCinPath      = $scanCinFile->storeAs('public/images/teachers', $scanCinName);
            Teacher::where('id',$teacher_id)
            ->update([
                'name'       =>$getName,
                'email'      =>$getEmail,
                'address'    =>$getAddress,
                'phone'      =>$getPhone,
                'photo'      =>$getTeacherPhoto,
                'cin'        =>$getCin,
                'scan_cin'   =>$scanCinName,                  
            ]);

        }elseif(!$req->hasFile('photo') && !$req->hasFile('scan_cin') ){
            Teacher::where('id',$teacher_id)
            ->update([
                'name'       =>$getName,
                'email'      =>$getEmail,
                'address'    =>$getAddress,
                'phone'      =>$getPhone,
                'photo'      =>$getTeacherPhoto,
                'cin'        =>$getCin,
                'scan_cin'   =>$getTeacherScanCin,                  
            ]);

        }

      






        // dd($exists);
        // get the file name from the database  photo and scan cin
        // see if this file existe in the folder 
        // delete the file and create a new one  

        // Teacher::where('id',$teacher_id)
        //         ->update([
        //             'name'       =>$getName,
        //             'email'      =>$getEmail,
        //             'address'    =>$getAddress,
        //             'phone'      =>$getPhone,
        //             'photo'      =>$getPhoto,
        //             'cin'        =>$getCin,
        //             'scan_cin'   =>$getScanCin,                  
        //         ]);
                return redirect()->route('teachers.list');
    }

        public function deleteTeacher($teacher_id)
        {
            Teacher::where('id',$teacher_id)->update(['status'=>false]);
            return back();
        }


        public function teachersProfile($teacher_id)
        {
           $getTeacherprofile= Teacher::where('id',$teacher_id)->get();

            return view('Admin.pages.teachers.teachersprofile',compact('getTeacherprofile'));       
        }



        // public function downloadTeachersPdf()
        // {
        //    $taechersPdf = Teacher::all();
        //    $pdf = PDF::loadView('Admin.pages.teachers.pdf');
        //    return $pdf->download('teachers.pdf');
        // }
}

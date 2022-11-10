<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Location;
use Str;

class LocationController extends Controller
{
    //
    public function locationList()
    {
        $selectLocation = Location::where('status',true)->paginate(5);
        return view('application.locations.locationlist',compact('selectLocation'));
    }

    public function locationListAr()
    {
        $selectLocation = Location::where('status',true)->paginate(5);
        return view('application.locations.locationlistar',compact('selectLocation'));
    }

    public function addLocation()
    {
        return view('application.locations.addlocation');
    }

    public function storeLocation(Request $req)
    {      
        $getTitle           = $req->title;
        $getTitleAr         = $req->titlear;
        $getlabelOne        = $req->labelone;
        $getlabelOneAr      = $req->labelonear;
        $getlabelTwo        = $req->labeltwo;
        $getlabelTwoAr      = $req->labeltwoar;
        $getlabelThree      = $req->labelthree;
        $getlabelThreeAr    = $req->labelthreear;
        $getdescription     = $req->description;
        $getdescriptionAr   = $req->descriptionar;
        $getPhoto           = $req->photo;
        $getStatus          = $req->status;

        // dd($getStatus );
        $this->validate($req,[
            'title'         => 'required',
            'titlear'       => 'required',
            'labelone'       => 'required',
            'labelonear'     => 'required',
            'labeltwo'       => 'required',
            'labeltwoar'     => 'required',
            'labelthree'     => 'required',
            'labelthreear'   => 'required',
            'description'    => 'required',
            'descriptionar'  => 'required',
            'photo'          => 'required',
        ]);

        ////// add it into storage ////

        $photoFile = $req->file('photo');
                   
        $locationFolder = Str::random(8);  
       // Generate a file name with extension
       $photoName = $locationFolder .'/location-'.time().'.'.$photoFile->getClientOriginalExtension();
          
        if($req->hasFile('photo') ){
               
            // Save the file                                folder , file
            $photoPath = $photoFile->storeAs('public/images/locations', $photoName);

        }
    
////

        if( $getStatus){
            Location::create([
                'title'         =>  $getTitle,
                'titlear'       =>  $getTitleAr,
                'labelone'       => $getlabelOne,
                'labelonear'     => $getlabelOneAr,
                'labeltwo'       => $getlabelTwo,
                'labeltwoar'     => $getlabelTwoAr,
                'labelthree'     => $getlabelThree,
                'labelthreear'   => $getlabelThreeAr,
                'description'    => $getdescription,
                'descriptionar'  => $getdescriptionAr,
                'photo'          => $photoName,
                'status'         => true,
            ]);
        }else{

            Location::create([
                'title'         =>  $getTitle,
                'titlear'       =>  $getTitleAr,
                'labelone'       => $getlabelOne,
                'labelonear'     => $getlabelOneAr,
                'labeltwo'       => $getlabelTwo,
                'labeltwoar'     => $getlabelTwoAr,
                'labelthree'     => $getlabelThree,
                'labelthreear'   => $getlabelThreeAr,
                'description'    => $getdescription,
                'descriptionar'  => $getdescriptionAr,
                'photo'          => $photoName,
                'status'         => false
            ]);
        }

        return redirect()->route('location.list');
    }

    public function deleteLocation($location_id)
    {
       Location::where('id',$location_id)
       ->update(['status'  =>  false]);
       return redirect()->route('location.list');
    }


    public function editLocation($location_id)
    {
       $selectLocationsInfo =  Location::where('id',$location_id)->get();
       return view('application.locations.editlocation',compact('selectLocationsInfo','location_id'));
    }

    public function updateLocation(Request $req ,$location_id)
    {
        $getTitle           = $req->title;
        $getTitleAr         = $req->titlear;
        $getlabelOne        = $req->labelone;
        $getlabelOneAr      = $req->labelonear;
        $getlabelTwo        = $req->labeltwo;
        $getlabelTwoAr      = $req->labeltwoar;
        $getlabelThree      = $req->labelthree;
        $getlabelThreeAr    = $req->labelthreear;
        $getdescription     = $req->description;
        $getdescriptionAr   = $req->descriptionar;
        $getPhoto           = $req->photo;
        $getStatus          = $req->status;

        // dd($getStatus );
        $this->validate($req,[
            'title'         => 'required',
            'titlear'       => 'required',
            'labelone'       => 'required',
            'labelonear'     => 'required',
            'labeltwo'       => 'required',
            'labeltwoar'     => 'required',
            'labelthree'     => 'required',
            'labelthreear'   => 'required',
            'description'    => 'required',
            'descriptionar'  => 'required',
            // 'photo'          => 'required',
        ]);


        $selectLocation =   Location::where('id',$location_id)->get()->first();
        $getLocationPhoto=$selectLocation->photo;

        $path='public/images/locations';

        ////// add it into storage ////
        $locationPhotoFolder = $getLocationPhoto;
        $name = explode('/',$locationPhotoFolder);
        $folderName = $name[0];
        $fileName = $name[1];
        // dd($folderName);

        $photoFile      = $req->file('photo');
        
        if($req->hasFile('photo') ){
           
            Storage::delete($path.'/'.$getLocationPhoto);
                   
            // Generate a file name with extension
            $photoName       = $folderName .'/location-'.time().'.'.$photoFile->getClientOriginalExtension();
            
            // Save the file                                folder , file
            $photoPath        = $photoFile->storeAs('public/images/locations', $photoName);
        
        
            if( $getStatus){

            Loacation::where('id',$location_id)
            ->update([
                'title'         =>  $getTitle,
                'titlear'       =>  $getTitleAr,
                'labelone'       => $getlabelOne,
                'labelonear'     => $getlabelOneAr,
                'labeltwo'       => $getlabelTwo,
                'labeltwoar'     => $getlabelTwoAr,
                'labelthree'     => $getlabelThree,
                'labelthreear'   => $getlabelThreeAr,
                'description'    => $getdescription,
                'descriptionar'  => $getdescriptionAr,
                'photo'          => $photoName,
                'status'         => true
            ]);

        }else{
            Loacation::where('id',$location_id)
            ->update([
                'title'         =>  $getTitle,
                'titlear'       =>  $getTitleAr,
                'labelone'       => $getlabelOne,
                'labelonear'     => $getlabelOneAr,
                'labeltwo'       => $getlabelTwo,
                'labeltwoar'     => $getlabelTwoAr,
                'labelthree'     => $getlabelThree,
                'labelthreear'   => $getlabelThreeAr,
                'description'    => $getdescription,
                'descriptionar'  => $getdescriptionAr,
                'photo'          => $photoName,
                'status'         => false
            ]);
        }
     
        }elseif(!$req->hasFile('photo') ){


            if( $getStatus){

                Loacation::where('id',$location_id)
                ->update([
                    'title'         =>  $getTitle,
                    'titlear'       =>  $getTitleAr,
                    'labelone'       => $getlabelOne,
                    'labelonear'     => $getlabelOneAr,
                    'labeltwo'       => $getlabelTwo,
                    'labeltwoar'     => $getlabelTwoAr,
                    'labelthree'     => $getlabelThree,
                    'labelthreear'   => $getlabelThreeAr,
                    'description'    => $getdescription,
                    'descriptionar'  => $getdescriptionAr,
                    'photo'          => $getLocationPhoto,
                    'status'         => true
                ]);
    
            }else{
                Loacation::where('id',$location_id)
                ->update([
                    'title'         =>  $getTitle,
                    'titlear'       =>  $getTitleAr,
                    'labelone'       => $getlabelOne,
                    'labelonear'     => $getlabelOneAr,
                    'labeltwo'       => $getlabelTwo,
                    'labeltwoar'     => $getlabelTwoAr,
                    'labelthree'     => $getlabelThree,
                    'labelthreear'   => $getlabelThreeAr,
                    'description'    => $getdescription,
                    'descriptionar'  => $getdescriptionAr,
                    'photo'          => $getLocationPhoto,
                    'status'         => false
                ]);
            }

        }
        return redirect()->route('loacation.list');
        
    }


}

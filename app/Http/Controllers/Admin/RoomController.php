<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Room;
use Str;
class RoomController extends Controller
{
    //
    public function roomsList()
    {
        $selectRooms = Room::paginate(5);
        return view('Admin.pages.rooms.roomslist',compact('selectRooms'));
    }

    public function roomsListAr($room_id)
    {
        $selectRoomsAr = Room::where('id',$room_id)->get();
        // dd($selectRoomsAr);
        return view('Admin.pages.rooms.roomlistar',compact('selectRoomsAr'));
    }

    public function addRoom()
    {
        return view('Admin.pages.rooms.addroom');
    }

    public function storeRoom(Request $req)
    {      
        $getLabel           = $req->label;
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
            'label'         => 'required',
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
        ]);

           ////// add it into storage ////

           $photoFile = $req->file('photo');
              
           $roomFolder = Str::random(8);  
          // Generate a file name with extension
          $photoName = $roomFolder .'/room-'.time().'.'.$photoFile->getClientOriginalExtension();
             
           if($req->hasFile('photo') ){
                  
               // Save the file                                folder , file
               $photoPath = $photoFile->storeAs('public/images/rooms', $photoName);
    
           }
        
           ////

        if( $getStatus){
            Room::create([
                'label'         =>  $getLabel,
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

            Room::create([
                'label'         =>  $getLabel,
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

        return redirect()->route('rooms.list');
    }



    public function deleteRoom($room_id)
    {
       Room::where('id',$room_id)
       ->delete();
       return redirect()->route('rooms.list');
    }


    public function editRoom($room_id)
    {
       $selectRoomsInfo =  Room::where('id',$room_id)->get();
       return view('Admin.pages.rooms.editroom',compact('selectRoomsInfo','room_id'));
    }

    public function updateRoom(Request $req ,$room_id)
    {
        $getLabel           = $req->label;
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
            'label'         => 'required',
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
        ]);

 
        $selectRooms =   Room::where('id',$room_id)->get()->first();
        $getRoomPhoto=$selectRooms->photo;

        $path='public/images/rooms';

        ////// add it into storage ////
        $RoomPhotoFolder = $getRoomPhoto;
        $name = explode('/',$RoomPhotoFolder);
        $folderName = $name[0];
        $fileName = $name[1];
        // dd($folderName);

        $photoFile      = $req->file('photo');


        
        if($req->hasFile('photo') ){
           
            Storage::delete($path.'/'.$getRoomPhoto);
                   
            // Generate a file name with extension
            $photoName       = $folderName .'/room-'.time().'.'.$photoFile->getClientOriginalExtension();
            
            // Save the file                                folder , file
            $photoPath        = $photoFile->storeAs('public/images/rooms', $photoName);
        
        
            if( $getStatus){

            Room::where('id',$room_id)
            ->update([
                'label'         =>  $getLabel,
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
            Room::where('id',$room_id)
            ->update([
                'label'         =>  $getLabel,
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

                Room::where('id',$room_id)
                ->update([
                    'label'         =>  $getLabel,
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
                    'photo'          => $getRoomPhoto,
                    'status'         => true
                ]);
    
            }else{
                Room::where('id',$room_id)
                ->update([
                    'label'         =>  $getLabel,
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
                    'photo'          => $getRoomPhoto,
                    'status'         => false
                ]);
            }

        }
        
        return redirect()->route('rooms.list');
        
    }



}

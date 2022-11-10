<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Group,Training,Room,Teacher};


class GroupController extends Controller
{
    //
    public function groupList()
    {
        $selectGroup = Group::paginate(5);
        return view('Admin.pages.groups.grouplist',compact('selectGroup'));
    }

    public function addGroup()
    {
        $selsctTrainings = Training::all();
        $selsctRooms     = Room::all();
        $selectTeachers    =Teacher::all();
        return view('Admin.pages.groups.addgroup',compact('selsctTrainings','selsctRooms','selectTeachers'));
    }

    public function storeGroup(Request $req)
    {
       
        $getlabel           = $req->label;
        $getTrainingId      = $req->training_id;
        $getRoomId          = $req->room_id;
        $getTeacherId       = $req->teacher_id;

        


        $this->validate($req,[
            'label'             => 'required|unique:groups,label',  
            'training_id'       => 'required',            
            'room_id'           => 'required',            
            'teacher_id'        => 'required',            
        ]);

      
            Group::create([
                'label'             =>$getlabel,
                'training_id'       =>$getTrainingId,            
                'room_id'           =>$getRoomId,            
                'teacher_id'        =>$getTeacherId,            
            ]);
        

        return redirect()->route('group.list');
    }

    public function editGroup($group_id)
    {
       $selectGroupInfo = Group::where('id',$group_id)->get();
       $selsctTrainings = Training::all();
       $selsctRooms     = Room::all();
       $selectTeachers    =Teacher::all();
       return view('Admin.pages.groups.editgroup',compact('selectGroupInfo','group_id','selsctTrainings','selsctRooms','selectTeachers'));
    }

    public function updateGroup(Request $req ,$group_id)
    {
        $getlabel       = $req->label;
        $getTrainingId  = $req->training_id;
        $getRoomId      = $req->room_id;
        $getTeacherId   = $req->teacher_id;


        $selectGroupInfo    = Group::where('id',$group_id)->get();
        $getTrId            =$selectGroupInfo[0]->training_id;
        $getGrLabel         =$selectGroupInfo[0]->label;
        $getRmId            =$selectGroupInfo[0]->room_id;
        $getTcId            =$selectGroupInfo[0]->teacher_id;



        if( isset($getlabel) && isset($getTrainingId) && isset($getRoomId ) && isset($getTeacherId )){
              Group::where('id',$group_id)
                ->update([
                'label'             =>$getlabel,
                'training_id'       =>$getTrainingId,  
                'room_id'           =>$getRoomId,            
                'teacher_id'        =>$getTeacherId,            
                ]);
        }elseif(isset($getlabel) ){
            Group::where('id',$group_id)
            ->update([
            'label'             =>$getlabel,
            'training_id'       =>$getTrId,     
            'room_id'           =>$getRmId,  
            'teacher_id'        =>$getTcId,            
            ]);
        }elseif(isset($getTrainingId) ){
            Group::where('id',$group_id)
            ->update([
            'label'             =>$getGrLabel,
            'training_id'       =>$getTrainingId,     
            'room_id'           =>$getRmId,  
            'teacher_id'        =>$getTcId,            
            ]);
        }elseif(isset($getRoomId) ){
            Group::where('id',$group_id)
            ->update([
            'label'             =>$getGrLabel,
            'training_id'       =>$getTrId,     
            'room_id'           =>$getRoomId,
            'teacher_id'        =>$getTcId,            
            ]);
        }elseif(isset($getTeacherId) ){
            Group::where('id',$group_id)
            ->update([
            'label'             =>$getGrLabel,
            'training_id'       =>$getTrId,     
            'room_id'           =>$getRmId,   
            'teacher_id'        =>$getTeacherId,            
            ]);
        }

  
        return redirect()->route('group.list');  
    }

    public function deleteGroup($group_id)
    {
        Group::where('id',$group_id)
       ->delete();
       return redirect()->route('group.list');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Room;
use App\Models\Teacher;
use App\Models\Part;
use App\Models\Part_training;
use App\Models\Required_document;
use App\Models\Training_requireddocument;
use App\Models\Requested_document;
use App\Models\Training_requesteddocument;
use App\Models\Group;
use Str;





class TrainingController extends Controller
{
    //

    public function trainingList()
    {
        $selectTraining = Training::paginate(5);
        return view('Admin.pages.trainings.traininglist',compact('selectTraining'));
    }

    public function addTraining()
    {
        $selectRequiredDocuments         = Required_document::all();
        $selectRequestedDocuments        = Requested_document::all();
        $selectParts                     = Part::all();
        $selectTeachers                  = Teacher::all();
        $selectRooms                     = Room::all();
        return view('Admin.pages.trainings.addtraining',compact('selectRooms','selectTeachers','selectParts','selectRequiredDocuments','selectRequestedDocuments'));
    }


    public function storeTraining(Request $req)
    {
        
        $getLabel               = $req->label;
        // $getStudentTotalNumber  = $req->studenttotalnumber;
        $getStartDate           = $req->startdate;
        $getEndDate             = $req->enddate;
        $getStartTime           = $req->starttime;
        $getEndTime             = $req->endtime;
        $getRoomId              = $req->room_id;
        // $getTeacherId           = $req->teacher_id;
        $getPartId              = $req->part_id;
        $getRequiredDocumentId  = $req->required_document_id;
        $getRequestedDocumentId = $req->requested_document_id;
        $getDescription         = $req->description;
        // $getOrder               = $req->order;
        $getStatus              = $req->status;

     
        $this->validate($req,[
            'label'                 =>'required|unique:trainings',
            // 'studenttotalnumber'    =>'required',
            'startdate'             =>'required',
            'enddate'               =>'required',
            'starttime'             =>'required',
            'endtime'               =>'required',
            // 'room_id'               =>'required',
            // 'teacher_id'            =>'required',
            'part_id'               =>'required',
            'required_document_id'  =>'required',
            'requested_document_id' =>'required',
            'description'           =>'required',
            // 'order'                 =>'required',
            // 'status'                =>'required',
        ]);
            // intialize all that things inserted into the database in a variable

            if( $getStatus ){
                $training   =  Training::create([
                    'label'                 =>$getLabel,
                    // 'studenttotalnumber'    =>$getStudentTotalNumber,
                    'startdate'             =>$getStartDate ,
                    'enddate'               =>$getEndDate ,
                    'starttime'             =>$getStartTime ,
                    'endtime'               =>$getEndTime ,
                    // 'room_id'               =>$getRoomId,
                    // 'teacher_id'            =>$getTeacherId ,
                    'description'           =>$getDescription,
                    // 'order'                 =>$getOrder,
                    'status'                =>true,
                ]);
            }else{
                $training   =  Training::create([
                    'label'                 =>$getLabel,
                    // 'studenttotalnumber'    =>$getStudentTotalNumber,
                    'startdate'             =>$getStartDate ,
                    'enddate'               =>$getEndDate ,
                    'starttime'             =>$getStartTime ,
                    'endtime'               =>$getEndTime ,
                    // 'room_id'               =>$getRoomId,
                    // 'teacher_id'            =>$getTeacherId ,
                    'description'           =>$getDescription,
                    // 'order'                 =>$getOrder,
                    'status'                =>false,
                ]);
            }

         
           
// add into training_requireddocuments  pivot 
            // we use training variable to get all the inserted data despite to select it many time  
            $training->requireddocuments()->attach($getRequiredDocumentId);
// add into part_training  pivot 
            $training->parts()->attach($getPartId);
// add into training_requesteddocuments  pivot 
// we use training variable to get all the inserted data despite to select it many time  
            $training->requesteddocuments()->attach($getRequestedDocumentId);
   
      return redirect()->route('training.list');    
    }

   

    public function editTraining($training_id)
    {
        $selectPart                 = Part::all();
        $selectTeacher              = Teacher::all() ;
        $selectRoom                 = Room::all() ;
        $selectRequiredDocuments    = Required_document::all();
        $selectRequestedDocuments   = Requested_document::all();
        $selectTrainingInfo         = Training::where('id',$training_id)->get();
        return view('Admin.pages.trainings.edittraining',compact('selectTrainingInfo','selectRoom','selectTeacher','selectPart','selectRequiredDocuments','selectRequestedDocuments'));
    }

    
    public function updateTraining(Request $req ,$training_id)
    {
        $getLabel               = $req->label;
        // $getStudentTotalNumber  = $req->studenttotalnumber;
        $getStartDate           = $req->startdate;
        $getEndDate             = $req->enddate;
        $getStartTime           = $req->starttime;
        $getEndTime             = $req->endtime;
        // $getRoomId              = $req->room_id;
        // $getTeacherId           = $req->teacher_id;
        $getPartId              = $req->part_id;
        $getRequiredDocumentId  = $req->required_document_id;
        $getRequestedDocumentId = $req->requested_document_id;
        $getDescription         = $req->description;
        // $getOrder               = $req->order;
        $getStatus              = $req->status;


        $selectTraining  =  Training::where('id',$training_id)->get()->first();
        $selectLabel      =$selectTraining->label;
        $selectStatus     =$selectTraining->status;
        // dd($selectStatus );
        
          if($getLabel == $selectLabel ){
            // dd('dfgzdg');
            
          
            $this->validate($req,[
                'label'                 =>'required',
                // 'studenttotalnumber'    =>'required',
                'startdate'             =>'required',
                'enddate'               =>'required',
                'starttime'             =>'required',
                'endtime'               =>'required',
                // 'room_id'               =>'required',
                // 'teacher_id'            =>'required',
                // 'part_id'               =>'required',
                // 'required_document_id'  =>'required',
                // 'requested_document_id' =>'required',
                'description'           =>'required',
                // 'order'                 =>'required',
                // 'status'                =>'required',
            ]);
        
        
        }else{

            $this->validate($req,[
                'label'                  =>'required|unique:trainings',
                // 'studenttotalnumber'    =>'required',
                'startdate'             =>'required',
                'enddate'               =>'required',
                'starttime'             =>'required',
                'endtime'               =>'required',
                // 'room_id'               =>'required',
                // 'teacher_id'            =>'required',
                // 'part_id'               =>'required',
                // 'required_document_id'  =>'required',
                'description'           =>'required',
                // 'order'                 =>'required',
                // 'status'                =>'required',
            ]);

        }
   
       

        if($getStatus){
            // dd('dfgdfg');
            Training::where('id',$training_id)
            ->update([
                'label'                 =>$getLabel,
                // 'studenttotalnumber'    =>$getStudentTotalNumber,
                'startdate'             =>$getStartDate ,
                'enddate'               =>$getEndDate ,
                'starttime'             =>$getStartTime ,
                'endtime'               =>$getEndTime ,
                // 'room_id'               =>$getRoomId,
                // 'teacher_id'            =>$getTeacherId , 
                'description'           =>$getDescription,
                // 'order'                 =>$getOrder,
                'status'                =>true,
            ]);
        }else{
            Training::where('id',$training_id)
            ->update([
                'label'                 =>$getLabel,
                // 'studenttotalnumber'    =>$getStudentTotalNumber,
                'startdate'             =>$getStartDate ,
                'enddate'               =>$getEndDate ,
                'starttime'             =>$getStartTime ,
                'endtime'               =>$getEndTime ,
                // 'room_id'               =>$getRoomId,
                // 'teacher_id'            =>$getTeacherId , 
                'description'           =>$getDescription,
                // 'order'                 =>$getOrder,
                'status'                =>$selectStatus,
            ]);
        }

            $selectTraining = Training::where('id',$training_id)->get()->first();
           if(isset($getRequiredDocumentId)){
                // update trainings_requireddocument pivot 
                $selectTraining->requireddocuments()->sync($getRequiredDocumentId);
           }
           if(isset($getPartId)){
               // update part_training  pivot 
                $selectTraining->parts()->sync($getPartId);
           }
            if(isset($getRequestedDocumentId)){
                // update trainings_requireddocument pivot 
               $selectTraining->requesteddocuments()->sync($getRequestedDocumentId);
            }
           

      return redirect()->route('training.list');
    }
    
    public function deleteTraining($training_id)
    {
        Training::where('id',$training_id) ->delete();
        return redirect()->route('training.list');
    }

    public function trainingListTwo($training_id)
    {
        $selectTraining = Training::where('id',$training_id)->paginate(5);
        // $label = $selectTraining->parts->pluck('label');
        // dd($label);
        $selectRoomId          = Group::where('training_id',$training_id)->get('room_id');
        $getRoomId             =$selectRoomId[0]->room_id;
        
        $selectTeacherId       = Group::where('training_id',$training_id)->get('teacher_id');
        $getTeacherId          =$selectTeacherId[0]->teacher_id;
    
        $selectRoomLabel       = Room::where('id', $getRoomId )->get('label');
        $getRoomLabel          =$selectRoomLabel[0]->label;
       
        $selectTeacherLabel    = Teacher::where('id', $getTeacherId )->get('name');
        $getTeacherLabel       =$selectTeacherLabel[0]->name;

        // dd($getTeacherLabel);
        return view('Admin.pages.trainings.traininglisttwo',compact('selectTraining','getRoomLabel','getTeacherLabel'));
    }

    public function trashedTraining()
    {
        $selectTrashedTraining = Training::onlyTrashed()->paginate(5);
        return view('Admin.pages.trainings.trashedtraining',compact('selectTrashedTraining'));
    }

    public function restoreTrashedTraining($training_id)
    {
        Training::onlyTrashed()->where('id',$training_id)->restore();
        return redirect()->route('trashed.training');    
    }
}

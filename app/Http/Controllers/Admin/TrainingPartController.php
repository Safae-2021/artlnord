<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training_part;

class TrainingPartController extends Controller
{
    //
    public function trainingPartList()
    {
        $selectTrainingPart = Training_part::where('status',true)->paginate(5);
        return view('Admin.pages.trainingpart.trainingpartlist',compact('selectTrainingPart'));
    }

    public function addTrainingPart()
    {
        return view('Admin.pages.trainingpart.addtrainingpart');
    }

    public function storeTrainingPart(Request $req)
    {
        
        $getLabel          = $req->label;
        $getStudentNumber  = $req->studentsnumber;
        // $getStatus         = $req->status;

        $this->validate($req,[
            'label'         =>'required|unique:training_parts',
            'studentsnumber'=>'required',
        ]);

     
            Training_part::create([
                'label'         =>$getLabel,
                'studentsnumber'=>$getStudentNumber,
                'status'        =>true,
            ]);
   
    
      return redirect()->route('training.part.list');
        
    }

    public function editTrainingPart($training_part_id)
    {
        $selectTrainingPartInfo = Training_part::where('id',$training_part_id)->get();
        return view('Admin.pages.trainingpart.edittrainingpart',compact('selectTrainingPartInfo'));
    }

    public function updateTrainingPart(Request $req ,$training_part_id)
    {
        $getLabel          = $req->label;
        $getStudentNumber  = $req->studentsnumber;
        // $getStatus         = $req->status;

        $this->validate($req,[
            'label'         =>'required|unique:training_parts',
            'studentsnumber'=>'required',
        ]);

        Training_part::where('id',$training_part_id)
        ->update([
            'label'         =>$getLabel,
            'studentsnumber'=>$getStudentNumber,
            'status'        =>true,
        ]);

      return redirect()->route('training.part.list');
    }


    public function deleteTrainingPart($training_part_id)
    {
        Training_part::where('id',$training_part_id)
        ->update(['status'  =>  false]);
      return redirect()->route('training.part.list');
    }
}

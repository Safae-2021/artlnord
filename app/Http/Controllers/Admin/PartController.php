<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Part;
class PartController extends Controller
{
    //
    public function partList()
    {
        $selectPart = Part::where('status',true)->paginate(5);
        return view('Admin.pages.part.partlist',compact('selectPart'));
    }

    public function addPart()
    {
        return view('Admin.pages.part.addpart');
    }

    public function storePart(Request $req)
    {
        
        $getLabel          = $req->label;
        $getStudentNumber  = $req->studentsnumber;
        // $getStatus         = $req->status;

        $this->validate($req,[
            'label'         =>'required|unique:parts',
            'studentsnumber'=>'required',
        ]);

     
            Part::create([
                'label'         =>$getLabel,
                'studentsnumber'=>$getStudentNumber,
                'status'        =>true,
            ]);
   
    
      return redirect()->route('part.list');
        
    }

    public function editPart($part_id)
    {
        $selectPartInfo = Part::where('id',$part_id)->get();
        return view('Admin.pages.part.editpart',compact('selectPartInfo'));
    }

    public function updatePart(Request $req ,$part_id)
    {
        $getLabel          = $req->label;
        $getStudentNumber  = $req->studentsnumber;
        // $getStatus         = $req->status;

        $this->validate($req,[
            'label'         =>'required|unique:parts',
            'studentsnumber'=>'required',
        ]);

        Part::where('id',$part_id)
        ->update([
            'label'         =>$getLabel,
            'studentsnumber'=>$getStudentNumber,
            'status'        =>true,
        ]);

      return redirect()->route('part.list');
    }


    public function deletePart($part_id)
    {
        Part::where('id',$part_id)
        ->update(['status'  =>  false]);
      return redirect()->route('part.list');
    }
}

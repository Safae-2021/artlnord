<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Required_document;

class RequiredDocumentController extends Controller
{
    //
    public function requiredDocumentList()
    {
        $selectRequiredDocument   =    Required_document::paginate(5);
        return view('Admin.pages.requireddocument.requireddocumentlist',compact('selectRequiredDocument'));
    }

    public function addRequiredDocument()
    {
        return view('Admin.pages.requireddocument.addrequireddocument');
    }


    public function storeRequiredDocument(Request $req)
    {
       
        $getlabel       = $req->label;
        $this->validate($req,[
            'label'       => 'required|unique:required_documents,label',            
        ]);
        Required_document::create([
             'label'     =>$getlabel,
              ]);
        return redirect()->route('required.document.list');
    }

    public function editRequiredDocument($required_document_id)
    {
       $selectRequiredDocumentInfo = Required_document::where('id',$required_document_id)->get();
       return view('Admin.pages.requireddocument.editRequireddocument',compact('selectRequiredDocumentInfo','required_document_id'));

    }
    public function updateRequiredDocument(Request $req ,$required_document_id)
    {
        $getlabel       = $req->label;

        $this->validate($req,[
            'label'       => 'required|unique:required_documents,label',            
        ]);
         Required_document::where('id',$Required_document_id)
                 ->update([
                     'label'     =>$getlabel,
                 ]);
        return redirect()->route('Required.document.list');  
    }

    public function deleteRequiredDocument($Required_document_id)
    {
        Required_document::where('id',$Required_document_id)
        ->delete();
       return redirect()->route('Required.document.list');
    }
}

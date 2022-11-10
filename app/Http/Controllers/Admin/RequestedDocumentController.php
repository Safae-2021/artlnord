<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requested_document;

class RequestedDocumentController extends Controller
{
    //
    public function requestedDocumentList()
    {
        $selectRequestedDocument   =    Requested_document::paginate(5);
        return view('Admin.pages.requesteddocument.requesteddocumentlist',compact('selectRequestedDocument'));

    }

    public function addRequestedDocument()
    {
        return view('Admin.pages.requesteddocument.addrequesteddocument');
    }


    public function storeRequestedDocument(Request $req)
    {
       
        $getlabel       = $req->label;



        $this->validate($req,[
            'label'       => 'required|unique:requested_documents,label',            
        ]);
             Requested_document::create([
                   'label'     =>$getlabel,
                  ]);
      

        return redirect()->route('requested.document.list');
    }

    public function editRequestedDocument($requested_document_id)
    {
       $selectRequestedDocumentInfo = Requested_document::where('id',$requested_document_id)->get();
       return view('Admin.pages.requesteddocument.editrequesteddocument',compact('selectRequestedDocumentInfo','requested_document_id'));

    }
    public function updateRequestedDocument(Request $req ,$requested_document_id)
    {
        $getlabel       = $req->label;



        $this->validate($req,[
            'label'       => 'required|unique:requested_documents,label',            
        ]);
         Requested_document::where('id',$requested_document_id)
                 ->update([
                     'label'     =>$getlabel,
                 ]);
        return redirect()->route('requested.document.list');  
    }

    public function deleteRequestedDocument($requested_document_id)
    {
        Requested_document::where('id',$requested_document_id)
       ->delete();
       return redirect()->route('requested.document.list');
    }
}

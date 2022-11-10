<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    //
    public function contactList()
    {
        $selectContacts = Contact::paginate(10);
        //    dd($selectRentals);
        return view('Admin.pages.contacts.contactlist',compact('selectContacts'));
    }

    public function deleteContact($contact_id)
    {
        Contact::where('id',$contact_id)->delete();
        return redirect()->back();
    }

 
}

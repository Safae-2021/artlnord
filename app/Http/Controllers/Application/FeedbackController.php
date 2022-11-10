<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Str;

class FeedbackController extends Controller
{
    //
    // public function feedbackList()
    // {
    //     $selectFeedback = Feedback::all()->paginate(5);
    //     return view('application.pages.accueil',compact('selectFeedback'));
    // }


    public function addFeedback()
    {
        return view('application.feedbacks.addfeedback');
    }

    public function storeFeedback(Request $req )
    {
        $getName                     =$req->name;
        $getPhoto                    =$req->photo;
        $getDescription              =$req->description;



           $this->validate($req,[
            // not duplicate the name if already exist or unique its the same 
           'name'                           => 'required',
           'photo'                          => 'required',
           'description'                    => 'required',
           ]);


              ////// add it into storage ////

           $photoFile = $req->file('photo');
              
           $feedbackFolder = Str::random(8);  
          // Generate a file name with extension
          $photoName = $feedbackFolder .'/feedback-'.time().'.'.$photoFile->getClientOriginalExtension();
             
           if($req->hasFile('photo') ){
                  
               // Save the file                                folder , file
               $photoPath = $photoFile->storeAs('public/images/feedbacks', $photoName);
    
           }
        
           ////


           Feedback::create([
            'name'          =>$getName,
            'photo'         =>$photoName ,
            'description'   =>$getDescription ,
            'status'        =>true,
        ]);

        return redirect()->route('acceuil');

    }

    
}

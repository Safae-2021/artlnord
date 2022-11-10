<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class AdminFeedBackController extends Controller
{
    public function feedbackList()
    {
        $selectFeedbacks = Feedback::paginate(10);
        //    dd($selectRentals);
        return view('Admin.pages.feedbacks.feedbacklist',compact('selectFeedbacks'));
    }

    public function deleteFeedback( $feedback_id)
    {
        Feedback::where('id',$feedback_id)->delete();
        return redirect()->back();
    }

    public function updateFeedback(Request $req, $feedback_id)
    {
        $getStatus = $req->status;
        // dd( $getStatus);
        if($getStatus){
            Feedback::where('id',$feedback_id)->update(['status'=>true]);
        }else{
            Feedback::where('id',$feedback_id)->update(['status'=>false]);
        }

     return redirect()->route('feedback.list')   ;
    }
}

<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Room,Blog,Training,Feedback,Contact};
use DateTime;
use Session;



class ApplicationController extends Controller
{
    //

    public function showAcceuil()
    {      
        $selectTraining = Training::where('status',true)->latest()->take(1)->get();
        // dd($selectTraining );

        $getBlogDate = Blog::where('status',true)->get('created_at');
        $blogDate = $getBlogDate;
        foreach($blogDate as $date){
            $date = explode('-',$blogDate);
            $dateYear = $date[0];
            $dateMonth = $date[1];
            $dateDay = $date[2];
            // dump($date);
        }
        $selectBlogs = Blog::where('status',true)->latest()->take(2)->get();
        // dd($selectBlogs );

        /////////////////           

        $selectFeedBacks    = Feedback::where('status',true)->get();
        // dd($selectFeedBacks);
        return view('application.pages.acceuil',compact('selectBlogs','dateMonth','selectTraining','selectFeedBacks'));
    }

    public function showArtln()
    {
        return view('application.pages.artln');
    }

    public function showFormation($training_id)
    {
        $selectTraining     =Training::where('id',$training_id)->get();

        $selectStartDate       =Training::where('id',$training_id)->get('startdate');
        $selectEndDate         =Training::where('id',$training_id)->get('enddate');
        $startdate            =$selectStartDate[0]->startdate;
        $enddate              =$selectEndDate[0]->enddate;
        $srtDay                = new DateTime( $startdate);
        $enDay                = new DateTime( $enddate);
        $interval             = $srtDay->diff($enDay);
        // dd( $interval->d  );
        return view('application.pages.formation',compact('selectTraining','interval'));
    }

    public function showLocation()
    {
        $selectRoomInfo = Room::where('status',true)->get();
        return view('application.pages.location',compact('selectRoomInfo'));
    }

    public function showActualites()
    {
        $getBlogDate = Blog::where('status',true)->get('created_at');
        $blogDate = $getBlogDate;
        foreach($blogDate as $date){
            $date = explode('-',$blogDate);
            $dateYear = $date[0];
            $dateMonth = $date[1];
            $dateDay = $date[2];
            // dump($date);

        }
        $selectBlogInfo = Blog::where('status',true)->orderBy('created_at','asc')->get();
        return view('application.pages.actualites',compact('selectBlogInfo','dateMonth'));
    }

    public function showArticle($blog_id){
        // dd('dgd');
        $getBlogInfo = Blog::where('id',$blog_id)->get();

        $selectBlogs =Blog::where('status',true)->get();
        $selectFilteredBlogs = $selectBlogs->except([ 'id',$blog_id])->take(4);
        // dd($selectFilteredBlogs );
        return view("application.blog.article" ,compact('getBlogInfo','selectFilteredBlogs'));
    }

    public function showContact()
    {
        return view('application.pages.contact');
    }
   
    public function showArticle2(){
        return view("application.blog.article2");
    }

    public function showIso(){
        return view("application.conseil.iso");
    }
    public function showDouane()
    {
        return view("application.conseil.douane");
    }
    public function contactStore(Request $req)
    {
        $getName                     =$req->fullname;
        $getEmail                    =$req->email;
        $getMessage                  =$req->message;

        $this->validate($req,[
            // not duplicate the name if already exist or unique its the same 
           'fullname'               => 'required',
           'email'                  => 'required|email',
            'message'               => 'required',
        ]);
        Contact::create([
            'fullname'               =>$getName ,
            'email'                  =>$getEmail ,
            'description'            =>$getMessage ,
        ]);
        // dd($req->all());
        return redirect()->back()->with(['messagesent'=>'Message envoyer avec success']);
    }

    public function deleteSessionUser()
    {
        Session::forget('user'); 
        return redirect()->back();
    }
}

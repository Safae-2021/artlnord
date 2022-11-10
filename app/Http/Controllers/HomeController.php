<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function visitorIndex()
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
    public function adminIndex()
    {
        $selectStudent  = Registration::whereNotNull('group_id')->get();
        $selectRental  = Rental::where('status',true)->get();
        $selectTeacher  = Teacher::where('status',true)->get();
        $selectTodoList  = TodoList::paginate(5);

        // dd($selectRental);
        return view('Admin.pages.dashboard',compact('selectStudent','selectRental','selectTeacher','selectTodoList') );       
    }

}

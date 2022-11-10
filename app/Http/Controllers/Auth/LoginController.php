<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request )
    {
        
        $validated =$request->validate([
           'email'    => 'required|email',
           'password' => 'required',
           ]);

        //    if succes
        // if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        //     // its user checking if admin or not

        //         if(auth()->user()->role_id == 1){
        //             // admin
        //             session()->put('user', Auth::user() );
        //             return redirect()->route('admin.dashboard');
        //         }else{
        //             // visitor
        //             session()->put('user', Auth::user() );
        //             return redirect()->route('acceuil');
        //         }
        // }
        // // invalid credentials
        // return redirect()->route('login')->with('error','les donnee sont  invalide');
            $cc =User::where('email', '=',  $request->email)->exists()  && (User::where('password', '=', $request->password)->exists());
        $selectUser =User::where('email', '=',  $request->email)->where('password', '=',  $request->password)->get();
        //    dd( $selectUser);
        if ( $cc) {
           if( $selectUser[0]->role_id == 1){
                        // admin
                        session()->put('user',$selectUser);
                        return redirect()->route('admin.dashboard');
                    }else{
                        // visitor
                        session()->put('user',$selectUser);
                        return redirect()->route('acceuil');

                    }
         }else{
           dd('ll');
         }
    }

    
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $selectUser =User::where('email', '=',  $request->email)->where('password', '=',  $request->password)->get();
        if(Session::has('user')){
            foreach (Session::get('user') as $item ){
               
                if($item->role_id == 1){
                    return $next($request);
                }
                    return redirect('/')->with('acces denided','vous n`aviez pas l`access');
            
            }
           
    
        }
      
     

     
    }
}

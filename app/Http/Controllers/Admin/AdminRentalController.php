<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Rental,User};

class AdminRentalController extends Controller
{
    //
    public function rentalList()
    {
       $selectRentals = Rental::paginate(10);
    //    dd($selectRentals);
       return view('Admin.pages.rentals.rentallist',compact('selectRentals'));
    }

    public function rentalListTwo($rental_id)
    {
       $selectRentals = Rental::where('id',$rental_id)->get();
      //  dd($selectRentals);
       return view('Admin.pages.rentals.rentallisttwo',compact('selectRentals'));
    }
    public function deleteRental($rental_id)
    {
      // delete from user too
      if(Rental::count() > 0){
               $selectUserId     =  Rental::where('id',$rental_id)->get('user_id');
      // dd($selectUserId[0]->user_id );
      User::where('id',$selectUserId[0]->user_id)->delete();
      Rental::where('id',$rental_id)->delete();
      return  redirect()->back()->with(['deletesucces'=>'Supprimé avec succès ']);
      }
      // return  redirect()->back();
    }


    public function acceptRental($rental_id)
    {
      Rental::where('id',$rental_id)
      ->update([
          'status'         => true
      ]);
      return  redirect()->back()->with(['acceptsucces'=>'Accepter avec succès ']);
    }


  
}

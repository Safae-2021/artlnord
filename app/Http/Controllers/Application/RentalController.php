<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Rental,Room,Group,Training,User};
// use App\Models\Room;
// use App\Models\Group;
// use App\Models\Training;
use Date,Str;
use Carbon\Carbon;


class RentalController extends Controller
{
    //


    public function rentalRegister()
    {

//^^^^^^^^^^^^^^^^^^^^^^^^^
   // group where id room != id room =>its will be the default id 
        //  group where id room == id in room table we will check the training 
        // get the training start date end date 
        // and the all dates
        // 2 == full 1 == empty 
        // check the id room in the rental table  check the start date and end date 
        // send it to the view to put it on input

// ^^^^^^^^^^^^^^^^^^^^^^ 

        // select all the rooms
        $selectRoom                =Room::all();
        // select group ids are not empty
        $selectRoomIdsFromGroup    =Group::get('room_id');        

        $selectGroup                =Group::all();

        $tableIdsRoomFull             =[];

////////////
      
            foreach ($selectRoomIdsFromGroup as $roomIdsFromGroup => $id_room ) {
                array_push($tableIdsRoomFull,$id_room->room_id);
            // dd(  $roomIdsFromGroup  );
      

        }

 // default id of room filter  ==3 we will get first index from table 
          $i=0;
        $emptyRoomIdsFromTrainings = $selectRoom->whereNotIn('id', [$tableIdsRoomFull[$i++],$tableIdsRoomFull[$i++]]);
        $i++;
                  
        // dd( $emptyRoomIdsFromTrainings);
            // dd(  $tableIdsRoomFull  );
// /////////////////////////////// 
        $fullRoomFromTrainingIds   = [];
        // get the ids of training from full_room_id in group table 
        foreach ($tableIdsRoomFull as $idsRoomFull ) {
            // dd( $idsRoomFull);
            // dd(Group::where('room_id', $tableIdsRoomFull[$idsRoomFull])->get('training_id'));
         array_push( $fullRoomFromTrainingIds ,Group::where('room_id', $idsRoomFull)->get('training_id')) ;

        }
        // dd($fullRoomFromTrainingIds);

// /////////////////get training

        if (Training::count() > 0) {
                $t=0;
                $selectTrainingInfo             =[];
                $SelectAllStartDates            =[];
                $SelectAllEndDates              =[];
                $training_all_dates             = array();

            foreach ($fullRoomFromTrainingIds as $trgIdsFromFullRoom => $trgIds) {
                    // dd($trgIds[$t]->training_id);

                array_push($selectTrainingInfo,Training::where('id',$trgIds[$t]->training_id)->get());
                
                $selectStartdate    = Training::where('id',$trgIds[$t]->training_id)->get('startdate');
                $getStartdate       = $selectStartdate[$t]->startdate;
                $selectEnddate    = Training::where('id',$trgIds[$t]->training_id)->get('enddate');
                $getEnddate       = $selectEnddate[$t]->enddate;
               
                $startDate = new Carbon($getStartdate);
                $endDate = new Carbon($getEnddate);
                while ($startDate->lte($endDate)){
                  $training_all_dates[] = $startDate->toDateString();
                  $startDate->addDay();
                }

               
                // array_push($SelectAllEndDates,$getEnddate );
                // array_push($SelectAllDates,$getStartdate );

                }
                $t++;
                // dd($training_all_dates);

                // dd($SelectAllEndDates );
        // dd($selectTrainingInfo);

    }

    //   ////////////// check the rental if the room empty  dates and time  
                // dd($emptyRoomIdsFromTrainings[2]->id);
                // dd( $emptyRoomIdsFromTrainings) ;
    
                $emptyRoomIdFromTraining=$emptyRoomIdsFromTrainings[2]->id;
                // if(Rental::count() > 0 ){
                //     // dd('hh');
                //     // wich room is empty 
                //     // choose first  
                //      // if the rental have this ids of emptyroomfromtrsining 
                //     //  dd( $emptyRoomIdsFromTrainings) ;
                //     // if start time >=8 && end time <=18
                //     // foreach($emptyRoomIdsFromTrainings as $emptyRoomIdsFromTraining ){
                //     //     dd( Rental::where('room_id',$emptyRoomIdsFromTraining->id)->get()) ;
                //     // }
                //     // check the date 
                //     // send to the view date traing full and rental full
                // }elseif($emptyRoomIdsFromTrainings->count() < 0){

                //     // if emptyRoomIdsFromTrainings count() < 0
                //     // dd('by');
                //     //    insert with id of  empty room 
                //     // dd($training_all_dates);
                //  return view('Application.rental.rentalregister',compact('training_all_dates','emptyRoomIdFromTraining'));

                // }elseif($emptyRoomIdsFromTrainings->count() > 0){
                //         // if the rental have this ids of emptyroomfromtrsining 
                //     //   dd( $emptyRoomIdsFromTrainings) ;
                //     //   dd( Rental::where('room_id',$emptyRoomIdsFromTrainings)->get()) ;
                //         // then we check the date and time 
                //     $dates = Carbon::yesterday()->toDateString();
                //     // dd($training_all_dates);
                //  return view('Application.rental.rentalregister',compact('emptyRoomIdFromTraining'));

                // }

     
        return view('Application.rental.rentalregister',compact('emptyRoomIdFromTraining'));
       
    }


        public function rentalStore(Request $req,$emptyRoomIdFromTraining )
        {

            // user table:
        $getName                     =$req->name;
        $getEmail                    =$req->email;
        $getAddress                  =$req->address;
        $getPhone                    =$req->phone;
        $getPassword                 =$req->password;
        $getCin                      =$req->cin;

        //rental table:
        $getStartdate                =$req->startdate;
        // $getEndDate                  =$req->enddate;
        $getStartTime                =$req->starttime;
        $getEndTime                  =$req->endtime;
        $getScanCin                  =$req->scan_cin;
        $getPhoto                    =$req->photo;

            


        $this->validate($req,[
            // not duplicate the name if already exist or unique its the same 
           'name'                           => 'required',
           'email'                          => 'required|email',
           'cin'                            => 'required|unique:users,cin',
           'address'                        => 'required',
           'phone'                          => 'required|max:12',
           'password'                       => 'required',
           'photo'                          => 'required',
           'scan_cin'                       => 'required',
           'startdate'                      => 'required',
        //    'enddate'                        => 'required',
           'starttime'                      => 'required',
           'endtime'                        => 'required',
           ]);




        //    if rental >0 ?->where('enddate','<=',$getStartdate)->where('enddate','<',$getEndDate)
    // foreach($emptyRoomIdsFromTrainings as $emptyRoomIdsFromTraining ){
    //     dd( Rental::where('room_id',$emptyRoomIdsFromTraining->id)->get()) ;
    // $startDateInput >= end date db where room id   &&  $endDateInpt > end date  db where room id
    // $startTimeInput >= end time db where room id   &&  $endTimeInpt > end Time  db where room id
        // dd(Rental::where('room_id',$emptyRoomIdFromTraining)->where('startdate',$getStartdate)->get());
    
    
    // $tt = Rental::where('room_id',$emptyRoomIdFromTraining)->where('startdate','<',$getEndDate)->where('startdate','>=',$getEndDate)->get();
    
    // $pp= Rental::where('room_id',$emptyRoomIdFromTraining)->where('startdate',$getStartdate)
    // ->where('endtime','<=',$getStartTime)->where('endtime','<',$getEndTime)->get();

    $lll =Rental::where('room_id',$emptyRoomIdFromTraining)->where('startdate',$getStartdate)
                ->where('endtime','>',$getStartTime)->where('starttime','<',$getEndTime)
                ->where('status',true)->get();
    // dd(Rental::where('room_id',$emptyRoomIdFromTraining)->where('startdate',$getStartdate)->get());
   
    // datesnd >= date debut 


    // whereNotIn('id',App\ReservedRoom::select('camera_id')
    // ->where(function ($query) {
    //     $query->where([['checkin','<','mycheckin'],
    //         'checkout','<','mycheckin']])
    //         ->orWhere([['checkin','>','mycheckout'], 
    //         ['checkout','>','mycheckout']])
    //     }))->get();

    $ww =Rental::where('room_id',$emptyRoomIdFromTraining)->where('startdate','!=',$getStartdate)->get();
    //  il ya les !=  car il s exist dnas le tableaux des dates diferante   
    // dd($ww );

    // get the dates that the room will be full whole of the day
    // status of location
    // datepicker
    
        if($lll->count() > 0 ){
    // if start date >= $startDate && end date 
    // dd('hhh');
        return redirect()->back()->with('chooseanothertime','la date et heur deja prit ,choisir une autre heur ');
        
    }
    // elseif($ww->count() > 0){
    //     // dd('ww');
    //     User::create([
    //         'name'      =>$getName,
    //         'email'     =>$getEmail,
    //         'password'  =>$getPassword,
    //         'role_id'   =>'3',
    //         'phone'     =>$getPhone,
    //         'cin'       =>$getCin,
    //         'address'   =>$getAddress,  
    //         'status'    =>true,
    //     ]);

    //     $selectUserId= User::where('cin',$getCin)->get()->first();
    //     $getUserId =$selectUserId->id;


    //     ////// add it into storage ////

    //     $photoFile   = $req->file('photo');
    //     $scanCinFile = $req->file('scan_cin');

      
    //     $rentalFolder = Str::random(8);  
    //    // Generate a file name with extension
    //    $photoName   = $rentalFolder .'/feedback-'.time().'.'.$photoFile->getClientOriginalExtension();
    //    $scanCinName = $rentalFolder .'/feedback-'.time().'.'.$scanCinFile->getClientOriginalExtension();

          
    //     if($req->hasFile('photo')  && $req->hasFile('scan_cin') ){
               
    //         // Save the file                                folder , file
    //         $photoPath   = $photoFile->storeAs('public/images/feedbacks', $photoName);
    //         $scanCinPath = $scanCinFile->storeAs('public/images/feedbacks', $scanCinName);
    //     }
     
    //     /////////////////

    //     Rental::create([
    //         'photo'                          => $photoName,
    //         'scan_cin'                       => $scanCinName,
    //         'startdate'                      => $getStartdate, 
    //         'enddate'                        => $getEndDate ,
    //         'starttime'                      => $getStartTime ,
    //         'endtime'                        => $getEndTime ,
    //         'user_id'                        => $getUserId ,
    //         'room_id'                        => $emptyRoomIdFromTraining ,
    //         'status'                         => false ,
    //     ]);
    //     return redirect('/');
    // }
    else{
        // dd('kk');


        User::create([
            'name'      =>$getName,
            'email'     =>$getEmail,
            'password'  =>$getPassword,
            'role_id'   =>'3',
            'phone'     =>$getPhone,
            'cin'       =>$getCin,
            'address'   =>$getAddress,  
            'status'    =>true,
        ]);

        $selectUserId= User::where('cin',$getCin)->get()->first();
        $getUserId =$selectUserId->id;


        ////// add it into storage ////

        $photoFile   = $req->file('photo');
        $scanCinFile = $req->file('scan_cin');

      
        $rentalFolder = Str::random(8);  
       // Generate a file name with extension
       $photoName   = $rentalFolder .'/rental-'.time().'.'.$photoFile->getClientOriginalExtension();
       $scanCinName = $rentalFolder .'/rental-'.time().'.'.$scanCinFile->getClientOriginalExtension();

          
        if($req->hasFile('photo')  && $req->hasFile('scan_cin') ){
               
            // Save the file                                folder , file
            $photoPath   = $photoFile->storeAs('public/images/rentals', $photoName);
            $scanCinPath = $scanCinFile->storeAs('public/images/rentals', $scanCinName);
        }
     
        /////////////////

        Rental::create([
            'photo'                          => $photoName,
            'scan_cin'                       => $scanCinName,
            'startdate'                      => $getStartdate, 
            'enddate'                        => $getStartdate ,
            'starttime'                      => $getStartTime ,
            'endtime'                        => $getEndTime ,
            'user_id'                        => $getUserId ,
            'room_id'                        => $emptyRoomIdFromTraining ,
            'status'                         => false ,
        ]);
        return redirect('/')->with('rentalconfirmation','Nous allons vous contacter pour la confiration');
    }
    
    }




}

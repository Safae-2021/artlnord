<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie_permis;
use App\Models\Student;
use App\Models\User;
use App\Models\Requireddocument_student;
use App\Models\Training;
use App\Models\Training_requireddocument;
use App\Models\Required_document;
use App\Models\Group;
use App\Models\Registration;

use Str;

class StudentController extends Controller
{
    //
    public function studentRegister($training_id)
    {
        // dd(Str::uuid());
        $selectTrainingRequiredDocument = Training::where('id', $training_id)->get();
        $getTrainingRequiredDocument = [];
        foreach ($selectTrainingRequiredDocument as $trainingRequiredDocument) {
            $getTrainingRequiredDocument = $trainingRequiredDocument->requireddocuments;
            // echo($getTrainingRequiredDocument);
        }

        $selectCatPermis = Categorie_permis::all();
        return view('application.students.studentregister', compact('selectCatPermis', 'getTrainingRequiredDocument', 'training_id'));
    }
    public function studentStore(Request $req, $training_id)
    {
        // user table:
        $getName = $req->name;
        $getEmail = $req->email;
        $getAddress = $req->address;
        $getPhone = $req->phone;
        $getPassword = $req->password;
        $getCin = $req->cin;
        // student table
        $getArName = $req->arabic_name;
        $getNpermis = $req->n_permis;
        $getNCartProfessionnelle = $req->n_carte_professionnelle;
        $getCatPermis = $req->categorie_permis_id;
        $getDateObtention = $req->date_obtention;
        $getDateNaissance = $req->date_naissance;
        $getLieuNaissance = $req->lieu_naissance;
        // required document student table
        $getScanCin = $req->scan_cin;
        $getScanPermis = $req->scan_permis;
        $getScanVisiteMedicale = $req->scan_visite_medicale;
        $getScanCartProfessionnelle = $req->scan_carte_professionnelle;
        $getPhoto = $req->photo;

        // dd( $getScanCartProfessionnelle);

        // it s work with errors
        $this->validate(
            $req,
            [
                // not duplicate the name if already exist or unique its the same
                'name' => 'required',
                'arabic_name' => 'required',
                'email' => 'required|email',
                'cin' => 'required|unique:users,cin',
                'n_permis' => 'required|unique:students,n_permis',
                'categorie_permis_id' => 'required',
                'date_obtention' => 'required',
                'date_naissance' => 'required',
                'lieu_naissance' => 'required',
                'address' => 'required',
                'phone' => 'required|max:12',
                'password' => 'required',
            ],

            [
                'name.required' => 'ادخل الاسم  ',
                'arabic_name.required' => 'ادخل الاسم   ',
                'email.required' => ' ادخل  البريد  الإلكتروني',
                'password.required' => 'ادخل كلمةالمرور ',
                'cin.required' => 'CIN ادخل   ',
                'phone.required' => 'ادخل رقم الهاتف  ',
                'date_naissance.required' => 'ادخل تاريخ الميلاد  ',
                'lieu_naissance.required' => 'ادخل مكان الميلاد  ',
                'address.required' => 'ادخل عنوان   ',
                'n_permis.required' => 'ادخل رقم رخصة  السياقة',
                'date_obtention.required' => 'ادخل تاريخ الحصول على رخصة السياقة  ',
                'categorie_permis_id.required' => ' ادخل فئة رخصة قيادة  ',
            ],
        );
        // permis - photo - visitemedicale - cin

        // /try to access the name of the input from blade not from database

        // $selectTrainingRequiredDocument = Training::where('id',$training_id)->get();
        // $getTrainingRequiredDocument    = [];

        //  foreach($selectTrainingRequiredDocument as $trainingRequiredDocument)
        //  {
        //      $getTrainingRequiredDocument    = $trainingRequiredDocument->requireddocuments;
        //      // echo($getTrainingRequiredDocument);

        //       foreach ($getTrainingRequiredDocument as $getTrainingRequiredDocument)
        //       {
        //                $photoDocName       =  $getTrainingRequiredDocument->label;

        //                 // permis - photo - visitemedicale - cin
        //       }
        //  }

        // $photoFile = $documentsImg[1];
        // $cinFile = $documentsImg[4];
        // $permisFile =$documentsImg[0];
        // $visiteMedicaleFile =$documentsImg[3];
        // $carteProfessionnelleFile = $documentsImg[0];

        // $photoFile = $req->file('photo');
        // $cinFile = $req->file('scan_cin');
        // $permisFile = $req->file('scan_permis');
        // $visiteMedicaleFile = $req->file('scan_visite_medicale');
        // $carteProfessionnelleFile = $req->file('scan_carte_professionnelle');

        // $studentFolder = Str::random(8);
        // Generate a file name with extension

        // $photoName = $studentFolder .'/profile-'.time().'.'.$photoFile->getClientOriginalExtension();
        // $cinName = $studentFolder .'/cin-'.time().'.'.$cinFile->getClientOriginalExtension();
        // $permisName = $studentFolder .'/permis-'.time().'.'.$permisFile->getClientOriginalExtension();
        // $visiteMedicaleName = $studentFolder .'/visitemedicale-'.time().'.'.$visiteMedicaleFile->getClientOriginalExtension();
        // if($req->hasFile('scan_carte_professionnelle')){
        // $carteProfessionnelleName = $studentFolder .'/carteprofessionnelle-'.time().'.'.$carteProfessionnelleFile->getClientOriginalExtension();
        // }

        // if($req->hasFile('photo') && $req->hasFile('scan_cin')  && $req->hasFile('scan_permis')
        //  && $req->hasFile('scan_visite_medicale') ){

        //   // Save the file                                folder , file
        //   $photoPath = $photoFile->storeAs('public/images/students', $photoName);
        //   $cinPath = $cinFile->storeAs('public/images/students', $cinName);
        //   $permisPath = $permisFile->storeAs('public/images/students', $permisName);
        //   $visiteMedicalePath = $visiteMedicaleFile->storeAs('public/images/students', $visiteMedicaleName);
        // }elseif($req->hasFile('scan_carte_professionnelle')){
        //   $carteProfessionnellePath = $carteProfessionnelleFile->storeAs('public/images/students', $carteProfessionnelleName);
        // }

        // problem of photo how can i find it  = i make the photo nullable to add it with documents
        User::create([
            'name' => $getName,
            'email' => $getEmail,
            'password' => $getPassword,
            'role_id' => '2',
            'phone' => $getPhone,
            'cin' => $getCin,
            'address' => $getAddress,
            'Userstatus' => true,
        ]);

        $selectUserId = User::where('cin', $getCin)
            ->get()
            ->first();
        $getUserId = $selectUserId->id;

        // $getUserId=$selectUserId[1];
        // dd($getUserId);

        if ($req->has('n_carte_professionnelle')) {
            Student::create([
                'user_id' => $getUserId,
                'arabic_name' => $getArName,
                'n_professionnelle_carte' => $getNCartProfessionnelle,
                'n_permis' => $getNpermis,
                'categorie_permis_id' => $getCatPermis,
                'date_obtention' => $getDateObtention,
                'date_naissance' => $getDateNaissance,
                'lieu_naissance' => $getLieuNaissance,
                'status' => true,
            ]);
        } else {
            Student::create([
                'user_id' => $getUserId,
                'arabic_name' => $getArName,
                'n_professionnelle_carte' => null,
                'n_permis' => $getNpermis,
                'categorie_permis_id' => $getCatPermis,
                'date_obtention' => $getDateObtention,
                'date_naissance' => $getDateNaissance,
                'lieu_naissance' => $getLieuNaissance,
                'status' => true,
            ]);
        }

        $selectStudent = Student::where('user_id', $getUserId)
            ->get()
            ->first();
        $getStudentId = $selectStudent->id;

        ////// add it into storage ////

        $documentsImg = [];

        $documentsImg = $req->doc;

        // dd($documentsImg    ->originalName());
        // dd($req->photo);
        foreach ($documentsImg as $docIndex => $imageDoc) {
            $selectCurrentDoc = Required_document::find($docIndex);

            $photoFile = $imageDoc;
            $studentFolder = $getStudentId; // uuid
            $photoName = $studentFolder . '/' . $selectCurrentDoc->label . '-' . time() . '.' . $photoFile->getClientOriginalExtension();
            $photoPath = $photoFile->storeAs('public/images/students', $photoName);

            Requireddocument_student::create([
                'student_id' => $getStudentId,
                'training_id' => $training_id,
                'required_document_id' => $docIndex,
                'image_path' => $photoName,
            ]);

            //  dd($training_id);
        }

        // make inscription

        Registration::create([
            'group_id' => null,
            'training_id' => $training_id,
            'student_id' => $getStudentId,
        ]);

        // foreach ($selectTraining->requireddocuments as $requireddocument){
        //     dd('cgyjtcj') ;
        //     }
        // dd($getStudentId);

        // $selectTrainingRequiredDocument = Training_requireddocument::where('training_id',$training_id)->get();
        // required documments ids
        //   dd($selectTrainingRequiredDocument);

        // $selectTrainingRequiredDocument = Training::where('id',$training_id)->get();

        // $getTrainingRequiredDocument    = [];
        // foreach($selectTrainingRequiredDocument as $trainingRequiredDocument){
        //     $getTrainingRequiredDocument    = $trainingRequiredDocument->requireddocuments;

        //        for ($i = 0; $i < count($getTrainingRequiredDocument); $i++){
        //        dd($getTrainingRequiredDocument[$i]['label']) ;
        //        }

        // }

        // chaque label doit avoir un id

        // $selectStudent->requireddocuments()->attach($photoName);
        // $selectStudent->requireddocuments()->attach($training_id);

        // $selectStudent->requireddocuments()->attach($getRequiredDocumentId);

        // Requireddocument_student::create([
        //     'student_id'            => $getStudentId,
        //     'training_id'           =>  $training_id,
        //     'required_document_id'  =>  '1',
        //     'image_path'            =>  $photoName
        // ]);

        return redirect()->route('acceuil');
    }

    public function studentsProfile($user_id)
    {
        $selectUserStd  = Student::where('user_id',$user_id)->get();
        return view('application.students.studentprofile',compact('selectUserStd'));
    }
}

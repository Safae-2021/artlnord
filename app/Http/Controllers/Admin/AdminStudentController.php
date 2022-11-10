<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Registration, Categorie_permis, Requireddocument_student, Student, Group, Training, Part_training, Absences, Note, User, Required_document};
use Redirect;
use Schema;
use DateTime;
use Str;
use Illuminate\Support\Facades\Storage;

class AdminStudentController extends Controller
{
    //student list

    public function studentList($training_id)
    {
        $selectAllTrainings = Training::all();
        $startdate = $selectAllTrainings[0]->startdate;
        $enddate = $selectAllTrainings[0]->enddate;
        $vencimento = new DateTime($startdate);
        $vencimento2 = new DateTime($enddate);
        $interval = $vencimento->diff($vencimento2);
        // /////////////////////

        $selectStartDate = Training::where('id', $training_id)->get('startdate');
        $selectEndDate = Training::where('id', $training_id)->get('enddate');
        $ttstsrt = $selectStartDate[0]->startdate;
        $ttend = $selectEndDate[0]->enddate;
        $vv1 = new DateTime($ttstsrt);
        $vv2 = new DateTime($ttend);
        $interval2 = $vv1->diff($vv2);

        // dd($interval2);
        $selectStdIdsTraining = Registration::where('training_id', $training_id)->get('student_id');

        //   echo($selectStdIdsTraining);
        return view('Admin.pages.students.studentlist', compact('selectStdIdsTraining', 'training_id'));
    }

    public function studentListTwo($student_id, $training_id)
    {
        $selectStudents = Student::where('id', $student_id)->get();
        $selectTraining = Training::where('id', $training_id)->get();
        $selectAbsentDatesOfStudent = Absences::where('student_id', $student_id)
            ->where('training_id', $training_id)
            ->get('date_absences');
        // dd($selectAbsentDatesOfStudent);
        return view('Admin.pages.students.studentlisttwo', compact('selectStudents', 'training_id', 'selectTraining', 'student_id', 'selectAbsentDatesOfStudent'));
    }

    public function studentAffGroup($training_id, $student_id)
    {
        $selectGroupFromTraining = Group::where('training_id', $training_id)->get();
        return view('Admin.pages.students.studantaffgroup', compact('selectGroupFromTraining', 'training_id', 'student_id'));
    }

    public function storeStudentAffGroup(Request $req, $training_id, $student_id)
    {
        $getGroupId = $req->group_id;

        $this->validate($req, [
            'group_id' => 'required',
        ]);
        // dd($student_id);
        Registration::where('student_id', $student_id)->update([
            'group_id' => $getGroupId,
        ]);
        return redirect()->route('student.list', ['training_id' => $training_id]);
    }

    public function deleteStudent($training_id, $student_id)
    {
        Student::where('id', $student_id)->delete();
        return redirect()->route('student.list', $training_id);
    }

    public function trashedStudent($training_id)
    {
        $selectTrainingLabel = Training::where('id', $training_id)->get('label');
        // dd($selectTrainingLabel);
        $selectStdByTraining = Registration::where('training_id', $training_id)->get('student_id');
        // dd($selectStdByTraining );
        foreach ($selectStdByTraining as $StdByTraining) {
            $getIds = $StdByTraining->student_id;
            $selectTrashedStudent = Student::where('id', $getIds)
                ->onlyTrashed()
                ->paginate(5);
            // dd($selectTrashedStudent );
        }
        return view('Admin.pages.students.trashedstudent', compact('selectTrashedStudent', 'training_id', 'selectTrainingLabel'));
    }

    public function restoreTrashedStudent($training_id, $student_id)
    {
        Student::onlyTrashed()
            ->where('id', $student_id)
            ->restore();
        return redirect()->route('trashed.student', $training_id);
    }

    public function studentAbsences($group_id)
    {
        $selectStdByGroupId = Registration::where('group_id', $group_id)->get('student_id');

        return view('Admin.pages.students.studentabsences', compact('selectStdByGroupId', 'group_id'));
    }

    public function studentAbsencesAdd(Request $req, $training_id)
    {
        $getStdId = $req->student_id;

        foreach ($getStdId as $stdId) {
            // if there is a student absent in this day then update it
            // else create it
            Absences::updateOrCreate(['student_id' => $stdId, 'date_absences' => date('Y-m-d')], ['training_id' => $training_id]);
        }
        return Redirect::back()->with('absence-success', 'Enregistrer avec success');
    }

    public function downloadStudentRequiredDocument(Request $req, $requireddocumentstudent_id)
    {
        // dd($requireddocumentstudent_id);
        $docStdId = Requireddocument_student::find($requireddocumentstudent_id);
        // its work with one  image
        $path = 'public/images/students' . '/' . $docStdId->image_path;
        return Storage::download($path);
    }

    //     public function downloadMultiStudentRequiredDocument(Request $req,$training_id,$student_id)
    //     {
    //       $selectRqDocStd      =  Requireddocument_student::where('student_id',$student_id)->get('id');
    //         //  dd( $selectRqDocStd );
    //          $docStdIds        =  Requireddocument_student::find($selectRqDocStd);
    //         //  dd( $docStdIds );
    //         // $files = $docStdIds->uploads;
    //             foreach ($docStdIds  as  $docStdId  => $docStd){
    //               //  dd($docStd->image_path);

    //               // its work with one  image
    //                 $path = 'public/images/students'.'/'. $docStd->image_path;
    //                 return Storage::download($path);
    //             }

    // // --------^^^^^^-------------------------

    // // --------^^^^^^-------------------------

    //     }

    public function studentStoreNote(Request $req, $training_id, $student_id, $part_training_id)
    {
        $getNote = $req->note;

        $this->validate($req, [
            'note' => 'required',
        ]);

        Note::create([
            'note' => $getNote,
            'student_id' => $student_id,
            'training_id' => $training_id,
            'part_training_id' => $part_training_id,
        ]);
        return redirect()->route('student.list.two', [$student_id, $training_id]);
    }

    public function studentUpdateNote(Request $req, $training_id, $student_id, $part_training_id)
    {
        $getNote = $req->note;

        $this->validate($req, [
            'note' => 'required',
        ]);

        $studentNoteId = Note::where('student_id', $student_id)
            ->where('part_training_id', $part_training_id)
            ->where('training_id', $training_id)
            ->get('id');

        Note::where('id', $studentNoteId[0]->id)->update([
            'note' => $getNote,
            'student_id' => $student_id,
            'training_id' => $training_id,
            'part_training_id' => $part_training_id,
        ]);
        return redirect()->route('student.list.two', [$student_id, $training_id]);
    }

    public function studentDeleteNote($training_id, $student_id, $part_training_id)
    {
        $studentNoteId = Note::where('student_id', $student_id)
            ->where('part_training_id', $part_training_id)
            ->where('training_id', $training_id)
            ->get('id');
        Note::where('id', $studentNoteId[0]->id)->delete();
        return redirect()->route('student.list.two', [$student_id, $training_id]);
    }

    public function studentAbsencesUpdate(Request $req, $training_id, $student_id, $absent_date)
    {
        $getAbsenceDate = $req->absences;

        $this->validate($req, [
            'absences' => 'required',
        ]);
        Absences::where('student_id', $student_id)
            ->where('training_id', $training_id)
            ->where('date_absences', $absent_date)
            ->update([
                'date_absences' => $getAbsenceDate,
                'student_id' => $student_id,
                'training_id' => $training_id,
            ]);
        return redirect()->route('student.list.two', [$student_id, $training_id]);
    }

    public function studentAbsencesDelete($training_id, $student_id, $absent_date)
    {
        // dd($absent_date);
        Absences::where('student_id', $student_id)
            ->where('training_id', $training_id)
            ->where('date_absences', $absent_date)
            ->delete();
        return redirect()->route('student.list.two', [$student_id, $training_id]);
    }

    public function editStudent($training_id, $student_id)
    {
        $selectCatPermis = Categorie_permis::all();
        $selectGroups = Group::where('training_id', $training_id)->get();
        $selectStudent = Student::where('id', $student_id)->get();

        $selectTrainingRequiredDocument = Training::where('id', $training_id)->get();
        $getTrainingRequiredDocument = [];
        foreach ($selectTrainingRequiredDocument as $trainingRequiredDocument) {
            $getTrainingRequiredDocument = $trainingRequiredDocument->requireddocuments;
            // echo($getTrainingRequiredDocument);
        }
        return view('Admin.pages.students.editstudent', compact('training_id', 'student_id', 'selectCatPermis', 'getTrainingRequiredDocument', 'selectGroups', 'selectStudent'));
    }

    public function updateStudent(Request $req, $training_id, $student_id)
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
        $getCatPermisId = $req->categorie_permis_id;
        $getDateObtention = $req->date_obtention;
        $getDateNaissance = $req->date_naissance;
        $getLieuNaissance = $req->lieu_naissance;
        $getGroupId = $req->group_id;

        $selectStudent = Student::where('id', $student_id)->get();
        $selectStudentId = $selectStudent[0]->id;
        $selectPs = $selectStudent[0]->user->password;
        $selectCatPermisId = $selectStudent[0]->categorie_permis_id;

        if (isset($getPassword)) {
            // dd($selectPs );

            User::where('cin', $getCin)->update([
                'name' => $getName,
                'email' => $getEmail,
                'password' => $getPassword,
                'role_id' => '2',
                'phone' => $getPhone,
                'cin' => $getCin,
                'address' => $getAddress,
                'status' => true,
            ]);
        } else {
            User::where('cin', $getCin)->update([
                'name' => $getName,
                'email' => $getEmail,
                'password' => $selectPs,
                'role_id' => '2',
                'phone' => $getPhone,
                'cin' => $getCin,
                'address' => $getAddress,
                'status' => true,
            ]);
        }
        $selectUserId = User::where('cin', $getCin)
            ->get()
            ->first();
        $getUserId = $selectUserId->id;
        // dd($getUserId);

        if ($req->has('n_carte_professionnelle')) {
            if (isset($getCatPermisId)) {
                Student::where('user_id', $getUserId)->update([
                    'user_id' => $getUserId,
                    'arabic_name' => $getArName,
                    'n_professionnelle_carte' => $getNCartProfessionnelle,
                    'n_permis' => $getNpermis,
                    'categorie_permis_id' => $getCatPermisId,
                    'date_obtention' => $getDateObtention,
                    'date_naissance' => $getDateNaissance,
                    'lieu_naissance' => $getLieuNaissance,
                    'status' => true,
                ]);
            } else {
                Student::where('user_id', $getUserId)->update([
                    'user_id' => $getUserId,
                    'arabic_name' => $getArName,
                    'n_professionnelle_carte' => $getNCartProfessionnelle,
                    'n_permis' => $getNpermis,
                    'categorie_permis_id' => $selectCatPermisId,
                    'date_obtention' => $getDateObtention,
                    'date_naissance' => $getDateNaissance,
                    'lieu_naissance' => $getLieuNaissance,
                    'status' => true,
                ]);
            }
        } else {
            if (isset($getCatPermisId)) {
                Student::where('user_id', $getUserId)->update([
                    'user_id' => $getUserId,
                    'arabic_name' => $getArName,
                    'n_professionnelle_carte' => null,
                    'n_permis' => $getNpermis,
                    'categorie_permis_id' => $getCatPermisId,
                    'date_obtention' => $getDateObtention,
                    'date_naissance' => $getDateNaissance,
                    'lieu_naissance' => $getLieuNaissance,
                    'status' => true,
                ]);
            } else {
                Student::where('user_id', $getUserId)->update([
                    'user_id' => $getUserId,
                    'arabic_name' => $getArName,
                    'n_professionnelle_carte' => null,
                    'n_permis' => $getNpermis,
                    'categorie_permis_id' => $selectCatPermisId,
                    'date_obtention' => $getDateObtention,
                    'date_naissance' => $getDateNaissance,
                    'lieu_naissance' => $getLieuNaissance,
                    'status' => true,
                ]);
            }
        }

        $selectRegistrationStudent = Registration::where('student_id', $selectStudentId)->get();
        $selectStdByGroupId = $selectRegistrationStudent[0]->group_id;
        $selectDateRegistration = $selectRegistrationStudent[0]->date_registration;

        // dd($selectDateRegistration);
        if (isset($getGroupId)) {
            Registration::where('student_id', $selectStudentId)->update([
                'group_id' => $getGroupId,
                'student_id' => $student_id,
                'training_id' => $training_id,
                'date_registration' => $selectDateRegistration,
            ]);
        } else {
            Registration::where('student_id', $selectStudentId)->update([
                'group_id' => $selectStdByGroupId,
                'student_id' => $student_id,
                'training_id' => $training_id,
                'date_registration' => $selectDateRegistration,
            ]);
        }

        // update of docment update with the path
        $selectStudentsRequiredDocs = Requireddocument_student::where('student_id', $student_id)->get();
        $getStudentPhoto = $selectStudentsRequiredDocs[0]->image_path;

        $path = 'public/images/students';
        // dd(isset($req->doc)? "yes" : "no" );

        ////// update it from storage  and db ////
        $path = 'public/images/students';
        if (isset($req->doc)) {
            foreach ($req->doc as $idDocrequired => $imageDocInfo) {
                // array_push($arrayDocumentReq, $idDocrequired);
                $selectRequiredDoc = Required_document::where('id', $idDocrequired)->get();
                $selectRequiredDocLabel = $selectRequiredDoc[0]->label;
                $selectRequiredDocStd = Requireddocument_student::where('required_document_id', $idDocrequired)
                    ->where('student_id', $student_id)
                    ->where('training_id', $training_id)
                    ->get();
                $selectRequiredDocStdImg = $selectRequiredDocStd[0]->image_path;

                $nameImg = explode('/', $selectRequiredDocStdImg);
                $studentFolder = $nameImg[0];
                $fileName = $nameImg[1];
                $docImgName = $studentFolder . '/' . $selectRequiredDocLabel . '-' . time() . '.' . $imageDocInfo->getClientOriginalExtension();

                // dd($docImgName);
                Requireddocument_student::where('required_document_id', $idDocrequired)
                    ->where('student_id', $student_id)
                    ->where('training_id', $training_id)
                    ->update([
                        'student_id' => $student_id,
                        'training_id' => $training_id,
                        'required_document_id' => $idDocrequired,
                        'image_path' => $docImgName,
                    ]);
                // get the path from
                Storage::delete($path . '/' . $selectRequiredDocStdImg);
                $docImgPath = $imageDocInfo->storeAs('public/images/students', $docImgName);
                // dd( $docImgPath   );
                // Str::contains($myString, 'itsolutionstuff.com');
            }
        }
        return redirect()->route('student.list', ['training_id' => $training_id]);
    }
}

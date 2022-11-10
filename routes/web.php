<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TraineeController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\PartController;
use App\Http\Controllers\Admin\RequestedDocumentController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\RequiredDocumentController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminRentalController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminFeedBackController;
use App\Http\Controllers\Admin\TodoListController;




use App\Http\Controllers\Application\ApplicationController;
use App\Http\Controllers\Application\StudentController;
use App\Http\Controllers\Application\LocationController;
use App\Http\Controllers\Application\RentalController;
use App\Http\Controllers\Application\FeedbackController;



use App\Http\Controllers\Application\Controller;
use App\Http\Controllers\HomeController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/iso/2', function () {
    return view('application.conseil.iso2');
});



//login
// Route::get('/login',[Controller::class,'loginIndex'])->name('login.index');




// {       Application
    Auth::routes();

    Route::get('/interface/visitor', [App\Http\Controllers\HomeController::class, 'visitorIndex'])->name('visitor.interfacevisitor');
    
    
    // Route::fallback(function () { 
    //     return redirect()->route('acceuil');
    // });
Route::get('/delete/session/user',[ApplicationController::class,'deleteSessionUser'] )->name('delete.session.user');

// visitor
Route::get('/',[ApplicationController::class,'showAcceuil'] )->name('acceuil');
Route::get('/artln',[ApplicationController::class,'showArtln'] )->name('artln');
Route::get('/formation/{training_id}',[ApplicationController::class,'showFormation'] )->name('formation');
Route::get('/location',[ApplicationController::class,'showLocation'] )->name('location');
Route::get('/actualites',[ApplicationController::class,'showActualites'] )->name('actualites');
Route::get('/article/{blog_id}',[ApplicationController::class,'showArticle'] )-> name("article");
Route::get('/contact',[ApplicationController::class,'showContact'] )->name('contact');
Route::post('/contact/store',[ApplicationController::class,'contactStore'] )->name('contact.store');
Route::get('/iso',[ApplicationController::class,'showIso'] )->name('iso');
Route::get('/douane',[ApplicationController::class,'showDouane'] )->name('douane');
Route::get('/article2/{blog_id}',[ApplicationController::class,'showArticle2'] )-> name("article2");

// students 
Route::get('/students/register/{training_id}',[StudentController::class,'studentRegister'] )-> name("students.register");
Route::post('/students/store/{training_id}',[StudentController::class,'studentStore'] )-> name("students.store");
Route::get('/students/profile/{user_id}',[StudentController::class,'studentsProfile'] )-> name("students.profile");

// rentals 
Route::get('/rentals/register',[RentalController::class,'rentalRegister'] )-> name("rentals.register");
Route::post('/rentals/store/{emptyRoomIdFromTraining}',[RentalController::class,'rentalStore'] )-> name("rentals.store");
// Route::get('/rentals/profile/{rentals_id}',[RentalController::class,'rentalsProfile'] )-> name("rentals.profile");


//  location
// Route::get('/location/list',[LocationController::class,'locationList'] )-> name("location.list");
// Route::get('/location/list/ar',[LocationController::class,'locationListAr'] )-> name("location.list.ar");
// Route::get('/add/location',[LocationController::class,'addLocation'] )-> name("add.location");
// Route::post('/store/location',[LocationController::class,'storelocation'] )-> name("store.location");
// Route::get('/edit/location/{location_id}',[LocationController::class,'editlocation'] )-> name("edit.location");
// Route::post('/update/location/{location_id}',[LocationController::class,'updatelocation'] )-> name("update.location");
// Route::get('/delete/location/{location_id}',[LocationController::class,'deletelocation'] )-> name("delete.location");

//  feedback
// Route::get('/feedback/list',[FeedbackController::class,'feedbackList'] )-> name("feedback.list");
// Route::get('/feedback/list/ar',[FeedbackController::class,'feedbackListAr'] )-> name("feedback.list.ar");
Route::get('/add/feedback',[FeedbackController::class,'addFeedback'] )-> name("add.feedback");
Route::post('/store/feedback',[FeedbackController::class,'storeFeedback'] )-> name("store.feedback");
Route::get('/edit/feedback/{feedback_id}',[FeedbackController::class,'editFeedback'] )-> name("edit.feedback");
Route::post('/update/feedback/{feedback_id}',[FeedbackController::class,'updateFeedback'] )-> name("update.feedback");
Route::get('/delete/feedback/{feedback_id}',[FeedbackController::class,'deleteFeedback'] )-> name("delete.feedback");


// }
// Route::group(['middleware'=>['admin']],function(){


// {    Admin
// admin
// Route::get('/dashboard',[AdminController::class,'index'] )-> name("dashboard");
Route::get('/dashboard',[AdminController::class,'adminDashboard'] )-> name("admin.dashboard");
//todolist 
Route::post('/todolist/store',[AdminController::class,'storeTodoList'] )-> name("store.todolist");
Route::get('/delete/todolist/{todolist_id}',[AdminController::class,'deleteTodolist'] )-> name("delete.todolist");
// admin registration
Route::get('/admin/registration',[AdminController::class,'adminRegistration'] )-> name("admin.registration");
// admin update profile
Route::get('/admin/edite/profile',[AdminController::class,'adminEditeProfile'] )-> name("admin.edite.profile");
Route::post('/admin/update/profile/{user_id}',[AdminController::class,'adminUpdateProfile'] )-> name("admin.update.profile");

// delete session
Route::get('/delete/session/admin',[AdminController::class,'deleteSessionAdmin'] )-> name("delete.session.admin");


// teachers
Route::get('/teachers/list',[TeacherController::class,'indexTeacher'] )-> name("teachers.list");
Route::get('/add/teachers',[TeacherController::class,'addTeacher'] )-> name("add.teachers");
Route::post('/store/teachers',[TeacherController::class,'storeTeacher'] )-> name("store.teachers");
Route::get('/edite/teachers/{teacher_id}',[TeacherController::class,'editeTeacher'] )-> name("edite.teachers");
Route::post('/update/teachers/{teacher_id}',[TeacherController::class,'updateTeacher'] )-> name("update.teachers");
Route::get('/delete/teachers/{teacher_id}',[TeacherController::class,'deleteTeacher'] )-> name("delete.teachers");
Route::get('/teachers/profile/{teacher_id}',[TeacherController::class,'teachersProfile'] )-> name("teachers.profile");
// Route::get('/download/teachers/pdf',[TeacherController::class,'downloadTeachersPdf'] )-> name("download.teachers.pdf");

//  rooms
Route::get('/rooms/list',[RoomController::class,'roomsList'] )-> name("rooms.list");
Route::get('/rooms/list/ar',[RoomController::class,'roomsListAr'] )-> name("rooms.list.ar");
Route::get('/add/room',[RoomController::class,'addRoom'] )-> name("add.room");
Route::post('/store/room',[RoomController::class,'storeRoom'] )-> name("store.room");
Route::get('/edit/room/{room_id}',[RoomController::class,'editRoom'] )-> name("edit.room");
Route::post('/update/room/{room_id}',[RoomController::class,'updateRoom'] )-> name("update.room");
Route::get('/delete/room/{room_id}',[RoomController::class,'deleteRoom'] )-> name("delete.room");
Route::get('/room/list/ar/{room_id}',[RoomController::class,'roomsListAr'] )-> name("room.list.ar");


//  part
Route::get('/part/list',[PartController::class,'partList'] )-> name("part.list");
Route::get('/add/part/',[PartController::class,'addPart'] )-> name("add.part");
Route::post('/store/part/',[PartController::class,'storePart'] )-> name("store.part");
Route::get('/edit//part{part_id}',[PartController::class,'editPart'] )-> name("edit.part");
Route::post('/update/part/{part_id}',[PartController::class,'updatePart'] )-> name("update.part");
Route::get('/delete/part/{part_id}',[PartController::class,'deletePart'] )-> name("delete.part");


// requested documents
Route::get('/requested/document/list',[RequestedDocumentController::class,'requestedDocumentList'] )-> name("requested.document.list");
Route::get('/add/requested/document/',[RequestedDocumentController::class,'addRequestedDocument'] )-> name("add.requested.document");
Route::post('/store/requested/document/',[RequestedDocumentController::class,'storeRequestedDocument'] )-> name("store.requested.document");
Route::get('/edit/requested/document/{requested_document_id}',[RequestedDocumentController::class,'editRequestedDocument'] )-> name("edit.requested.document");
Route::post('/update/requested/document/{requested_document_id}',[RequestedDocumentController::class,'updateRequestedDocument'] )-> name("update.requested.document");
Route::get('/delete/requested/document/{requested_document_id}',[RequestedDocumentController::class,'deleteRequestedDocument'] )-> name("delete.requested.document");


// required documents
Route::get('/required/document/list',[RequiredDocumentController::class,'requiredDocumentList'] )-> name("required.document.list");
Route::get('/add/required/document/',[RequiredDocumentController::class,'addRequiredDocument'] )-> name("add.required.document");
Route::post('/store/required/document/',[RequiredDocumentController::class,'storeRequiredDocument'] )-> name("store.required.document");
Route::get('/edit/required/document/{required_document_id}',[RequiredDocumentController::class,'editRequiredDocument'] )-> name("edit.required.document");
Route::post('/update/required/document/{required_document_id}',[RequiredDocumentController::class,'updateRequiredDocument'] )-> name("update.required.document");
Route::get('/delete/required/document/{required_document_id}',[RequiredDocumentController::class,'deleteRequiredDocument'] )-> name("delete.required.document");


// group
Route::get('/group/list',[GroupController::class,'groupList'] )-> name("group.list");
Route::get('/add/group/',[GroupController::class,'addGroup'] )-> name("add.group");
Route::post('/store/group',[GroupController::class,'storeGroup'] )-> name("store.group");
Route::get('/edit/group/{group_id}',[GroupController::class,'editGroup'] )-> name("edit.group");
Route::post('/update/group/{group_id}',[GroupController::class,'updateGroup'] )-> name("update.group");
Route::get('/delete/group/{group_id}',[GroupController::class,'deleteGroup'] )-> name("delete.group");

// blog
Route::get('/blog/list',[BlogController::class,'blogList'] )-> name("blog.list");
Route::get('/add/blog/',[BlogController::class,'addBlog'] )-> name("add.blog");
Route::post('/store/blog/',[BlogController::class,'storeBlog'] )-> name("store.blog");
Route::get('/edit/blog/{blog_id}',[BlogController::class,'editBlog'] )-> name("edit.blog");
Route::post('/update/blog/{blog_id}',[BlogController::class,'updateBlog'] )-> name("update.blog");
Route::get('/delete/blog/{blog_id}',[BlogController::class,'deleteBlog'] )-> name("delete.blog");

// training 
Route::get('/training/list',[TrainingController::class,'trainingList'] )-> name("training.list");
Route::get('/add/training/',[TrainingController::class,'addTraining'] )-> name("add.training");
Route::post('/store/training',[TrainingController::class,'storeTraining'] )-> name("store.training");
Route::get('/edit/training/{training_id}',[TrainingController::class,'editTraining'] )-> name("edit.training");
Route::post('/update/training/{training_id}',[TrainingController::class,'updateTraining'] )-> name("update.training");
Route::get('/delete/training/{training_id}',[TrainingController::class,'deleteTraining'] )-> name("delete.training");
Route::get('/training/list/two/{training_id}',[TrainingController::class,'trainingListTwo'] )-> name("training.list.two");
Route::get('/trashed/training',[TrainingController::class,'trashedTraining'] )-> name("trashed.training");
Route::get('/restore/trashed/training/{training_id}',[TrainingController::class,'restoreTrashedTraining'] )-> name("restore.trashedTraining");


// Admin students 
Route::get('/student/list/{training_id}',[AdminStudentController::class,'studentList'] )-> name("student.list");
Route::get('/student/list/two/{student_id}/{training_id}',[AdminStudentController::class,'studentListTwo'] )-> name("student.list.two");
Route::get('/student/delete/{training_id}/{student_id}',[AdminStudentController::class,'deleteStudent'] )-> name("delete.student");
Route::get('/student/edit/{training_id}/{student_id}',[AdminStudentController::class,'editStudent'] )-> name("edit.student");
Route::post('/student/update/{training_id}/{student_id}',[AdminStudentController::class,'updateStudent'] )-> name("update.student");
Route::get('/download/student/required/document/{requireddocumentstudent_id}',[AdminStudentController::class,'downloadStudentRequiredDocument'] )-> name("download.student.requireddocument");
Route::get('/download/multi/student/required/document/{training_id}/{student_id}',[AdminStudentController::class,'downloadMultiStudentRequiredDocument'] )-> name("download.multi.student.requireddocument");
Route::get('/student/aff/group/{training_id}/{student_id}',[AdminStudentController::class,'studentAffGroup'] )-> name("affectation.group");
Route::post('/store/student/aff/group/{training_id}/{student_id}',[AdminStudentController::class,'storeStudentAffGroup'] )-> name("store.student.affgroup");
Route::get('/trashed/student/{training_id}',[AdminStudentController::class,'trashedStudent'] )-> name("trashed.student");
Route::get('/restore/trashed/student/{training_id}/{student_id}',[AdminStudentController::class,'restoreTrashedStudent'] )-> name("restore.trashedStudent");
Route::get('/student/absences/{group_id}',[AdminStudentController::class,'studentAbsences'] )-> name("student.absences");
Route::post('/student/absences/add/{training_id}',[AdminStudentController::class,'studentAbsencesAdd'] )-> name("student.absences.add");
Route::post('/student/absences/update/{training_id}/{student_id}/{absent_date}',[AdminStudentController::class,'studentAbsencesUpdate'] )-> name("student.absences.update");
Route::get('/student/absences/delete/{training_id}/{student_id}/{absent_date}',[AdminStudentController::class,'studentAbsencesDelete'] )-> name("student.absences.delete");
Route::post('/student/store/note/{training_id}/{student_id}/{part_training_id}',[AdminStudentController::class,'studentStoreNote'] )-> name("student.store.note");
Route::post('/student/update/note/{training_id}/{student_id}/{part_training_id}',[AdminStudentController::class,'studentUpdateNote'] )-> name("student.update.note");
Route::get('/student/delete/note/{training_id}/{student_id}/{part_training_id}',[AdminStudentController::class,'studentDeleteNote'] )-> name("student.delete.note");


// rentall
Route::get('/rental/list/',[AdminRentalController::class,'rentalList'] )-> name("rental.list");
Route::get('/rental/delete/{rental_id}',[AdminRentalController::class,'deleteRental'] )-> name("delete.rental");
Route::get('/rental/accept/{rental_id}',[AdminRentalController::class,'acceptRental'] )-> name("accept.rental");
// Route::get('/rental/refuse/{rental_id}',[AdminRentalController::class,'refuseRental'] )-> name("refuse.rental");
Route::get('/rental/listtwo/{rental_id}',[AdminRentalController::class,'rentalListTwo'] )-> name("rental.listtwo");

// contact

Route::get('/contact/list/',[AdminContactController::class,'contactList'] )-> name("contact.list");
Route::get('/contact/delete/{contact_id}',[AdminContactController::class,'deleteContact'] )-> name("delete.contact");


// feedback
Route::get('/feedback/list/',[AdminFeedBackController::class,'feedbackList'] )-> name("feedback.list");
Route::get('/feedback/delete/{feedback_id}',[AdminFeedBackController::class,'deleteFeedback'] )-> name("delete.feedback");
Route::post('/feedback/update/{feedback_id}',[AdminFeedBackController::class,'updateFeedback'] )-> name("update.feedback");




    Auth::routes();
        // middleware name in the kernel 
    Route::get('/interface/admin', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.interfaceadmin') ;
    
    // Route::fallback(function () { 
    //     return redirect()->route('admin.dashboard');
    // });
    // });
  

// }






// Route::get('/nav', function () {
//     return view('navex');
// });

// Route::get('/timer', function () {
//     return view('timer');
// });


// Route::get('/mega', function () {
//     return view('megamenu');
// });

// Route::get('/comment', function () {
//     return view('comment');
// });

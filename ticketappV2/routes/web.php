<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', 'App\Http\Controllers\FormController@index');

Route::get('/', 'PageController@index');


Route::get('/createTicket', 'TicketController@store');



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'preventBackHistory'])->group(function(){
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','preventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('alltickets',[AdminController::class,'alltickets'])->name('admin.alltickets');
    Route::get('allaccounts',[AdminController::class,'allaccount'])->name('admin.allaccounts');
    Route::get('anonymous',[AdminController::class,'anonymous'])->name('admin.anonymous');
    Route::get('complaint',[AdminController::class,'complaint'])->name('admin.complaint');
    Route::get('non-anonymous',[AdminController::class,'nonanonymous'])->name('admin.non-anonymous');
    Route::get('feedback',[AdminController::class,'feedback'])->name('admin.feedback');
    Route::get('investigating',[AdminController::class,'investigating'])->name('admin.investigating');
    Route::get('resolved',[AdminController::class,'resolved'])->name('admin.resolved');
    Route::get('appeal',[AdminController::class,'appeal'])->name('admin.appeal');
    Route::get('remark',[AdminController::class,'remark'])->name('admin.remark');
    Route::get('registerform',[AdminController::class,'showRegistrationForm'])->name('admin.registerform');
    Route::get('review',[AdminController::class,'review'])->name('admin.review');
    Route::get('email',[AdminController::class,'emailpage'])->name('admin.resetemail');
    Route::post('triage/{id}',[AdminController::class,'triage'])->name('admin.triage');
    Route::post('resolve/{id}',[AdminController::class,'resolveticket'])->name('admin.resolveticket');
    Route::post('register',[AdminController::class,'Register'])->name('admin.register');
    Route::post('report',[AdminController::class,'report'])->name('admin.report');
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','preventBackHistory']], function(){
    Route::get('allopen',[UserController::class,'allopen'])->name('user.allopen');
    Route::get('anonymous',[UserController::class,'anonymous'])->name('user.anonymous');
    Route::get('nanonymous',[UserController::class,'nanonymous'])->name('user.nanonymous');
    Route::get('complaint',[UserController::class,'complaint'])->name('user.complaint');
    Route::get('feedback',[UserController::class,'feedback'])->name('user.feedback');
    Route::get('appeal',[UserController::class,'appeal'])->name('user.appeal');
    Route::get('remark',[UserController::class,'remark'])->name('user.remark');
    Route::get('resolved',[UserController::class,'resolved'])->name('user.resolved');
    Route::get('investigating',[UserController::class,'investigating'])->name('user.investigating');
});

/*-----------------------------Ticket Form---------------------------------------------*/
Route::get('/ticket/create/complaint', 'TicketController@createComplaint');
Route::get('/ticket/create/complaint/anonymous', 'TicketController@createAnonymousComplaint');
Route::get('/ticket/create/remark', 'TicketController@createRemark');
Route::get('/ticket/create/appeal', 'TicketController@createAppeal');
Route::get('/ticket/create/feedback', 'TicketController@createFeedback');
Route::get('/ticket/create/feedback/anonymous', 'TicketController@createAnonymousFeedback');

/*-----------------------------Submit Ticket---------------------------------------------*/
Route::post('new-ticket', 'TicketController@store');


/*-----------------------------Show Ticket---------------------------------------------*/
Route::get('/ticket/{id}', 'TicketController@show');

/*-----------------------------Show Ticket---------------------------------------------*/
Route::post('/search-ticket', 'TicketController@search');

/*-----------------------------Add Comment---------------------------------------------*/
Route::post('add-comment', 'CommentController@store');

/*-----------------------------CKEditor---------------------------------------------*/
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

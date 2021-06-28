<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','preventBackHistory']], function(){
    Route::get('allopen',[UserController::class,'allopen'])->name('user.allopen');
    Route::get('anonymous',[UserController::class,'anonymous'])->name('user.anonymous');
    Route::get('nanonymous',[UserController::class,'nanonymous'])->name('user.nanonymous');
});

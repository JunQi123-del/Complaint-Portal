<?php

use Illuminate\Support\Facades\Route;

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

/*-----------------------------Welcome page---------------------------------------------*/
Route::get('/', 'PageController@index');


/*-----------------------------Ticket Form---------------------------------------------*/
Route::get('/ticket/create/complaint', 'TicketController@createComplaint');
Route::get('/ticket/create/remark', 'TicketController@createRemark');
Route::get('/ticket/create/appeal', 'TicketController@createAppeal');
Route::get('/ticket/create/feedback', 'TicketController@createFeedback');

/*-----------------------------Show Ticket---------------------------------------------*/
Route::get('/ticket/{id}', 'TicketController@show');

/*-----------------------------CKEditor---------------------------------------------*/
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Route::post('/', 'TicketController@store');







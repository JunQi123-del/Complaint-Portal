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

//Route::get('/', 'App\Http\Controllers\FormController@index');

Route::get('/', 'PageController@index');


Route::get('/createTicket', 'TicketController@store');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');





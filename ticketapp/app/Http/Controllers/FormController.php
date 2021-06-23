<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller //only handling form 
{
    public function index(){

        return view('welcome');
    }
    //
}

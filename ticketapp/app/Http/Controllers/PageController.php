<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller //only handling pages such as welcome page 
{
    public function index(){

        return view('welcome');
    }
    //
}

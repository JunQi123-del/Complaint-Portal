<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function allopen (){
        return view('dashboards.users.allopen');
    }

    function anonymous(){
        return view('dashboards.users.anonymous');
    }

    function nanonymous(){
        return view('dashboards.users.nanonymous');
    }
}

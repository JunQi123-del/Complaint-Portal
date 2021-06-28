<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard (){
        return view('dashboards.admins.dashboard');
    }

    function alltickets(){
        return view('dashboards.admins.alltickets');
    }

    function departmentview(){
        return view('dashboards.admins.departmentview');
    }
}

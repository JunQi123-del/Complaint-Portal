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

    function allaccount(){
        return view('dashboards.admins.allaccounts');
    }
    function feedback (){
        return view('dashboards.admins.feedback');
    }

    function investigating(){
        return view('dashboards.admins.investigating');
    }

    function nonanonymous(){
        return view('dashboards.admins.non-anonymous');
    }
    function anonymous (){
        return view('dashboards.admins.anonymous');
    }

    function resolved(){
        return view('dashboards.admins.resolved');
    }

    function complaint(){
        return view('dashboards.admins.complaint');
    }

    function appeal(){
        return view('dashboards.admins.appeal');
    }

    function remark(){
        return view('dashboards.admins.remark');
    }
}

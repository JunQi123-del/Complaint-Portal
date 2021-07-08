<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function allopen (){
        
        $dept = user::find(Auth::user()->id)->tickets;
        return view('dashboards.users.allopen',compact('dept'));
    }

    function anonymous(){
        return view('dashboards.users.anonymous');
    }

    function nanonymous(){
        return view('dashboards.users.nanonymous');
    }
}

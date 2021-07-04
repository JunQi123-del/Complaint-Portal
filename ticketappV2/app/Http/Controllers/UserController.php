<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function allopen (){
        $allTickets = Ticket::all();
        return view('dashboards.users.allopen',compact('allTickets'));
    }

    function anonymous(){
        return view('dashboards.users.anonymous');
    }

    function nanonymous(){
        return view('dashboards.users.nanonymous');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function allopen (){
        //$id = Auth::user()->id;
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.allopen',compact('dept'));
    }

    function anonymous(){
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.anonymous',compact('dept'));
    }

    function nanonymous(){
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.nanonymous',compact('dept'));
    }

    function complaint (){
        //$id = Auth::user()->id;
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.complaint',compact('dept'));
    }

    function feedback(){
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.feedback',compact('dept'));
    }

    function appeal(){
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.appeal',compact('dept'));
    }

    function remark (){
        //$id = Auth::user()->id;
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.remark',compact('dept'));
    }

    function resolved(){
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.resolved',compact('dept'));
    }

    function investigating(){
        $dept = User::find(Auth::user()->id)->tickets;
        return view('dashboards.users.investigating',compact('dept'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id); 

        return view('ticket.show_user')
                ->with('ticket', $ticket);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\user;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    function dashboard (){
        return view('dashboards.admins.dashboard');
    }

    protected function showRegistrationForm(){
        return view('dashboards.admins.register');
    }

    protected function Register(request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->role = 2;
        $user->password =\Hash::make($request->password);
        if($user->save() ){
            return redirect()->back()->with('success','User has been registered successfully');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }

    }

    function show($id)
    {
        return view('dashboards.admins.viewticket',['id'=>$id]);
    }


    function alltickets(){
        $allTickets = Ticket::all();
        return view('dashboards.admins.alltickets',compact('allTickets'));
    }

    function allaccount(){
        $allAccounts = user::all();
        return view('dashboards.admins.allaccounts',compact('allAccounts'));
    }


    function feedback (){
        $feedback = Ticket::where('category','Feedback')->get();
        return view('dashboards.admins.feedback',compact('feedback'));
    }

    function investigating(){
        $investigating = Ticket::where('status','Investigating')->get();
        return view('dashboards.admins.investigating',compact('investigating'));
    }

    function nonanonymous(){
        $Nanonymous = Ticket::where('is_anonymous','0')->get();
        return view('dashboards.admins.non-anonymous',compact('Nanonymous'));
    }
    function anonymous (){
        $anonymous = Ticket::where('is_anonymous','1')->get();
        return view('dashboards.admins.anonymous',compact('anonymous'));
    }

    function resolved(){
        $resolved = Ticket::where('status','Resolved')->get();
        return view('dashboards.admins.resolved',compact('resolved'));
    }

    function complaint(){
        $complaint = Ticket::where('category','Complaint')->get();
        return view('dashboards.admins.complaint',compact('complaint'));
    }

    function appeal(){
        
        $appeal = Ticket::where('category','Appeal')->get();
        return view('dashboards.admins.appeal',compact('appeal'));
    }

    function remark(){
        $remark = Ticket::where('category','Remark')->get();
        return view('dashboards.admins.remark',compact('remark'));
    }

    function review(){
        $review = Ticket::where('category','To Be Reviewed')->get();
        return view('dashboards.admins.review',compact('review'));
    }
}

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

    

    function triage($id,Request $request)
    {
        $ticketdata = Ticket::find($id);
        $ticketdata->user_id = $request->department;
        $ticketdata->status = 'Investigating';
        $ticketdata->updated_at = now();
        if($ticketdata->save())
        {
            return redirect()->back()->with('Success','Ticket triaged successfully');
        }
        else
        {
            return redirect()->back()->with('Error','Ticket not triaged successfully');
        }
    }

    function resolveticket($id,Request $request)
    {
        $ticketdata = Ticket::find($id);
        $ticketdata->status = 'Resolved';
        if($ticketdata->save())
        {
            return redirect()->back()->with('Success','Ticket resolved successfully');
        }
        else
        {
            return redirect()->back()->with('Error','Ticket not resolved successfully');
        }
    }


    function alltickets(){
        $allTickets = Ticket::all();
        $allAccounts = user::all();
        return view('dashboards.admins.alltickets',compact('allTickets','allAccounts'));
    }

    function allaccount(){
        $allAccounts = user::all();
        return view('dashboards.admins.allaccounts',compact('allAccounts'));
    }


    function feedback (){
        $feedback = Ticket::where('category','Feedback')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.feedback',compact('feedback','allAccounts'));
    }

    function investigating(){
        $investigating = Ticket::where('status','Investigating')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.investigating',compact('investigating','allAccounts'));
    }

    function nonanonymous(){
        $Nanonymous = Ticket::where('is_anonymous','0')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.non-anonymous',compact('Nanonymous','allAccounts'));
    }
    function anonymous (){
        $anonymous = Ticket::where('is_anonymous','1')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.anonymous',compact('anonymous','allAccounts'));
    }

    function resolved(){
        $resolved = Ticket::where('status','Resolved')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.resolved',compact('resolved','allAccounts'));
    }

    function complaint(){
        $complaint = Ticket::where('category','Complaint')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.complaint',compact('complaint','allAccounts'));
    }

    function appeal(){
        
        $appeal = Ticket::where('category','Appeal')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.appeal',compact('appeal','allAccounts'));
    }

    function remark(){
        $remark = Ticket::where('category','Remark')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.remark',compact('remark','allAccounts'));
    }

    function review(){
        $review = Ticket::where('status','To Be Reviewed')->get();
        $allAccounts = user::all();
        return view('dashboards.admins.review',compact('review','allAccounts'));
    }
    
    function show($id)
    {
        $ticket = Ticket::findOrFail($id); 

        return view('ticket.show_admin')
                ->with('ticket', $ticket);
    }

    public function updateStatus(Request $request, $id)
    {
        $ticket = Ticket::findOrfail($id);
        $ticket->status = request('status');

        if($ticket->save())
        {
            return redirect()->back()->with('Success','Ticket resolved successfully');
        }
        else
        {
            return redirect()->back()->with('Error','Ticket not resolved successfully');
        }
    }
}

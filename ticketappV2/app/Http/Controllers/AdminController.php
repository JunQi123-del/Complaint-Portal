<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class AdminController extends Controller
{
    function dashboard (){
        $alltickets = Ticket::count();
        $investigating = Ticket::where('status','Investigating')->count();
        $resolved = Ticket::where('status','Resolved')->count();
        $complaint = Ticket::where('category','Complaint')->count();
        $feedback = Ticket::where('category','FeedBack')->count();
        $remark = Ticket::where('category','Remark')->count();
        $appeal = Ticket::where('category','Appeal')->count();
        $review = Ticket::where('status','To Be Review')->count();
        $anony = Ticket::where('is_anonymous','1')->count();
        $nanony = Ticket::where('is_anonymous','0')->count();
        return view('dashboards.admins.dashboard',compact('alltickets','investigating','resolved','complaint','feedback','remark','appeal','review','anony','nanony'));
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

    function report(Request $request)
    {
        $dateFrom = $request->from;
        $dateTo = $request->to;

        $tickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->get();
        $users = User::all();
        $usersfiltered = User::whereBetween('created_at',[$dateFrom,$dateTo])->get();
        $complainttickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Complaint')->count();
        $feedbacktickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Feedback')->count();
        $remarktickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Remark')->count();
        $appealtickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Appeal')->count();
        $anony = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('is_anonymous','1')->count();
        $nanony = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('is_anonymous','0')->count();
        $resolved = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('status','Resolved')->count();
        $investigate = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('status','Investigating')->count();
        
        return view('dashboards.admins.report',compact('tickets','dateFrom','dateTo','usersfiltered','complainttickets','feedbacktickets',
                    'remarktickets','appealtickets','anony','nanony','resolved','investigate','users'));
        

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

    protected function emailpage(){
        return view ('dashboards.admins.sendemail');
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
}

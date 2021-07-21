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
        $complaintcounts = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Complaint')->count();
        $feedbackticktes = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Feedback')->count();
        $remarktickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Remark')->count();
        $appealtickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Appeal')->count();
        $anony = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('is_anonymous','1')->count();
        $nanony = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('is_anonymous','0')->count();
        $resolved = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('status','Resolved')->count();
        $investigate = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('status','Investigating')->count();

        
        /*
        |--------------------------------------------------------------------------
        | All ticket process information (resolved)
        |--------------------------------------------------------------------------
        */
        $all_tickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('status','Resolved')->get();
        // get count
        $tickets_count = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('status','Resolved')->count();

        $min = $max = $avg = 0;
        // min of day resolve
        foreach ($all_tickets as $ticket) {
            if($min==0)
            {
                $min = $ticket->created_at->diffInDays($ticket->updated_at);
            }
            else
            {
                if($min > $ticket->created_at->diffInDays($ticket->updated_at))
                {
                    $min = $ticket->created_at->diffInDays($ticket->updated_at);
                } 
            }
        }

        // max of day resolve
        foreach ($all_tickets as $ticket) {
            if($max < $ticket->created_at->diffInDays($ticket->updated_at)) 
            {
                $max = $ticket->created_at->diffInDays($ticket->updated_at);
            }
        }
        
        // avg of day resolve
        foreach ($all_tickets as $ticket) {
            $avg += $ticket->created_at->diffInDays($ticket->updated_at);
        }
        $avg /= $tickets_count;

        /*
        |--------------------------------------------------------------------------
        | All non-anonymous ticket process information (resolved)
        |--------------------------------------------------------------------------
        */
        $non_tickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('is_anonymous','0')->where('status','Resolved')->get();
        // get count
        $non_count = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('is_anonymous','0')->where('status','Resolved')->count();

        $minNon = $maxNon = $avgNon = 0;
        // min Non-Ano of day resolve
        foreach ($non_tickets as $n_t) {
            if($minNon==0)
            {
                $minNon = $n_t->created_at->diffInDays($n_t->updated_at);
            }
            else
            {
                if($minNon > $n_t->created_at->diffInDays($n_t->updated_at)) 
                {
                    $minNon = $n_t->created_at->diffInDays($n_t->updated_at);
                }
            }
        }

        // max Non-Ano of day resolve
        foreach ($non_tickets as $n_t) {
            if($maxNon < $n_t->created_at->diffInDays($n_t->updated_at)) 
            {
                $maxNon = $n_t->created_at->diffInDays($n_t->updated_at);
            }
        }
        
        // avg Non-Ano of day resolve
        foreach ($non_tickets as $n_t) {
            $avgNon += $n_t->created_at->diffInDays($n_t->updated_at);
        }
        $avgNon /= $non_count;

        /*
        |--------------------------------------------------------------------------
        | All anonymous ticket process information (resolved)
        |--------------------------------------------------------------------------
        */
        $ano_tickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('is_anonymous','1')->where('status','Resolved')->get();
        // get count
        $ano_count = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('is_anonymous','1')->where('status','Resolved')->count();

        $minAno = $maxAno = $avgAno = 0;
        // min of day resolve
        foreach ($ano_tickets as $ano_t) {
            if($minAno == 0)
            {
                $minAno = $ano_t->created_at->diffInDays($ano_t->updated_at);
            }
            else
            {
                if($minAno > $ano_t->created_at->diffInDays($ano_t->updated_at)) 
                {
                    $minAno = $ano_t->created_at->diffInDays($ano_t->updated_at);
                }
            }
        }

        // max of day resolve
        foreach ($ano_tickets as $ano_t) {
            if($maxAno < $ano_t->created_at->diffInDays($ano_t->updated_at)) 
            {
                $maxAno = $ano_t->created_at->diffInDays($ano_t->updated_at);
            }
        }
        
        // avg of day resolve
        foreach ($ano_tickets as $ano_t) {
            $avg += $ano_t->created_at->diffInDays($ano_t->updated_at);
        }
        $avgAno /= $ano_count;

        /*
        |--------------------------------------------------------------------------
        | Complaint process information (resolved)
        |--------------------------------------------------------------------------
        */
        $minComp = $maxComp = $avgComp = 0;
        // get complaint
        $complaint_tickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Complaint')->where('status','Resolved')->get();
        // get count
        $complaint_count = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Complaint')->where('status','Resolved')->count();

        // min and max of day compllaint resolve
        foreach ($complaint_tickets as $c_t) {
            if($minComp == 0)
            {
                $minComp = $c_t->created_at->diffInDays($c_t->updated_at);
            }
            else
            {
                if($minComp > $c_t->created_at->diffInDays($c_t->updated_at)) 
                {
                    $minComp = $c_t->created_at->diffInDays($c_t->updated_at);
                }
            }
        }

        // max of day feedback resolve
        foreach ($complaint_tickets as $c_t) {
            if($maxComp < $c_t->created_at->diffInDays($c_t->updated_at)) 
            {
                $maxComp = $c_t->created_at->diffInDays($c_t->updated_at);
            }
        }

        // avg of day compllaint resolve
        foreach ($complaint_tickets as $c_t) {
            $avgComp += $c_t->created_at->diffInDays($c_t->updated_at);
        }
        $avgComp /= $complaint_count;


        /*
        |--------------------------------------------------------------------------
        | feedback process information (resolved)
        |--------------------------------------------------------------------------
        */
        $minFeed = $maxFeed = $avgFeed = 0;
        // get feedback
        $feedback_tickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Feedback')->where('status','Resolved')->get();
        // get count
        $feedback_count = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Feedback')->where('status','Resolved')->count();

        // min of day feedback resolve
        foreach ($feedback_tickets as $f_t) {
            if($minFeed == 0)
            {
                $minFeed = $f_t->created_at->diffInDays($f_t->updated_at);
            }
            else
            {
                if($minFeed > $f_t->created_at->diffInDays($f_t->updated_at)) 
                {
                    $minFeed = $f_t->created_at->diffInDays($f_t->updated_at);
                } 
            }     
        }

        // max of day feedback resolve
        foreach ($feedback_tickets as $f_t) {
            if($maxFeed < $f_t->created_at->diffInDays($f_t->updated_at)) 
            {
                $maxFeed = $f_t->created_at->diffInDays($f_t->updated_at);
            }
        }

        // avg of day feedback resolve
        foreach ($feedback_tickets as $f_t) {
            $avgFeed += $f_t->created_at->diffInDays($f_t->updated_at);
        }
        $avgFeed /= $feedback_count;

        /*
        |--------------------------------------------------------------------------
        | remark process information (resolved)
        |--------------------------------------------------------------------------
        */
        $minRemark = $maxRemark = $avgRemark = 0;
        // get remark
        $remark_tickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Remark')->where('status','Resolved')->get();
        // get count
        $remark_count = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Remark')->where('status','Resolved')->count();

        // min of day remark resolve
        foreach ($remark_tickets as $r_t) {
            if($minRemark == 0)
            {
                $minRemark = $r_t->created_at->diffInDays($r_t->updated_at);
            }   
            else
            {
                if($minRemark > $r_t->created_at->diffInDays($r_t->updated_at)) 
                {
                    $minRemark = $r_t->created_at->diffInDays($r_t->updated_at);
                } 
            }  
        }

        // max of day remark resolve
        foreach ($remark_tickets as $r_t) {
            if($maxRemark < $r_t->created_at->diffInDays($r_t->updated_at)) 
            {
                $maxRemark = $r_t->created_at->diffInDays($r_t->updated_at);
            }
        }

        // avg of day remark resolve
        foreach ($remark_tickets as $r_t) {
            $avgRemark += $r_t->created_at->diffInDays($r_t->updated_at);
        }
        $avgRemark /= $remark_count;

        /*
        |--------------------------------------------------------------------------
        | Appeal process information (resolved)
        |--------------------------------------------------------------------------
        */
        $minApp = $maxApp = $avgApp = 0;
        // get appeal
        $appeal_tickets = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Appeal')->where('status','Resolved')->get();
        // get count
        $appeal_count = Ticket::whereBetween('created_at',[$dateFrom,$dateTo])->where('category','Appeal')->where('status','Resolved')->count();

        // min of day appeal resolve
        foreach ($appeal_tickets as $a_t) {
            if($minApp == 0)
            {
                $minApp = $a_t->created_at->diffInDays($a_t->updated_at);
            }
            else
            {
                if($minApp > $a_t->created_at->diffInDays($a_t->updated_at)) 
                {
                    $minApp = $a_t->created_at->diffInDays($a_t->updated_at);
                }
            }      
        }

        // max of day appeal resolve
        foreach ($appeal_tickets as $a_t) {
            if($maxApp < $a_t->created_at->diffInDays($a_t->updated_at)) 
            {
                $maxApp = $a_t->created_at->diffInDays($a_t->updated_at);
            }
        }

        // avg of day appeal resolve
        foreach ($appeal_tickets as $a_t) {
            $avgApp += $a_t->created_at->diffInDays($a_t->updated_at);
        }
        $avgApp /= $appeal_count;


        /*
        |--------------------------------------------------------------------------
        | Passing data to view
        |--------------------------------------------------------------------------
        */
        return view('dashboards.admins.report',compact('tickets','dateFrom','dateTo','usersfiltered','complainttickets','feedbacktickets',
                                                        'remarktickets','appealtickets','anony','nanony','resolved','investigate','users',
                                                        'min','max','avg',
                                                        'minNon','maxNon','avgNon',
                                                        'minAno','maxAno','avgAno',
                                                        'minComp','maxComp','avgComp',
                                                        'minFeed','maxFeed','avgFeed',
                                                        'minRemark','maxRemark','avgRemark',
                                                        'minApp','maxApp','avgApp'
                                                        ));
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

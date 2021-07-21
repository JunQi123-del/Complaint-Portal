<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;       // able to use the validator
use App\Models\Ticket;                          // able to use the ticket model inside this controller
use App\Models\Comment;                         // able to use the comment model inside this controller
use DB;                                         // database
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\TicketNotification;
use Illuminate\Support\Facades\Notification;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // to load all ticket
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createComplaint()
    {
        $category = 'Complaint';
        return view('ticket.create')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnonymousComplaint()
    {
        $category = 'Complaint';
        return view('ticket.create_anonymous')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRemark()
    {
        $category = 'Remark';
        return view('ticket.create')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAppeal()
    {
        $category = 'Appeal';
        return view('ticket.create')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFeedback()
    {
        $category = 'Feedback';
        return view('ticket.create')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnonymousFeedback()
    {
        $category = 'Feedback';
        return view('ticket.create_anonymous')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $ticket = new Ticket;

        // retrieve the basic information of the ticket
        $ticket->category = request('h_category');
        $ticket->is_anonymous = request('isAnonymous');
        $ticket->title = request('title');
        $ticket->message = request('body');
        $ticket->status = 'To Be Reviewed';

        if(($request->has('student')) && ($ticket->is_anonymous == 0) )
        { 
            $validator = Validator::make($request->all(), [
                'stu_id' => 'required',
                'school' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('errors', $validator->messages())->withInput();
            }

            $ticket->user_background = $request->input('student');
            $ticket->student_id = request('stu_id');
            $ticket->school = request('school');
        }
        else if($request->has('staff'))
        {
            $ticket->user_background = $request->input('staff');
        }
        else if($request->has('public'))
        {
            $ticket->user_background = $request->input('public');
        }
        else
        {   // if student was selected in anonymous ticket
            $ticket->user_background = $request->input('student');
        }


        if($ticket->is_anonymous == 1)
        {
            $ticket->save();

            $ticketID = Ticket::orderBy('id', 'desc')->first()->id;

            return redirect('/')->withSuccess("Thank you for raising your concern to the university. 
                                                <br> <small>Please note down the $ticket->category ID 
                                                    $ticketID to track the further update ot it.</small>");
        }
        else
        {
            $ticket->first_name = request('first');
            $ticket->last_name = request('last');
            $ticket->email = request('email');
            
            $ticket->save();

            Notification::route('mail', $ticket->email)->notify(new TicketNotification($ticket));

            return redirect('/')->withSuccess("Thank you for raising your concern to the university. 
                                                <br> <small>An notication email will be send to your email
                                                for further notification.</small>");
        }
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

        return view('ticket.show')
                ->with('ticket', $ticket);

    }

    /**
     * Search a created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchID = request('id_search');

        $ticket = Ticket::find($searchID);
        
        if(!(is_null($ticket)))
        {
            return view('ticket.show')
                ->with('ticket', $ticket);
        }
        else
        {
            return redirect()->back()->with('errors','Ops! No such ticket ID exits.
                                        <br> <small>Please enter the provided ID instead.</small>');
        }
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
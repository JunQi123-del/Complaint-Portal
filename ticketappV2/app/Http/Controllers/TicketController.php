<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;                 // able to use the ticket model inside this controller
use DB;                         // database

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new Ticket;

        if($request->has('student'))
        { 
            $this->validate($request, [
                'stu_id' => 'required',
                'school' => 'required'
            ]);
            $ticket->user_background = $request->input('student');
        }
        else if($request->has('staff'))
        {
            $ticket->user_background = $request->input('staff');
        }
        else if($request->has('public'))
        {
            $ticket->user_background = $request->input('public');
        }

        $ticket->category = request('h_category');
        $ticket->is_anonymous = request('isAnonymous');
        $ticket->first_name = request('first');
        $ticket->last_name = request('last');
        $ticket->student_id = request('stu_id');
        $ticket->school = request('school');
        $ticket->email = request('email');
        $ticket->title = request('title');
        $ticket->message = request('body');
        $ticket->status = 'To be reviewed';
        //$ticket->attatchment = request('cover_image'); later then do

        $ticket->save();
        
        return redirect('/')->with('success', 'Ticket Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        
        return view('ticket.show')
                ->with('ticket', $ticket);
                //->with('persons', Person::order_by('list_order', 'ASC')->get())
                //;
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
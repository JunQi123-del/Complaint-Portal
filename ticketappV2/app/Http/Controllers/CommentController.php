<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;                 // able to use the comment model inside this controller
use App\Models\User;                    // able to use the user model inside this controller
use App\Models\Ticket; 
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification; 

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;
        $comment->is_internal = $request->internal;
        $comment->ticket_id = $request->ticket_id;
        
        $comment->save();

        return redirect('/ticket/'.$comment->ticket_id)->with('toast_success', 'Comment Added Successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUserComment(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;
        $comment->is_internal = $request->internal;
        $comment->ticket_id = $request->ticket_id;
        $comment->user_id = auth()->user()->id;

        $comment->save();

        if($comment->user_id == 1)
        {
            if($comment->is_internal == 0)
            {
                $ticket = Ticket::findOrFail($comment->ticket_id);
                $ticket->updated_at = $comment->created_at;
                $ticket->save();

                if($ticket->is_anonymous == 0)
                {
                    Notification::route('mail', $ticket->email)->notify(new CommentNotification($ticket));
                }
            }
            return redirect('/admin/ticket/'.$comment->ticket_id)->with('toast_success', 'Comment Added Successfully!');
        }
        else
        {
            return redirect('/user/ticket/'.$comment->ticket_id)->with('toast_success', 'Comment Added Successfully!');
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
        //
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

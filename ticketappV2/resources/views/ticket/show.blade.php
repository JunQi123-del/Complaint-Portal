@extends('layouts.layout')

@section('content')
    <div class="ticket-view">
        <div class="container ticket-side">
            <div class="container">
                <h3>Ticket ID# {{$ticket->id}}</h3>
                <h1>{{$ticket->title}}</h1>
                <div container style="border:3px solid #cecece;">
                    <div style="margin: 20px;">
                        <strong>Description</strong><br>
                        {!!$ticket->message!!}
                    </div>
                </div>
            </div>

            
                <br><br>
                <hr>
                <div>
                    <h3>Comment</h3>
                    @if ($ticket->comments->isEmpty())
                        <p>There are currently no comment.</p>
                    @else
                    <div class="container">
                        @foreach($ticket->comments as $ticket->comment)
                                {{$ticket->comment->created_at}}
                                {!!$ticket->comment->comment!!}
                            @endforeach
                       
                    </div>
                    @endif
                    
                    <hr>
                    @include('comment.create')
                   
                    

                </div>

                <br>
                <a href= "/ticket/create/complaint">
                    <button class="btn btn-primary">
                        Return Home Page
                    </button>
                </a>
            

        </div>

        <div class="sidebar"></div>
        <div class="sticky-sidebar">
            <div class="container">
                <p class="h6">Created on <br>{{$ticket->created_at}}</p> 
                <br>
                <p class="h6">Last updated on <br>{{$ticket->updated_at}}</p>
                <br>
                <p class="h6">Status <br>{{$ticket->status}}</p>
                <br>
                <p class="h6">Reported by <br>{{$ticket->first_name}}  {{$ticket->last_name}}</p>
                <br>
                <p class="h6">Handel by <br>{{'To be assigned'}}</p>
                <br>
                <p class="h6">Triage to <br>{{'To be assigned'}}</p>
            </div>
        </div>
    </div>

@endsection



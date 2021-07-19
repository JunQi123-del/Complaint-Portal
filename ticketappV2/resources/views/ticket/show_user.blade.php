@extends('dashboards.users.layouts.user-layout')

@section('contents')

    <div class="wrapper-ticket">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <br>
            <ul class="list-unstyled">
                <li>
                    <div class="card border-primary mb-3 ticket-info">
                        <div class="card-body">
                            <h5 class="card-title">Status</h5>
                            <p class="card-text">{{$ticket->status}}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card border-primary mb-3 ticket-info">
                        <div class="card-body">
                            <h5 class="card-title">Created on</h5>
                            <p class="card-text">{{$ticket->created_at->toFormattedDateString()}}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card border-primary mb-3 ticket-info">
                        <div class="card-body">
                            <h5 class="card-title">Last updated</h5>
                            <p class="card-text">{{$ticket->updated_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card border-primary mb-3 ticket-info">
                        <div class="card-body">
                            <h5 class="card-title">Handel by</h5>
                            <p class="card-text">Portal Admininstrator </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card border-primary mb-3 ticket-info">
                        <div class="card-body">
                            <h5 class="card-title">Triage to(department)</h5>
                            @if(is_null($ticket->user_id))
                                <p class="card-text">To be triage </p>
                            @else
                                <p class="card-text">{{$ticket->user->name}} </p>
                            @endif
                            
                        </div>
                    </div>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div class="container ticket-view">
            @if($ticket->is_anonymous == 0)
                <h2>{{$ticket->category}} ID {{$ticket->id}} </h2>
            @else
                <h2>Anonymous {{$ticket->category}} ID {{$ticket->id}} </h2>
            @endif
            
            <div class="card mb-3 ticket" style ="width: 750px;">  
                <div class="card-body">
                    <h2 class="card-title">{{$ticket->title}}</h2>
                    <p class="card-text">{!!$ticket->message!!}</p>

                    @if($ticket->is_anonymous == 0)
                        <p class="card-text" style = "text-align: right"><small class="text-muted">raised by {{$ticket->first_name}} {{$ticket->last_name}} at {{$ticket->created_at}}</small></p>
                    @else
                        <p class="card-text" style = "text-align: right"><small class="text-muted">raised anonymously at {{$ticket->created_at}}</small></p>
                    @endif
                    
                </div>
            </div>

            
            <div class="container">
                <h3>Comments</h3>
                @if ($ticket->comments->isEmpty())
                    No comment added......
                @else
                    @foreach($ticket->comments as $ticket->comment)

                        @if($ticket->comment->is_internal == 0)
                            <div class = "comment mt-4">

                                @if(is_null($ticket->comment->user_id))

                                    @if($ticket->is_anonymous == 0)
                                        <img src="{{ Avatar::create("$ticket->first_name $ticket->last_name")->toBase64() }}" /> 
                                        <span>{{$ticket->first_name}} {{$ticket->last_name}}  -  {{$ticket->comment->created_at->diffForHumans()}}</span>
                                    @else
                                        <img src="{{ Avatar::create("Anonymous User")->toBase64() }}" /> 
                                        <span>Anonymous User  -  {{$ticket->comment->created_at->diffForHumans()}}</span>
                                    @endif

                                @else
                                    <img src="{{ Avatar::create("$ticket->user->name")->toBase64() }}" /> 
                                    <span>{{$ticket->comment->user->name}}  -  {{$ticket->comment->created_at->diffForHumans()}}</span>
                                @endif

                                {!!$ticket->comment->comment!!}
                            </div>
                        @else
                            <div class = "internal-comment mt-4">
                                <img src="{{ Avatar::create("$ticket->comment->user->name")->toBase64() }}" /> 
                                <span>{{$ticket->comment->user->name}}  -  {{$ticket->comment->created_at->diffForHumans()}}</span>
                                {!!$ticket->comment->comment!!}
                            </div>
                        @endif

                    @endforeach
                @endif
                  
                @include('comment.create_internal')
            </div>

            <br><br>
        </div>

    </div>
@endsection
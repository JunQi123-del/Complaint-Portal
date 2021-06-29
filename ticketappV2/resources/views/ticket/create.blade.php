@extends('layouts.layout')

@section('content')
<br><br><br><br><br><br>
<div class="container">
    <h1>Create Ticket(for now)Hello</h1>
    <div>
    {!! Form::open(['action' => 'TicketController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'wysiwyg-editor', 'class' => 'form-control' , 'enctype' => 'multipart/form-data'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    </div>
</div>



@endsection
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

            <div class="container">
                <br><br>
                <hr>
                <div container style="border:3px solid #cecece;">
                    <h3>Comment</h3>
                    <a onClick="$('#form1').hide();">Hide</a>
<a onClick="$('#form1').show();">Show</a>
<form action="sample_posteddata.php" method="post" id="form1">
    <textarea id="editor1" name="editor1">blabla</textarea>
    <script type="text/javascript"> CKEDITOR.replace( 'editor1' ); </script>
    <input type="submit" value="Submit" />
</form>

                </div>
            </div>
            
        </div>

        
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


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
    });
</script>

@endsection



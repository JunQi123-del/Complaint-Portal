<div class="container-fluid">
    <a onClick="$('#commentForm').hide();">Hide Comment</a> 
    <a onClick="$('#commentForm').show();">Add Comment</a>
</div>
<div>
    {!! Form::open([
        'action'                    => 'CommentController@store', 
        'id'                        => 'commentForm', 
        'method'                    => 'POST', 
        'enctype'                   => 'multipart/form-data'
    ])!!}

    @CSRF
    
    <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
    <input type="hidden" value="0" name="internal">

    <div class="form-group">
    {{Form::textarea('comment', '', [
        'id'                            => 'summary-ckeditor', 
        'class'                         => 'form-control', 
        'required'                      => 'required',
    ])}}
</div>

<div class="float-right">
{{Form::submit('Submit', ['class'=>'btn btn-primary','id' => 'submitBtn'])}}
</div>
{!! Form::close() !!}
</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace( 'summary-ckeditor', {
    width :600,
    height: 200,
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
    });
</script>
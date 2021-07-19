<div style="margin-top: 20px">
    <h3>Action</h3>
</div>
<div 
    style = 
    " height: 50px;
    width: 750px;
    border: 1px solid rgba(16, 46, 46, 1);
    border-radius:5px;
    background-color: #FFFFFF;
    padding-left: 40px;
    padding-right: 30px;
    padding-top: 10px; 
    margin-bottom: 25px;
    font-size: 20px;
    color: #00BFFF;
    left: 0">
    <a onClick="$('#commentForm').show();">Add Internal Comment</a>
</div>

<div style="width: 750px;">
    {!! Form::open([
        'action'                    => 'CommentController@storeInternal', 
        'id'                        => 'commentForm', 
        'method'                    => 'POST', 
        'enctype'                   => 'multipart/form-data'
    ])!!}

    @CSRF
    
    <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
    <input type="hidden" value="1" name="internal">

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script type ="text/javascript">

CKEDITOR.replace( 'summary-ckeditor', {
filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
filebrowserUploadMethod: 'form'
});

function hideTextArea() {
    $('#commentForm').hide();
}
window.onload = hideTextArea;

</script>
@extends('layouts.layout')

@section('content')
<div class="container">
    <b><h1>Anonymous {{$category}} Form</h1></b>
    <hr>
    <div>
    {!! Form::open([
        'action'                    => 'TicketController@store', 
        'id'                        => 'validate_form', 
        'data-parsley-validate', 
        'method'                    => 'POST', 
        'enctype'                   => 'multipart/form-data'
    ])!!}
        @CSRF
        <input type="hidden" value="{{$category}}" name="h_category">
        <input type="hidden" value="1" name="isAnonymous">
        <!-- 1 represent true in database --> 
        
        <div class="form-group ">
            <b><p style ="font-weight: bold; font-size: 20px;">Who are you? (by default: you are a student)</p></b>
            <div class="form-check form-check-inline float-right">
                <input type="checkbox" id="id_staff"  name="staff" value="Staff" onclick="selectStaff()">
                <label class="form-check-label" for="id_staff" style ="font-size: 20px;"> Staff </label>
            </div>
            <div class="form-check form-check-inline float-right">
                <input type="checkbox" id="id_student" name="student" value="Student" checked onclick="selectStudent()">
                <label class="form-check-label" for="id_student" style ="font-size: 20px;"> Student </label>
            </div>
            <div class="form-check form-check-inline float-right">
                <input type="checkbox" id="id_public" name="public" value="Public User" onclick="selectPublic()">
                <label class="form-check-label" for="id_punlic" style ="font-size: 20px;"> Public User </label>
            </div>
        </div>
        <br><br>

        <div class="form-group">
            <div style ="font-weight: bold; font-size: 20px;">
                {{Form::label('title', 'Title')}}
            </div>
            <p>Please enter the title of your concern</p>
            {{Form::text('title', '', [
                'id'                            => 'id_title', 
                'class'                         => 'form-control', 
                'required'                      => 'required',
                'data-parsley-required-message' => 'Title is required', 
                'data-parsley-trigger'          => 'keyup'
            ])}}
        </div>
        <br>

        <div class="form-group">
            <div style ="font-weight: bold; font-size: 20px;">
                {{Form::label('body', 'Description')}}
            </div>
            <p>Please detail below the nature of your incidents or events.<span>(be as specific as possible)</span></p>
            {{Form::textarea('body', '', [
                'id'                            => 'summary-ckeditor', 
                'class'                         => 'form-control', 
                'required'                      => 'required',
                'data-parsley-required-message' => 'Description is required', 
                'data-parsley-trigger'          => 'keyup'
            ])}}
        </div>

        <div class="form-group">
            <div style ="font-weight: bold; font-size: 20px;">
                {{Form::label('attachment', 'File Attachment (Optional)')}}
            </div>    
            <p>You are able to provide further documents for more information.</p>
            <strong>Please Upload multiple files in form of one compressed zip file if needed.</strong><br>
            {{Form::file('cover_image')}}
        </div>

        <a href= "/ticket/create/complaint">
            {{Form::button('Return Home Page', ['class'=>'btn btn-primary'])}}
        </a>
        
        <div class="float-right">
            {{Form::reset('Clear Form', ['class'=>'btn btn-primary'])}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary','id' => 'submitBtn'])}}
        </div>
    {!! Form::close() !!}
    <br>
    </div>
</div>
<br>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script type ="text/javascript">
// handle is anonymous
document.getElementById('notAnonymous').click();

// handle user background - staff selection
function selectStaff()
{
    document.getElementById("id_student").checked = false;
    document.getElementById("id_public").checked = false;
    return true;
}
// handle user background - student selection
function selectStudent()
{
    document.getElementById("id_staff").checked = false;
    document.getElementById("id_public").checked = false;
    return true;
}

// handle user background - public selection
function selectPublic()
{
    document.getElementById("id_staff").checked = false;
    document.getElementById("id_student").checked = false;
    return true;
}
</script>


<!-- PARSLEY -->
<script>
    window.ParsleyConfig = {
        errorsWrapper: '<div></div>',
        errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
        errorClass: 'has-error',
        successClass: 'has-success'
    };
</script>
<script src="http://parsleyjs.org/dist/parsley.js"></script>

@endsection


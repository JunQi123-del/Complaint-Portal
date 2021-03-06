@extends('layouts.layout')

@section('content')
<div class="container">
    <b><h1>{{$category}} Form</h1></b>
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
        
        <!--Comment out 
        <div class="form-group">
            <b>{{Form::label('isAnonymous', 'Do you want us to know who you are?')}}</b>
            <div class="btn btn-group float-right">
                {{Form::button('Yes', [
                    'id'        => 'notAno',
                    'class'     => 'btn btn-success', 
                    'onclick'   => 'notAnonymous();'
                ])}}
                {{Form::reset('No', [
                    'id'        => 'isAno', 
                    'class'     => 'btn btn-danger',  
                    'onclick'   => 'isAnonymous();'
                ])}}
            </div>
        </div>
        <br>-->
        <div class="form-group ">
            <b><p>Who are you? (by default: you are a student)</p></b>
            <div class="form-check form-check-inline float-right">
                <input type="checkbox" id="id_staff"  name="staff" value="Staff" onclick="selectStaff()">
                <label class="form-check-label" for="id_staff">Staff </label>
            </div>
            <div class="form-check form-check-inline float-right">
                <input type="checkbox" id="id_student" name="student" value="Student" checked onclick="selectStudent()">
                <label class="form-check-label" for="id_student">Student </label>
            </div>
            <div class="form-check form-check-inline float-right">
                <input type="checkbox" id="id_public" name="public" value="Public User" onclick="selectPublic()">
                <label class="form-check-label" for="id_punlic">Public User </label>
            </div>
        </div>
        <br><br>

        <div class="form-group row">
            <div class="col">
                {{Form::label('first', 'First Name')}}
                {{Form::text('first', '', [
                    'id'                            => 'id_first', 
                    'class'                         => 'form-control', 
                    'required'                      => 'required',
                    'data-parsley-required-message' => 'First name is required',
                    'data-parsley-pattern'          => '[a-zA-Z]+$', 
                    'data-parsley-trigger'          => 'keyup'
                ])}}
            </div>
            <div class="col">
                {{Form::label('last', 'Last Name')}}
                {{Form::text('last', '', [
                    'id'                            => 'id_last', 
                    'class'                         => 'form-control', 
                    'required'                      => 'required',
                    'data-parsley-required-message' => 'Last name is required',
                    'data-parsley-pattern'          => '[a-zA-Z]+$', 
                    'data-parsley-trigger'          => 'keyup'
                ])}}
            </div>
        </div>
        <br>

        <div class="form-group row">
            <div class="col">
                {{Form::label('stu_id', 'Student ID')}}
                {{Form::text('stu_id', '', [
                    'id'                            => 'id_stuID', 
                    'class'                         => 'form-control', 
                    'data-parsley-type'             => 'digits', 
                    'data-parsley-length'           => '[8,8]', 
                    'data-parsley-trigger'          => 'keyup'
                ])}}
                <div class="float-right">
                    <small>* if you are a student</small>
                </div>
            </div>
            <div class="col">
                {{Form::label('school', 'School')}}
                {{Form::text('school', '', [
                    'id'                            => 'id_school', 
                    'class'                         => 'form-control', 
                    'data-parsley-pattern'          => '[a-zA-Z]+$', 
                    'data-parsley-trigger'          => 'keyup'
                ])}}
                <div class="float-right">
                    <small>* if you are a student</small>
                </div>
            </div>
        </div>
        <br>

        <div class="form-group">
            {{Form::label('email', 'Way of contact (in email)')}}
            {!!Form::email('email', '', [
                'id'                            => 'id_email', 
                'class'                         => 'form-control', 
                'required'                      => 'required',
                'data-parsley-required-message' => 'Email is required', 
                'data-parsley-type'             => 'email', 
                'data-parsley-trigger'          => 'keyup'
            ])!!}
        </div>
        <br>

        <div class="form-group">
            {{Form::label('title', 'Title')}}
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
            {{Form::label('body', 'Description')}}
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
            {{Form::label('attachment', 'File Attachment (Optional)')}}
            <p>You are able to provide further documents for more information.</p>
            <strong>Please Upload multiple files in form of one compressed zip file if needed.</strong><br>
            {{Form::file('cover_image')}}
        </div>

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

function isAnonymous()
{
    document.getElementById("id_first").disabled = true;
    document.getElementById("id_last").disabled = true;
    document.getElementById("id_stuID").disabled = true;
    document.getElementById("id_school").disabled = true;
    document.getElementById("id_email").disabled = true;
}

// handle isNot anonymous
function notAnonymous()
{
    document.getElementById("id_first").disabled = false;
    document.getElementById("id_last").disabled = false;
    document.getElementById("id_stuID").disabled = false;
    document.getElementById("id_school").disabled = false;
    document.getElementById("id_email").disabled = false;
}

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


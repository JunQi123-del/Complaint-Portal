@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Feedback')
@section('header','Feedback')

@section('contents')

<table id = "example1" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Visibility</th>
      <th scope="col">category</th>
      <th scope="col">Background</th>
      <th scope="col">StudentID</th>
      <th scope="col">School</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">created at</th>
      <th scope="col">updated at</th>
      <th scope="col">DepartmentID</th>
      <th scope="col">Triage</th>
      <th scope="col">Resolve</th>
    </tr>
  </thead>
  <tbody>
    @foreach($feedback as $row)
    <tr>
        <td>{{$row['id']}}</td>
        <td>{{$row['title']}}</td>
        <td>{{$row['status']}}</td>
        <td>{{$row['is_anonymous']}}</td>
        <td>{{$row['category']}}</td>
        <td>{{$row['user_background']}}</td>
        <td>{{$row['student_id']}}</td>
        <td>{{$row['school']}}</td>
        <td>{{$row['first_name']}}</td>
        <td>{{$row['last_name']}}</td>
        <td>{{$row['email']}}</td>
        <td>{{$row['created_at']}}</td>
        <td>{{$row['updated_at']}}</td>
        @if($row->status == 'To Be Reviewed')
        <td>{{$row['user_id']}}</td>
        @else
        @foreach($allAccounts as $depart)
         @if($row->user_id == $depart->id)
         <td>{{$depart->name}}</td>
         break;
         @endif
         @endforeach
         @endif
        @if($row->status !='Resolved')
        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$row->id}}">Triage</button> </td> 
        <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2-{{$row->id}}">Resolve</button> </td> 
        @else
        <td> Resolved </td>
        <td> Resolved </td>
        @endif
       
        <!-- Triage Modal -->
<div class="modal fade" id="exampleModal-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-{{$row->id}}">Ticket ID {{$row['id']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Title: {{$row['title']}}
      <br>
      <br>
      Message
      <br>
      {{$row['message']}}
      <br>
      </div> 
      <form action = "admin/triage/{{$row->id}}" method = "POST">
        @csrf
        Triage to:
        <select class = "form-control" name="department">
          @foreach($allAccounts as $dept)
        <option value ="{{$dept->id}}" >{{$dept->name}} - {{$dept->id}}</option>
          @endforeach
       </select>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- End triage modal -->

 <!-- resolve Modal -->
 <div class="modal fade" id="exampleModal2-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel-{{$row->id}}">Ticket ID {{$row['id']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Message
        <br>
        Are you sure you want to resolve Ticket ID: {{$row['id']}}?
        <br>
      </div>
      <form action = "admin/resolve/{{$row->id}}" method = "POST">
        @csrf
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
        <button type="submit" class="btn btn-primary">Yes</button>
      </div>
    </form>
    </div>
  </div>
</div>
    </tr>

    @endforeach
  </tbody>
</table>



@endsection
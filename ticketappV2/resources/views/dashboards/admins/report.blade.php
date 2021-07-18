@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title')
Ticket Report based from {{$dateFrom}} to {{$dateTo}} 
complaint: {{$complainttickets}}
feedback: {{$feedbacktickets}}
Remark: {{$remarktickets}}
Appeal: {{$appealtickets}}
Anonymous: {{$anony}}
NonAnonymous: {{$nanony}}
Under investigation: {{$investigate}}
Resolved: {{$resolved}}




@endsection
@section('header')

Ticket Report based from {{$dateFrom}} to {{$dateTo}} 

@endsection


@section('contents')


<table id = "example1" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Status</th>
      <th scope="col">Category</th>
      <th scope="col">Visibility</th>
      <th scope="col">Background</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Department</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tickets as $row)
    <tr>
        <td>{{$row['id']}}</td>
        <td>{{$row['title']}}</td>
        <td>{{$row['status']}}</td>
        <td>{{$row['category']}}</td>
        @if($row->is_anonymous == '1')
        <td>Anonymous</td>
        @else
        <td>Non-Anonymous</td>
        @endif
        <td>{{$row['user_background']}}</td>
        <td>{{$row['first_name']}}</td>
        <td>{{$row['last_name']}}</td>
         @foreach($users as $depart)
         @if($row->user_id == $depart->id)
         <td>{{$depart->name}}</td>
         break;
         @endif
         @endforeach
    </tr>

    @endforeach
  </tbody>
</table>

<br>
<br>


@endsection
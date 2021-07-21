@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Resolved')
@section('header','Resolved')

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
      <th scope="col">Last Response</th>
      <th scope="col">Days To Resolve</th>
      <th scope="col">Department Triage</th>
    </tr>
  </thead>
  <tbody>
    @foreach($resolved as $row)
    <tr>
        <td>{{$row['id']}}</td>
        <td><a href="/admin/ticket/{{$row['id']}}">{{$row['title']}}</a></td>
        <td>{{$row['status']}}</td>

        @if($row->is_anonymous == 1)
          <td> Anonymous </td> 
        @else
          <td> Not Anonymous </td> 
        @endif

        <td>{{$row['category']}}</td>
        <td>{{$row['user_background']}}</td>
        <td>{{$row['student_id']}}</td>
        <td>{{$row['school']}}</td>
        <td>{{$row['first_name']}}</td>
        <td>{{$row['last_name']}}</td>
        <td>{{$row['email']}}</td>
        <td>{{$row['created_at']->toFormattedDateString()}}</td>
        <td>{{$row['updated_at']->diffForHumans()}}</td>
        
        @if($row->status == "Resolved")
          <td> {{$row->created_at->diffInDays($row->updated_at)}} days</td> 
        @else
          <td>-</td>
        @endif

        @if($row->user_id == null)
          <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$row->id}}">Triage</button> </td> 
        @else
          <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$row->id}}">{{$row->user->name}}</button> </td>
        @endif
    </tr>
    @endforeach
  </tbody>
</table>



@endsection
@extends('dashboards.users.layouts.user-layout')
@section('title','complaint Tickets')
@section('header','Complaint Tickets')

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
    </tr>
  </thead>
  <tbody>
    @foreach($dept as $row)
    @if($row->category == 'Complaint')
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
    </tr>
    @endif

    @endforeach
  </tbody>
</table>


@endsection
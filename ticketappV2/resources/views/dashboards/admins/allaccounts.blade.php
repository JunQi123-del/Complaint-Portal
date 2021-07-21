@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','All Accounts')
@section('header','All Accounts')

@section('register')
<button type="button" class="btn btn-primary">Register</button>
@endsection

@section('reset')
<button type="button" class="btn btn-primary">Reset</button>
@endsection



@section('contents')

<table id = "example1" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">role</th>
      <th scope="col">Created at</th>
      <th scope="col">Updated at</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allAccounts as $row)
    <tr>
        <td>{{$row['id']}}</td>
        <td>{{$row['name']}}</td>
        <td>{{$row['email']}}</td>
        @if($row->role == '1')
        <td>Administrator</td>
        @else
        <td>Department</td>
        @endif
        <td>{{$row['created_at']}}</td>
        <td>{{$row['updated_at']}}</td>
    </tr>

    @endforeach
  </tbody>
</table>




@endsection
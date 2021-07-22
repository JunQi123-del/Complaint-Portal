@extends('dashboards.admins.layouts.admin-dash-layout')

@section('title')
Ticket Report based from {{$dateFrom}} to {{$dateTo}} 

------------------------------Report Summary--------------------------------

Number of Tickets Under investigation: {{$investigate}}

Number of tickets Resolved: {{$resolved}}
 

Tickets Resolved days 
------------
Shortest resolve days: {{$min}}
Longest resolve days: {{$max}}
Average resolve days: {{$avg}}

-------------------------------------------------

Non-Anonymous Tickets resolve days
-----------
Number of NonAnonymous Tickets: {{$nanony}}
Shortest :{{$minNon}}
Average  : {{$avgNon}}
Longest  : {{$maxNon}}

-------------------------------------------------

Anonymous Tickets resolve days
-----------
Number of Anonymous Tickets: {{$anony}}
Shortest : {{$minAno}}
Average  : {{$avgAno}}
Longest  : {{$maxAno}}

-------------------------------------------------

Complaint Tickets resolve days
-----------
Number of Complaint: {{$complainttickets}}
Shortest : {{$minComp}}
Average  : {{$avgComp}}
Longest  : {{$maxComp}}

-------------------------------------------------

Feedback Tickets resolve days
-----------
Number of Feedback: {{$feedbacktickets}}
Shortest : {{$minFeed}}
Average  : {{$avgFeed}}
Longest  : {{$maxFeed}}

-------------------------------------------------

Remark Tickets resolve days
-----------
Number of Remarks: {{$remarktickets}}
Shortest : {{$minRemark}}
Average  : {{$avgRemark}}
Longest  : {{$maxRemark}}

-------------------------------------------------

Appeal Tickets resolve days
-----------
Number of Appeal: {{$appealtickets}}
Shortest : {{$minApp}}
Average  : {{$avgApp}}
Longest  : {{$maxApp}}

--------------------Summary End -------------------------

--------------------Report datatable -------------------------
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
        @if ($row->status == 'To Be Reviewed')
        <td>Not triaged yet</td>
        @else
         @foreach($users as $depart)
         @if($row->user_id == $depart->id)
         <td>{{$depart->name}}</td>
         @endif
         @endforeach
         @endif
    </tr>

    @endforeach
  </tbody>
</table>

<br>
<br>


@endsection
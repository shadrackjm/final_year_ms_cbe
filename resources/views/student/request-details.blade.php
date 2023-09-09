@extends('layout/student-lay')
@section('space-work')
@if(Session::has('success'))
<div class="alert alert-success p-2">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
@endif
<div class="card">
  <div class="card-header">
    Group Request Records
    <a href="/group" class="btn btn-outline-success btn-sm pull-right">Group Creation Page</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hovered table-sm text-center text-capitalize">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Group Number</th>
          <th>Student Name</th>
          <th>Registration Number</th>
          <th>Request Date</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($my_request_data) > 0)
        @foreach($my_request_data as $datas)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $datas->group_id }}</td>
          <td class="">{{ $datas->fname }} {{ $datas->mname }} {{ $datas->lname }}</td>
          <td>{{ $datas->regno }}</td>
          <td>{{ date("d-m-Y H:i:s A",strtotime($datas->created_at)) }}</td>
            @if($request_type == 'requesting..')
            <td><a href="/cancel/request/{{$datas->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel Your Request?')">Cancel</a></td>
            @elseif($request_type == 'requested..')
            <td><a href="/accept/request/{{$datas->id}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to accept the Request?')">Accept</a></td>
            <td><a href="/reject/request/{{$datas->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to reject the Request?')">Reject</a></td>
            @endif
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="4" >No Data Found!</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>

@endsection

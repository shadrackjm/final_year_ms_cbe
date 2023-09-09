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
    My Group Details - Group Status 
    <a href="/my/request" class="btn btn-outline-success btn-sm pull-right">Group Requests</a>
    @if($group_status == 1)
    <span class="alert alert-success p-2">Complete</span>
    @elseif($group_status == 2)
    <span class="alert alert-danger p-2">incomplete</span>
    @endif
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hovered table-sm text-center text-nowrap" id="table1">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Group Number</th>
          <th>Student Name</th>
          <th>Registration #</th>
        </tr>
      </thead>
      <tbody>
        @if(count($group_data) > 0)
        @foreach($group_data as $student)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $student->group_id }}</td>
          <td>{{ strtoupper($student->fname) }} {{ strtoupper($student->mname) }} {{ strtoupper($student->lname) }}</td>
          <td>{{ $student->regno }}</td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="5" >No Data Found!</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
<script>
  $(function () {
  // Apply the plugin
  var table = $('#table1').rowMerge({
    excludedColumns: [3,4],
  });
});
</script>
@endsection

@extends('layout/coordinator-lay')
@section('space-work')
@if(Session::has('success'))
<div class="alert alert-success p-2">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
@endif
<div class="card">
  <div class="card-header">
    <input type="text" name="" id="search" class="mx-2 pull-right">
    <a href="/register/supervisors" class="btn btn-outline-success btn-sm pull-right">Add Supervisor</a>
    <a href="/import/supervisors" class="btn btn-outline-info btn-sm pull-right mx-2">Import</a>
    <a href="/export/supervisors" class="btn btn-outline-info btn-sm pull-right mx-2">Export</a>
  </div>
  <div class="card-body">
    <h5 class="card-title">Supervisors' Details <span>| {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-sm text-center">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Supervisor Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Registration Date</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody id="table">
          @if(count($supervisor_data) > 0)
          @foreach($supervisor_data as $supervisors)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ strtoupper($supervisors->firstname) }} {{ strtoupper($supervisors->middlename) }} {{ strtoupper($supervisors->lastname) }}</td>
            <td>{{ $supervisors->email }}</td>
            <td>{{ $supervisors->phone }}</td>
            <td>{{ $supervisors->created_at }}</td>
            <td> <a href="/edit/supervisor/{{ $supervisors->id}}" class="btn btn-info btn-sm">Edit</a> </td>
            <td> <a href="/delete/supervisor/{{ $supervisors->id}}/{{ $supervisors->email}}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure you want to delete {{ $supervisors->firstname}} ?')">Delete</a> </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="5" >No Data Found!</td>
          </tr>
          @endif
        </tbody>
      </table>
      {{$supervisor_data->onEachSide(1)->links()}}

    </div>
  </div>
</div>
<script>
$(document).ready(function() {

  $('#search').on("keyup", function(){
    var value = $(this).val().toLowerCase();
    $("#table tr").filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection

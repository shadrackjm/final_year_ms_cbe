@extends('layout/student-lay')
@section('space-work')
@if(Session::has('success'))
<div class="alert alert-success p-2"><i class="bi bi-check-circle me-1 mx-2"></i>{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2"><i class="bi bi-exclamation-octagon me-1 mx-2"></i>{{Session::get('fail')}}</div>
@endif
<div class="card">
  <div class="card-header">
    Project Proposal Details
    <a href="/proposal/upload/form" id="hide" class=" btn btn-outline-success btn-sm pull-right">upload Title<i class="bi bi-upload-fill"></i> </a>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hovered table-sm text-center">
      <thead>
        <tr>
          <th>Group Number</th>
          <th>Upload Date</th>
        </tr>
      </thead>
      <tbody>
        @if(count($proposal_data) > 0)
        @foreach($proposal_data as $proposal)
        <tr >
          <td>{{ $proposal->id }}</td>
          <td>{{ $proposal->created_at }}</td>

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

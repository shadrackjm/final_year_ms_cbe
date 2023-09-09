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
    Rejected Final Year Project Title
    <a href="/student/titles" class="btn btn-secondary btn-sm pull-right">back</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hovered table-sm text-center">
      <thead>
        <tr>
          <th>Group No.</th>
          <!-- <th>Group Members</th> -->
          <!-- <th>Registration Number</th> -->
          <th>Group Title</th>
          <th>Upload Date</th>
        </tr>
      </thead>
      <tbody>
        @if(count($rejected_data) > 0)
        @foreach($rejected_data as $detail)
        <tr >
          <td>{{ $detail->group_id}}</td>
          <!-- <td></td> -->
          <!-- <td></td> -->
          <td class="text-uppercase">{{ $detail->title }}</td>
          <td>{{ date("d-m-Y",strtotime($detail->created_at)) }}</td>
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

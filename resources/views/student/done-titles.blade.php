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
    Project Titles Records
  </div>
  <div class="card-body">
    <table class="table table-bordered table-hovered table-sm text-center">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Title</th>
          <th>Year</th>
        </tr>
      </thead>
      <tbody>
        @if(count($announcement) > 0)
        @foreach($announcement as $announcements)
        <tr >
          <td>{{ $loop->iteration }}</td>
          <td>{{ strtoupper($announcements->title) }}</td>
          <td>{{ date("Y",strtotime($announcements->created_at)) }}</td>

        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="4" >No Data Found!</td>
        </tr>
        @endif
      </tbody>
    </table>
    {{$announcement->onEachSide(1)->links()}}
  </div>
</div>

@endsection

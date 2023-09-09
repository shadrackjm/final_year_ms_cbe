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
    Project Title
    <a href="/title/upload/form" id="hide" class=" btn btn-outline-success btn-sm pull-right">upload Title<i class="bi bi-upload-fill"></i> </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">

      <table class="table table-bordered table-hovered table-sm text-center">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Group Title</th>
            <th>Upload Date</th>
            <th>status</th>
          </tr>
        </thead>
        <tbody>
          @if(count($details) > 0)
          @foreach($details as $detail)
          <tr >
            <td>{{ $detail->group_id }}</td>
            <td class="text-uppercase">{{ $detail->title }}</td>
            <td>{{ $detail->created_at }}</td>
            @if($detail->title_status == 0)
            <td title="Your Title is on process wait for the response." ><span class="badge bg-success">Request Sent</span> </div></td>
            @elseif($detail->title_status == 1)
            <td colspan="4"> <span class="badge bg-danger p-2">Rejected</span></td>
            <tr>
              <td><b>  Remarks</b></td>
              <td colspan="3"><i>" {{$detail->remarks ?? 'No any Remark'}}"</i></td>
            </tr>
            <tr>
              <td><b> Re-upload</b></td>
              <td class="text-danger">click the re-upload Title button to upload another correct and acceptable Project Title </td>
              <td colspan="3"><a href="/title/re-upload/form/{{$detail->id}}" class="btn btn-success btn-sm">Re-upload Title<i class="bi bi-upload-fill"></i> </a></td>
            </tr>
            @elseif($detail->title_status == 2)
            <td> <span class="badge bg-success">Accepted</span> </td>
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
</div>

@endsection

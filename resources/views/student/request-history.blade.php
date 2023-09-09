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
        Your Group & Request Information
        <a href="/project/groups" class="btn btn-outline-success btn-sm pull-right">back <i class=""></i> </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hovered table-sm text-center">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Request By</th>
                <th>Requested</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @if(count($request_data) > 0)
          @foreach($request_data as $group)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $group->req_name }}</td>
            <td>{{ $group->requested_name }}</td>
            @if($group->status == 0)
            <td> <a href="/confirm/request/{{ $group->id}}" class="btn btn-success btn-sm" title="confirm Your Request">Confirm <i class="bi bi-bag-check"></i> </a> </td>
            @endif
            @if($group->status == 1)
            <td colspan="2"><span class="alert alert-success p-2">confirmed</span> </td>
            @endif
            @if($group->status == 0)
            <td> <a href="/cancel/request/{{ $group->id}}" class="btn btn-danger btn-sm" title="Cancel Your Request">Cancel <i class="bi bi-x"></i> </a> </td>
            @endif
            @if($group->status == 1)
            <tr>
              <td colspan="4"><span style="text-decoration:underline;"><b> Group Information</span ></b></td>
            </tr>

            <tr>
              <td  colspan="2" style="text-transform:capitalize;"><b>{{$group->req_name}}</b></td>
              <td  colspan="2" style="text-transform:capitalize;"><b> {{$group->requested_name}}</b></td>
            </tr>
            <tr>
              <td  colspan="2"><b>{{$group->req_regno}}</b></td>
              <td  colspan="2" ><b> {{$group->requested_regno}}</b></td>
            </tr>
            <!-- <td> <a href="#" class="btn btn-danger btn-sm" title="Cancel Your Request" disabled="disabled">Cancel <i class="bi bi-x"></i> </a> </td> -->
            @endif
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
</div>
@endsection

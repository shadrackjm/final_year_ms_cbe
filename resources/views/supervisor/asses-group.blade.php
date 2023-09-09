@extends('layout/supervisor-lay')
@section('space-work')
<div class="card">
  <div class="card-header">
    Assess Groups
  </div>
  <div class="card-body">
    <div class="table-responsive">


      <table class="table table-bordered table-hovered table-sm text-center">
        <thead>
          <tr>
            <th>Group No.</th>
            <!-- <th>Group Members</th> -->
            <!-- <th>Registration Number</th> -->
            <th>Group Title</th>
            <th>Upload Date</th>
            <th>Title Remark</th>
            <th>Action</th>
            <th>Status</th>
            <th colspan="">Assess</th>
          </tr>
        </thead>
        <tbody>
          @if(count($group_data) > 0)
          @foreach($group_data as $detail)
          <tr >
            <td>{{ $detail->group_id}}</td>
            <!-- <td></td> -->
            <!-- <td></td> -->
            <td class="text-uppercase">{{ $detail->title }}</td>
            <td>{{ date("d-m-Y",strtotime($detail->created_at)) }}</td>
            <td>{{ $detail->remarks ?? '-' }}</td>
            <td><button type="button" class="btn btn-primary btn-sm viewButton" data-id="{{ $detail->id }}" data-title="{{ $detail->title }}" data-bs-toggle="modal" data-bs-target="#basicModal">View Group</button></td>
            @if($detail->title_status == 0)
            <td><button type="button" class="btn btn-warning btn-sm acceptButton " disabled>Pending..</button></td>
            @elseif($detail->title_status == 1)
            <td><button type="button" disabled class="btn btn-danger btn-sm">Rejected</button></td>
            @elseif($detail->title_status == 2)
            <td colspan="" ><button type="button" disabled class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="">Accepted</button></td>
            @endif
            @if($detail->title_status == 0)
            <td><button type="button" class="btn btn-warning btn-sm acceptButton " disabled>Pending..</button></td>
            @elseif($detail->title_status == 1)
            <td><button type="button" disabled class="btn btn-danger btn-sm">Rejected</button></td>
            @elseif($detail->title_status == 2)
            <td><a href="/assess/group/{{$detail->group_id}}" class="btn btn-success btn-sm">Assess</a> </td>
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
    {{$group_data->onEachSide(1)->links()}}

  </div>
</div>
<!-- Basic Modal -->
<div class="modal fade" id="basicModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Group Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table" id="table3">

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- End Basic Modal-->
<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(".viewButton").click(function(){
  var id = $(this).attr('data-id');
  var title = $(this).attr('data-title');

  var url = '{{ route("getGroupDetail","id") }}';
  url = url.replace('id',id);

  $.ajax({
    url:url,
    type:"GET",
    success:function(data){
      if(data.success == true){
        var group_data = data.data;
        // console.log(group_data);
        $('#table3').html('<thead><tr><th colspan="5" class="text-capitalize text-center">Group Title <b>: '+title+'<b></th><tr><th colspan="5" class="text-center">Group Number '+group_data[0].group_id+'</th></tr></tr><tr><th>Names</th><th>Reg #</th></tr></thead>');
        $.each(group_data, function(key,value){
          $('#table3').append('<tbody><tr><td class="text-capitalize">'+value.fname+' '+value.mname+' '+value.lname+'</td><td>'+value.regno+'</td></tr></tbody>');
        });
      }else{
        alert(data.msg);
      }
    }
  });
});
</script>
@endsection

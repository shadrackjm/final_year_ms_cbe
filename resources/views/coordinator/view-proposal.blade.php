@extends('layout/coordinator-lay')
@section('space-work')
@if(Session::has('success'))
<div class="alert alert-success p-2">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
@endif
<div class="card">
 
  <div class="card-body">
    <h5 class="card-title">Final Year Project Proposal Details <span>| {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
    <div class="table-responsive">

    <table class="table table-bordered table-hovered table-sm text-center">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Group Number</th>
          <th>Group Members</th>
          <th>Upload Date</th>
          <th>View</th>
          <!-- <th>Upload</th> -->
        </tr>
      </thead>
      <tbody>
        @if(count($proposal_data) > 0)
        @foreach($proposal_data as $proposal)
        <tr >
          <td>{{ $loop->iteration }}</td>
          <td>{{ $proposal->group_id }}</td>
          <td><button type="button" class="btn btn-primary btn-sm viewButton" data-id="{{ $proposal->group_id }}" data-title="{{ $proposal->title }}" data-bs-toggle="modal" data-bs-target="#basicModal">View Group</button></td>
          <td>{{ $proposal->created_at }}</td>

          <td><a href="/view/group/proposal/{{$proposal->id}}" class="btn btn-success btn-sm">view <i class="bi bi-check"></i></a> </td>
          <!-- <td><a href="/upload/group/proposal/{{$proposal->group_id}}" class="btn btn-primary btn-sm">view <i class="bi bi-upload"></i></a> </td> -->
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
  console.log(id);
  var url = '{{ route("MemberDetails","id") }}';
  url = url.replace('id',id);

  $.ajax({
    url:url,
    type:"GET",
    success:function(data){
      if(data.success == true){
        var group_data = data.data;
        // console.log(group_data);
        $('#table3').html('<thead><tr><th colspan="" class="text-center">Group Number '+group_data[0].group_id+'</th></tr></tr><tr><th>Names</th><th>Reg #</th></tr></thead>');
        $.each(group_data, function(key,value){
          $('#table3').append('<tbody><tr><td class="text-capitalize">'+value.fname+' '+value.mname+' '+value.lname+'</td><td>'+value.regno+'</td></tr></tbody>');
        });
      }else{
        alert(data.msg);
      }
    }
  });
});

// erro and success msg functions
function printErrorMsg(msg){
  $('#alert-danger').html('');
  $('#alert-danger').css('display','block');
  $('#alert-danger').append(''+msg+'');
}
function printSuccessMsg(msg){
  $('#alert-success').html('');
  $('#alert-success').css('display','block');
  $('#alert-success').append(''+msg+'');
  // document.getElementById('AssignSupervisor').close();
}
</script>
@endsection

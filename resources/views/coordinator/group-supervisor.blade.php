@extends('layout/coordinator-lay')
@section('space-work')
@if(Session::has('success'))
<div class="alert alert-success p-2">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
@endif
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
  </div>
  <div class="card-body">
    <h5 class="card-title">Final Year Project Group - Supervisors' Details <span>| {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
  <div class="table-responsive">
    <table class="table table-bordered table-hovered table-sm text-center">
      <thead>
        <tr>
          <th>Group Number</th>
          <th>Supervisor</th>
          <th>view Group Members</th>
          <th>Un-Assign</th>
        </tr>
      </thead>
      <tbody>
        @if(count($group_data) > 0)
        @foreach($group_data as $group)
        <tr >
          <td>{{ $group->group_id }}</td>
          <td>{{ $group->firstname }} {{ $group->middlename }} {{ $group->lastname }}</td>
          <td><button type="button" class="btn btn-primary btn-sm viewButton" data-id="{{ $group->group_id }}" data-bs-toggle="modal" data-bs-target="#basicModal">View Group</button></td>
          @if($group->group_id != null)
          <td><a href="/un-assign/supervisor/{{$group->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Un-assign?')" title="Un-Assign Supervisor">Un-Assign</a> </td>
          @elseif($group->group_id == null)
          <td><a href="/assign/supervisor/{{$group->id}}" class="btn btn-success btn-sm" title="Assign Supervisor">Assign</a> </td>
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
        $('#table3').html('<thead><th colspan="5" class="text-center">Group Number: '+group_data.group_id+'</th></tr></tr><tr><th>Names</th><th>Reg #</th></tr></thead>');
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

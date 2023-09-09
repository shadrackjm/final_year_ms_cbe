@extends('layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    <input type="text" name="" id="search" class="mx-2 pull-right">
  </div>
  <div class="card-body">
    <h5 class="card-title">Final Year Project Title Details <span>| {{ date('Y') - 1}}/{{date('Y')}}</span></h5>

    <div class="table-responsive">

      <table class="table table-bordered table-hovered table-sm text-center text-nowrap">
        <thead>
          <tr>
            <th>Group No.</th>
            <th>Group Title</th>
            <th>Upload Date</th>
            <th>Title Remark</th>
            <th colspan="5">Action</th>
          </tr>
        </thead>
        <tbody id="table">
          @if(count($details) > 0)
          @foreach($details as $detail)
          <tr >
            <td>{{ $detail->group_id}}</td>
            <td class="text-uppercase">{{ $detail->title }}</td>
            <td>{{ date("d-m-Y H:i:s A",strtotime($detail->created_at)) }}</td>
            <td>{{ $detail->remarks ?? '-' }}</td>
            <td><button type="button" class="btn btn-primary btn-sm viewButton" data-id="{{ $detail->group_id }}" data-title="{{ $detail->title }}" data-bs-toggle="modal" data-bs-target="#basicModal">View Group</button></td>
            @if($detail->title_status == 0)
            <td><button type="button" class="btn btn-success btn-sm acceptButton" data-id="{{ $detail->id }}" data-title="{{ $detail->title }}" data-bs-toggle="modal" data-bs-target="#basicAcceptModal">Accept</button></td>
            @elseif($detail->title_status == 1)
            <!-- <td><button type="button" disabled class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="">Accepted</button></td> -->
            @elseif($detail->title_status == 2)
            <td colspan="2" ><button type="button" disabled class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="">Accepted</button></td>
            @endif
            @if($detail->title_status == 0)
            <td><button type="button" class="btn btn-danger btn-sm rejectButton" data-id="{{ $detail->id }}" data-title="{{ $detail->title }}" data-group_id="{{ $detail->group_id }}" data-bs-toggle="modal" data-bs-target="#basicRejectModal">Reject</button></td>
            @elseif($detail->title_status == 1)
            <td colspan="2" ><button type="button" disabled class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="">Rejected</button></td>
            @elseif($detail->title_status == 2)
            <!-- <td><button type="button" disabled class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="">Rejected</button></td> -->
            @endif
            <td ><a href="/rejected/title/{{$detail->group_id}}" class="btn btn-warning btn-sm">trash</a> </td>
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
    {{$details->onEachSide(1)->links()}}

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
        $('#table3').html('<thead><tr><th colspan="5" class="text-capitalize text-center">Group Title <b>: '+title+'<b></th><tr><th colspan="5" class="text-center text-capitalize">Level of Study : '+group_data[0].level+' - Group Number '+group_data[0].group_id+'</th></tr></tr><tr><th>Names</th><th>Reg #</th></tr></thead>');
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
<!-- Basic Accept Modal -->

<div class="modal fade" id="basicAcceptModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Group Title Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 id="title"></h3>
        <form id="AcceptForm">
          @csrf
          <input type="hidden" name="title_id" value="" id="title_id">
          <label for="">Add Title Remark</label>
          <input type="text" name="remark" class="form-control" id="title_remark">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success acceptBTN"><i class="bi bi-save"></i> Accept</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Accept Modal-->
<!-- Basic Reject Modal -->

<div class="modal fade" id="basicRejectModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Title Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3 id="rejecttitle"></h3>
        <p class="text-danger">Are You Sure You Want to reject TItle?</p>

        <form id="RejectForm">
          @csrf
          <input type="hidden" name="title_id" value="" id="reject_id">
          <input type="hidden" name="rejected_title" value="" id="rejected_title">
          <input type="hidden" name="group_id" value="" id="group_id">
          <label for="">Add Title Remark</label>
          <input type="text" name="reject_remark" class="form-control" id="title_remark">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger rejectBtn"><i class="bi bi-save"></i> Reject</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div><!-- End Basic Reject Modal-->
<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
//accept button
$(".acceptButton").click(function(){
  var id = $(this).attr('data-id');
  var title = $(this).attr('data-title');
  $("#title").text(title);
  $("#title_id").val(id);
});
//accept
$("#AcceptForm").submit(function(e){

  e.preventDefault();

  var formData = $(this).serialize();
  console.log(formData);

  $.ajax({
    url:'{{ route("AcceptTitle") }}',
    data:formData,
    type:"GET",
    contentType: false,
    processData:false,
    beforeSend:function(){
      $('.acceptBTN').prop('disabled', true);
      $('.acceptBTN').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Processing..</span></div>');
    },
    complete:function(){
      $('.acceptBTN').prop('disabled', false);
      $('.acceptBTN').html('Accept <i class="bi bi-save"></i>');
    },
    success:function(data){
      if(data.success == true){
        location.reload();
      }else if(data.success == false){
        console.log(data.msg);
        location.reload();
        printErrorMsg(data.msg);
      }
    },
  });
});
//reject button
$(".rejectButton").click(function(){
  var id = $(this).attr('data-id');
  var title = $(this).attr('data-title');
  var group_id = $(this).attr('data-group_id');
  $("#rejecttitle").text(title);
  $("#reject_id").val(id);
  $("#rejected_title").val(title);
  $("#group_id").val(group_id);
});
// reject functionality
$("#RejectForm").submit(function(e){

  e.preventDefault();

  var formData = $(this).serialize();
  console.log(formData);

  $.ajax({
    url:'{{ route("RejectTitle") }}',
    data:formData,
    type:"GET",
    contentType: false,
    processData:false,
    beforeSend:function(){
      $('.rejectBtn').prop('disabled', true);
      $('.rejectBtn').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Processing..</span></div>');
    },
    complete:function(){
      $('.rejectBtn').prop('disabled', false);
      $('.rejectBtn').html('Reject <i class="bi bi-save"></i>');
    },
    success:function(data){
      if(data.success == true){
        $(".modal").modal('hide');
        location.reload();

      }else if(data.success == false){
        // console.log(data.msg);
        printErrorMsg(data.msg);
      }
    },
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

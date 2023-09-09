@extends('layout/student-lay')
@section('space-work')
<span class="alert alert-danger text-capitalize"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success text-capitalize" id="alert-success" style="display:none;"></span>
@if(Session::has('success'))
<div class="alert alert-success p-2 text-capitalize"><i class="bi bi-check-circle me-1 mx-2"></i>{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2 text-center text-capitalize"><i class="bi bi-exclamation-octagon me-1 mx-2"></i>{{Session::get('fail')}}</div>
@endif
<div class="card">
  <div class="card-header">
    My Group Details
	<button class="btn btn-primary btn-sm pull-right mx-2" data-bs-toggle="modal" data-bs-target="#NewGroupModal">Create New <i class="bi bi-person-plus-fill"></i> </button>
	<a href="/project/groups" class="btn btn-outline-primary btn-sm pull-right mx-2">My Group <i class="bi bi-people-fill"></i> </a>
	<a href="/my/request" class="btn btn-outline-success btn-sm pull-right mx-2">My Request <i class="bi bi-person-plus-fill"></i> </a>
    <small class="pull-right text-danger">(Group Size Fixed to {{$group_size->group_size ?? '-'}} Members Only)</small>
  </div>
  <div class="card-body">
    <div class="table-responsive">

    <table class="table table-bordered text-center table-sm text-nowrap" class="table">
      <thead>
        <tr>
			<th>S/N</th>
			<th>Group Number</th>
			<th>Student Name</th>
			<th>Registration #</th>
			<th>Request Group</th>
        </tr>
      </thead>
      <tbody>
        @if(count($student_list) > 0)
        @foreach($student_list as $student)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $student->group_id }}</td>
          <td class="">{{ strtoupper($student->fname) }} {{ strtoupper($student->mname) }} {{ strtoupper($student->lname) }}</td>
          <td>{{ $student->regno }}</td>
          @if($student->has_group == 1)
		      <td><button disabled class="btn btn-success btn-sm requestbtn" data-bs-toggle="modal" data-bs-target="#requestModal">Joined <i class="bi bi-person-check-fill"></i> </button></td>
          @elseif($student->has_group == 2)
		      <td><button class="btn btn-info btn-sm requestbtn" data-id="{{ $student->group_id }}" data-student="{{$student->id}}" data-bs-toggle="modal" data-bs-target="#">Joined <i class="bi bi-person-plus-fill"></i> </button></td>
          @elseif($student->has_group == 10)
		      <td><button class="btn btn-primary btn-sm requestbtn" data-id="{{ $student->group_id }}" data-student="{{$student->id}}" data-bs-toggle="modal" data-bs-target="#requestModal">Request <i class="bi bi-person-plus-fill"></i> </button></td>
          @elseif($student->has_group == 5)
		      <td><button diasbled class="btn btn-info btn-sm ">Group Creator <i class="bi bi-person-plus-fill"></i> </button></td>
          @elseif($student->has_group == 3)
		      <td><button diasbled class="btn btn-warning btn-sm ">Requested <i class="bi bi-person-plus-fill"></i> </button></td>
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
    {{$student_list->onEachSide(1)->links()}}

  </div>
</div>
<!-- Basic Modal -->
<div class="modal fade" id="requestModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Request Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="requestForm">
          @csrf
          <input type="hidden" name="request_id" id="accept_id">
          <input type="hidden" name="group_id" id="group_id">
          <input type="hidden" name="student_requested_id" id="student_requested_id">
          <p class="acceptReview my-2 text-center text-capitalize"></p>
          <hr>
		  
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success request">Send Request <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->
<!-- Basic Modal -->
<div class="modal fade" id="NewGroupModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Create New Group</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="newGroupForm">
          @csrf
		   <small class="text-danger text-center">(You can only create one group at a time!)</small>
			<div class="form-group my-2">
				<select name="group_id" id="" class="form-select">
					<option value="">Choose group Number</option>
					@foreach($group_list as $data)
						<option value="{{$data->g_id}}">{{$data->g_id}}</option>
					@endforeach
				</select>
				<span class="text-danger" id="group_id_error"></span>
			</div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success request"> Create <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->

<script>
    // Use the plugin once the DOM has been loaded.
$(document).ready(function(){
  $('.requestbtn').click(function(){
    
			var id = $(this).attr('data-id');
			var student_id = $(this).attr('data-student');
    //   console.log(id);
			$('#student_requested_id').val(student_id);
			$('#group_id').val(id);
				var url = '{{ route("getMemberDetails","id") }}';
					url = url.replace('id',id);

           $.ajax({
               url:url,
               type:"GET",
               success:function(data){
                   if(data.success == true){
                       var request_data = data.data;
                       var check = data.check;
                       if(request_data.length == check){
                        $('.request').hide();
                        $('.acceptReview').html('<b class="text-danger">Group Number '+request_data[0].group_id+' Already Reached The maximum number of Group members<b><hr>');
                       }else{
                          console.log(request_data);
                            $('.acceptReview').html('<b>Group Number '+request_data[0].group_id+' Member Details<b><hr>');
                            $('.request').show();

                          $.each(request_data,function(key,value){
                            $('.acceptReview').append('<p>'+value.fname+' '+value.mname+' '+value.lname+'<p>');
                          });
                       }
					   
                   }else{
                       alert(data.msg);
                   }
               }
           });
});

//submit request
$('#requestForm').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
          // console.log(formData);
          $.ajax({
            url:"{{ route('RequestGroup') }}",
            type:"POST",
            data: formData,
            contentType: false,
            processData:false,
            beforeSend:function(){
              $('.save').prop('disabled', true);
              $('.save').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Processing..</span></div>');
            },
            complete:function(){
              $('.save').prop('disabled', false);
              $('.save').html('save <i class="bi bi-upload"></i>');

            },
            success:function(data){
              if(data.success == true){
                console.log(data);
                printSuccessMsg(data.msg);
				        $("#requestModal").modal('hide');
                // setTimeout(() => {
                //   location.reload();
                // }, 3000);
              }else if(data.success == false){
                console.log(data.msg);
                printErrorMsg(data.msg);
				        $("#requestModal").modal('hide');

              }else{
                console.log(data);
                printValidationErrorMsg(data.msg);
              }
            },
          });
          return false;
        });

		  // create new group
$('#newGroupForm').submit(function(e){
          e.preventDefault();
		  var formData = $(this).serialize();
            console.log(formData);
          $.ajax({
            url:"{{ route('CreateNewGroup') }}",
            type:"GET",
            data: formData,
            contentType: false,
            processData:false,
            beforeSend:function(){
              $('.request').prop('disabled', true);
              $('.request').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Processing..</span></div>');
            },
            complete:function(){
              $('.request').prop('disabled', false);
              $('.request').html('create <i class="bi bi-upload"></i>');

            },
            success:function(data){
              if(data.success == true){
                console.log(data);
                printSuccessMsg(data.msg);
				$("#NewGroupModal").modal('hide');
              }else if(data.success == false){
                // console.log(data.msg);
                printErrorMsg(data.msg);
				$("#NewGroupModal").modal('hide');
              }else{
                console.log(data);
                printValidationErrorMsg(data.msg);
              }
            },
          });
          return false;
        });
		function printValidationErrorMsg(msg){
            $.each(msg, function(field_name, error){
            //   console.log(field_name,error);
              $(document).find('#'+field_name+'_error').text(error);
            });
          }
          function printErrorMsg(msg){
            $('#alert-success').html('');
            $('#alert-success').css('display','none');
            $('#alert-danger').html('<i class="bi bi-exclamation-octagon me-1 mx-2"></i>');
            $('#alert-danger').css('display','block');
            $('#alert-danger').append(''+msg+'');
           
          }
          function printSuccessMsg(msg){
            $('#alert-danger').html('');
            $('#alert-danger').css('display','none');
            $('#alert-success').html('<i class="bi bi-check-circle me-1 mx-2"></i>');
            $('#alert-success').css('display','block');
            $('#alert-success').append(''+msg+'');
            document.getElementById('newGroupForm').reset();
          }
});

</script>
@endsection

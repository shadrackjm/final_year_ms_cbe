@extends('layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
   
   <button class="btn btn-success btn-sm pull-right addButton"  data-bs-toggle="modal" data-bs-target="#addModal" id="addbtn">Add New <i class="bi bi-people-fill"></i> </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    <h5 class="card-title">Group Size Management<span> </span></h5>
      <table class="table table-bordered table-sm text-center text-nowrap" id="table1">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Group Size</th>
            <th>Academic Year</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($group_size) > 0)
          @foreach($group_size as $group)
          <tr >
            <td >{{ $loop->iteration }}</td>
            <td >{{ $group->group_size }}</td>
            <td>{{ date("Y",strtotime($group->created_at))-1 }}/{{ date("Y",strtotime($group->created_at)) }}</td>
            <td><button class="btn btn-primary btn-sm editButton" data-id="{{$group->id}}" data-size="{{$group->group_size}}" data-bs-toggle="modal" data-bs-target="#editModal" id="addbtn">Edit </button></td>
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
    {{$group_size->onEachSide(1)->links()}}
  </div>
</div>
<!-- Basic Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Group Size Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="AddForm">
          @csrf
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Group Size</label>
            <input type="number" name="group_size" class="form-control">
            <span class="text-danger" id="group_size_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success register">Add <i class="bi bi-save"></i> </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->
<!-- Basic Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Group Size Edit Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="EditForm">
          @csrf
          <!-- prevent cross site request forgery -->
          <div class="form-group my-2">
            <label for="">Group Size</label>
            <input type="number" name="group_size_edit" class="form-control g_size" >
            <input type="hidden" name="id" class="form-control id" >
            <span class="text-danger" id="group_size_edit_error"></span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="button" class="btn btn-success register">Update  </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div><!-- End Basic Modal-->

<script>
    $("#AddForm").submit(function(e){

e.preventDefault();

var formData = $(this).serialize();

$.ajax({
  url:"{{ route('RegisterGroupSize') }}",
  data:formData,
  type:"GET",
  contentType: false,
  processData:false,
  beforeSend:function(){
    $('.register').prop('disabled', true);
    $('.register').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
  },
  complete:function(){
    $('.register').prop('disabled', false);
    $('.register').html('Register <i class="bi bi-save"></i>');
  },
  success:function(data){
    if(data.success == true){
      // console.log(data.msg);
      $("#addModal").modal('hide');
      location.reload();
      printSuccessMsg(data.msg);

    }else if(data.success == false){
    //   console.log(data.msg);
      $("#addModal").modal('hide');
      // location.reload();
      printErrorMsg(data.msg);
    }else{
      // console.log(data);
      printValidationErrorMsg(data.msg);
    }
  },
});
});

// edit 
$(".editButton").on('click',function(){
    var group_size = $(this).attr('data-size');
    var id = $(this).attr('data-id');
    $('.g_size').val(group_size);
    $('.id').val(id);
});

// submit edit form
$("#EditForm").submit(function(e){

e.preventDefault();

var formData = $(this).serialize();

$.ajax({
  url:"{{ route('RegisterGroupSize') }}",
  data:formData,
  type:"GET",
  contentType: false,
  processData:false,
  beforeSend:function(){
    $('.register').prop('disabled', true);
    $('.register').html('<div class="spinner-border text-light" role="status"><span class="sr-only"></span></div>');
  },
  complete:function(){
    $('.register').prop('disabled', false);
    $('.register').html('Register <i class="bi bi-save"></i>');
  },
  success:function(data){
    if(data.success == true){
      // console.log(data.msg);
      $("#editModal").modal('hide');
    setTimeout(function() {
        location.reload();
    }, 2000);
    printSuccessMsg(data.msg);

    }else if(data.success == false){
      $("#editModal").modal('hide');
      printErrorMsg(data.msg);
    }else{
      // console.log(data);
      printValidationErrorMsg(data.msg);
    }
  },
});
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
        }

        
</script>
@endsection

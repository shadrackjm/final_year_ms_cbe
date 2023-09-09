@extends('Layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    Edit Supervisor Details
    <a href="/coordinator/manage/supervisors" class="btn btn-outline-success btn-sm pull-right">manage supervisor</a>
  </div>

  <div class="card-body">

    <form id="editSupervisor">
      @csrf
      <input type="hidden" name="supervisor_id" value="{{$supervisor_data->id}}">
      <input type="hidden" name="old_email" value="{{$supervisor_data->email}}">
      <div class="form-group my-2">
        <label for="">First Name</label>
        <input type="text" name="fName" value="{{ $supervisor_data->firstname}}" class="form-control">
        <span class="text-danger" id="fname_error"></span>

      </div>
      <div class="form-group my-2">
        <label for="">Middle Name</label>
        <input type="text" name="mName" value="{{ $supervisor_data->middlename}}" class="form-control">
        <span class="text-danger" id="Mname_error"></span>

      </div>
      <div class="form-group my-2">
        <label for="">Last Name</label>
        <input type="text" name="lName" value="{{ $supervisor_data->lastname}}" class="form-control">
        <span class="text-danger" id="lname_error"></span>

      </div>
      <div class="form-group my-2">
        <label for="">Email</label>
        <input type="email" name="email" value="{{ $supervisor_data->email}}" class="form-control">
        <span class="text-danger" id="email_error"></span>

      </div>
      <div class="form-group my-2">
        <label for="">Phone</label>
        <input type="number" name="phone" value="{{ $supervisor_data->phone}}" class="form-control">
        <span class="text-danger" id="phone_error"></span>

      </div>
      <div class="form-group my-2">
        <input type="submit" name="submit" value="Edit" class="btn btn-success btn-sm edit">
        <input type="reset" name="reset" value="Reset" class="btn btn-danger btn-sm">
      </div>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#editSupervisor').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    console.log(formData);
    $.ajax({
      url:"{{ route('EditSupervisor') }}",
      type:"POST",
      data: formData,
      contentType: false,
      processData:false,
      beforeSend:function(){
        $('.edit').prop('disabled', true);
        $('.edit').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Processing..</span></div>');
      },
      complete:function(){
        $('.edit').prop('disabled', false);
        $('.edit').html('edit <i class="bi bi-edit"></i>');

      },
      success:function(data){
        if(data.success == true){

          printSuccessMsg(data.msg);
          // window.location.href = "{{ url('/arrival/note/') }}";
        }else if(data.success == false){
          // console.log(data.msg);
          printErrorMsg(data.msg);
        }else{
          console.log(data);
          printValidationErrorMsg(data.msg);
        }
      },
    });
    return false;
    function printValidationErrorMsg(msg){
      $.each(msg, function(field_name, error){
        console.log(field_name,error);
        $(document).find('#'+field_name+'_error').text(error);
      });
    }
    function printErrorMsg(msg){
      $('#alert-danger').html('');
      $('#alert-danger').css('display','block');
      $('#alert-danger').append(''+msg+'');
    }
    function printSuccessMsg(msg){
      $('#alert-success').html('');
      $('#alert-success').css('display','block');
      $('#alert-success').append(''+msg+'');
    }
  });
});
</script>
@endsection

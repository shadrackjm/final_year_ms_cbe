@extends('layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    Supervisors' Details
    <a href="/coordinator/manage/supervisors" class="btn btn-outline-success btn-sm pull-right">Back</a>
  </div>
  <div class="card-body">
    <form id="addSupervisor">
      @csrf
      <div class="form-group my-3">
        <label for="">First Name</label>
        <input type="text" name="fName"  class="form-control">
        <span class="text-danger" id="fName_error"></span>
      </div>

      <div class="form-group my-3">
        <label for="">Middle Name</label>
        <input type="text" name="Mname"  class="form-control">
        <span class="text-danger" id="Mname_error"></span>
      </div>

      <div class="form-group my-3">
        <label for="">Last Name</label>
        <input type="text" name="lName"  class="form-control">
        <span class="text-danger" id="lName_error"></span>
      </div>
      <div class="form-group my-3">
        <label for="">Email</label>
        <input type="text" name="email"  class="form-control">
        <span class="text-danger" id="email_error"></span>
      </div>
      <div class="form-group my-3">
        <label for="">Phone Number</label>
        <input type="text" name="phone_number" id="phone" class="form-control">
        <span class="text-danger" id="phone_number_error"></span>
      </div>
      <span class="alert alert-danger" id="alert-danger" style="display:none;"></span>
      <button type="submit" name="submit" class="btn btn-success btn-sm register"><i class="bi bi-save"></i> Register</button>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#addSupervisor').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    console.log(formData);
    $.ajax({
      url:"{{ route('RegisterSupervisor') }}",
      type:"POST",
      data: formData,
      contentType: false,
      processData:false,
      beforeSend:function(){
        $('.register').prop('disabled', true);
        $('.register').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Processing..</span></div>');
      },
      complete:function(){
        $('.register').prop('disabled', false);
        $('.register').html('register <i class="bi bi-save"></i>');

      },
      success:function(data){
        if(data.success == true){

          printSuccessMsg(data.msg);
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
      document.getElementById('addSupervisor').reset();
    }
  });
});
</script>
@endsection

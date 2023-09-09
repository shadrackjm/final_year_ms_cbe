@extends('Layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    Edit Student Details
    <a href="/coordinator/manage/students" class="btn btn-outline-success btn-sm pull-right">manage students</a>
  </div>

  <div class="card-body">

    <form id="editStudent">
      @csrf
      <input type="hidden" name="student_id" value="{{$student_data->id}}">
      <input type="hidden" name="old_regno" value="{{$student_data->regno}}">
      <div class="form-group my-2">
        <label for="">Registration #</label>
        <input type="text" name="regno" value="{{ $student_data->regno}}" class="form-control">
        <span class="text-danger" id="regno_error"></span>

      </div>
      <div class="form-group my-2">
        <label for="">First Name</label>
        <input type="text" name="fName" value="{{ $student_data->fname}}" class="form-control">
        <span class="text-danger" id="fName_error"></span>

      </div>
      <div class="form-group my-2">
        <label for="">Middle Name</label>
        <input type="text" name="mName" value="{{ $student_data->mname}}" class="form-control">
        <span class="text-danger" id="mName_error"></span>

      </div>
      <div class="form-group my-2">
        <label for="">Last Name</label>
        <input type="text" name="lName" value="{{ $student_data->lname}}" class="form-control">
        <span class="text-danger" id="lName_error"></span>

      </div>
      <div class="form-group my-2">
        <label for="">Email</label>
        <input type="email" name="email" value="{{ $student_data->email}}" class="form-control">
        <span class="text-danger" id="lName_error"></span>
      </div>
      <div class="form-group my-2">
        <label for="">Phone</label>
        <input type="number" name="phone" value="{{ $student_data->phone}}" class="form-control">
        <span class="text-danger" id="phone_error"></span>
      </div>
        <div class="form-group my-3">
        <label for="">Level of Study</label>
        <select class="form-select" name="level">
          <option value="{{ $student_data->level}}">{{ $student_data->level}}</option>
          <option value="diploma">Diploma</option>
          <option value="bachelor">Bachelor</option>
        </select>
        <span class="text-danger" id="level_error"></span>
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
  $('#editStudent').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    console.log(formData);
    $.ajax({
      url:"{{ route('EditStudent') }}",
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
          window.location.href = "{{ url('/coordinator/manage/students') }}";
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

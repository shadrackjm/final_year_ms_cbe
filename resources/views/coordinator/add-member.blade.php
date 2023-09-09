@extends('layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    Create  / Add Group Member to a Group
    <a href="/group/detail" class="btn btn-outline-success btn-sm pull-right">Back</a>
  </div>
  <div class="card-body">
    <form id="AddMember">
      @csrf
      <div class="form-group my-3">
        <label for="">Choose Student</label>
        <select class="form-select" name="regno">
          <option value="" >Choose Student</option>
          @foreach($student_data as $group)
          <option value="{{$group->regno}}" class="text-capitalize">{{$group->regno}} | {{$group->fname}} {{$group->lname}}</option>
          @endforeach
        </select>
        <span class="text-danger" id="regno_error"></span>

      </div>
      <div class="form-group my-3">
        <label for="">Group Number</label>
        <select class="form-select" name="group_id">
          <option value="" disabled selected>Choose Group Number</option>
          @foreach($group_data as $group)
          <option value="{{$group->g_id}}" class="text-capitalize">{{$group->g_id}}</option>
          @endforeach
        </select>
        <span class="text-danger" id="group_id_error"></span>
      </div>
      <button type="submit" name="submit" class="btn btn-success btn-sm upload"><i class="bi bi-plus"></i> Add</button>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#AddMember').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    // console.log(formData);
    $.ajax({
      url:"{{ route('AddMember') }}",
      type:"POST",
      data: formData,
      contentType: false,
      processData:false,
      beforeSend:function(){
        $('.upload').prop('disabled', true);
        $('.upload').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Processing..</span></div>');
      },
      complete:function(){
        $('.upload').prop('disabled', false);
        $('.upload').html('upload <i class="bi bi-upload"></i>');

      },
      success:function(data){
        if(data.success == true){

          printSuccessMsg(data.msg);
        }else if(data.success == false){
          console.log(data.msg);
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
      document.getElementById('AddMember').reset();
    }
  });
});
</script>
@endsection

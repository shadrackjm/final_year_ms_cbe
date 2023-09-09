@extends('layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    Assign Group to Supervisor
    <a href="/group/detail" class="btn btn-outline-success btn-sm pull-right">Back</a>
  </div>
  <div class="card-body">
    <form id="AssignSupervisor">
      @csrf
      <div class="form-group my-3">
        <label for="">Group Number</label>
        <select class="form-select" name="group_id">
          <option value="" disabled selected>Choose Group Number</option>
          @foreach($group_data as $group)
          <option value="{{$group->group_id}}" class="text-capitalize">{{$group->group_id}}</option>
          @endforeach
        </select>
        <span class="text-danger" id="group_id_error"></span>
      </div>
      <div class="form-group my-3">
        <label for="">Supervisor</label>
        <select class="form-select" name="supervisor_id">
          <option value="" disabled selected>Choose Supervisor</option>
          @foreach($supervisors as $supervisor)
          <option value="{{$supervisor->id}}" class="text-capitalize">{{$supervisor->firstname}} {{$supervisor->middlename}} {{$supervisor->lastname}}</option>
          @endforeach
        </select>
        <span class="text-danger" id="supervisor_id_error"></span>
      </div>
      <button type="submit" name="submit" class="btn btn-success btn-sm upload"><i class="bi bi-check"></i> Assign</button>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#AssignSupervisor').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    // console.log(formData);
    $.ajax({
      url:"{{ route('AssignSupervisor') }}",
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
      $('#alert-danger').html('');
      $('#alert-danger').css('display','block');
      $('#alert-danger').append(''+msg+'');
    }
    function printSuccessMsg(msg){
      $('#alert-success').html('');
      $('#alert-success').css('display','block');
      $('#alert-success').append(''+msg+'');
      document.getElementById('AssignSupervisor').reset();
    }
  });
});
</script>
@endsection

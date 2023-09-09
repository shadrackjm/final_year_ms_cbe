@extends('layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    Title Remark
    <a href="/student/titles" class="btn btn-outline-success btn-sm pull-right">Back</a>
  </div>
  <div class="card-body">
    <form id="AddRemark">
      @csrf
      <input type="hidden" name="title_id" value="{{$title_data->id}}">
      <div class="form-group my-3">
        <label for="">Title Name</label>
        <input type="text" name="name"  class="form-control" value="{{$title_data->title}}" readonly>
        <span class="text-danger" id="name_error"></span>
      </div>
      <div class="form-group my-3">
        <label for="">Remark</label>
        <input type="text" name="remark"  class="form-control">
        <span class="text-danger" id="remark_error"></span>
      </div>
      <button type="submit" name="submit" class="btn btn-success btn-sm upload"><i class="bi bi-upload"></i> Add Remark</button>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#AddRemark').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    console.log(formData);
    $.ajax({
      url:"{{ route('AddRemark') }}",
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
      document.getElementById('AddRemark').reset();
    }
  });
});
</script>
@endsection

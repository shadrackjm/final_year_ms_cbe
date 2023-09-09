@extends('layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    Edit Announcements
    <a href="/manage/announcement" class="btn btn-secondary btn-sm pull-right">manage announcement</a>
  </div>
  <div class="card-body">
    <form id="editAnnouncement">
      @csrf
      <input type="hidden" name="announce_id" value="{{$announcement_data->id}}">
      <div class="form-group my-3">
        <label for="">Announcement To</label>
        <select class="form-select" name="to">
          <option value="{{$announcement_data->level}}" selected>{{$announcement_data->level}}</option>
          <option value="diploma">Diplomas</option>
          <option value="bachelor">Bachelors</option>
          <option value="supervisor">Supervisors</option>
        </select>
        <span class="text-danger" id="to_error"></span>
      </div>
      <div class="form-group my-3">
        <label for="">Title</label>
        <input type="text" name="title" value="{{$announcement_data->title}}" class="form-control">
        <span class="text-danger" id="title_error"></span>
      </div>
      <div class="form-group my-3">
        <label for="">Body</label>
        <input type="text" name="body" value="{{$announcement_data->body}}" class="form-control">
      </div>
    </div>
    <span class="text-danger" id="body_error"></span>
    <button type="submit" name="submit" class="btn btn-success btn-sm upload"><i class="bi bi-eyedropper"></i> Edit</button>
  </form>
</div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#editAnnouncement').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    // console.log(body);
    $.ajax({
      url:"{{ route('editAnnouncement')}}",
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
      document.getElementById('editAnnouncement').reset();
    }
  });
});
</script>
@endsection

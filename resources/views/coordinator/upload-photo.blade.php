@extends('Layout/coordinator-lay')
@section('space-work')
<div class="card">
  <div class="card-header">
    Upload Profile pcture
  </div>
  <div class="card-body ">
    <form id="upload-photo" enctype="multipart/form-data">
      <div class="form-group my-2">
        <label for="">photo</label>
        <input type="file" name="photo" value="" class="form-control" id="photo">
        <span class="text-danger" id="photo_error"></span>
      </div>
      <button type="submit" name="submit" value="upload" class="btn btn-success btn-sm upload" id="">Upload <i class="fa fa-upload"></i> </button>
      <span class="alert alert-danger" style="display:none" id="alert-danger"></span>
      <span class="alert alert-success" style="display:none" id="alert-success"></span>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#upload-photo').submit(function(e){
    e.preventDefault();
    var formData = $('#photo').val();
    // let formData = new FormData(this);
    console.log(formData);
    $.ajax({
      url:"{{ route('uploadPhoto') }}",
      type:"POST",
      data: formData,
      contentType: false,
      processData:false,
      beforeSend:function(){
        $('.upload').prop('disabled', true);
        $('.upload').html('<i class="fa fa-spinner fa-spin fa-fw btn-icon"></i> Processing..');
      },
      complete:function(){
        $('.upload').prop('disabled', false);
        $('.upload').html('upload <i class="fa fa-upload"></i>');

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
          printValidationErrorMsg(msg);
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

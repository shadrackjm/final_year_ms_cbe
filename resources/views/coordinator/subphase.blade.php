@extends('layout/coordinator-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>
<div class="card">
  <div class="card-header">
    Add Project Sub-Phase
  </div>
  <div class="card-body">
    <form id="AddSubPhase">
      @csrf
      <div class="form-group my-2">
        <label for="">Phase Name</label>
        <select class="form-control" name="phase_id">
          <option value="">Choose Phase</option>
          @foreach($phase_data as $phases)
          <option value="{{ $phases->id }}">{{ $phases->phase_name }}</option>
          @endforeach
        </select>
        <span class="text-danger" id="phase_id_error"></span>
      </div>
      <div class="form-group my-2">
        <label for="">Sub Phase Name</label>
        <input type="text" name="subphase" placeholder="Enter Phase Name" class="form-control">
        <span class="text-danger" id="subphase_error"></span>
      </div>
      <button type="submit" name="button" class="btn btn-success btn-sm save"><i class="bi bi-save"></i> Save</button>
    </form>
  </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#AddSubPhase').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    // console.log(formData);
    $.ajax({
      url:"{{ route('AddSubPhase') }}",
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
        $('.save').html('save <i class="bi bi-save"></i>');

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
      document.getElementById('AddSubPhase').reset();
    }
  });
});
</script>
@endsection

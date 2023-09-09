$(document).ready(function(){
  $.ajaxSetup({
    headers: {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
  $(function () {
    var table = $('#tab2').rowMerge({
      excludedColumns: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    });
    var table = $('#tab1').rowMerge({
      excludedColumns: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    });
    var table = $('#tab3').rowMerge({
      excludedColumns: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
    });
  });


  $('#phase_id').on('change',function(){
    var phase_id = $(this).val();
    // console.log(phase_id);
    $.ajax({
      url:"{{ route('GetSubphase') }}",
      type:'GET',
      data: {id:phase_id},
      dataType:'json',
      success:function(res){
        $('#subphase_id').html('<option value="">Choose Sub phase</option>');
        $.each(res, function(key,value){
          // console.log(res);
          $('#subphase_id').append('<option value="'+value.id+'">'+value.subphase_name+'</option>');
        });
      }
    });
  });

  //  chosen form
  $("#form1").hide();
  $("#form2").hide();
  $("#form3").hide();
  $("#form4").hide();
  $("#form5").hide();
  $("#form6").hide();
  $("#form7").hide();
  $("#form8").hide();

  $("#subphase_id").on('change',function(){
      var value = $("#subphase_id").val();

      if(value == 3){
        $("#form1").show();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").hide();
        $("#form6").hide();
        $("#form7").hide();
        $("#form8").hide();
        //submit the form

        $('#form1').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
          console.log(formData);
                   $.ajax({
                 url:"{{ route('Phase1Subphase1') }}",
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
                     $('.save').html('save <i class="bi bi-upload"></i>');

                 },
                 success:function(data){
                     if(data.success == true){
                       console.log(data);
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
                 document.getElementById('form1').reset();
             }

             });

      }else if(value == 4){
        $("#form1").hide();
        $("#form2").show();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").hide();
        $("#form6").hide();
        $("#form7").hide();
        $("#form8").hide();

        $('#form2').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
                   $.ajax({
                 url:"{{ route('Phase1Subphase2') }}",
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
                     $('.save').html('save <i class="bi bi-upload"></i>');

                 },
                 success:function(data){
                     if(data.success == true){
                       console.log(data);
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
                 document.getElementById('form2').reset();
             }

             });
      }else if(value == 5){
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").show();
        $("#form4").hide();
        $("#form5").hide();
        $("#form6").hide();
        $("#form7").hide();
        $("#form8").hide();
        $('#form3').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
                   $.ajax({
                 url:"{{ route('Phase1Subphase3') }}",
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
                     $('.save').html('save <i class="bi bi-upload"></i>');

                 },
                 success:function(data){
                     if(data.success == true){
                       console.log(data);
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
                 document.getElementById('form3').reset();
             }

             });

      }else if(value == 6){
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").show();
        $("#form5").hide();
        $("#form6").hide();
        $("#form7").hide();
        $("#form8").hide();
        $('#form4').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
                   $.ajax({
                 url:"{{ route('Phase2Subphase1') }}",
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
                     $('.save').html('save <i class="bi bi-upload"></i>');

                 },
                 success:function(data){
                     if(data.success == true){
                       console.log(data);
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
                 document.getElementById('form4').reset();
             }

             });
      }else if(value == 7){
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").show();
        $("#form6").hide();
        $("#form7").hide();
        $("#form8").hide();
        $('#form5').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
                   $.ajax({
                 url:"{{ route('Phase2Subphase2') }}",
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
                     $('.save').html('save <i class="bi bi-upload"></i>');

                 },
                 success:function(data){
                     if(data.success == true){
                       console.log(data);
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
                 document.getElementById('form5').reset();
             }

             });
      }else if(value == 8){
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").hide();
        $("#form6").show();
        $("#form7").hide();
        $("#form8").hide();
        $('#form6').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
                   $.ajax({
                 url:"{{ route('Phase2Subphase3') }}",
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
                     $('.save').html('save <i class="bi bi-upload"></i>');

                 },
                 success:function(data){
                     if(data.success == true){
                       console.log(data);
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
                 document.getElementById('form6').reset();
             }

             });
      }else if(value == 9){
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").hide();
        $("#form6").hide();
        $("#form7").show();
        $("#form8").hide();
        $('#form7').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
                   $.ajax({
                 url:"{{ route('Phase2Subphase4') }}",
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
                     $('.save').html('save <i class="bi bi-upload"></i>');

                 },
                 success:function(data){
                     if(data.success == true){
                       console.log(data);
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
                 document.getElementById('form7').reset();
             }

             });
      }else if(value == 10){
        $("#form1").hide();
        $("#form2").hide();
        $("#form3").hide();
        $("#form4").hide();
        $("#form5").hide();
        $("#form6").hide();
        $("#form7").hide();
        $("#form8").show();
        $('#form8').submit(function(e){
          e.preventDefault();
          let formData = new FormData(this);
                   $.ajax({
                 url:"{{ route('Phase2Subphase5') }}",
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
                     $('.save').html('save <i class="bi bi-upload"></i>');

                 },
                 success:function(data){
                     if(data.success == true){
                       console.log(data);
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
                 document.getElementById('form8').reset();
             }

             });
      }

  });
});

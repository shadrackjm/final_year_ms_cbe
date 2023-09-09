@extends('layout/supervisor-lay')
@section('space-work')
<span class="alert alert-danger"  id="alert-danger" style="display:none;"></span>
<span class="alert alert-success" id="alert-success" style="display:none;"></span>

<div class="card">
  <div class="card-header">
    Assess Group Number {{$group_id}}
    <a href="/assess/groups" class="btn btn-secondary btn-sm pull-right">Group List</a>

  </div>
  <div class="card-body">
    <div class="form-group my-2">
      <label for="">Phase</label>
      <select class="form-select" name="" id="phase_id">
        <option value="">Choose Phase</option>
        @foreach($phases as $phase)
        <option value="{{$phase->id}}">{{$phase->phase_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group my-2">
      <label for="">Sub - Phase</label>

      <select class="form-select" name="" id="subphase_id">
      </select>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">

  </div>
  <div class="card-body">


    <!-- //this table will be within a form tag -->
    <form id="form1">
      @csrf
      <div class="table-responsive" >
        <table class="table table-bordered table-sm" id="tab1">
          <tr>
            <th colspan="10">1. Introduction Presentation Assessment Form (100 Points Equiv. to 5 Marks)</th>
          </tr>
          <tr>
            <th>Group</th>
            <th>Names</th>
            <th>Project Title</th>
            <th>Appearance (10 points)</th>
            <th>Presentation Skills (10 points)</th>
            <th>Understanding the topic (30 points)</th>
            <th>Significance of the project (20 points)</th>
            <th>Setting of objectives (30 points)</th>
          </tr>

          <tbody>
            @if(count($group_data) > 0)
            @foreach($group_data as $detail)
            <tr>
              <td>{{ $group_id}}</td>
              <td>{{ $detail->fname}}</td>
              <td>{{ $group_title->title}}</td>

              <td><span class="text-danger"  id="Appearance_error"></span><input type="number" max="10" name="Appearance[]" class="form-control" required min="0"> </td>
              <td><span class="text-danger"  id="Presentation_skills_error"></span><input type="number" max="10"  min="0" name="Presentation_skills[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Understanding_topic_error"></span><input type="number" max="30" min="0" name="Understanding_topic[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Significance_project_error"></span><input type="number" max="20" min="0" name="Significance_project[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Setting_objectives_error"></span><input type="number" max="30" min="0" name="Setting_objectives[]" class="form-control" required> </td>
              <input type="hidden" name="student_id[]" value="{{ $detail->id }}">
              <input type="hidden" name="group_id[]" value="{{ $group_id }}">
              <input type="hidden" name="supervisor_id[]" value="{{ $data->id }}">
            </tr>

            @endforeach
            @else
            <tr>
              <td colspan="4" >No Data Found!</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
      <button type="submit" name="button" class="btn btn-success btn-sm pull-right save">save</button>
    </form>
    <form id="form2">
      @csrf
      <div class="table-responsive" >
        <table class="table table-bordered table-sm" id="tab2">
          <tr>
            <th colspan="10">2. Final Presentation Assessment Form (100 Points Equiv. to 5 Marks)</th>
          </tr>
          <tr>
            <th>Group</th>
            <th>Names</th>
            <th>Project Title</th>
            <th>Appearance (10 points)</th>
            <th>Presentation Skills (10 points)</th>
            <th>Understanding the topic (10 points)</th>
            <th>Significance of the project (10 points)</th>
            <th>Setting of objectives (20 points)</th>
            <th>Methodology (20 points)</th>
            <th>Implementation Plan (20 points)</th>
          </tr>

          <tbody>
            @if(count($group_data) > 0)
            @foreach($group_data as $detail)
            <tr>
              <td>{{ $group_id}}</td>
              <td>{{ $detail->fname}}</td>
              <td>{{ $group_title->title}}</td>
              <td><span class="text-danger"  id="Appearance_error"></span><input type="number" max="10" min="0" name="Appearance[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Presentation_skills_error"></span><input type="number"  max="10" min="0" name="Presentation_skills[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Understanding_topic_error"></span><input type="number" max="10" min="0" name="Understanding_topic[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Significance_project_error"></span><input type="number" max="10" min="0" name="Significance_project[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Setting_objectives_error"></span><input type="number" max="20" min="0" name="Setting_objectives[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="20" min="0" name="Methodology[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Implementation_plan_error"></span><input type="number" max="20" min="0" name="Implementation_plan[]" class="form-control" required> </td>
              <input type="hidden" name="student_id[]" value="{{ $detail->id }}">
              <input type="hidden" name="supervisor_id[]" value="{{ $data->id }}">
              <input type="hidden" name="group_id[]" value="{{ $group_id }}">
            </tr>

            @endforeach
            @else
            <tr>
              <td colspan="4" >No Data Found!</td>
            </tr>
            @endif
          </tbody>
        </table>
        <button type="submit" name="button" class="btn btn-success btn-sm pull-right save">save</button>
      </div>
    </form>
    <form id="form3">
      @csrf
      <div class="table-responsive" >
        <table class="table table-bordered table-sm" id="tab3">
          <tr>
            <th colspan="10">3.  Proposal Marks Allocation (100 Points Equiv. to 10 Marks)</th>
          </tr>
          <tr>
            <th>Group</th>
            <th>Names</th>
            <th>Project Title</th>
            <th>Project_background (20 points)</th>
            <th>Significance of the project (10 points)</th>
            <th>Setting of objectives (10 points)</th>
            <th>Methodology (20 points)</th>
            <th>Implementation Plan (10 points)</th>
            <th>Expected Output (10 points)</th>
            <th>Expected Outcome (10 points)</th>
            <th>Conclusion (10 points)</th>
          </tr>

          <tbody>
            @if(count($group_data) > 0)
            @foreach($group_data as $detail)
            <tr>
              <td>{{ $group_id}}</td>
              <td>{{ $detail->fname}}</td>
              <td>{{ $group_title->title}}</td>
              <td><span class="text-danger"  id="Appearance_error"></span><input type="number" max="20" min="0" name="Project_Background[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Significance_project_error"></span><input type="number" max="10" min="0" name="Significance_project[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Setting_objectives_error"></span><input type="number" max="10" min="0" name="Setting_objectives[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="20" min="0" name="Methodology[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Implementation_plan_error"></span><input type="number" max="10" min="0" name="Implementation_plan[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Implementation_plan_error"></span><input type="number" max="10" min="0" name="Expected_Output[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Implementation_plan_error"></span><input type="number" max="10" min="0" name="Expected_Outcome[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Implementation_plan_error"></span><input type="number" max="10" min="0" name="Conclusion[]" class="form-control" required> </td>
              <input type="hidden" name="student_id[]" value="{{ $detail->id }}">
              <input type="hidden" name="supervisor_id[]" value="{{ $data->id }}">
              <input type="hidden" name="group_id[]" value="{{ $group_id }}">
            </tr>

            @endforeach
            @else
            <tr>
              <td colspan="4" >No Data Found!</td>
            </tr>
            @endif
          </tbody>

        </table>
      </div>
      <button type="submit" name="button" class="btn btn-success btn-sm pull-right save">save</button>
    </form>
    <form id="form4">
      @csrf
      <div class="table-responsive" >
        <table class="table table-bordered table-sm" id="tab4">
          <tr>
            <th colspan="10">1.Requirement Presentation Assessment Form (100 Points Equiv. to 10 Marks) </th>
          </tr>
          <tr>
            <th>Group id</th>
            <th>Names</th>
            <th>Project Title</th>
            <th>Appearance (10 points)</th>
            <th>Presentation Skills (10 points)</th>
            <th>Understanding of the project Requirements (30 points)</th>
            <th>Requirements Analysis and Design(50 points)</th>
          </tr>

          <tbody>
            @if(count($group_data) > 0)
            @foreach($group_data as $detail)
            <tr>
              <td>{{ $group_id}}</td>
              <td>{{ $detail->fname}}</td>
              <td>{{ $group_title->title}}</td>
              <td><span class="text-danger"  id="Appearance_error"></span><input type="number" max="10" min="0" name="Appearance[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Significance_project_error"></span><input type="number" max="10" min="0" name="Presentation_skills[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Setting_objectives_error"></span><input type="number" max="30" min="0" name="Understanding_Project_requirements[]" class="form-control" required> </td>
              <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="50" min="0" name="Requirements_Analysis_Design[]" class="form-control" required> </td>
              <input type="hidden" name="student_id[]" value="{{ $detail->id }}">
              <input type="hidden" name="supervisor_id[]" value="{{ $data->id }}">
              <input type="hidden" name="group_id[]" value="{{ $group_id }}">        </tr>

              @endforeach
              @else
              <tr>
                <td colspan="4" >No Data Found!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
        <button type="submit" name="button" class="btn btn-success pull-right save">save</button>
      </form>
      <form id="form5">
        @csrf
        <div class="table-responsive" >
          <table class="table table-bordered table-sm" id="tab5">
            <tr>
              <th colspan="10">2.Development Presentation Assessment Form(100 Points Equiv.to 10 Marks) </th>
            </tr>
            <tr>
              <th>Group</th>
              <th>Names</th>
              <th>Project Title</th>
              <th>Appearance (10 points)</th>
              <th>Presentation Skills (10 points)</th>
              <th>Understanding the project Requirements (20 points)</th>
              <th>Initial Implementation (60 points)</th>
            </tr>

            <tbody>
              @if(count($group_data) > 0)
              @foreach($group_data as $detail)
              <tr>
                <td>{{ $group_id}}</td>
                <td>{{ $detail->fname}}</td>
                <td>{{ $group_title->title}}</td>
                <td><span class="text-danger"  id="Appearance_error"></span><input type="number" max="10" min="0" name="Appearance[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Significance_project_error"></span><input type="number" max="10" min="0" name="Presentation_skills[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Setting_objectives_error"></span><input type="number" max="20" min="0" name="Understanding_Project_requirements[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="60" min="0" name="Initial_Implementation[]" class="form-control" required> </td>
                <input type="hidden" name="student_id[]" value="{{ $detail->id }}">
                <input type="hidden" name="supervisor_id[]" value="{{ $data->id }}">
                <input type="hidden" name="group_id[]" value="{{ $group_id }}">
              </tr>

              @endforeach
              @else
              <tr>
                <td colspan="4" >No Data Found!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm pull-right save">save</button>
      </form>
      <form id="form6">
        @csrf
        <div class="table-responsive" >
          <table class="table table-bordered table-sm" id="tab6">
            <tr>
              <th colspan="10">3.Final Presentation Assessment Form (100 Equiv.to 15 Marks)</th>
            </tr>
            <tr>
              <th>Group</th>
              <th>Names</th>
              <th>Project Title</th>
              <th>Appearance (10 points)</th>
              <th>Presentation Skills (10 points)</th>
              <th>Understanding the project Requirements (10 points)</th>
              <th>Requirements Analysis Design (30 points)</th>
              <th>Implementation (50 points)</th>
            </tr>

            <tbody>
              @if(count($group_data) > 0)
              @foreach($group_data as $detail)
              <tr>
                <td>{{ $group_id}}</td>
                <td>{{ $detail->fname}}</td>
                <td>{{ $group_title->title}}</td>
                <td><span class="text-danger"  id="Appearance_error"></span><input type="number" max="10" min="0" name="Appearance[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Significance_project_error"></span><input type="number" max="10" min="0" name="Presentation_skills[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Setting_objectives_error"></span><input type="number" max="10"  min="0" name="Understanding_Project_requirements[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="30" min="0" name="Requirements_Analysis_Design[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="50" min="0" name="Implementation[]" class="form-control" required> </td>
                <input type="hidden" name="student_id[]" value="{{ $detail->id }}">
                <input type="hidden" name="supervisor_id[]" value="{{ $data->id }}">
                <input type="hidden" name="group_id[]" value="{{ $group_id }}">
              </tr>

              @endforeach
              @else
              <tr>
                <td colspan="4" >No Data Found!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm pull-right save">save</button>

      </form>
      <!-- Hii form inafanyiwa kaz kila Presentation au ni mara moja as hizo phases zingine?? -->
      <form id="form7">
        @csrf
        <div class="table-responsive" >
          <table class="table table-bordered table-sm" id="tab7">
            <tr>
              <th colspan="10">4.Supervisor's Individual Student Assessment Form (100 Points Equiv. to 15 Marks)</th>
            </tr>
            <tr>
              <th>Group</th>
              <th>Names</th>
              <th>Project Title</th>
              <th>General Understanding of the Project (10 points)</th>
              <th>System Development (20 points)</th>
              <th>Team Working (20 points)</th>
              <th>Individual Technical Capability (50 points)</th>
            </tr>

            <tbody>
              @if(count($group_data) > 0)
              @foreach($group_data as $detail)
              <tr>
                <td>{{ $group_id}}</td>
                <td>{{ $detail->fname}}</td>

                <td>{{ $group_title->title}}</td>
                <td><span class="text-danger"  id="Appearance_error"></span><input type="number" max="10" min="0" name="General_Understanding_Project[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Significance_project_error"></span><input type="number" max="200" min="0" name="System_development[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Setting_objectives_error"></span><input type="number" max="20" min="0" name="Team_Working[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="50" min="0" name="Individual_Technical_Capability[]" class="form-control" required> </td>
                <input type="hidden" name="student_id[]" value="{{ $detail->id }}">
                <input type="hidden" name="supervisor_id[]" value="{{ $data->id }}">
                <input type="hidden" name="group_id[]" value="{{ $group_id }}">
              </tr>

              @endforeach
              @else
              <tr>
                <td colspan="4" >No Data Found!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm pull-right save">save</button>

      </form>
      <form id="form8">
        @csrf
        <div class="table-responsive" >
          <table class="table table-bordered table-sm" id="tab8">
            <tr>
              <th colspan="10">5.Project Report Marks Allocation (100 Points Equiv.to 30 Marks)</th>
            </tr>
            <tr>
              <th>Group id</th>
              <th>Names</th>
              <th>Project Title</th>
              <th>Project Background (10 points)</th>
              <th>Significance of the Project (05 points)</th>
              <th>Setting of objectives (10 points)</th>
              <th>Methodology (10 points)</th>
              <th>System Implementation (40 Points)</th>
              <th>Results (10 Points)</th>
              <th>Conclusion (05 Points)</th>
              <th>System Documentation (10 Points)</th>
            </tr>

            <tbody>
              @if(count($group_data) > 0)
              @foreach($group_data as $detail)
              <tr>
                <td>{{ $group_id}}</td>
                <td>{{ $detail->fname}}</td>
                <td>{{ $group_title->title}}</td>
                <td><span class="text-danger"  id="Appearance_error"></span><input type="number" max="10" min="0" name="Project_Background[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Significance_project_error"></span><input type="number" max="05" min="0" name="Significance_project[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Setting_objectives_error"></span><input type="number" max="10" min="0" name="Setting_objectives[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="10" min="0" name="Methodology[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="40" min="0" name="System_Implementation[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="10" min="0" name="Results[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="05" min="0" name="Conclusion[]" class="form-control" required> </td>
                <td><span class="text-danger"  id="Methodology_error"></span><input type="number" max="10" min="0" name="System_Documentation[]" class="form-control" required> </td>
                <input type="hidden" name="student_id[]" value="{{ $detail->id }}">
                <input type="hidden" name="supervisor_id[]" value="{{ $data->id }}">
                <input type="hidden" name="group_id[]" value="{{ $group_id }}">
              </tr>

              @endforeach
              @else
              <tr>
                <td colspan="4" >No Data Found!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
        <button type="submit" name="button" class="btn btn-success btn-sm pull-right save">save</button>
      </form>
    </div>
  </div>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script>

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
      var table = $('#tab8').rowMerge({
        excludedColumns: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
      });
      var table = $('#tab7').rowMerge({
        excludedColumns: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
      });
      var table = $('#tab6').rowMerge({
        excludedColumns: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
      });
      var table = $('#tab5').rowMerge({
        excludedColumns: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
      });
      var table = $('#tab4').rowMerge({
        excludedColumns: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
      });
    });
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
          }


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

      if(value == 1){
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
                document.getElementById('form1').reset();

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
        

        });

      }else if(value == 2){
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
                document.getElementById('form2').reset();

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
        });
      }else if(value == 3){
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
                document.getElementById('form3').reset();

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
        });

      }else if(value == 4){
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
                document.getElementById('form4').reset();

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
        });
      }else if(value == 5){
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
                document.getElementById('form5').reset();

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
        });
      }else if(value == 6){
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
                document.getElementById('form6').reset();

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
        });
      }else if(value == 7){
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
                document.getElementById('form7').reset();

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

        });
      }else if(value == 8){
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
                document.getElementById('form8').reset();

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
        
        });
      }

    });
  });

</script>
@endsection

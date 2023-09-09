@extends('layout/coordinator-lay')
@section('space-work')
<div class="card">
  <div class="card-header">
    Presentation Reports
    <form id="reportForm">
      <div class="form row">
        <div class="form-group my-2 col">
          <label for="">Phase</label>
          <select class="form-select" name="phase" id="phase_id">
            <option value="">Choose Phase</option>
            @foreach($phases as $phase)
            <option value="{{$phase->id}}">{{$phase->phase_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group my-2 col">
          <label for="">SubPhase</label>
          <select class="form-select" name="" id="subphase_id">
          </select>
        </div>

      </div>
    </form>
    <button onclick="ExportToExcel1('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel1">Export Excel <i class="bi bi-excel-file"></i></button>
    <button onclick="ExportToExcel2('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel2" style="display:none">Export Excel <i class="bi bi-excel-file"></i></button>
    <button onclick="ExportToExcel3('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel3" style="display:none">Export Excel <i class="bi bi-excel-file"></i></button>
    <button onclick="ExportToExcel4('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel4" style="display:none">Export Excel <i class="bi bi-excel-file"></i></button>
    <button onclick="ExportToExcel5('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel5" style="display:none">Export Excel <i class="bi bi-excel-file"></i></button>
    <button onclick="ExportToExcel6('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel6" style="display:none">Export Excel <i class="bi bi-excel-file"></i></button>
    <button onclick="ExportToExcel7('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel7" style="display:none">Export Excel <i class="bi bi-excel-file"></i></button>
    <button onclick="ExportToExcel8('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel8" style="display:none">Export Excel <i class="bi bi-excel-file"></i></button>
    <button onclick="createPDF()" class="btn btn-danger btn-sm pull-right mx-2">Export pdf <i class="bi bi-file-earmark-pdf"></i> </button>

  </div>
  <div class="card-body" id="card">

    <h6 class="header1">Introduction Presentation Assessment Report (100 Points Equiv. to 5 Marks)</h6>

    <div class="table-responsive" id="report1">
      <table class="table table-bordered table-hovered table-sm text-center " id="table1">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Titles</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>Appearance</th>
            <th>Presentation skills</th>
            <th>Understanding the topic</th>
            <th>Significance of the project</th>
            <th>Setting of objectives</th>
            <th title="Average Marks">AVG</th>
            <th>100 equiv to 5</th>
            <th>Supervisor</th>
          </tr>
        </thead>
        <tbody>
          @if(count($presentation) > 0)
          @foreach($presentation as $group)
          <tr>
            <!-- this calculate avg and total out of 5 points -->
            @php
            $total = $group->Appearance + $group->Presentation_skills + $group->Understanding_topic + $group->Significance_project + $group->Setting_objectives;
            $avg = $total/5;
            $outof5 = ($total / 100) * 5;
            @endphp
            <td >{{ $group->group_id }}</td>
            <td class="text-nowrap">{{ $group->title }}</td>
            <td class="text-nowrap text-uppercase">{{ $group->fname }} {{ $group->mname }} {{ $group->lname }}</td>
            <td>{{ $group->regno }}</td>
            <td>{{ $group->Appearance}}</td>
            <td>{{ $group->Presentation_skills}}</td>
            <td>{{ $group->Understanding_topic}}</td>
            <td>{{ $group->Significance_project}}</td>
            <td>{{ $group->Setting_objectives}}</td>
            <td>{{  number_format($avg,2) }}</td>
            <td>{{  number_format($outof5,2) }}</td>
            <td class="text-nowrap">{{ $group->firstname}} {{ $group->lastname}}</td>
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
    <div class="table-responsive" id="report2">
      <table class="table table-bordered table-hovered table-sm text-center" id="table2">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Titles</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>Appearance</th>
            <th>Presentation skills</th>
            <th>Understanding the topic</th>
            <th>Significance of the project</th>
            <th>Setting of objectives</th>
            <th>Methodology</th>
            <th>Implementation Plan</th>
            <th title="Average Marks">AVG</th>
            <th>Score(100 points equiv to 5)</th>
            <th>Supervisor</th>
          </tr>
        </thead>
        <tbody id="table2body">

        </tbody>
      </table>
    </div>
    <div class="table-responsive" id="report3">
      <table class="table table-bordered table-hovered table-sm text-center" id="table3">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Titles</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>Project Background</th>
            <th>Significance of the project</th>
            <th>Setting of objectives</th>
            <th>Methodology</th>
            <th>Implementation Plan</th>
            <th>Expected Output</th>
            <th>Expected Outcome</th>
            <th>Conclusion</th>
            <th title="Average Marks">AVG</th>
            <th>Score(100 points equiv to 10)</th>
            <th>Supervisors</th>
          </tr>
        </thead>
        <tbody id="table3body">

        </tbody>
      </table>
    </div>
    <div class="table-responsive" id="report4">
      <table class="table table-bordered table-hovered table-sm text-center" id="table4">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Titles</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>Appearance</th>
            <th>Presentation skills</th>
            <th>Understanding Project Requirements</th>
            <th>Requirement Analysis and Design</th>
            <th title="Average Marks">AVG</th>
            <th>Score(100 points equiv to 10)</th>
            <th>Supervisor</th>
          </tr>
        </thead>
        <tbody id="table4body">

        </tbody>
      </table>
    </div>
    <div class="table-responsive" id="report5">
      <table class="table table-bordered table-hovered table-sm text-center" id="table5">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Titles</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>Appearance</th>
            <th>Presentation skills</th>
            <th>Understanding Project Requirements</th>
            <th>Initial Implementation</th>
            <th title="Average Marks">AVG</th>
            <th>Score(100 points equiv to 10)</th>
            <th>Supervisor</th>
          </tr>
        </thead>
        <tbody id="table5body">

        </tbody>
      </table>
    </div>
    <div class="table-responsive" id="report6">
      <table class="table table-bordered table-hovered table-sm text-center" id="table6">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Titles</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>Appearance</th>
            <th>Presentation skills</th>
            <th>Understanding Project Requirements</th>
            <th>Requirement Analysis and Design</th>
            <th>Implementation</th>
            <th title="Average Marks">AVG</th>
            <th>Score(100 points equiv to 15)</th>
            <th>Supervisor</th>
          </tr>
        </thead>
        <tbody id="table6body">

        </tbody>
      </table>
    </div>
    <div class="table-responsive" id="report7">
      <table class="table table-bordered table-hovered table-sm text-center" id="table7">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Titles</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>General Understanding of the Project</th>
            <th>System Development</th>
            <th>Team Working</th>
            <th>Individual Technical Capability</th>
            <th title="Average Marks">AVG</th>
            <th>Score(100 points equiv to 10)</th>
            <th>Supervisor</th>
          </tr>
        </thead>
        <tbody id="table7body">

        </tbody>
      </table>
    </div>
    <div class="table-responsive" id="report8">
      <table class="table table-bordered table-hovered table-sm text-center" id="table8">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Titles</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>Project Background</th>
            <th>Significance of the project</th>
            <th>Setting of objectives</th>
            <th>Methodology</th>
            <th>System Implementation</th>
            <th>Results</th>
            <th>Conclusion</th>
            <th>System Documentation</th>
            <th title="Average Marks">AVG</th>
            <th>Score(100 points equiv to 30)</th>
            <th>Supervisor</th>
          </tr>
        </thead>
        <tbody id="table8body">

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<script src="{{ asset('js/export-excel.min.js') }}"></script>
<script>
//exporting tables to excel
function ExportToExcel1(type, fn, dl) {
  var elt = document.getElementById('table1');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('presentation 1 report.' + (type || 'xlsx')));
}
function ExportToExcel2(type, fn, dl) {
  var elt = document.getElementById('table2');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('presentation 2 report.' + (type || 'xlsx')));
}
function ExportToExcel3(type, fn, dl) {
  var elt = document.getElementById('table3');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('presentation 3 report.' + (type || 'xlsx')));
}
function ExportToExcel4(type, fn, dl) {
  var elt = document.getElementById('table4');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('presentation 4 report.' + (type || 'xlsx')));
}
function ExportToExcel5(type, fn, dl) {
  var elt = document.getElementById('table5');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('presentation 5 report.' + (type || 'xlsx')));
}
function ExportToExcel6(type, fn, dl) {
  var elt = document.getElementById('table6');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('presentation 6 report.' + (type || 'xlsx')));
}
function ExportToExcel7(type, fn, dl) {
  var elt = document.getElementById('table7');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('presentation 7 report.' + (type || 'xlsx')));
}
function ExportToExcel8(type, fn, dl) {
  var elt = document.getElementById('table8');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('presentation 8 report.' + (type || 'xlsx')));
}
$(document).ready(function(){
  $("#report2").hide();
  $("#report3").hide();
  $("#report4").hide();
  $("#report5").hide();
  $("#report6").hide();
  $("#report7").hide();
  $("#report8").hide();
  $(function () {
    // Apply the plugin
    var table = $('#table1').rowMerge({
      excludedColumns: [5,6,7,8,9,10,11,12],
    });
  });
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#phase_id').on('change',function(){
    var phase_id = $(this).val();
    // console.log(phase_id);
    $.ajax({
      url:"{{ route('GetSubphaseData') }}",
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
  ////manipulating the reports here
  $("#subphase_id").on('change',function(){
    var value = $("#subphase_id").val();
    // console.log(value);
    if(value == 2){
      $('#table2body').html('');
      $("#report2").show();
      $("#report1").hide();
      $("#report3").hide();
      $("#report4").hide();
      $("#report5").hide();
      $("#report6").hide();
      $("#report7").hide();
      $("#report8").hide();
      $("#excel1").hide();
      $("#excel2").show();
      $("#excel3").hide();
      $("#excel4").hide();
      $("#excel5").hide();
      $("#excel6").hide();
      $("#excel7").hide();
      $("#excel8").hide();
      //submit the form
      $.ajax({
        url:"{{ route('GetReport') }}",
        type:'GET',
        data: {value:value},
        dataType:'json',
        success:function(res){
          // console.log(res);

          $('.header1').html('Final Presentation Assessment Report (100 Points Equiv.to 5 Marks)');
          $.each(res, function(key,value){
            // console.log(res);
            var total = value.Appearance + value.Presentation_skills + value.Understanding_topic + value.Significance_project + value.Setting_objectives + value.Methodology	+ value.Implementation_plan;
            var avg = total / 7;
            var outof5 = (total / 100) * 5;

            // $('#table2').append('<option value="'+value.id+'">'+value.subphase_name+'</option>');
            $('#table2body').append('<tr><td>'+value.group_id+'</td>'
            +'<td class="text-nowrap">'+value.title+'</td>'
            +'<td class="text-nowrap text-uppercase">'+value.fname+' '+value.mname+' '+value.lname+'</td>'
            +'<td>'+value.regno+'</td>'
            +'<td>'+value.Appearance+'</td>'
            +'<td>'+value.Presentation_skills+'</td>'
            +'<td>'+value.Understanding_topic+'</td>'
            +'<td>'+value.Significance_project+'</td>'
            +'<td>'+value.Setting_objectives+'</td>'
            +'<td>'+value.Methodology+'</td>'
            +'<td>'+value.Implementation_plan+'</td>'
            +'<td>'+avg.toFixed(1)+'</td>' //calculate avg
            +'<td>'+outof5.toFixed(1)+'</td>'//calculate score ou of 5
            +'<td class="text-nowrap">'+value.firstname+' '+value.lastname+'</td></tr>');//display supervisor
          });
          $(function () {
            // Apply the plugin
            var table = $('#table2').rowMerge({
              excludedColumns: [5,6,7,8,9,10,11,12,13,14],
            });
          });
        }

      });

    }else if(value == 1){
      $("#report1").show();
      $("#report2").hide();
      $("#report3").hide();
      $("#report5").hide();
      $("#report4").hide();
      $("#report6").hide();
      $("#report7").hide();
      $("#report8").hide();
      $("#excel1").show();
      $("#excel2").hide();
      $("#excel3").hide();
      $("#excel4").hide();
      $("#excel5").hide();
      $("#excel6").hide();
      $("#excel7").hide();
      $("#excel8").hide();
      $(".header1").html('Introduction Presentation Assessment Report (100 Points Equiv. to 5 Marks)');

    }else if(value == 3){
      $("#report3").show();
      $("#report2").hide();
      $("#report1").hide();
      $("#report5").hide();
      $("#report4").hide();
      $("#report6").hide();
      $("#report7").hide();
      $("#report8").hide();
      $('#table3body').html('');
      $("#excel1").hide();
      $("#excel2").hide();
      $("#excel3").show();
      $("#excel4").hide();
      $("#excel5").hide();
      $("#excel6").hide();
      $("#excel7").hide();
      $("#excel8").hide();


      //submit the form
      $.ajax({
        url:"{{ route('GetReport') }}",
        type:'GET',
        data: {value:value},
        dataType:'json',
        success:function(res){
          $('.header1').html('Proposal Marks Allocation Report (100 Points Equiv.to 10 Marks)');
          $.each(res, function(key,value){
            // console.log(res);
            var total = value.Project_Background + value.Significance_project + value.Setting_objectives + value.Methodology + value.Implementation_plan + value.Expected_Output	+ value.Expected_Outcome + value.Conclusion;
            var avg = total / 8;
            var outof10 = (total / 100) * 10;
            var g_marks = g_marks + outof10;

            // $('#table2').append('<option value="'+value.id+'">'+value.subphase_name+'</option>');
            $('#table3body').append('<tr><td>'+value.group_id+'</td>'
            +'<td class="text-nowrap">'+value.title+'</td>'
            +'<td class="text-nowrap text-uppercase">'+value.fname+' '+value.mname+' '+value.lname+'</td>'
            +'<td>'+value.regno+'</td>'
            +'<td>'+value.Project_Background+'</td>'
            +'<td>'+value.Significance_project+'</td>'
            +'<td>'+value.Setting_objectives+'</td>'
            +'<td>'+value.Methodology+'</td>'
            +'<td>'+value.Implementation_plan+'</td>'
            +'<td>'+value.Expected_Output+'</td>'
            +'<td>'+value.Expected_Outcome+'</td>'
            +'<td>'+value.Conclusion+'</td>'
            +'<td>'+avg.toFixed(1)+'</td>' //calculate avg
            +'<td>'+outof10.toFixed(1)+'</td>'//calculate score out of 10
            +'<td class="text-nowrap">'+value.firstname+' '+value.lastname+'</td></tr>');//display supervisor
          });
          $(function () {
            // Apply the plugin
            var table = $('#table3').rowMerge({
              excludedColumns: [5,6,7,8,9,10,11,12,13,14],
            });
          });
        }

      });
    }else if(value == 4){
      $("#report4").show();
      $("#report3").hide();
      $("#report2").hide();
      $("#report1").hide();
      $("#report5").hide();
      $("#report6").hide();
      $("#report7").hide();
      $("#report8").hide();
      $('#table4body').html('');
      $("#excel1").hide();
      $("#excel2").hide();
      $("#excel3").hide();
      $("#excel4").show();
      $("#excel5").hide();
      $("#excel6").hide();
      $("#excel7").hide();
      $("#excel8").hide();

      //submit the form
      $.ajax({
        url:"{{ route('GetReport') }}",
        type:'GET',
        data: {value:value},
        dataType:'json',
        success:function(res){
          $('.header1').html('Requirement Presentation Assessment Report (100 Points Equiv. to 10 Marks)');
          $.each(res, function(key,value){
            // console.log(res);
            var total = value.Appearance + value.Presentation_skills + value.Understanding_Project_requirements + value.Requirements_Analysis_Design;
            var avg = total / 4;
            var outof10 = (total / 100) * 10;
            // var g_marks = g_marks + outof10;

            // $('#table2').append('<option value="'+value.id+'">'+value.subphase_name+'</option>');
            $('#table4body').append('<tr><td>'+value.group_id+'</td>'
            +'<td class="text-nowrap">'+value.title+'</td>'
            +'<td class="text-nowrap text-uppercase">'+value.fname+' '+value.mname+' '+value.lname+'</td>'
            +'<td>'+value.regno+'</td>'
            +'<td>'+value.Appearance+'</td>'
            +'<td>'+value.Presentation_skills+'</td>'
            +'<td>'+value.Understanding_Project_requirements+'</td>'
            +'<td>'+value.Requirements_Analysis_Design+'</td>'
            +'<td>'+avg.toFixed(1)+'</td>' //calculate avg
            +'<td>'+outof10.toFixed(1)+'</td>'//calculate score out of 10
            +'<td class="text-nowrap">'+value.firstname+' '+value.lastname+'</td></tr>');//display supervisor
          });
          $(function () {
            // Apply the plugin
            var table = $('#table4').rowMerge({
              excludedColumns: [5,6,7,8,9,10],
            });
          });
        }

      });

    }else if(value == 5){
      $("#report5").show();
      $("#report4").hide();
      $("#report3").hide();
      $("#report2").hide();
      $("#report1").hide();
      $("#report6").hide();
      $("#report7").hide();
      $("#report8").hide();
      $('#table5body').html('');
      $("#excel1").hide();
      $("#excel2").hide();
      $("#excel3").hide();
      $("#excel4").hide();
      $("#excel5").show();
      $("#excel6").hide();
      $("#excel7").hide();
      $("#excel8").hide();
      //submit the form
      $.ajax({
        url:"{{ route('GetReport') }}",
        type:'GET',
        data: {value:value},
        dataType:'json',
        success:function(res){
          $('.header1').html('Development Presentation Assessment  Report (100 Points Equiv.to 10 Marks)');
          $.each(res, function(key,value){
            // console.log(res);
            var total = value.Appearance + value.Presentation_skills + value.Understanding_Project_requirements + value.Initial_Implementation;
            var avg = total / 4;
            var outof10 = (total / 100) * 10;
            // var g_marks = g_marks + outof10;

            // $('#table2').append('<option value="'+value.id+'">'+value.subphase_name+'</option>');
            $('#table5body').append('<tr><td>'+value.group_id+'</td>'
            +'<td class="text-nowrap">'+value.title+'</td>'
            +'<td class="text-nowrap text-uppercase">'+value.fname+' '+value.mname+' '+value.lname+'</td>'
            +'<td>'+value.regno+'</td>'
            +'<td>'+value.Appearance+'</td>'
            +'<td>'+value.Presentation_skills+'</td>'
            +'<td>'+value.Understanding_Project_requirements+'</td>'
            +'<td>'+value.Initial_Implementation+'</td>'
            +'<td>'+avg.toFixed(1)+'</td>' //calculate avg
            +'<td>'+outof10.toFixed(1)+'</td>'//calculate score out of 10
            +'<td class="text-nowrap">'+value.firstname+' '+value.lastname+'</td></tr>');//display supervisor
          });
          $(function () {
            // Apply the plugin
            var table = $('#table5').rowMerge({
              excludedColumns: [5,6,7,8,9,10],
            });
          });
        }

      });


    }else if(value == 6){
      $("#report6").show();
      $("#report5").hide();
      $("#report4").hide();
      $("#report3").hide();
      $("#report2").hide();
      $("#report1").hide();
      $("#report7").hide();
      $("#report8").hide();
      $('#table6body').html('');
      $("#excel1").hide();
      $("#excel2").hide();
      $("#excel3").hide();
      $("#excel4").hide();
      $("#excel5").hide();
      $("#excel6").show();
      $("#excel7").hide();
      $("#excel8").hide();

      //submit the form
      $.ajax({
        url:"{{ route('GetReport') }}",
        type:'GET',
        data: {value:value},
        dataType:'json',
        success:function(res){
          $('.header1').html('Final Presentation Assessment Report (100 Equiv.to 15 Marks)');
          $.each(res, function(key,value){
            // console.log(res);
            var total = value.Appearance + value.Presentation_skills + value.Understanding_Project_requirements + value.Requirements_Analysis_Design + value.Implementation;
            var avg = total / 5;
            var outof10 = (total / 100) * 15;

            // $('#table2').append('<option value="'+value.id+'">'+value.subphase_name+'</option>');
            $('#table6body').append('<tr><td>'+value.group_id+'</td>'
            +'<td class="text-nowrap">'+value.title+'</td>'
            +'<td class="text-nowrap text-uppercase">'+value.fname+' '+value.mname+' '+value.lname+'</td>'
            +'<td>'+value.regno+'</td>'
            +'<td>'+value.Appearance+'</td>'
            +'<td>'+value.Presentation_skills+'</td>'
            +'<td>'+value.Understanding_Project_requirements+'</td>'
            +'<td>'+value.Requirements_Analysis_Design+'</td>'
            +'<td>'+value.Implementation+'</td>'
            +'<td>'+avg.toFixed(1)+'</td>' //calculate avg
            +'<td>'+outof10.toFixed(1)+'</td>'//calculate score out of 10
            +'<td class="text-nowrap">'+value.firstname+' '+value.lastname+'</td></tr>');//display supervisor
          });
          $(function () {
            // Apply the plugin
            var table = $('#table6').rowMerge({
              excludedColumns: [5,6,7,8,9,10],
            });
          });
        }

      });

    }else if(value == 7){
      $("#report7").show();
      $("#report6").hide();
      $("#report5").hide();
      $("#report4").hide();
      $("#report3").hide();
      $("#report2").hide();
      $("#report1").hide();
      $("#report8").hide();
      $('#table7body').html('');
      $("#excel1").hide();
      $("#excel2").hide();
      $("#excel3").hide();
      $("#excel4").hide();
      $("#excel5").hide();
      $("#excel6").hide();
      $("#excel7").show();
      $("#excel8").hide();

      //submit the form
      $.ajax({
        url:"{{ route('GetReport') }}",
        type:'GET',
        data: {value:value},
        dataType:'json',
        success:function(res){
          $('.header1').html('Supervisor`s individual Student Assessment Report (100 Points Equiv.to 10 Marks)');
          $.each(res, function(key,value){
            // console.log(res);
            var total = value.General_Understanding_Project + value.System_development + value.Team_Working + value.Individual_Technical_Capability;
            var avg = total / 4;
            var outof10 = (total / 100) * 10;

            // $('#table2').append('<option value="'+value.id+'">'+value.subphase_name+'</option>');
            $('#table7body').append('<tr><td>'+value.group_id+'</td>'
            +'<td class="text-nowrap">'+value.title+'</td>'
            +'<td class="text-nowrap text-uppercase">'+value.fname+' '+value.mname+' '+value.lname+'</td>'
            +'<td>'+value.regno+'</td>'
            +'<td>'+value.General_Understanding_Project+'</td>'
            +'<td>'+value.System_development+'</td>'
            +'<td>'+value.Team_Working+'</td>'
            +'<td>'+value.Individual_Technical_Capability+'</td>'
            +'<td>'+avg.toFixed(1)+'</td>' //calculate avg
            +'<td>'+outof10.toFixed(1)+'</td>'//calculate score out of 10
            +'<td class="text-nowrap">'+value.firstname+' '+value.lastname+'</td></tr>');//display supervisor
          });
          $(function () {
            // Apply the plugin
            var table = $('#table7').rowMerge({
              excludedColumns: [5,6,7,8,9,10],
            });
          });
        }

      });


    }else if(value == 8){
      $("#report8").show();
      $("#report7").hide();
      $("#report6").hide();
      $("#report5").hide();
      $("#report4").hide();
      $("#report3").hide();
      $("#report2").hide();
      $("#report1").hide();
      $('#table8body').html('');
      $("#excel1").hide();
      $("#excel2").hide();
      $("#excel3").hide();
      $("#excel4").hide();
      $("#excel5").hide();
      $("#excel6").hide();
      $("#excel7").hide();
      $("#excel8").show();

      //submit the form
      $.ajax({
        url:"{{ route('GetReport') }}",
        type:'GET',
        data: {value:value},
        dataType:'json',
        success:function(res){
          $('.header1').html('Project Report Marks Allocation Report (100 Points Equiv.to 30 Marks)');
          $.each(res, function(key,value){
            // console.log(res);
            var total = value.Project_Background + value.Significance_project + value.Setting_objectives + value.Methodology + value.Methodology + value.System_Implementation + value.Results + value.Conclusion + value.System_Documentation;
            var avg = total / 8;
            var outof10 = (total / 100) * 30;

            // $('#table2').append('<option value="'+value.id+'">'+value.subphase_name+'</option>');
            $('#table8body').append('<tr><td>'+value.group_id+'</td>'
            +'<td class="text-nowrap">'+value.title+'</td>'
            +'<td class="text-nowrap text-uppercase">'+value.fname+' '+value.mname+' '+value.lname+'</td>'
            +'<td>'+value.regno+'</td>'
            +'<td>'+value.Project_Background+'</td>'
            +'<td>'+value.Significance_project+'</td>'
            +'<td>'+value.Setting_objectives+'</td>'
            +'<td>'+value.Methodology+'</td>'
            +'<td>'+value.System_Implementation+'</td>'
            +'<td>'+value.Results+'</td>'
            +'<td>'+value.Conclusion+'</td>'
            +'<td>'+value.System_Documentation+'</td>'
            +'<td>'+avg.toFixed(1)+'</td>' //calculate avg
            +'<td>'+outof10.toFixed(1)+'</td>'//calculate score out of 10
            +'<td class="text-nowrap">'+value.firstname+' '+value.lastname+'</td></tr>');//display supervisor
          });
          $(function () {
            // Apply the plugin
            var table = $('#table8').rowMerge({
              excludedColumns: [5,6,7,8,9,10,11,12,13,14],
            });
          });
        }

      });
    }
  });

});
</script>
<script>
function createPDF() {
  var sTable = document.getElementById('card').innerHTML;
  var style = "<style>";
  style = style + "table {width: 100%;font: 12px Calibri;}";
  style = style + "table, th, td {text-transform: capitalize; border: solid 1px #DDD; border-collapse: collapse;";
  style = style + "padding: 2px 3px;text-align: center;}";
  style = style + "</style>";
  // CREATE A WINDOW OBJECT.
  var win = window.open('', '', 'height=700,width=800');
  win.document.write('<html><head>');
  win.document.write('<title>Project Presentation Report</title>');
  // <title> FOR PDF HEADER.
  win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
  win.document.write('</head>');
  win.document.write('<body>');
  win.document.write(sTable); // THE TABLE CONTENTS INSIDE THE BODY TAG.
  win.document.write('</body></html>');
  win.document.close();  // CLOSE THE CURRENT WINDOW.
  win.print(); // PRINT THE CONTENTS.
}
</script>
@endsection

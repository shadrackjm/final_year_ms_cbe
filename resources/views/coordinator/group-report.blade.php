@extends('layout/coordinator-lay')
@section('space-work')
@if(Session::has('success'))
<div class="alert alert-success p-2">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
@endif
<div class="card">
  <div class="card-header">
    <div class="row">
                <div class="col">
                   <select name="term" id="term" class="form-select">
                        <option value="">choose Level of Study</option>
                        <option value="diploma">Diploma</option>
                        <option value="bachelor">Bachelor</option>
                    </select>
                </div>
                <div class="col">
                   <select name="term" id="term" class="form-select">
                        <option value="">choose Level of Study</option>
                        <option value="diploma">Diploma</option>
                        <option value="bachelor">Bachelor</option>
                    </select>
                </div>
          <div class="col">
            <button onclick="ExportToExcel()" class="btn btn-outline-success btn-sm pull-right mx-2">Export Excel <i class="bi bi-file-earmark-excel"></i> </button>
            <button onclick="createPDF()" class="btn btn-outline-danger btn-sm pull-right mx-2">Export pdf <i class="bi bi-file-earmark-pdf"></i> </button>
          </div>
        </div>
  </div>
  <div class="card-body">
    <h5 class="card-title">Final Year Project Groups Report<span> | {{ date('Y') - 1}}/{{date('Y')}}</span> </h5>

    <div class="table-responsive" id="tab">
      <table class="table table-bordered table-hovered table-sm text-center" id="table1">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Group Members</th>
            <th>Registration #</th>
          </tr>
        </thead>
        <tbody>
          @if(count($group_data) > 0)
          @foreach($group_data as $group)
          <tr >
            <td >{{ $group->group_id }}</td>
            <td>{{ strtoupper($group->fname) }} {{ strtoupper($group->mname) }} {{ strtoupper($group->lname) }}</td>
            <td>{{ $group->regno }}</td>
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

  </div>
</div>
<script src="{{ asset('js/export-excel.min.js') }}"></script>
<script>
// Use the plugin once the DOM has been loaded.
$(function () {
  // Apply the plugin
  var table = $('#table1').rowMerge({
    excludedColumns: [2,3],
  });
});
//////
function ExportToExcel(type, fn, dl) {
  var elt = document.getElementById('table1');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('groups.' + (type || 'xlsx')));
}
////
$(document).ready(function() {

  $('#search').on("keyup", function(){
    var value = $(this).val().toLowerCase();
    $("#table tr").filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
function createPDF() {
  var sTable = document.getElementById('tab').innerHTML;
  var style = "<style>";
  style = style + "table {width: 100%;font: 12px Calibri;}";
  style = style + "table, th, td {text-transform: capitalize;border: solid 1px #DDD; border-collapse: collapse;";
  style = style + "padding: 2px 3px;text-align: center;}";
  style = style + "</style>";
  // CREATE A WINDOW OBJECT.
  var win = window.open('', '', 'height=700,width=700');
  win.document.write('<html><head>');
  win.document.write('<title>groups report</title>');
  // <title> FOR PDF HEADER.
  win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
  win.document.write('</head>');
  win.document.write('<body>');
  win.document.write(sTable); // THE TABLE CONTENTS INSIDE THE BODY TAG.
  win.document.write('</body></html>');
  win.document.close();  // CLOSE THE CURRENT WINDOW.
  win.print(); // PRINT THE CONTENTS.
} </script>
@endsection

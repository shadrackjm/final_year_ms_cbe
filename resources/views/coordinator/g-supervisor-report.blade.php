@extends('layout/coordinator-lay')
@section('space-work')
<div class="card">
  <div class="card-header">
    
    <div class="row">
          <div class="col">
          <form action="{{ route('SearchGroupSupervisorReport') }}" method="get">
        <div class="row">
          <div class="col">
            <input type="year" name="date" pattern="^[0-9]{4}$"  class="form-control" placeholder="Year example:2000" value="{{ old('date')}}">
          </div>
          <div class="col">
            <input type="submit" name="" id="date"  class="btn btn-success btn-sm" value="search">
          </div>
        </div>
        </form>
          </div>
          <div class="col">
            <a href="/export/group/supervisor" class="btn btn-primary btn-sm pull-right">Export Excel <i class="bi bi-excel-file"></i></a>
            <button onclick="createPDF()" class="btn btn-danger btn-sm pull-right mx-2">Export pdf <i class="bi bi-file-earmark-pdf"></i> </button>
          </div>
        </div>
  </div>
  <div class="card-body">
    <h5 class="card-title">Group - Supervisor Report<span> | {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
    <div class="table-responsive" id="tab">
      <table class="table table-bordered table-hovered table-sm text-center text-nowrap" id="table1">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Title</th>
            <th>Group Members</th>
            <th>Registration #</th>
            <th>Assigned Supervisor</th>
          </tr>
        </thead>
        <tbody>
          @if(count($g_report) > 0)
          @foreach($g_report as $reports)
          <tr >
            <td >{{ $reports->group_id }}</td>
            <td>{{ $reports->title }}</td>
            <td>{{ strtoupper($reports->fname) }} {{ strtoupper($reports->mname) }} {{ strtoupper($reports->lname) }}</td>
            <td>{{ $reports->regno }}</td>
            <td>{{ strtoupper($reports->firstname) }} {{ strtoupper($reports->lastname) }}</td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="5">No Data Found!</td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
    {{$g_report->onEachSide(1)->links()}}

  </div>
</div>
<script src="{{ asset('js/export-excel.min.js') }}"></script>
<script >
$(function () {
  // Apply the plugin
  var table = $('#table1').rowMerge({
    excludedColumns: [3,4],
  });
});
function ExportToExcel(type, fn, dl) {
  var elt = document.getElementById('table1');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('Group-Supervisor Report.' + (type || 'xlsx')));
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
  win.document.write('<title>groups - supervisor report</title>');
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

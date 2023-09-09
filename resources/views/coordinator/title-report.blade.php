@extends('layout/coordinator-lay')
@section('space-work')
<div class="card">
  <div class="card-header">
    
   
        <div class="row">
          <div class="col">
          <form action="{{ route('SearchTitleReport') }}" method="get">
        <div class="row">
          <div class="col">
            <!-- <input type="year" name="date" pattern="^[0-9]{4}$"  class="form-control" placeholder="Year example:2000" value="{{ old('date')}}"> -->
            <input type="text" name="date"  class="form-control" placeholder="example:2020/2021" value="{{ old('date')}}" required>
          </div>
          <div class="col">
            <input type="submit" name="" id="date"  class="btn btn-success btn-sm" value="search">
          </div>
        </div>
        </form>
          </div>
          <div class="col">
            <button onclick="ExportToExcel('xlsx')" class="btn btn-primary btn-sm pull-right">Export Excel <i class="bi bi-excel-file"></i></button>
            <button onclick="createPDF()" class="btn btn-danger btn-sm pull-right mx-2">Export pdf <i class="bi bi-file-earmark-pdf"></i> </button>
          </div>
        </div>
   
  </div>
  <div class="card-body">
    <h5 class="card-title">Accepted Project Title Report <span>| {{ date('Y') - 1}}/{{date('Y')}}</span> <input type="text" name="search" id="search" class="pull-right"></h5>

    <div class="table-responsive" id="tab">
      <table class="table table-bordered table-hovered table-sm text-center" id="table1">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Project Title</th>
            <th>Group Members</th>
            <th>Registration #</th>
          </tr>
        </thead>
        <tbody id="table">
          @if(count($report) > 0)
          @foreach($report as $reports)
          <tr >
            <td >{{ $reports->group_id }}</td>
            <td>{{ $reports->title }}</td>
            <td class="no-wrap">{{ strtoupper($reports->fname) }} {{ strtoupper($reports->mname) }} {{ strtoupper($reports->lname) }}</td>
            <td>{{ $reports->regno }}</td>
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
<script >
$(function () {
  // Apply the plugin
  var table = $('#table1').rowMerge({
    excludedColumns: [4,5],
  });
});
function ExportToExcel(type, fn, dl) {
  var elt = document.getElementById('table1');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('Accepted Titles Report.' + (type || 'xlsx')));
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
  style = style + "table, th, td {text-transform: capitalize; border: solid 1px #DDD; border-collapse: collapse;";
  style = style + "padding: 2px 3px;text-align: center;}";
  style = style + "</style>";
  // CREATE A WINDOW OBJECT.
  var win = window.open('', '', 'height=700,width=800');
  win.document.write('<html><head>');
  win.document.write('<title>Project Title Report</title>');
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

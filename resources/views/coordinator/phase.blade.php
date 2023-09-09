@extends('layout/coordinator-lay')
@section('space-work')

<div class="card">
  <div class="card-header">
    
    <button onclick="ExportToExcel('xlsx')" class="btn btn-primary btn-sm pull-right">Export Excel <i class="bi bi-file-excel"></i></button>
    <button onclick="createPDF()" class="btn btn-danger btn-sm pull-right mx-2">Export pdf <i class="bi bi-file-earmark-pdf"></i> </button>

  </div>
  <div class="card-body">
    <h5 class="card-title">Project Phases and Sub - Phases Report<span> | {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
    <div class="table-responsive" id="tab">
      <table class="table table-bordered text-center" id="table1">
        <thead>
          <tr>
            <th>Phase</th>
            <th>Sub Phases</th>
          </tr>
        </thead>
        <tbody>
          @foreach($phase_data as $phases)
          <tr>
            <td >{{$phases->phase_name}}</td>
            <td >{{$phases->subphase_name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
$(function () {
  // Apply the plugin
  var table = $('#table1').rowMerge({
    excludedColumns: [3,4],
  });
});
</script>
<script>
function createPDF() {
  var sTable = document.getElementById('tab').innerHTML;
  var style = "<style>";
  style = style + "table {width: 100%;font: 12px Calibri;}";
  style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
  style = style + "padding: 2px 3px;text-align: center;}";
  style = style + "</style>";
  // CREATE A WINDOW OBJECT.
  var win = window.open('', '', 'height=700,width=800');
  win.document.write('<html><head>');
  win.document.write('<title>Project Phases & subphase Report</title>');
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

@extends('layout/coordinator-lay')
@section('space-work')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-md-6">
        <form action="{{ route('FinalReport') }}" method="get">
        <div class="row">
          <div class="col">
            <input type="year" name="date" pattern="^[0-9]{4}$"  class="form-control" placeholder="Year example:2000" value="{{ old('date')}}" required>
          </div>
          <div class="col">
            <input type="submit" name="" id="date"  class="btn btn-success btn-sm" value="search">

          </div>
        </div>
        </form>
        
      </div>
      <div class="col-md-2">
        <button onclick="createPDF()" class="btn btn-danger btn-sm pull-right">Export pdf <i class="bi bi-file-earmark-pdf"></i> </button>
      </div>
      <div class="col-md-2">
        <button onclick="ExportToExcel('xlsx')" class="btn btn-primary btn-sm pull-right" id="excel">Export Excel <i class="bi bi-excel-file"></i></button>
      </div>
    </div>
  </div>
  <div class="card-body" id="card">
    <h5 class="card-title">Final Project Report <span>| {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
<div class="table-responsive">
<table class="table table-bordered text-center" id="tab">
    <thead>
      <tr>
        <th colspan="3">Group Details</th>
        <th colspan="3" >Proposal Phase</th>
        <th colspan="5" >Implementation Phase</th>
        <th ></th>
      </tr>
        <tr>
            <th>Group No.</th>
            <th>Group Members</th>
            <th>Project Title</th>
            <th>introduction Presentation  (5 Marks)</th>
            <th>Final Presentation(5 Marks)</th>
            <th>Proposal Marks (10 Marks)</th>
            <th>Requirements Presentation (10 Marks)</th>
            <th>Development Presentation (10 Marks)</th>
            <th>Final Presentation (15 Marks)</th>
            <th>Supervisor Assessment (10 Marks)</th>
            <th>Project Report (30 Marks)</th>
            <th>TOTAL SCORE/100</th>
        </tr>
    </thead>
    <tbody>
    @if(count($presentation) > 0)
          @foreach($presentation as $group)
          <tr>
            @php
            $total = $group->p1 + $group->p2 + $group->p3 + $group->p4+ $group->p5+ $group->p6+ $group->p7+ $group->p8;
            @endphp
            <td>{{ $group->group_id}}</td>
            <td class="text-nowrap text-capitalize">{{$group->fname}} {{$group->mname}} {{$group->lname}}</td>
            <td class="text-nowrap text-capitalize">{{ $group->title}}</td>
            <td>{{ number_format($group->p1,2)}}</td>
            <td>{{number_format($group->p2,2)}}</td>
            <td>{{number_format($group->p3,2)}}</td>
            <td>{{number_format($group->p4,2)}}</td>
            <td>{{number_format($group->p5,2)}}</td>
            <td>{{number_format($group->p6,2)}}</td>
            <td>{{number_format($group->p7,2)}}</td>
            <td>{{number_format($group->p8,2)}}</td>
            <td>{{number_format($total,2)}}</td>
            </tr>
          @endforeach
          @else
          <tr>
            <td colspan="12" >No Data Found!</td>
          </tr>
          @endif
    </tbody>

</table>
</div>
</div>
</div>
<script src="{{ asset('js/export-excel.min.js') }}"></script>

<script>


$(function () {
  // Apply the plugin
  var table = $('#tab').rowMerge({
    excludedColumns: [2,4,5,6,7,8,9,10,11,12,13,14],
  });
});
//exporting tables to excel
function ExportToExcel(type, fn, dl) {
  var elt = document.getElementById('tab');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('Project Final Report.' + (type || 'xlsx')));
}

function createPDF() {
  var sTable = document.getElementById('card').innerHTML;
  var style = "<style>";
  style = style + "table {text-transform: capitalize; width: 100%;font: 12px Calibri;}";
  style = style + "table, th, td { border: solid 1px #DDD; border-collapse: collapse;";
  style = style + "padding: 2px 3px;text-align: center;}";
  style = style + "</style>";
  // CREATE A WINDOW OBJECT.
  var win = window.open('', '', 'height=700,width=800');
  win.document.write('<html><head>');
  win.document.write('<title>Project Presentations Final Report</title>');
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

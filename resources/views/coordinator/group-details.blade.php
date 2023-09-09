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
      <div class="col-md-3">
        
      </div>
      <div class="col-md-2 my-1">
        <a href="/import/groups" class="btn btn-warning btn-sm mx-2">Import</a>

      </div>
      <div class="col-md-2 my-1">
        <a href="/add/member" class="btn btn-info btn-sm mx-2">create/add member</a>

      </div>
      <div class="col-md-2 my-1">
        <a href="/remove/member" class="btn btn-secondary btn-sm mx-2">shift member</a>

      </div>
      <div class="col-md-3 my-1">
        <a href="/assign/supervisor" class="btn btn-success btn-sm mx-2">assign supervisor</a>

      </div>
    </div>

  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Project Groups<span> | {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
    <div class="table-responsive">

      <table class="table table-bordered table-sm text-center text-nowrap" id="table1">
        <thead>
          <tr>
            <th>Group Number</th>
            <th>Group Members</th>
            <th>Registration Number</th>
            <th colspan="2">Group Status</th>
          </tr>
        </thead>
        <tbody>
          @if(count($group_data) > 0)
          @foreach($group_data as $group)
          <tr >
            <td >{{ $group->group_id }}</td>
            <td>{{ strtoupper($group->fname) }} {{ strtoupper($group->mname) }} {{ strtoupper($group->lname) }}</td>
            <td>{{ $group->regno }}</td>
            @if($group->has_group == 2)
            <td><span class="badge bg-danger p-2">incomplete!</span></td>
            <td></td>
            @elseif($group->has_group == 3)
            <td><span class="badge bg-warning p-2">pending Requests</span></td>
            <td></td>
            @elseif($group->has_group == 1)
            <td><span class="badge bg-success p-2">completed!</span></td>
            <td></td>
            @elseif($group->has_group == 10)
            <td><span class="badge bg-info p-2">Group Creator</span></td>
            <td><button class="btn btn-primary btn-sm">mark complete</button></td>
            @elseif($group->has_group == 5)
            <td><span class="badge bg-info p-2">Group Creator</span></td>
            <td></td>
            @endif
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
      {{$group_data->onEachSide(1)->links()}}
  </div>
</div>

<script src="{{ asset('js/export-excel.min.js') }}"></script>
<script>
// Use the plugin once the DOM has been loaded.
$(function () {
  // Apply the plugin
  var table = $('#table1').rowMerge({
    excludedColumns: [2,3,4,5],
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
@endsection

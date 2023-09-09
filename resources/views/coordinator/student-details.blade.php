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
    <input type="text" name="" id="search" class="mx-2 pull-right">
    <a href="/register/students" class="btn btn-outline-success btn-sm pull-right mx-2">Add Student</a>
    <a href="/import/students" class="btn btn-outline-info btn-sm pull-right mx-2">Import</a>
    <a href="/export/students" class="btn btn-outline-warning btn-sm pull-right mx-2">export</a>
    <!-- <button onclick="ExportToExcel('xlsx')" class="btn btn-outline-primary btn-sm pull-right">Export Excel <i class="bi bi-file-excel"></i></button> -->
  </div>
  <div class="card-body">
    <h5 class="card-title">Students' Details <span>| {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
    <div class="table-responsive">
      <table class="table table-bordered text-nowrap table-sm text-center" id="tb1">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Student Name</th>
            <th>Registration #</th>
            <th colspan="2">Contact</th>
            <th>Level of Study</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody id="table">
          @if(count($student_data) > 0)
          @foreach($student_data as $student)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ strtoupper($student->fname) }} {{ strtoupper($student->mname) }} {{ strtoupper($student->lname) }}</td>
            <td>{{ $student->regno }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->level }}</td>
            <td> <a href="/edit/students/{{ $student->id}}" class="btn btn-info btn-sm">Edit</a> </td>
            <!-- <td> <a href="/delete/students/{{ $student->id}}/{{ $student->regno}}"  onclick="return confirm('Are you sure you want to delete {{ $student->fname }} {{ $student->mname }}')"class="btn btn-danger btn-sm">Delete</a> </td> -->
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="5" >No Data Found!</td>
          </tr>
          @endif
        </tbody>
      </table>

    </div>

  </div>
</div>
<script src="{{ asset('js/export-excel.min.js') }}"></script>
<script type="text/javascript">
function ExportToExcel(type, fn, dl) {
  var elt = document.getElementById('tb1');
  var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
  return dl ?
  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
  XLSX.writeFile(wb, fn || ('students.' + (type || 'xlsx')));
}
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

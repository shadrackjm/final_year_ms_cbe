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
    Project Phases & SubPhases Report

    <a href="/add/subphases" class="btn btn-success btn-sm pull-right">Add New Phase</a>
    <input type="text" name="" id="search" class="mx-2 pull-right">

  </div>
  <div class="card-body">
    <div class="table-responsive" id="tab">
      <table class="table table-bordered text-center" id="table1">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Phase</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody id="table">
          @foreach($subphase_data as $phases)
          <tr>
            <td >{{$loop->iteration}}</td>
            <td >{{$phases->subphase_name}}</td>
            <td ><a href="/edit/subphase/{{$phases->id}}" class="btn btn-info btn-sm">edit</a> </td>
            <td ><a href="/delete/subphase/{{$phases->id}}" onclick="return confirm('Are you Sure you want to delete {{$phases->subphase_name}} ?')" class="btn btn-danger btn-sm">delete</a> </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$subphase_data->onEachSide(1)->links()}}

    </div>
  </div>
</div>
<script>
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

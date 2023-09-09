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
    Import Students
  </div>
  <div class="card-body">
    <form action="{{ route('importStudent')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group my-2">
        <label for="">Upload Excel File .xlsx</label>
        <input type="file" name="file" class="form-control">
        <span class="text-danger">@error('file'){{$message}} @enderror</span>
      </div>
      <button type="submit" name="button" class="btn btn-success btn-sm save"><i class="bi bi-save"></i> Save</button>
    </form>
  </div>
</div>
@endsection

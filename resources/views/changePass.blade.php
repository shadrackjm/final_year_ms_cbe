@extends('layout/stude-lay')
@section('space-work')
<div class="card">
  <div class="card-header">fill form accurately</div>
  <div class="col-7  m-3">
    <div class="card-body">
      @if(Session::has('success'))
      <div class="alert alert-success p-2">{{Session::get('success')}}</div>
      @endif
      @if(Session::has('fail'))
      <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
      @endif
      <form action="{{ route('ChangePassword') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="">current password</label>
          <input type="password" name="curr_pass" class="form-control" placeholder="Enter current password" value="{{ old('curr_pass') }}">
          <span class="text-danger">@error('curr_pass'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
          <label for="">new password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter new password" >
          <span class="text-danger">@error('password'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
          <label for="">confirm new password</label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm  new password">
          <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span>
        </div>
        <button type="reset" class="btn btn-secondary btn-sm" >cancel</button>
        <input type="submit" class="btn btn-success btn-sm" value="save">
      </form>
    </div>
  </div>
</div>

@endsection

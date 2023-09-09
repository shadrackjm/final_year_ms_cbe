@extends('layout/student-lay')
@section('space-work')
@if(Session::has('success'))
<div class="alert alert-success p-2">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
@endif
<div class="card">
  <div class="card-header">
    Assigned Supervisor
  </div>
  <div class="card-body text-center">
    <h4 class="text-center label">Group  Details</h4><hr>
    Group Members :
    @foreach($group_supervisor as $group)
    <h5 style="text-transform:capitalize;"><b> <i class=""> {{ $group->fname }} {{ $group->mname }} {{ $group->lname }} </i></b></h5>
    @endforeach
    <hr>
    <h3 class="label" style="text-transform:capitalize;" >Assigned Supervisor :<b> <i class=""> {{ $value->firstname }} {{ $value->middlename }} {{ $value->lastname }} </i></b></h3>
    
    <br>

  </div>
</div>


@endsection

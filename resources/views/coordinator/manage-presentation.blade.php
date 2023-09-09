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
    
    <a href="/disableall/presentation/" onclick=" return confirm('Are you sure you want to Disable All Phases ?')" class="btn btn-secondary btn-sm pull-right" title="Disable All the Presentation Phases">Disable All</a>
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Presentations<span> | {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
    <h6 class="text-success">click <b>`enable button`</b> to allow supervisors to assess student groups according to the <b>selected phase of presentation only!</b></h6>
    <div class="table-responsive">
      <table class="table text-center table-bordered text-nowrap">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Presentations Phases</th>
            <th colspan="2">Action </th>
          </tr>
        </thead>
        <tbody>
          @if(count($subphase_data) > 0)
          @foreach($subphase_data as $presentation)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ strtoupper($presentation->subphase_name) }}</td>
            <!-- if allow_status == 0 - not allowed -->
            <!-- if allow_status == 1 -  allowed -->
            <!-- if allow_status == 2 -  completed & can be allowed again -->
            @if($presentation->allow_status == 0)
            <td><a href="/enable/presentation/{{$presentation->id}}" onclick=" return confirm('Are you sure you want to Enable this Phase ?')" class="btn btn-primary btn-sm">Enable</a></td>
            @elseif($presentation->allow_status == 1)
            <td><a href="/disable/presentation/{{$presentation->id}}" onclick=" return confirm('Are you sure you want to Disable this Phase ?')" class="btn btn-danger btn-sm">Disable</a></td>
            <td><a href="/completed/presentation/{{$presentation->id}}" onclick=" return confirm('Are you sure you want to Mark this Phase as complete?')" class="btn btn-success btn-sm">Complete</a></td>
            @elseif($presentation->allow_status == 2)
            <td><button disabled class="btn btn-success btn-sm">Completed</button></td>
            @endif
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
    {{$subphase_data->onEachSide(1)->links()}}

  </div>

</div>
<script>

</script>

@endsection

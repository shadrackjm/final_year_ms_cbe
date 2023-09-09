@extends('layout/coordinator-lay')
@section('space-work')
<div class="card">
  <div class="card-header">
    
    <a href="/add/announcement" class="btn btn-success btn-sm pull-right">Add New</a>
  </div>
  <div class="card-body">
    <h5 class="card-title">Manage Announcements<span> | {{ date('Y') - 1}}/{{date('Y')}}</span></h5>
    <div class="table-responsive">
      <table class="table datatable">
        <thead>
          <tr>
            <th>Level of Study</th>
            <th>Title</th>
            <th>Body</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($announces as $announcement)
          <tr>
            <td>{{ strtoupper($announcement->level) }}</td>
            <td>{{ $announcement->title }}</td>
            <td class="text-wrap">{{ $announcement->body }}</td>
            <td><a href="/edit/announcement/{{$announcement->id}}" class="btn btn-info btn-sm">Edit</a></td>
            <td><a href="/delete/announcement/{{$announcement->id}}" onclick=" return confirm('Are you sure you want to delete {{$announcement->title}} ?')" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
          @endforeach
          <!--  -->
        </tbody>
      </table>
    </div>
  </div>

</div>
<script>

</script>

@endsection

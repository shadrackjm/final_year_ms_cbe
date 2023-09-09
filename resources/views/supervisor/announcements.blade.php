@extends('layout/supervisor-lay')
@section('space-work')
<link href="{{ asset('notification/style.css') }}" rel="stylesheet">
<script src="{{ asset('notification/timeago.min.js') }}"></script>
<h3 class="m-b-40 heading-line">Notifications <i class="bi bi-bell-fill text-muted"></i></h3>

<div class="notification-ui_dd-content">
  @if(count($announcement) > 0)
  @foreach($announcement as $announcements)
  <div class="notification-list notification-list--unread">
    <div class="notification-list_content">
      <div class="notification-list_img">
        <img src="{{ asset('images/user.png') }}" alt="user">
      </div>
      <div class="notification-list_detail">
        <p><b>Project Coordinator</b>  - <strong>{{ $announcements->title}}</strong></p> <hr>
        <p class="text-muted"><br> {{$announcements->body}}</p>
        <time class="timeago" datetime="{{ $announcements->created_at}}"></time>
      </div>
    </div>
  </div>
  @endforeach
  @else
  <td colspan="4" >No Announcement Found!</td>
  @endif
</div>
{{$announcement->onEachSide(1)->links()}}

<script type="text/javascript">
$("time.timeago").timeago();
</script>
@endsection

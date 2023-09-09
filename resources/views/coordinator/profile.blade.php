@extends('layout/coordinator-lay')
@section('space-work')
@if(Session::has('success'))
<div class="alert alert-success p-2">{{Session::get('success')}}</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
@endif
<div class="pagetitle">
  <h1>Coordinator Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Users</li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section profile">
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
          @if($data->photo == null)
          <img src="{{ asset('uploads/profiles/user.png') }}" alt="Profile" class="rounded-circle">
          @else
          <img src="{{ asset('uploads/profiles/coordinator/' . $data->photo) }}" alt="Profile" class="rounded-circle">
          @endif
          <h2 class="" style="text-transform:capitalize;">{{ $data->fname }} {{ $data->lname }}</h2>
          <h3>Project Coordinator</h3>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile Picture</button>
            </li>


            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="profile-overview">

              <h5 class="card-title">Profile Details</h5>

              <div class="row">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8" style="text-transform:capitalize;">{{ $data->fname }} {{ $data->Mname }} {{ $data->lname }}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Phone</div>
                <div class="col-lg-9 col-md-8">+255 {{ $data->phone}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $data->email}}</div>
              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 label">Last Login</div>
                <div class="col-lg-9 col-md-8">{{ auth()->user()->last_login }}</</div>
              </div>

            </div>
            </div>

            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <div class="row mb-3">
                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                <div class="col-md-8 col-lg-9">
                  @if($data->photo == null)
                  <img src="{{ asset('uploads/profiles/user.png') }}" alt="Profile" class="rounded-circle">
                  @else
                  <img src="{{ asset('uploads/profiles/coordinator/' . $data->photo) }}" alt="Profile" class="rounded-circle">
                  @endif
                  <div class="pt-2">
                    <form class="" action="{{ route('uploadPhoto')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="file" name="picture" class="form-control">
                      <input type="submit" name="" class="btn btn-success btn-sm my-2">
                      <a href="/delete/profile/pic" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                    </form>
                  </div>
                </div>
              </div>

            </div>


            <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form action ="{{route('changePassword')}}" method='post'>
                @csrf
                <div class="row mb-3">
                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="currentPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="newPassword">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password_confirmation" type="password" class="form-control" id="renewPassword">
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form><!-- End Change Password Form -->
            </div>

          </div><!-- End Bordered Tabs -->

        </div>
      </div>

    </div>
  </div>
  @endsection

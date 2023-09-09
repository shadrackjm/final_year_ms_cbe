<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$title}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('images/logos.png')}}" rel="icon">
  <link href="{{ asset('images/logos.png')}}" rel="apple-touch-icon">

  
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <!-- <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet"> -->
  <!-- <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/export-excel.min.js') }}"></script>
  <script src="{{ asset('row_merger/dist/row-merge-bundle.min.js') }}"></script>
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/student/home" class="logo d-flex align-items-center">
        <img src="{{ asset('images/logos.png')}}" alt="">
        <span class="d-none d-lg-block">Final Year Projects</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- top bar sppace -->
        <li class="nav-item dropdown">
        <li class="nav-item dropdown">

<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
  <i class="bi bi-bell"></i>
  <span class="badge bg-primary badge-number">4</span>
</a><!-- End Notification Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
  <li class="dropdown-header">
    You have 4 new notifications
    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-exclamation-circle text-warning"></i>
    <div>
      <h4>Lorem Ipsum</h4>
      <p>Quae dolorem earum veritatis oditseno</p>
      <p>30 min. ago</p>
    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-x-circle text-danger"></i>
    <div>
      <h4>Atque rerum nesciunt</h4>
      <p>Quae dolorem earum veritatis oditseno</p>
      <p>1 hr. ago</p>
    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-check-circle text-success"></i>
    <div>
      <h4>Sit rerum fuga</h4>
      <p>Quae dolorem earum veritatis oditseno</p>
      <p>2 hrs. ago</p>
    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>

  <li class="notification-item">
    <i class="bi bi-info-circle text-primary"></i>
    <div>
      <h4>Dicta reprehenderit</h4>
      <p>Quae dolorem earum veritatis oditseno</p>
      <p>4 hrs. ago</p>
    </div>
  </li>

  <li>
    <hr class="dropdown-divider">
  </li>
  <li class="dropdown-footer">
    <a href="#">Show all notifications</a>
  </li>

</ul><!-- End Notification Dropdown Items -->

</li><!-- End Notification Nav -->

        </li><!-- End Messages Nav -->
        @php 
        $first_name = $logged_in_student->fname;
        $first_char = $first_name[0];
        @endphp
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if($logged_in_student->photo == null)
            <img src="{{ asset('uploads/profiles/user.png') }}" alt="Profile" class="rounded-circle">
            @else
            <img src="{{ asset('uploads/profiles/student/' . $logged_in_student->photo) }}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2" style="text-transform:capitalize;">{{ $first_char}}.{{ $logged_in_student->lname}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 style="text-transform:capitalize;">{{ $logged_in_student->fname }} {{ $logged_in_student->lname }}</h6>
              <span>Student</span>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/student/home">
          <i class="bi bi-house-fill"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart-fill"></i><span>My Project</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/group">
              <i class="bi bi-circle"></i><span>Create Group</span>
            </a>
          </li>
          <li>
            <a href="/project/groups">
              <i class="bi bi-circle"></i><span>My Group</span>
            </a>
          </li>
          <li>
            <a href="/project/title">
              <i class="bi bi-circle"></i><span>Project Titles</span>
            </a>
          </li>



          <li>
            <a href="/proposal/upload">
              <i class="bi bi-circle"></i><span>Project Proposals</span>
            </a>
          </li>
          <li>
            <a href="/view/supervisor">
              <i class="bi bi-circle"></i><span>Supervisors</span>
            </a>
          </li>

        </ul>
        <li class="nav-item">
          <a class="nav-link collapsed" href="/view/announcement">
            <i class="bi bi-bell"></i>
            <span>Announcements</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="/view/titles">
            <i class="bi bi-card-checklist"></i>
            <span>Project Titles</span>
          </a>
        </li>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('space-work')
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
  <!-- <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script> -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script> -->
  <!-- <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script> -->
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <!-- <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> -->

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>

</body>

</html>

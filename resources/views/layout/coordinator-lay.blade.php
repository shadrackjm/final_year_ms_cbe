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
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
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
      <a href="/coordinator/dashboard" class="logo d-flex align-items-center">
        <img src="{{ asset('images/logos.png')}}" alt="">
        <span class="d-none d-lg-block">FYPMS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- top bar sppace -->
        <li class="nav-item dropdown">


        </li><!-- End Messages Nav -->
        @php $first_name = $data->fname;
        $first_char = $first_name[0];
        @endphp
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if($data->photo == null)
            <img src="{{ asset('uploads/profiles/user.png') }}" alt="Profile" class="rounded-circle">
            @else
            <img src="{{ asset('uploads/profiles/coordinator/' . $data->photo) }}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2" style="text-transform:capitalize;">{{ $first_char}}.{{ $data->lname}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 style="text-transform:capitalize;">{{ $data->fname }} {{ $data->lname }}</h6>
              <span>Project Coordinator</span>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/profile">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
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
        <a class="nav-link" href="/coordinator/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="/group/size">
              <i class="bi bi-circle"></i><span>Groups Size</span>
            </a>
          </li>
          <li>
            <a href="/group/detail">
              <i class="bi bi-circle"></i><span>Project Groups</span>
            </a>
          </li>
          <li>
            <a href="/group/supervisor/detail">
              <i class="bi bi-circle"></i><span>Group Supervisor</span>
            </a>
          </li>
          <li>
            <a href="/student/titles">
              <i class="bi bi-circle"></i><span>Project Titles</span>
            </a>
          </li>
          <li>
            <a href="/view/proposal/">
              <i class="bi bi-circle"></i><span>Project Proposals</span>
            </a>
          </li>
          <li>
            <a href="/coordinator/manage/supervisors">
              <i class="bi bi-circle"></i><span>Supervisors</span>
            </a>
          </li>

          <li>
            <a href="/coordinator/manage/students">
              <i class="bi bi-circle"></i><span>Students</span>
            </a>
          </li>



        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/manage/presentation">
          <i class="bi bi-file-earmark-ppt"></i>
          <span>Manage Presentations</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-diagram-3"></i><span>Phase Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/phases">
              <i class="bi bi-circle"></i><span> Phases</span>
            </a>
          </li>
          <li>
            <a href="/subphases">
              <i class="bi bi-circle"></i><span>Sub Phases</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span> Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/presentation/reports">
              <i class="bi bi-circle"></i><span>Presentation report</span>
            </a>
          </li>
          <li>
            <a href="/final/report">
              <i class="bi bi-circle"></i><span>Final Report</span>
            </a>
          </li>
          <!-- <li>
            <a href="/presentation/reports/charts">
              <i class="bi bi-circle"></i><span>Charts</span>
            </a>
          </li> -->
          <li>
            <a  href="/title/report">
              <i class="bi bi-circle"></i>
              <span>Project Title Report</span>
            </a>
          </li>
          <li>
            <a  href="/group-supervisor/report">
              <i class="bi bi-circle"></i>
              <span>Group Supervisor Report</span>
            </a>
          </li>
          <li>
            <a  href="/groups/report">
              <i class="bi bi-circle"></i>
              <span>Group Report</span>
            </a>
          </li>
          <li>
            <a  href="/manage/phases">
              <i class="bi bi-circle"></i>
              <span>Project Phases Report</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/manage/announcement">
          <i class="bi bi-bell"></i>
          <span>Manage Announcements</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="/profile">
          <i class="bi bi-person-fill"></i>
          <span>Profile</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('space-work')
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/functions.js') }}"></script>
  <script src="{{ asset('counter/waypoints-min.js') }}"></script>
  <script src="{{ asset('counter/counterup.min.js') }}"></script>

</body>

</html>

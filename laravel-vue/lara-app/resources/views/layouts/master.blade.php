<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PoUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>
<body>
  <div class="row" id="proBanner">
    <div class="col-12">
      <span class="d-flex align-items-center purchase-popup">
        <p>Welcome home! Get some amazing article for blog go here.</p>
        <a href="https://bootstrapdash.com/demo/polluxui/template/index.html?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Go to Page</a>
        <i class="typcn typcn-delete-outline" id="bannerClose"></i>
      </span>
    </div>
  </div>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('partials.navbar')
    <!-- partial -->
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
      <div class="navbar-links-wrapper d-flex align-items-stretch">
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-calendar-outline"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-mail"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-folder"></i></a>
        </div>
        <div class="nav-link">
          <a href="javascript:;"><i class="typcn typcn-document-text"></i></a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Dashboard</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Main Dahboard</p>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-search d-none d-md-block mr-0">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="typcn typcn-zoom"></i>
                </span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('partials.panel')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('partials.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              @yield('content')
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('partials.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/template.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}"></script>
  <script src="{{asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>
</html>
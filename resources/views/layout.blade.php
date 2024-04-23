<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aplikasi Kasir</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/assets_dashboard/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/assets_dashboard/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/assets_dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets_dashboard/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets_dashboard/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets_dashboard/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets_dashboard/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets_dashboard/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/assets_dashboard/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/assets_dashboard/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <a href="index.html" class="logo  d-flex align-items-center" style="gap: 30px;">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Aplikasi Kasir</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name}}</h6>
              <span>Role : {{Auth::user()->role}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
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
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      @if(Auth::user()->role=='administrator')
            <li class="nav-item">
                <a class="nav-link collapsed" href="/data-user">
                <i class="bi bi-person-circle"></i>
                <span>Data User</span>
                </a>
            </li>

        @endif

        <li class="nav-item">
          <a class="nav-link" href="/list-product">
            <i class="bi bi-box2"></i>
            <span>Produk</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="/sales-data">
            <i class="bi bi-credit-card"></i>
            <span>Penjualan</span>
          </a>
        </li>

    </ul>

  </aside><!-- End Sidebar-->

  @yield('layout')
    
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
      <!-- Vendor JS Files -->
      <script src="{{asset('assets/assets_dashboard/vendor/apexcharts/apexcharts.min.js')}}"></script>
      <script src="{{asset('assets/assets_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/assets_dashboard/vendor/chart.js/chart.umd.js')}}"></script>
      <script src="{{asset('assets/assets_dashboard/vendor/echarts/echarts.min.js')}}"></script>
      <script src="{{asset('assets/assets_dashboard/vendor/quill/quill.min.js')}}"></script>
      <script src="{{asset('assets/assets_dashboard/vendor/simple-datatables/simple-datatables.js')}}"></script>
      <script src="{{asset('assets/assets_dashboard/vendor/tinymce/tinymce.min.js')}}"></script>
      <script src="{{asset('assets/assets_dashboard/vendor/php-email-form/validate.js')}}"></script>
    
      <!-- Template Main JS File -->
      <script src="{{asset('assets/assets_dashboard/js/main.js')}}"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    </body>
    
    </html>
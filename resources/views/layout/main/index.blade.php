<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ucfirst($title)}} - {{ucfirst(config('app.name'))}}</title>
<meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
<meta property="og:title" content="Admin Templates - Dashboard Templates">
<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
<meta property="og:type" content="Website">
<link rel="shortcut icon" href="{{asset('app_assets/assets/images/favicon.svg')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/fonts/remix/remixicon.css')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/css/main.min.css')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}">

<link rel="stylesheet" href="{{asset('app_assets/assets/vendor/datatables/dataTables.bs5.css')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/vendor/datatables/dataTables.bs5-custom.css')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/vendor/datatables/buttons/dataTables.bs5-custom.css')}}">
@stack('styles')

</head>
<body>
@include('layout.main.partials.loader')
<div class="page-wrapper">
<div class="app-header d-flex align-items-center">
<div class="d-flex">
<button class="toggle-sidebar">
<i class="ri-menu-line"></i>
</button>
<button class="pin-sidebar">
<i class="ri-menu-line"></i>
</button>
</div>
<div class="app-brand ms-3">
<a href="index.html" class="d-lg-block d-none">
<img src="{{asset('app_assets/assets/images/logo.jpg')}}" class="logo" alt="Medicare Admin Template">
</a>
<a href="index.html" class="d-lg-none d-md-block">
<img src="{{asset('app_assets/assets/images/logo-sm.svg')}}" class="logo" alt="Medicare Admin Template">
</a>
</div>
<div class="header-actions">
<div class="search-container d-lg-block d-none mx-3">
<input type="text" class="form-control" id="searchId" placeholder="Search">
<i class="ri-search-line"></i>
</div>
<div class="d-lg-flex d-none gap-2">
<div class="dropdown">
<a class="dropdown-toggle header-icon" href="#!" role="button" data-bs-toggle="dropdown"
aria-expanded="false">
<i class="ri-alarm-warning-line"></i>
<span class="count-label success"></span>
</a>
<div class="dropdown-menu dropdown-menu-end dropdown-300">
<h5 class="fw-semibold px-3 py-2 text-primary">Users Online</h5>
<div class="scroll300">
<div class="p-3">
<div class="d-flex py-2">
<div class="icon-box md bg-info rounded-circle me-3">
<span class="fw-bold fs-6 text-white">DS</span>
</div>
<div class="m-0">
<h6 class="mb-1 fw-semibold">Douglass Shaw</h6>
<p class="mb-1">
Appointed as a new President 2014-2025
</p>
<p class="small m-0 opacity-50">Today, 07:30pm</p>
</div>
</div>
<div class="d-flex py-2">
<div class="icon-box md bg-danger rounded-circle me-3">
<span class="fw-bold fs-6 text-white">WG</span>
</div>
<div class="m-0">
<h6 class="mb-1 fw-semibold">Willie Garrison</h6>
<p class="mb-1">
Congratulate, James for new job.
</p>
<p class="small m-0 opacity-50">Today, 08:00pm</p>
</div>
</div>
<div class="d-flex py-2">
<div class="icon-box md bg-warning rounded-circle me-3">
<span class="fw-bold fs-6 text-white">TJ</span>
</div>
<div class="m-0">
<h6 class="mb-1 fw-semibold">Terry Jenkins</h6>
<p class="mb-1">
Lewis added new doctors training schedule.
</p>
<p class="small m-0 opacity-50">Today, 09:30pm</p>
</div>
</div>
</div>
</div>
<div class="d-grid m-3">
<a href="javascript:void(0)" class="btn btn-primary">Logout</a>
</div>
</div>
</div>
<div class="dropdown">
<a class="dropdown-toggle header-icon" href="#!" role="button" data-bs-toggle="dropdown"
aria-expanded="false">
<i class="ri-message-3-line"></i>
<span class="count-label"></span>
</a>
<div class="dropdown-menu dropdown-menu-end dropdown-300">
<h5 class="fw-semibold px-3 py-2 text-primary">Active Bookings</h5>
<div class="scroll300">
<div class="p-3">
<div class="d-flex py-2">
<img src="{{asset('app_assets/assets/images/user3.png')}}" class="img-shadow img-3x me-3 rounded-5"
alt="Hospital Admin Templates">
<div class="m-0">
<h6 class="mb-1 fw-semibold">Nick Gonzalez</h6>
<p class="mb-1">
Appointed as a new President 2014-2025
</p>
<p class="small m-0 opacity-50">Today, 07:30pm</p>
</div>
</div>
<div class="d-flex py-2">
<img src="{{asset('app_assets/assets/images/user1.png')}}" class="img-shadow img-3x me-3 rounded-5"
alt="Hospital Admin Templates">
<div class="m-0">
<h6 class="mb-1 fw-semibold">Clyde Fowler</h6>
<p class="mb-1">
Congratulate, James for new job.
</p>
<p class="small m-0 opacity-50">Today, 08:00pm</p>
</div>
</div>
<div class="d-flex py-2">
<img src="{{asset('app_assets/assets/images/user4.png')}}" class="img-shadow img-3x me-3 rounded-5"
alt="Hospital Admin Templates">
<div class="m-0">
<h6 class="mb-1 fw-semibold">Sophie Michiels</h6>
<p class="mb-1">
Lewis added new doctors training schedule.
</p>
<p class="small m-0 opacity-50">Today, 09:30pm</p>
</div>
</div>
</div>
</div>
<div class="d-grid m-3">
<a href="#" class="btn btn-primary">Logout</a>
</div>
</div>
</div>
</div>
<div class="dropdown ms-2">
<a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
data-bs-toggle="dropdown" aria-expanded="false">
<div class="avatar-box">QHR<span class="status busy"></span></div>
</a>
<div class="dropdown-menu dropdown-menu-end shadow-lg">
<div class="px-3 py-2">
<span class="small">Admin</span>
<h6 class="m-0">Gabriel Duon-Naah</h6>
</div>
<div class="mx-3 my-2 d-grid">
<a href="login.html" class="btn btn-danger">Logout</a>
</div>
</div>
</div>
</div>
</div>
<div class="main-container">
@include('includes.menu.index')
<div class="app-container">
<div class="app-hero-header d-flex align-items-center">
@stack('breadcrumbs')
@stack('breadcrumbs_right')
</div>
<div class="app-body">
@stack('page_head')
@stack('page_head2')
@yield('main_content_body')
</div>
<div class="app-footer bg-white">
@php
$date_code = Date('Y')
@endphp
<span>© Quabennya Hills Resort {{$date_code}}</span>
</div>
</div>
</div>
</div>
<script src="{{asset('app_assets/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('app_assets/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('app_assets/assets/js/moment.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/apex/custom/home/patients.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/apex/custom/home/treatment.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/apex/custom/home/available-beds.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/apex/custom/home/earnings.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/apex/custom/home/gender-age.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/apex/custom/home/claims.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/buttons/jszip.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/buttons/pdfmake.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/buttons/vfs_fonts.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('app_assets/assets/vendor/datatables/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('app_assets/assets/js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('customed_js')
</body>
</html>

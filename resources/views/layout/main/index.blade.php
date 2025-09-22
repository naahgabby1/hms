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
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('app_assets/assets/vendor/datatables/dataTables.bs5.css')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/vendor/datatables/dataTables.bs5-custom.css')}}">
<link rel="stylesheet" href="{{asset('app_assets/assets/vendor/datatables/buttons/dataTables.bs5-custom.css')}}">
@stack('styles')

</head>
<body>
@include('layout.main.partials.loader')
<div class="page-wrapper">
<div class="app-header d-flex align-items-center" style="background: #0f8284">
<div class="d-flex">
<button class="toggle-sidebar">
<i class="ri-menu-line"></i>
</button>
<button class="pin-sidebar">
<i class="ri-menu-line"></i>
</button>
</div>
<div class="app-brand ms-3">
<a href="{{ route('dashboard') }}" class="d-lg-block d-none">
<h6 class="text-uppercase" style="font-family: monospace; color:white;padding-top:10px;font-weight:bold">
{{ hotel_details()->name }}</h6>
</a>
<a href="{{ route('dashboard') }}" class="d-lg-none d-md-block">
<img src="{{asset('app_assets/assets/logo/logo.jpg')}}" class="logo" alt="Logo">
</a>
</div>
<div class="header-actions">
<div class="d-lg-flex d-none gap-2">
<div class="dropdown">
<a class="dropdown-toggle header-icon" href="#!" role="button" data-bs-toggle="dropdown"
aria-expanded="false">
<i class="ri-account-circle-line"></i>
<span class="count-label danger"></span>
</a>
<div class="dropdown-menu dropdown-menu-end dropdown-300 align-content-center">
<center>
<h5 class="fw-semibold px-3 py-2 text-primary">You Are Online</h5>
<div class="scroll200">
<div class="p-3">
<center>
<img src="{{asset('app_assets/assets/logo/logo.jpg')}}"
class="img-shadow img-3x me-3"
style="height:60%;width:60%"
alt="Logo">
</center>
</div>
</div>
<div class="d-grid m-3">
<button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
Logout
</button>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</center>
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
<div class="row">
<div class="col-xl-6 col-md-6 col-xxl-6 col-sm-12 col-xs-12 text-start" style="padding-top: 10px">
<span style="padding-top: 20px; color: #0f8284;">© Quabennya Hills Resort</span>
</div>
<div class="col-xl-6 col-md-6 col-xxl-6 col-sm-12 col-xs-12 text-end">
<a href="{{ route('dashboard')}}" class="btn btn-outline-primary me-2">Hotel Management</a>
<a href="{{ route('finance.dashboard')}}" class="btn btn-outline-primary me-2">Financial Management</a>
<a href="{{ route('house.keepings.dashboard')}}" class="btn btn-outline-primary">House Keeping Management</a>
</div>
</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
@if(Session::has('success'))
toastr.success("{{ strtoupper(Session::get('success')) }}", 'SUCCESS', {
closeButton: true,
progressBar: true,
timeOut: 4000
});
@endif

@if(Session::has('error'))
toastr.error("{{ strtoupper(Session::get('error')) }}", 'ERROR', {
closeButton: true,
progressBar: true,
timeOut: 4000
});
@endif

@if(Session::has('info'))
toastr.info("{{ strtoupper(Session::get('info')) }}", 'INFO', {
closeButton: true,
progressBar: true,
timeOut: 4000
});
@endif

@if(Session::has('warning'))
toastr.warning("{{ strtoupper(Session::get('warning')) }}", 'WARNING', {
closeButton: true,
progressBar: true,
timeOut: 4000
});
@endif
</script>

<script>
@if ($errors->any())
@foreach ($errors->all() as $error)
toastr.error("{{ strtoupper(strtoupper($error)) }}", 'ACTION FAILED', {
closeButton: true,
progressBar: true,
timeOut: 4000
});
@endforeach
@endif
</script>
@stack('customed_js')
</body>
</html>
<script>
function updateClock() {
const now = new Date();
const time = now.toLocaleTimeString();
document.getElementById('clock').textContent = time;
}
updateClock();
setInterval(updateClock, 1000);
</script>

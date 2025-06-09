<nav id="sidebar" class="sidebar-wrapper">
<div class="sidebar-profile">
<img src="{{asset('app_assets/assets/images/user6.png')}}" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
<div class="m-0">
<h5 class="mb-1 profile-name text-nowrap text-truncate">{{ session('user_name') }}</h5>
<p class="m-0 small profile-name text-nowrap text-truncate">{{ session('user_role_description') }}</p>
</div>
</div>
<div class="sidebarMenuScroll">
<ul class="sidebar-menu">
<li class="active current-page">
<a href="{{ route('dashboard')}}">
<i class="ri-home-6-line"></i>
<span class="menu-text">Dashboard</span>
</a>
</li>
<li class="treeview">
<a href="#!">
<i class="ri-stethoscope-line"></i>
<span class="menu-text">Booking</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('booking')}}">Bookings</a>
</li>
</ul>
</li>
<li class="treeview">
<a href="#!">
<i class="ri-heart-pulse-line"></i>
<span class="menu-text">Reservation</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('reservation')}}">Reservations</a>
</li>
<li>
<a href="{{ route('cancelled.reservation')}}">Cancelled Reservations</a>
</li>
</ul>
</li>
<li class="treeview">
<a href="#!">
<i class="ri-nurse-line"></i>
<span class="menu-text">Customer</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('index.customers')}}">Customers</a>
</li>
</ul>
</li>
<li class="treeview">
<a href="#!">
<i class="ri-dossier-line"></i>
<span class="menu-text">Expenses</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('index.expenses')}}">Expenses</a>
</li>
</ul>
</li>
<li class="treeview">
<a href="#!">
<i class="ri-building-2-line"></i>
<span class="menu-text">Activities</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('other.activities')}}">Side Activities</a>
</li>
</ul>
</li>
<li class="treeview">
<a href="#!">
<i class="ri-secure-payment-line"></i>
<span class="menu-text">Human Resources</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('index.staffpage')}}">Staff List</a>
</li>
<li>
<a href="{{ route('salary.staff')}}">Staff Salary</a>
</li>
</ul>
</li>

<li class="treeview">
<a href="#!">
<i class="ri-group-2-line"></i>
<span class="menu-text">Lost & Found</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('lost.and.found.page')}}">Lost and found</a>
</li>
</ul>
</li>


<li class="treeview">
<a href="#!">
<i class="ri-group-2-line"></i>
<span class="menu-text">User Management</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('index.users')}}">Users List</a>
</li>
</ul>
</li>
<li class="treeview">
<a href="#!">
<i class="ri-money-dollar-circle-line"></i>
<span class="menu-text">Settings</span>
</a>
<ul class="treeview-menu">
<li>
<a href="{{ route('room.type')}}">Room Types</a>
</li>

<li>
<a href="{{ route('rooms')}}">Hotel Rooms</a>
</li>
<li>
<a href="{{ route('expenses.category')}}">Expenses Type</a>
</li>
<li>
<a href="{{ route('tax.rates')}}">Tax Rates</a>
</li>
<li>
<a href="{{ route('sms.settings')}}">SMS Settings</a>
</li>
<li>
<a href="{{ route('general.settings')}}">General Settings</a>
</li>
<li>
<a href="{{ route('currency.settings')}}">Currency Settings</a>
</li>
</ul>
</li>
</ul>
</div>
<div class="sidebar-contact">
<p class="fw-light mb-1 text-nowrap text-truncate">Emergency Contact</p>
<h5 class="m-0 lh-1 text-nowrap text-truncate">0242634489</h5>
<i class="ri-phone-line"></i>
</div>
</nav>

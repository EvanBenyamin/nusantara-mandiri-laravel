@php
$current_route=request()->route()->getName();
@endphp
<!-- Main Sidebar Container -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://laravel-app.test/customer/dashboard">
  <div class="sidebar-brand-icon" >
    <img src="/assets/images/bg-koperasi.png" style="width: 60px; height: 50px;" alt="">
  </div>
  <div class="sidebar-brand-text mx-3">{{auth()->user()->username}}</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item  {{$current_route=='customer'?'active':''}}">
  <a href="{{route('customer')}}" class="nav-link {{$current_route=='customer'?'':''}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
User Management
</div>

<li class="nav-item {{$current_route=='home'?'active':''}} ">
  <a href="/" class="nav-link {{$current_route=='home'?'active':''}}">
    <i class="fas fa-fw fa-home"></i>
    <span>Home</span></a>
<li class="nav-item {{$current_route=='user.status'?'active':''}} ">
<a href="{{route('user.status')}}" class="nav-link {{$current_route=='user.status'?'active':''}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Status Pengguna</span></a>
</li>
<div class="container">
      



</ul>
<!-- End of Sidebar -->
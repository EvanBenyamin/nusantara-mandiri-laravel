@php
$current_route=request()->route()->getName();
@endphp
<!-- Main Sidebar Container -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" >

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://laravel-app.test/admin/dashboard">
  <div class="sidebar-brand-icon" >
    <img src="/assets/images/bg-koperasi.png" style="width: 60px; height: 50px;" alt="">
  </div>
  <div class="sidebar-brand-text mx-3">{{auth()->user()->username}}</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{$current_route=='dashboard'?'active':''}}">
  <a href="{{route('dashboard')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
User Management
</div>

<li class="nav-item {{$current_route=='home'?'active':''}}">
  <a href="/" class="nav-link {{$current_route=='users.index'?'active':''}}">
    <i class="fas fa-fw fa-home"></i>
    <span>Home</span></a>
<li class="nav-item {{$current_route=='users.list'?'active':''}}">
<a href="{{route('users.list')}}" class="nav-link {{$current_route=='users.index'?'active':''}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Users</span></a>
</li>
<li class="nav-item {{$current_route=='validasi'?'active':''}}">
<a href="{{route('validasi')}}" class="nav-link {{$current_route=='validasi'?'active':''}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Pengajuan</span></a>
</li>
<div class="container">
      



</ul>
<!-- End of Sidebar -->
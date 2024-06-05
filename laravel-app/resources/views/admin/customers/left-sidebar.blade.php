@php
$current_route=request()->route()->getName();
@endphp
<!-- Main Sidebar Container -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
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
Manajemen User
</div>



<li class="nav-item {{$current_route=='user.status'?'active':''}} ">
<a href="{{route('user.status')}}" class="nav-link {{$current_route=='user.status'?'active':''}}">
      <i class="fas fa-fw fa-user"></i>
      <span>Profil Nasabah</span></a>
</li>
<li class="nav-item {{$current_route=='user.bayar'?'active':''}} ">
  <a href="{{route('user.bayar')}}" class="nav-link {{$current_route=='user.status'?'active':''}}">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Pembayaran</span></a>
  </li>
  <li class="nav-item {{$current_route=='user.payments'?'active':''}} ">
    <a href="{{route('user.payments')}}" class="nav-link {{$current_route=='user.status'?'active':''}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Daftar Pembayaran</span></a>
    </li>
<li class="nav-item {{$current_route=='reOrder'?'active':''}} ">
<a href="{{route('reOrder')}}" class="nav-link {{$current_route=='user.status'?'active':''}}">
      <i class="fas fa-fw fa-registered"></i>
      <span>ReOrder</span></a>
</li>
<div class="container">
      



</ul>
<!-- End of Sidebar -->
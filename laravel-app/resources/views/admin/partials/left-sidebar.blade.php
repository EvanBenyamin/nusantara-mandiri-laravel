@php
$current_route=request()->route()->getName();
@endphp
<!-- Main Sidebar Container -->
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" >

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
<li class="nav-item {{$current_route=='dashboard'?'active':''}}">
  <a href="{{route('dashboard')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
Customer Management
</div>

<li class="nav-item {{$current_route=='customers'?'active':''}}">
  <a href="{{ route('customers') }}" class="nav-link {{$current_route=='users.index'?'active':''}}">
    <i class="fas fa-fw fa-list"></i>
    <span>Customers</span></a>
<li class="nav-item {{$current_route=='users.list'?'active':''}}">
<a href="{{route('users.list')}}" class="nav-link {{$current_route=='users.index'?'active':''}}">
      <i class="fas fa-fw fa-user"></i>
      <span>Users</span></a>
</li>
<li class="nav-item {{$current_route=='validasi'?'active':''}}">
<a href="{{route('validasi')}}" class="nav-link {{$current_route=='validasi'?'active':''}}">
      <i class="fas fa-fw fa-table"></i>
      <span>Pengajuan</span></a>
</li>
<li class="nav-item {{request()->is('admin/registrasi')?'active':''}}">
<a href="/admin/registrasi" class="nav-link {{$current_route=='registration'?'active':''}}">
      <i class="fas fa-fw fa-book"></i>
      <span>Registrasi</span></a>

      <hr class="sidebar-divider">
      <div class="sidebar-heading mt-2">
            Transaksi
      </div>
</li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{request()->is('admin/transaksi')?'active':''}}">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                      aria-expanded="true" aria-controls="collapsePages">
                      <i class="fas fa-fw fa-exchange-alt"></i>
                      <span>Transaksi</span>
                  </a>
                  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                          <h6 class="collapse-header">Transaksi:</h6>
                          <a class="collapse-item" href="/admin/transaksi">Daftar Pinjaman</a>
                          <a class="collapse-item" href="/admin/angsuran">Transaksi Angsuran</a>
                          <a class="collapse-item" href="/admin/pembayaran">Daftar Pembayaran </a>
                          <div class="collapse-divider"></div>
                      </div>
                  </div>
              </li>
<div class="container">
      



</ul>
<!-- End of Sidebar -->
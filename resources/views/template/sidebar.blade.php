<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3"> Klimistri </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ request()->is('index*') ? 'active' : '' }}">
    <a class="nav-link {{ request()->is('index*') ? 'active' : '' }}" href="{{ route('index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Informasi Collapse Menu -->
<!-- Nav Item - Informasi Collapse Menu -->
<li class="nav-item {{ request()->is('dokter.index*', 'pasien*', 'jadwal*', 'resep*', 'obat*') ? 'active' : '' }}">
<a class="nav-link collapsed {{ request()->is('dokter.index*', 'pasien*', 'jadwal*', 'resep*', 'obat*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseInformasi"
    aria-expanded="true" aria-controls="collapseInformasi">
    <i class="fas fa-fw fa-info-circle"></i>
    <span>Informasi</span>
</a>
<div id="collapseInformasi" class="collapse {{ request()->is('dokter*', 'pasien*', 'jadwal*', 'resep*', 'obat*') ? 'show' : '' }}" aria-labelledby="headingInformasi" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Informasi Detail:</h6>
        <a class="collapse-item {{ request()->routeIs('dokter') ? '' : '' }}" href="{{ route('dokter.index') }}">Dokter</a>
        <a class="collapse-item {{ request()->routeIs('pasien') ? '' : '' }}" href="{{ route('pasien.index') }}">Pasien</a>
        <a class="collapse-item {{ request()->routeIs('jadwal') ? '' : '' }}" href="{{ route('jadwal') }}">Jadwal</a>
        <a class="collapse-item {{ request()->routeIs('resep') ? '' : '' }}" href="{{ route('resep') }}">Resep</a>
        <a class="collapse-item {{ request()->routeIs('obat') ? '' : '' }}" href="{{ route('obat.index') }}">Obat</a>
    </div>
</div>
</li>

<!-- Nav Item - Administrasi Collapse Menu -->
<li class="nav-item {{ request()->is('rekammedis*', 'pembayaran*', 'laporan*') ? 'active' : '' }}">
<a class="nav-link collapsed {{ request()->is('rekammedis*', 'pembayaran*', 'laporan*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseAdministrasi"
    aria-expanded="true" aria-controls="collapseAdministrasi">
    <i class="fas fa-fw fa-clipboard-list"></i>
    <span>Administrasi</span>
</a>
<div id="collapseAdministrasi" class="collapse {{ request()->is('rekammedis*', 'pembayaran*', 'laporan*') ? 'show' : '' }}" aria-labelledby="headingAdministrasi" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Administrasi Detail:</h6>
        <a class="collapse-item {{ request()->routeIs('rekammedis') ? 'active' : '' }}" href="{{ route('rekammedis') }}">Rekam Medis</a>
        <a class="collapse-item {{ request()->routeIs('pembayaran') ? 'active' : '' }}" href="">Pembayaran</a>
        <a class="collapse-item {{ request()->routeIs('laporan') ? 'active' : '' }}" href="">Laporan</a>
    </div>
</div>
</li>

    <!-- Nav Item - Master Data Dropdown -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
            aria-expanded="true" aria-controls="collapseData">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Data:</h6>
                <a class="collapse-item" href="{{ route('obat.index') }}">Obat</a>
                <a class="collapse-item" href="{{ route('pasien.index') }}">Pasien</a>
                <a class="collapse-item" href="{{ route('suplier.index') }}">Suplier</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Transaksi Dropdown -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData1"
            aria-expanded="true" aria-controls="collapseData1">
            <i class="fas fa-fw fa-cash-register"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseData1" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"></h6>
                <a class="collapse-item" href="{{ route('pembelian.index') }}">Pembelian Obat</a>
                <a class="collapse-item" href="{{ route('penjualan.obat') }}">Penjualan Obat</a>
            </div>
        </div>
    </li>

        <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">


        <!-- Nav Item -  Siswa -->
        <li class="nav-item ">
        <a class="nav-link" href="{{ route('laporan.omset') }}">
        <i class="fas fa-fw fa-folder-open"></i>
        <span>Laporan Omset</span>
        </a>
        </li>

         <!-- Nav Item -  Opname -->
         <li class="nav-item ">
        <a class="nav-link" href="{{ route('opname') }}">
        <i class="fas fa-fw fa-notes-medical"></i>
        <span>Laporan Opname</span>
        </a>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

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
<li class="nav-item {{ request()->is('dokter*', 'pasien*', 'jadwal*', 'resep*') ? 'active' : '' }}">
<a class="nav-link collapsed {{ request()->is('dokter*', 'pasien*', 'jadwal*', 'resep*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseInformasi"
    aria-expanded="true" aria-controls="collapseInformasi">
    <i class="fas fa-fw fa-info-circle"></i>
    <span>Informasi</span>
</a>
<div id="collapseInformasi" class="collapse {{ request()->is('dokter*', 'pasien*', 'jadwal*', 'resep*') ? 'show' : '' }}" aria-labelledby="headingInformasi" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Informasi Detail:</h6>
        <a class="collapse-item {{ request()->routeIs('dokter.index') ? 'active' : '' }}" href="{{ route('dokter.index') }}">Dokter</a>
        <a class="collapse-item {{ request()->routeIs('pasien.index') ? 'active' : '' }}" href="{{ route('pasien.index') }}">Pasien</a>
        <a class="collapse-item {{ request()->routeIs('jadwal') ? 'active' : '' }}" href="{{ route('jadwal') }}">Jadwal</a>
        <a class="collapse-item {{ request()->routeIs('resep') ? 'active' : '' }}" href="{{ route('resep') }}">Resep</a>
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


        <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
            Apotek
        </div>

        <!-- Nav Item - Obat Collapse Menu -->
        <li class="nav-item {{ request()->is('obat*', 'suplier*', 'pembelian*', 'penjualan*', 'opname*') ? 'active' : '' }}">
        <a class="nav-link collapsed {{ request()->is('obat*', 'suplier*', 'pembelian*', 'penjualan*', 'opname*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseObat"
            aria-expanded="true" aria-controls="collapseInObat">
            <i class="fas fa-fw fa-notes-medical"></i>
            <span>Obat</span>
        </a>
        <div id="collapseObat" class="collapse {{ request()->is('obat*', 'suplier*', 'pembelian*', 'penjualan*', 'opname*') ? 'show' : '' }}" aria-labelledby="headingObat" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Informasi Detail:</h6>
                <a class="collapse-item {{ request()->routeIs('obat.index') ? 'active' : '' }}" href="{{ route('obat.index') }}">Obat</a>
                <a class="collapse-item {{ request()->routeIs('suplier.index') ? 'active' : '' }}" href="{{ route('suplier.index') }}">Supplier</a>
                <a class="collapse-item {{ request()->routeIs('pembelian.index') ? 'active' : '' }}" href="{{ route('pembelian.index') }}">Pembelian Obat</a>
                <a class="collapse-item {{ request()->routeIs('penjualan.index') ? 'active' : '' }}" href="{{ route('penjualan.index') }}">Penjualan Obat</a>
                <a class="collapse-item {{ request()->routeIs('opname') ? 'active' : '' }}" href="{{ route('opname') }}">Laporan Opname</a>
            </div>
        </div>
        </li>

        <!-- Nav Item -  Siswa -->
        <li class="nav-item {{ request()->routeIs('omset.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('omset.index') }}">
        <i class="fas fa-fw fa-folder-open"></i>
        <span>Laporan Omset</span>
        </a>
        </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

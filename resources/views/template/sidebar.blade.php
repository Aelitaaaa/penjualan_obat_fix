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
<li class="nav-item active">
    <a class="nav-link" href="{{ route('index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Data Management Dropdown -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
            aria-expanded="true" aria-controls="collapseData">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Management</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage Data:</h6>
                <a class="collapse-item" href="{{ route('obat') }}">Obat</a>
                <a class="collapse-item" href="">Pasien</a>
                <a class="collapse-item" href="">Suplier</a>
                <a class="collapse-item" href="">Stock Opname</a>
            </div>
        </div>
    </li>

    <!-- Nav Item -  Siswa -->
    <li class="nav-item active">
        <a class="nav-link" href="siswa.php">
        <i class="fas fa-fw fa-user"></i>
        <span>Pembelian Oba</span>
        </a>
        </li>

        <!-- Nav Item -  Siswa -->
        <li class="nav-item active">
        <a class="nav-link" href="siswa.php">
        <i class="fas fa-fw fa-user"></i>
        <span>Penjualan</span>
        </a>
        </li>

        <!-- Nav Item -  Siswa -->
        <li class="nav-item active">
        <a class="nav-link" href="siswa.php">
        <i class="fas fa-fw fa-user"></i>
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

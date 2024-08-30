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

    <!-- Nav Item - Master Data Dropdown -->
    <li class="nav-item active">
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
    <li class="nav-item active">
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
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('laporan.omset') }}">
        <i class="fas fa-fw fa-folder-open"></i>
        <span>Laporan Omset</span>
        </a>
        </li>

         <!-- Nav Item -  Opname -->
         <li class="nav-item active">
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

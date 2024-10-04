<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">
                            {{ $obatHabis->count() + $obatHampirHabis->count() }}
                        </span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>

                        <!-- Notifikasi Obat Kosong -->
                        @if($obatHabis->count() > 0)
                            @foreach($obatHabis as $obat)
                            <div class="dropdown-item d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="icon-circle bg-danger">
                                        <i class="fas fa-notes-medical text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-700">Obat Habis!</div>
                                    {{ $obat->nama_obat }} - {{ $obat->kode_suplier }} 
                                    <br> Stok: {{ $obat->jumlah_obat }}
                                </div>
                            </div>
                            @endforeach
                        @endif
                        
                        <!-- Notifikasi Obat Hampir Habis -->
                        @if($obatHampirHabis->count() > 0)
                            @foreach($obatHampirHabis as $obat)
                            <div class="dropdown-item d-flex align-items-center">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-notes-medical text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-700">Obat Hampir Habis!</div>
                                    {{ $obat->nama_obat }} - {{ $obat->kode_suplier }} 
                                    <br> Stok tersisa: {{ $obat->jumlah_obat }}
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </li>
           


        

        <!-- Nav Item - User Information 
        <li class="nav-item no-arrow">
            <a class="nav-link" href="profile.php" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="assets/img/img_properties/profile.png">
            </a>
        </li> -->

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - Logout -->
        <li class="nav-item no-arrow mx-1">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link btn btn-link" type="submit" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-sign-out-alt fa-fw" href="{{ route('login') }}"> </i>
                </button>
            </form>
        </li>
    </ul>
</nav>

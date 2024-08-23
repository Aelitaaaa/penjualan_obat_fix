<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item no-arrow">
            <a class="nav-link" href="profile.php" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="assets/img/img_properties/profile.png">
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - Logout -->
        <li class="nav-item no-arrow mx-1">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link btn btn-link" type="submit" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-sign-out-alt fa-fw"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</nav>

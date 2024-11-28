<header class="topbar" data-navbarbg="skin6" style="background: #2c3e50; color: #ecf0f1;">
    <nav class="navbar top-navbar navbar-expand-lg">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)">
                <i class="ti-menu ti-close" style="color: #ecf0f1;"></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="/admin" class="mt-3 ms-3" style="color: #ecf0f1; text-decoration: none;">
                    <h2>Administrator</h2>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more" style="color: #ecf0f1;"></i>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-end ms-auto">

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="color: #ecf0f1;">
                        <i class="fas fa-user" style="color: #ecf0f1;"></i>
                        <span class="text-light" style="color: #ecf0f1;">{{ Auth::user()->nama}}</span>
                        <i data-feather="chevron-down" class="svg-icon" style="color: #ecf0f1;"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="/logout" style="color: #ecf0f1;">
                            <i data-feather="power" class="svg-icon me-2 ms-1"></i> Logout
                        </a>
                    </div>
                </li>

                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>

<!-- Add custom CSS -->
<style>
/* Gaya untuk navbar dan topbar */
.navbar,
.topbar {
    background-color: #2c3e50 !important;
    color: #ecf0f1;
}

/* Gaya untuk dropdown dan item di dalamnya */
.navbar-nav .nav-link {
    color: #ecf0f1;
}

.navbar-nav .nav-link:hover {
    color: #2980b9;
}

/* Gaya untuk tombol navbar di mobile */
.navbar-toggler-icon {
    background-color: #ecf0f1;
}

/* Gaya untuk dropdown menu */
.dropdown-menu {
    background-color: #34495e;
    border: none;
}

/* Gaya item dropdown */
.dropdown-item:hover {
    background-color: #2980b9;
    color: #fff;
}

.dropdown-menu-right {
    right: 0;
}

/* Gaya khusus untuk dropdown pengguna */
.user-dd {
    padding: 10px;
    border-radius: 6px;
}

.user-dd .dropdown-item {
    color: #ecf0f1;
}

.user-dd .dropdown-item:hover {
    background-color: #2980b9;
    color: #fff;
}

/* Penyesuaian agar card dan logo menyesuaikan warna latar belakang */
.navbar-brand {
    background-color: #2c3e50 !important;
    /* Menyesuaikan background logo */
    padding: 10px;
}

.navbar-brand a {
    color: #ecf0f1 !important;
    /* Pastikan teks logo menyesuaikan dengan warna */
    text-decoration: none;
}
</style>
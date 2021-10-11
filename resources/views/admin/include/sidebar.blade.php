<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="">
                    <a href="/"><img src="{{ asset('home-assets/img/logo/pariwisata.png') }}" alt="Logo" style="height: 100px;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                
                <li class="sidebar-item {{ Request::is('admin/dashboard') ? ' active' : ''}}">
                    <a href="/admin/dashboard" class='sidebar-link'>
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('wisata') ? ' active' : ''}}">
                    <a href="/wisata" class='sidebar-link'>
                        <i class="fas fa-map"></i>
                        <span>Wisata</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('hotel') ? ' active' : ''}}">
                    <a href="/hotel" class='sidebar-link'>
                        <i class="fas fa-hotel"></i>
                        <span>Hotel</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('kuliner') ? ' active' : ''}}">
                    <a href="/kuliner" class='sidebar-link'>
                        <i class="fas fa-hamburger"></i>
                        <span>Kuliner</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('admin') ? ' active' : ''}}">
                    <a href="/admin" class='sidebar-link'>
                        <i class="fas fa-user-shield"></i>
                        <span>Admin</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/" class='sidebar-link'>
                        <i class="fas fa-house-user"></i>
                        <span>Kembali Ke Halaman Home</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
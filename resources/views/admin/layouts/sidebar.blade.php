<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between gap-2">
            <a href="{{ route('dashboard.index') }}" class="d-flex align-items-end gap-2 text-nowrap logo-img">
                <img src="{{ asset('admin-assets/images/logos/logo.png') }}" width="30" alt="logo" />
                <span class="btn btn-text fw-bold fs-3 p-0">PT Amanah Inti Pratama</span>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu Utama</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('rekapitulasi*') ? 'active' : '' }}" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Rekapitulasi Data Alat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('penyewaan*') ? 'active' : '' }}" href="{{ route('penyewaan.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-presentation"></i>
                        </span>
                        <span class="hide-menu">Penyewaan</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Konfigurasi</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('alat-berat*') ? 'active' : '' }}" href="{{ route('alat-berat.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-car-crane"></i>
                        </span>
                        <span class="hide-menu">Alat Berat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('pelanggan*') ? 'active' : '' }}" href="{{ route('pelanggan.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-building-store"></i>
                        </span>
                        <span class="hide-menu">Customer</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Route::is('user*') ? 'active' : '' }}" href="{{ route('user.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Pengguna</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

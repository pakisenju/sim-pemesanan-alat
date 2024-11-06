<header class="header-area {{ Route::is('home*') ? '' : 'header-white' }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="dark-index.html" class="logo d-flex gap-3 align-items-center" style="margin-top: 2em;">
                        <img src="{{ asset('assets/images/logo.png') }}" class="light-logo" width="30" alt="Babil"/>
                        <img src="{{ asset('assets/images/logo.png') }}" class="dark-logo" width="30" alt="Babil"/>
                        <h6 class="light-logo text-warning m-0 align-center fw-bold">PT Amanah Inti Pratama</h6>
                        <h6 class="dark-logo text-black m-0 align-center fw-bold">PT Amanah Inti Pratama</h6>
                    </a>
                    <!-- ***** Logo End ***** -->


                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li>
                            <a href="{{ route('home.index') }}" class="{{ Route::is('home*') ? 'text-warning' : '' }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about.index') }}" class="{{ Route::is('about*') ? 'text-warning' : '' }}">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="{{ route('product.index') }}" class="{{ Route::is('product*') ? 'text-warning' : '' }}">Produk Kami</a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}" class="{{ Route::is('contact*') ? 'text-warning' : '' }}">Kontak</a>
                        </li>
                        <li><a class="btn-nav" href="{{ route('login.index') }}">Login</a></li>
                    </ul>
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

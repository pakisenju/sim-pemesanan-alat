<header class="header-area">
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
                        <li class="submenu">
                            <a href="javascript:;">Discover</a>
                            <ul>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#-plans">Pricing Plans</a></li>
                                <li><a href="#">Latests Blogs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:;">Pages</a>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">FAQ's</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </li>
                        <li><a href="dark-contact.html">Contact</a></li>
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

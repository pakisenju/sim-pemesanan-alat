@extends('home.layouts.app')
@section('title', 'Home')
@section('style')

@endsection

@section('content')
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">
        <!-- ***** Header Background Image Start ***** -->
        <div class="right-bg">
            <img src="assets/images/photos/header.jpg" class="img-fluid float-right" alt="">
        </div>
        <!-- ***** Header Background Image End ***** -->

        <div class="header-bg">
            <!--<img src="assets/images/header-bg.svg" class="img-fluid" alt="">-->
        </div>

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6 col-md-12 col-sm-12">
                        <h1>Online accounting software for your small business</h1>
                        <p>Try Babil free for 30 days and sample every feature with unlimited users. Then easily convert
                            your files when ready.</p>
                        <div class="buttons">
                            <a href="#" class="btn-white-line">Try for free</a>
                            <a href="#" class="btn-primary-line">Buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->

        <!-- ***** Play Button Start ***** -->
        <div class="play-button-wrapper">
            <a href="https://www.youtube.com/watch?v=dPZTh2NKTm4" class="btn-play">
                <i class="fa fa-play"></i>
            </a>
        </div>
        <!-- ***** Play Button End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Small Start ***** -->
    <section class="section" id="features">
        <div class="container">

            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">4 ways Babil helps your business succeed</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Donec vulputate urna sed rutrum venenatis. Cras consequat magna quis arcu elementum, quis congue
                            risus volutpat.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <a href="dark-features-single.html" class="features-small-item">
                                <div class="icon">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <h5 class="features-title">Reconcile Fast</h5>
                                <p>Morbilling pharetra sapiening ut mattis viverra. Curabitur magna.</p>
                            </a>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                            <a href="dark-features-single.html" class="features-small-item">
                                <div class="icon">
                                    <i class="fa fa-cube"></i>
                                </div>
                                <h5 class="features-title">Manage Inventory</h5>
                                <p>Donec pellentesque turpis utium lorem imperdiet semper viverra.</p>
                            </a>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                            <a href="dark-features-single.html" class="features-small-item">
                                <div class="icon">
                                    <i class="fa fa-bank"></i>
                                </div>
                                <h5 class="features-title">Bank Connections</h5>
                                <p>Facilisis arcu ligula, malesuada id tincidunt laoreet, facilisis at justo.</p>
                            </a>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.8s">
                            <a href="dark-features-single.html" class="features-small-item">
                                <div class="icon">
                                    <i class="fa fa-dollar"></i>
                                </div>
                                <h5 class="features-title">Babil Expenses</h5>
                                <p>Proin arcu ligula, malesuada id tincidunt laoreet, facilisis at justo.</p>
                            </a>
                        </div>
                        <!-- ***** Features Small Item End ***** -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section colored">
        <div class="top"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-top-fix"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="home-img-left">
                        <img src="assets/images/photos/home/1.jpg" class="rounded img-fluid d-block mx-auto" alt="App">
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Features to run every part of your business</h2>
                    </div>
                    <div class="left-text">
                        <p>Phasellus vitae velit sit amet diam semper commodo quis quis libero. Morbi consequat arcu augue,
                            molestie faucibus metus ullamcorper vel.</p>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home active" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Process Invoices</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Reconcile Fast</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Information Security</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Mobile App</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Easy Integration</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Monthly Backup</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Advanced Reporting</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Multi Currency</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom"></div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-top-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Integration with other systems</h2>
                    </div>
                    <div class="left-text">
                        <p>Phasellus vitae velit sit amet diam semper commodo quis quis libero. Morbi consequat arcu augue,
                            molestie faucibus metus ullamcorper vel.</p>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home active" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Process Invoices</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Reconcile Fast</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Information Security</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Mobile App</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Easy Integration</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Monthly Backup</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Advanced Reporting</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a class="btn-home" href="dark-features-single.html">
                                    <i class="fa fa-angle-right"></i>
                                    <span>Multi Currency</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="home-img-right">
                        <img src="assets/images/photos/home/2.jpg" class="rounded img-fluid d-block mx-auto"
                            alt="App">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Home Seperator Start ***** -->
    <section class="section home-seperator">
        <div class="top"></div>
        <div class="left-item">
            <img src="assets/images/photos/home/3.jpg" alt="">
            <div class="content">
                <h6>GET IN TOUCH</h6>
                <p>You can contact us for purchase, installation and customizations.</p>
                <a href="#" class="btn-primary-line">Contact Us</a>
            </div>
        </div>
        <div class="right-item">
            <img src="assets/images/photos/home/4.jpg" alt="">
            <div class="content">
                <h6>API & SDK</h6>
                <p>You can find detailed information about our developer APIs here.</p>
                <a href="#" class="btn-primary-line">Documentation</a>
            </div>
        </div>
        <div class="bottom"></div>
    </section>
    <!-- ***** Home Seperator End ***** -->



    <!-- ***** Testimonials Start ***** -->
    <section class="section" id="testimonials">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Testimonials</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Donec vulputate urna sed rutrum venenatis. Cras consequat magna quis arcu elementum, quis congue
                            risus volutpat.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="user-image">
                            <img src="assets/images/photos/team/1.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <p>Maecenas non ante sit amet ex scelerisque facilisis. Sed at orci maximus, suscipit nunc,
                                elementum arcu. Fusce in aliquet purus. Nam sit amet nisi nulla.</p>
                            <div class="team-info">
                                <h3 class="user-name">Fletch Skinner</h3>
                                <span>Product Strategist</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->

                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="user-image">
                            <img src="assets/images/photos/team/2.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <p>Donec aliquam vulputate sem, vitae lacinia magna tincidunt at. Pellentesque lobortis, lectus
                                sit amet mollis rutrum, ante risus tristique dolor, vitae luctus.</p>
                            <div class="team-info">
                                <h3 class="user-name">Lance Bogrol</h3>
                                <span>Visual Designer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->

                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="user-image">
                            <img src="assets/images/photos/team/3.jpg" alt="">
                        </div>
                        <div class="team-content">
                            <p>Sed elementum eros ac scelerisque imperdiet. Donec tincidunt ipsum aliquet magna ultricies
                                lobortis. Phasellus fringilla dolor ac odio interdum ultricies.</p>
                            <div class="team-info">
                                <h3 class="user-name">Valentino Morose</h3>
                                <span>Android Developer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Testimonials End ***** -->


    <!-- ***** Pricing Plans Start ***** -->
    <section class="section colored" id="pricing-plans">
        <div class="top"></div>
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Pricing Plans</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Donec vulputate urna sed rutrum venenatis. Cras consequat magna quis arcu elementum, quis congue
                            risus volutpat.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">BASIC PLAN</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency">$</span>
                                <span class="price">13.90</span>
                                <span class="period">/Month</span>
                            </div>
                            <ul class="list">
                                <li class="active">Unlimited Website</li>
                                <li class="active">Unlimited Users</li>
                                <li class="active">5 GB Bandwidth</li>
                                <li class="active">Highest Speed</li>
                                <li>Data Security and Backups</li>
                                <li>1 GB Storage</li>
                                <li>24x7 Great Support</li>
                                <li>Monthly Reports and Analytics</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="btn-primary-line">Select Plan</a>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                    <div class="pricing-item active">
                        <div class="pricing-header">
                            <h3 class="pricing-title">ADVANCED PLAN</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency">$</span>
                                <span class="price">23.90</span>
                                <span class="period">/Month</span>
                            </div>
                            <ul class="list">
                                <li class="active">Unlimited Website</li>
                                <li class="active">Unlimited Users</li>
                                <li class="active">15 GB Bandwidth</li>
                                <li class="active">Highest Speed</li>
                                <li class="active">Data Security and Backups</li>
                                <li class="active">1 GB Storage</li>
                                <li>24x7 Great Support</li>
                                <li>Monthly Reports and Analytics</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="btn-primary-line">Select Plan</a>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">EXPERT PLAN</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="price-wrapper">
                                <span class="currency">$</span>
                                <span class="price">33.90</span>
                                <span class="period">/Month</span>
                            </div>
                            <ul class="list">
                                <li class="active">Unlimited Website</li>
                                <li class="active">Unlimited Users</li>
                                <li class="active">15 GB Bandwidth</li>
                                <li class="active">Highest Speed</li>
                                <li class="active">Data Security and Backups</li>
                                <li class="active">1 GB Storage</li>
                                <li class="active">24x7 Great Support</li>
                                <li class="active">Monthly Reports and Analytics</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="btn-primary-line">Select Plan</a>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->
            </div>
        </div>
        <div class="bottom"></div>
    </section>
    <!-- ***** Pricing Plans End ***** -->


    <!-- ***** Blog Start ***** -->
    <section class="section" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Latest Blog Posts</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Donec vulputate urna sed rutrum venenatis. Cras consequat magna quis arcu elementum, quis congue
                            risus volutpat.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/photos/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="dark-blog-single.html">5 steps to becoming GDPR compliant on mobile apps</a>
                            </h3>
                            <div class="text">
                                Mauris tellus sem, ultrices varius nisl at, convallis iaculis mauris. Sed eget sem vitae
                                purus tempus dignissim.
                            </div>
                            <a href="dark-blog-single.html" class="btn-primary-line">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/photos/blog/2.jpg" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="dark-blog-single.html">Measuring app success through mobile app analytics</a>
                            </h3>
                            <div class="text">
                                Cras imperdiet faucibus sem, a dignissim urna feugiat sed. Interdum et malesuada fames ac
                                ante ipsum.
                            </div>
                            <a href="dark-blog-single.html" class="btn-primary-line">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/photos/blog/3.jpg" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="dark-blog-single.html">How accessibility will influence your app development</a>
                            </h3>
                            <div class="text">
                                Quisque euismod nec lacus sit amet maximus. Ut convallis sagittis lorem auctor malesuada.
                                Morbi.
                            </div>
                            <a href="dark-blog-single.html" class="btn-primary-line">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->
@endsection

@section('script')

@endsection

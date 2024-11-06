@extends('home.layouts.app')
@section('title', 'Tentang Kami')
@section('style')
@endsection

@section('content')
    <section class="page">
        <!-- ***** Page Top Start ***** -->
        <div class="cover" data-image="{{ asset('assets/images/photos/header2.jpg') }}">
            <div class="cover-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Tentang Kami</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cover-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li><a href="{{ route('home.index') }}">Home</a></li>
                                <li class="active">Tentang Kami</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Page Top End ***** -->


        <!-- ***** Page Content Start ***** -->
        <div class="page-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about">
                            <div class="row">
                                <div class="offset-lg-2 col-lg-8">
                                    <h2>PT Amanah Inti Pratama</h2>
                                    <p>Phasellus vitae velit sit amet diam semper commodo quis quis libero. Morbi consequat
                                        arcu augue, molestie faucibus metus ullamcorper vel. Quisque lacinia fringilla
                                        fermentum. Suspendisse faucibus lectus convallis, elementum nisl sed,</p>
                                </div>
                                <div class="offset-lg-1 col-lg-10">
                                    <div class="about-image">
                                        <div class="img-1">
                                            <img src="{{ asset('assets/images/photos/about/3.jpg') }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="img-2">
                                            <img src="{{ asset('assets/images/photos/about/4.jpg') }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-2 col-lg-8">
                                    <p>Mauris vitae facilisis tortor. Nam venenatis nisi et arcu facilisis blandit. Ut
                                        congue libero nec augue vulputate maximus. Praesent blandit imperdiet felis ut
                                        dapibus. Mauris elementum pretium tellus, non pellentesque dui dignissim non. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ***** Seperator Start ***** -->
            <section class="section home-seperator">
                <div class="top"></div>
                <div class="left-item">
                    <img src="{{ asset('assets/images/photos/header2.jpg') }}" alt="">
                    <div class="content">
                        <h6>GET IN TOUCH</h6>
                        <p>You can contact us for purchase, installation and customizations.</p>
                        <a href="#" class="btn-primary-line">Contact Us</a>
                    </div>
                </div>
                <div class="right-item">
                    <img src="{{ asset('assets/images/photos/header2.jpg') }}" alt="">
                    <div class="content">
                        <h6>API & SDK</h6>
                        <p>You can find detailed information about our developer APIs here.</p>
                        <a href="#PT Amanah Inti Pratama-line">Documentation</a>
                    </div>
                </div>
                <div class="bottom"></div>
            </section>
            <!-- ***** Seperator End ***** -->


            <!-- ***** Our Team Start ***** -->
            <section class="section">
                <div class="container">
                    <!-- ***** Section Title Start ***** -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="center-heading">
                                <h2 class="section-title">Our Creative Team</h2>
                            </div>
                        </div>
                        <div class="offset-lg-3 col-lg-6">
                            <div class="center-text">
                                <p>Donec vulputate urna sed rutrum venenatis. Cras consequat magna quis arcu elementum, quis
                                    congue risus volutpat.</p>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Section Title End ***** -->

                    <div class="row">
                        <!-- ***** Our Team Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="team-item">
                                <div class="user-image">
                                    <img src="{{ asset('assets/images/photos/team/1.jpg') }}" alt="">
                                </div>
                                <div class="team-content">
                                    <p>Maecenas non ante sit amet ex scelerisque facilisis. Sed at orci maximus, suscipit
                                        nunc, elementum arcu. Fusce in aliquet purus. Nam sit amet nisi nulla.</p>
                                    <div class="team-info">
                                        <h3 class="user-name">Fletch Skinner</h3>
                                        <span>Product Strategist</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ***** Our Team Item End ***** -->

                        <!-- ***** Our Team Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="team-item">
                                <div class="user-image">
                                    <img src="{{ asset('assets/images/photos/team/2.jpg') }}" alt="">
                                </div>
                                <div class="team-content">
                                    <p>Donec aliquam vulputate sem, vitae lacinia magna tincidunt at. Pellentesque lobortis,
                                        lectus sit amet mollis rutrum, ante risus tristique dolor, vitae luctus mauris.</p>
                                    <div class="team-info">
                                        <h3 class="user-name">Lance Bogrol</h3>
                                        <span>Visual Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ***** Our Team Item End ***** -->

                        <!-- ***** Our Team Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="team-item">
                                <div class="user-image">
                                    <img src="{{ asset('assets/images/photos/team/3.jpg') }}" alt="">
                                </div>
                                <div class="team-content">
                                    <p>Sed elementum eros ac scelerisque imperdiet. Donec tincidunt ipsum aliquet magna
                                        ultricies lobortis. Phasellus fringilla dolor ac odio interdum ultricies.</p>
                                    <div class="team-info">
                                        <h3 class="user-name">Valentino Morose</h3>
                                        <span>Android Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ***** Our Team Item End ***** -->
                    </div>
                </div>
            </section>
            <!-- ***** Our Team End ***** -->

        </div>
        <!-- ***** Page Content End ***** -->
    </section>
@endsection

@section('script')

@endsection

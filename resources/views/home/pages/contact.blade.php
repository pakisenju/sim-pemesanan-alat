@extends('home.layouts.app')
@section('title', 'Kontak')
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
                            <h1>Contact</h1>
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
                                <li class="active">Contact</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Page Top End ***** -->


        <!-- ***** Page Content Start ***** -->
        <div class="page-bottom">
            <div class="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <p>455 West Orchard Street Kings Mountain, NC 28086</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <a href="tel:(272)211-7370">(272) 211-7370</a>
                                <a href="tel:(272)211-7370">(272) 211-7370</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <a href="mailto:support@yourbrand.com">support@yourbrand.com</a>
                                <a href="mailto:info@yourbrand.com">info@yourbrand.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="contact-bottom">
                <div class="container">
                    <div class="row">
                        <!-- ***** Contact Text Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <h5 class="margin-bottom-30">Get in touch</h5>
                            <div class="contact-text">
                                <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                    Etiam tempus magna vel turpis pharetra dictum. </p>
                                <p>Sed blandit tempus purus, sed sodales leo rutrum vel. Nam vulputate ipsum ac est congue,
                                    eget commodo magna lobortis.</p>
                            </div>
                        </div>
                        <!-- ***** Contact Text End ***** -->

                        <!-- ***** Contact Form Start ***** -->
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <div class="contact-form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" placeholder="Name, surname">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" placeholder="E-Mail">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Your message"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn-primary-line">SEND</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ***** Contact Form End ***** -->
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- ***** Page Content End ***** -->
    </section>
@endsection

@section('script')

@endsection

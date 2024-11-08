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
        </div>
        <!-- ***** Page Content End ***** -->
    </section>
@endsection

@section('script')

@endsection

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
                                    <p>
                                        PT. Amanah Inti Pratama adalah perusahaan yang bergerak di bidang jual beli besi
                                        scrap atau material bekas, penyewaan transportasi, angkutan dan alat berat. Berdiri
                                        sejak Juli 2019 di Balikpapan, Kalimantan Timur, PT. Amanah Inti Pratama telah
                                        menyediakan jasa transport, angkutan, rental excavator dan penyewaan crane bagi
                                        banyak perusahaan besar di Indonesia.
                                    </p>
                                </div>
                                <div class="offset-lg-1 col-lg-10">
                                    <div class="about-image">
                                        <div class="img-1">
                                            <img src="{{ asset('assets/images/photos/about/3.jpg') }}" class="img-fluid"
                                                alt="">
                                        </div>
                                        <div class="img-2">
                                            <img src="{{ asset('assets/images/photos/about/4.jpg') }}" class="img-fluid"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-2 col-lg-8">
                                    <p>
                                        Kami menawarkan beragam jenis transportasi dan angkutan diantaranya crane truck 5
                                        ton, crane mobile cap. 35 ton & cap. 50 ton, longbed, Froklift, Excavator, dan Dump
                                        Truck
                                        PT. Amanah Inti Pratama selalu memberikan harga yang terbaik, disertakan dengan
                                        pelayanan yang profesional, handal dan terpercaya.
                                    </p>
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

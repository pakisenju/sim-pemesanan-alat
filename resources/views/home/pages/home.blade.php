@extends('home.layouts.app')
@section('title', 'Home')
@section('style')

@endsection

@section('content')
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">
        <!-- ***** Header Background Image Start ***** -->
        <div class="right-bg" style="height: 100vh">
            <img src="assets/images/photos/header2.jpg" class="img-fluid float-right" alt="">
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
                        <h1 class="fw-bold">
                            Selamat Datang di
                            <br>
                            <span class="text-warning">PT Amanah Inti Pratama</span>
                        </h1>
                        <p>Menyediakan produk terbaik</p>
                        <div class="buttons">
                            <a href="#" class="btn btn-outline-warning">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Pricing Plans Start ***** -->
    <section class="section colored" id="pricing-plans">
        <div class="top mb-3"></div>
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Produk Kami</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Produk terbaik dari PT Amanah Inti Pratama</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <!-- ***** Page Content Start ***** -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-list">
                    <div class="row">
                        @foreach ($alatBerats as $alat)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="blog-post-thumb">
                                    <div class="img" style="width: 90%; margin: 0 auto">
                                        <img src="{{ asset('storage/' . $alat->thumbnail) }}"
                                            alt="Thumbnail {{ $alat->nama_alat }}"
                                            style="height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="blog-content">
                                        <ul class="post-meta d-flex justify-content-between"
                                            style="margin-bottom: 4px; width: 100%;">
                                            <li
                                                class="d-flex align-items-center border rounded px-2 {{ $alat->status_ketersediaan === 'Tersedia' ? 'border-success' : 'border-danger' }}">
                                                <span
                                                    class="icon fa {{ $alat->status_ketersediaan === 'Tersedia' ? 'fa-check text-success' : 'fa-times text-danger' }}"></span>
                                                <span
                                                    class="{{ $alat->status_ketersediaan === 'Tersedia' ? 'text-success' : 'text-danger' }} py-2">
                                                    {{ $alat->status_ketersediaan }}
                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center justify-content-end m-0">
                                                Rp {{ number_format($alat->harga_sewa, 0, ',', '.') }}/Jam
                                            </li>
                                        </ul>
                                        <h3>
                                            <a href="#">{{ $alat->nama_alat }}</a>
                                        </h3>
                                        <div class="text">
                                            {{ Str::limit($alat->deskripsi, 100) }}
                                        </div>
                                        <a href="{{ route('product.show', $alat->id) }}" class="btn-primary-line">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- ***** Page Content End ***** -->
        </div>
        <div class="bottom"></div>
    </section>
    <!-- ***** Pricing Plans End ***** -->


    <!-- ***** Home Seperator Start ***** -->
    <section class="section home-seperator">
        <div class="top"></div>
        <div class="left-item">
            <img src="{{ asset('assets/images/photos/about/3.jpg') }}" alt="">
            <div class="content">
                <h6>Hubungi Kami</h6>
                <p>Anda bisa menghubungi kami melalui berbagai platform.</p>
                <a href="{{ route('contact.index') }}" class="btn-primary-line">Kontak Kami</a>
            </div>
        </div>
        <div class="right-item">
            <img src="{{ asset('assets/images/photos/about/3.jpg') }}" alt="">
            <div class="content">
                <h6>Daftarkan Akun Anda</h6>
                <p>Silahkan mendaftar terlebih dahulu sebelum melakukan pemesanan.</p>
                <a href="{{ route('register.index') }}" class="btn-primary-line">Daftar Sekarang</a>
            </div>
        </div>
        <div class="bottom"></div>
    </section>
    <!-- ***** Home Seperator End ***** -->

@endsection

@section('script')

@endsection

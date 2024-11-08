@extends('home.layouts.app')
@section('title', 'Detail pRODUK')
@section('style')
@endsection

@section('content')
    <section class="page">
        <!-- ***** Page Top Start ***** -->
        <div class="cover" data-image="assets/images/photos/header2.jpg">
            <div class="cover-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>{{ $alatBerats->nama_alat }}</h1>
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
                                <li> <a href="{{ route('product.index') }}">Produk Kami</a></li>
                                <li class="active">{{ $alatBerats->nama_alat }}</li>
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
                    <!-- ***** Page Content Start ***** -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <!-- ***** Blog Post Start ***** -->
                            <div class="col-lg-12">
                                <div class="blog-list">
                                    <div class="blog-post-thumb big mbottom-60">
                                        <!-- ***** Post Top Start ***** -->
                                        <div class="img">
                                            <img src="{{ asset('storage/' . $alatBerats->thumbnail) }}"
                                                alt="{{ $alatBerats->nama_alat }}">
                                            <div class="date" style="width:150px">
                                                <strong class="px-3">Rp
                                                    {{ number_format($alatBerats->harga_sewa, 0, ',', '.') }}/Jam</strong>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-text">
                                                <ul class="post-meta mb-4">
                                                    <li class="m-0">
                                                        <span
                                                            class="badge {{ $alatBerats->status_ketersediaan === 'Tersedia' ? 'bg-success' : 'bg-danger' }}">{{ $alatBerats->status_ketersediaan === 'Tersedia' ? 'Tersedia' : 'Tidak Tersedia' }}</span>
                                                    </li>
                                                </ul>
                                                <!-- ***** Post Top End ***** -->

                                                <!-- ***** Post Content Start ***** -->
                                                <div class="text post-detail">
                                                    <h5 class="card-title m-0">{{ $alatBerats->nama_alat }}</h5>
                                                    <p class="card-text m-0"><strong>Kapasitas:</strong> {{ $alatBerats->kapasitas }}
                                                    </p>
                                                    <p class="card-text m-0"><strong>Harga Sewa:</strong> Rp
                                                        {{ number_format($alatBerats->harga_sewa, 0, ',', '.') }}/jam</p>
                                                    <p class="card-text m-0"><strong>Status:</strong>
                                                        {{ $alatBerats->status_ketersediaan }}</p>
                                                    <p class="card-text m-0"><strong>Lokasi:</strong> {{ $alatBerats->lokasi }}</p>
                                                    <p class="card-text m-0"><strong>Tahun Pembuatan:</strong>
                                                        {{ $alatBerats->tahun_pembuatan }}</p>
                                                    <p class="card-text m-0">{{ $alatBerats->deskripsi }}</p>
                                                    <a href="{{ route('login.index') }}" class="btn btn-primary-line p-0 mt-3">Pesan Sekarang</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ***** Blog Post Start ***** -->


                        </div>
                    </div>
                    <!-- ***** Page Content End ***** -->
                </div>
            </div>
        </div>
        <!-- ***** Page Content End ***** -->
    </section>
@endsection

@section('script')

@endsection

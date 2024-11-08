@extends('home.layouts.app')
@section('title', 'Produk Kami')
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
                            <h1>Produk Kami</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cover-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li><a href="dark-index.html">Home</a></li>
                                <li class="active">Produk Kami</li>
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
                                                <a href="{{ route('product.show', $alat->id) }}"
                                                    class="btn-primary-line">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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

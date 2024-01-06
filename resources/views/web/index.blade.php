@extends('layouts.web')

@section('content')
    <div id="main-slide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('') }}web/assets/img/slider/slider-bg1.jpg" alt="First slide">
                <div class="carousel-caption d-md-block">
                    <h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".4s">
                        Selamat Datang di Industri Kecil Menengah {{ pengaturan()->kabKota->nama ?? '' }}
                    </h1>
                    <p class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".6s">
                        Lembaga terdepan dalam memberdayakan ekonomi masyarakat menuju Usaha Kecil yang tangguh dan
                        mandiri
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('') }}web/assets/img/slider/slider-bg2.jpg" alt="Second slide">
                <div class="carousel-caption d-md-block">
                    <h1 class="animated wow fadeInLeft hero-heading" data-wow-delay=".7s">
                        Selamat Datang di Industri Kecil Menengah {{ pengaturan()->kabKota->nama ?? '' }}
                    </h1>
                    <p class="animated wow fadeInRight hero-sub-heading" data-wow-delay=".9s">
                        Lembaga terdepan dalam memberdayakan ekonomi masyarakat menuju Usaha Kecil yang tangguh dan
                        mandiri
                    </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
            <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"
                    data-ripple-color="#F0F0F0"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
            <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"
                    data-ripple-color="#F0F0F0"></i></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    {{-- <div class="search-button">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="search-bar">
                        <div class="search-inner">
                            <form class="search-form">
                                <div class="form-group inputwithicon">
                                    <i class="lni-tag"></i>
                                    <input type="text" name="customword" class="form-control"
                                        placeholder="Cari Produk IKM">
                                </div>
                                <div class="form-group inputwithicon">
                                    <i class="lni-target"></i>
                                    <div class="select">
                                        <select>
                                            <option value="none">Lokasi</option>
                                            @foreach ($lokasi as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama ?? '-' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group inputwithicon">
                                    <i class="lni-menu"></i>
                                    <div class="select">
                                        <select>
                                            <option value="none">Pilih Kategori</option>
                                            @foreach ($kategori_produk as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-common" type="button">
                                    <i class="lni-search"></i>
                                    Cari Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <section class="categories-icon bg-light section-padding">
        <div class="container">
            <h1 class="section-title">Kategori</h1>
            <div class="row">
                @foreach ($kategori_produk as $item)
                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="category.html">
                            <div class="icon-box">
                                <div class="icon">
                                    <i class="lni-leaf"></i>
                                </div>
                                <h4>{{ $item->nama ?? '' }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    <section class="featured section-padding">
        <div class="container">
            <h1 class="section-title">Produk</h1>
            <div class="row">
                @foreach ($ikm as $item)
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="featured-box">
                            <figure>
                                <a href="{{ route('produk-ikm.detail', $item->id) }}">
                                    <img class="img-fluid" src="{{ $item->image_primary }}" alt="image">
                                </a>
                            </figure>
                            <div class="feature-content">
                                <div class="product">
                                    <a
                                        href="{{ route('produk-ikm', ['kategori' => $item->produk->kategoriProduk->slug]) }}">
                                        {{ $item->produk->kategoriProduk->nama ?? '-' }}
                                    </a>
                                </div>
                                <h4>
                                    <a href="{{ route('produk-ikm.detail', $item->id) }}">
                                        {{ Str::of($item->produk->nama ?? '-')->words(3, ' ...') }}
                                    </a>
                                </h4>
                                <div class="meta-tag">
                                    <span>
                                        <i class="lni-user"></i>
                                        {{ Str::of($item->perusahaan->nama_perusahaan ?? '-')->words(2, ' ...') }}
                                    </span>
                                    <span>
                                        <i class="lni-map-marker"></i>
                                        {{ $item->perusahaan->kelurahan->nama ?? '-' }}
                                    </span>
                                </div>
                                <p class="dsc">
                                    {{ Str::of($item->keterangan ?? '-')->words(20, ' ...') }}
                                </p>
                                <div class="listing-bottom">
                                    <a href="{{ route('produk-ikm.detail', $item->id) }}"
                                        class="btn btn-common float-right">
                                        Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="counter-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-layers"></i></div>
                        <h2 class="counterUp">{{ $jumlah_kategori }}</h2>
                        <p>Kategori</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-users"></i></div>
                        <h2 class="counterUp">{{ $jumlah_perusahaan }}</h2>
                        <p>Perusahaan</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-briefcase"></i></div>
                        <h2 class="counterUp">{{ $jumlah_produk }}</h2>
                        <p>Produk</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget">
                    <div class="counter">
                        <div class="icon"><i class="lni-map"></i></div>
                        <h2 class="counterUp">{{ $jumlah_ikm }}</h2>
                        <p>IKM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

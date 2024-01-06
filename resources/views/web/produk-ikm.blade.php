@extends('layouts.web')

@section('title', 'Produk IKM')

@section('content')
    <div class="page-header" style="background: url({{ asset('') }}web/{{ asset('') }}web/assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Produk IKM</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('index') }}">Home /</a></li>
                            <li class="current">Produk IKM</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                    <aside>
                        <div class="widget categories">
                            <h4 class="widget-title">Kategori</h4>
                            <ul class="categories-list">
                                <li>
                                    <a href="{{ route('produk-ikm') }}">
                                        Semua
                                    </a>
                                </li>
                                @foreach ($kategori_produk as $item)
                                    <li>
                                        <a href="{{ route('produk-ikm', ['kategori' => $item->slug]) }}">
                                            {{ $item->nama ?? '-' }}
                                            <span class="category-counter">
                                                ({{ countProduk($item->id) }})
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 page-content">

                    <div class="product-filter">
                        <div class="short-name">
                            <span>Menampilkan ({{ $ikm->lastItem() }} dari
                                {{ $ikm->total() }}
                                produk)</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#grid-view"><i class="lni-grid"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#list-view"><i class="lni-list"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="adds-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade">
                                <div class="row">
                                    @foreach ($ikm as $item)
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="featured-box">
                                                <figure>
                                                    <a href="{{ route('produk-ikm.detail', $item->id) }}">
                                                        <img class="img-fluid" src="{{ $item->image_primary }}"
                                                            alt="">
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
                                                            {{ $item->perusahaan->kecamatan->nama ?? '-' }}
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
                            <div id="list-view" class="tab-pane fade active show">
                                <div class="row">
                                    @foreach ($ikm as $item)
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="featured-box">
                                                <figure>
                                                    <a href="{{ route('produk-ikm.detail', $item->id) }}">
                                                        <img class="img-fluid" src="{{ $item->image_primary }}"
                                                            alt="">
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
                                                            {{ $item->perusahaan->kecamatan->nama ?? '-' }}
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
                        </div>
                    </div>
                    {{ $ikm->links('web.pagination') }}
                </div>
            </div>
        </div>
    </div>

@endsection

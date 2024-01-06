@extends('layouts.web')

@section('title', 'Detail Produk')

@push('css')
    <style>
        #map {
            z-index: 0;
            height: 350px;
        }
    </style>
@endpush

@section('content')
    <div class="page-header" style="background: url({{ asset('') }}web/assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Detail Produk</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('index') }}">Home /</a></li>
                            <li><a href="{{ route('produk-ikm') }}">Produk IKM /</a></li>
                            <li class="current">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding">
        <div class="container">
            <div class="product-info row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="ads-details-wrapper">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{ $ikm->image_primary }}" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{ $ikm->image_secondary }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="ads-details-info">
                            <h2>{{ $ikm->produk->nama ?? '-' }}</h2>
                            <div class="details-meta">
                                <span>
                                    <i class="lni-users"></i>
                                    {{ $ikm->perusahaan->nama_perusahaan ?? '-' }}
                                </span>
                                <span>
                                    <i class="lni-map-marker"></i>
                                    {{ $ikm->perusahaan->kecamatan->nama ?? '-' }}
                                </span>
                                <span>
                                    <i class="lni-layers"></i>
                                    {{ $ikm->produk->kategoriProduk->nama ?? '-' }}
                                </span>
                            </div>
                            <p class="mb-4">
                                {{ $ikm->keterangan ?? '-' }}
                            </p>
                            <h4 class="title-small mb-3">Detail:</h4>
                            <ul class="list-specification">
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    KBLI/PIRT: {{ $ikm->kbli_pirt ?? '-' }}
                                </li>
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    Harga Jual: Rp. {{ $ikm->harga_jual ?? '-' }}
                                </li>
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    Tenaga Kerja: {{ $ikm->tenaga_kerja ?? '-' }} Orang
                                </li>
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    Nilai Investasi: Rp. {{ $ikm->nilai_investasi ?? '-' }}
                                </li>
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    Jumlah Produksi: Rp. {{ $ikm->jumlah_produksi ?? '-' }}
                                </li>
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    Satuan Produksi: {{ $ikm->satuanProduksi->nama ?? '-' }}
                                </li>
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    Nilai Produksi: Rp. {{ $ikm->nilai_produksi ?? '-' }}
                                </li>
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    Nilai BB/BP: Rp. {{ $ikm->nilai_bb_bp ?? '-' }}
                                </li>
                                <li>
                                    <i class="lni-check-mark-circle"></i>
                                    Export: {{ $ikm->export ?? '-' }}
                                </li>
                            </ul>
                            <div class="mb-4">
                                <div id="map"></div>
                            </div>
                        </div>
                        <div class="tag-bottom">
                            <div class="float-right">
                                <div class="share">
                                    <div class="social-link">
                                        <a class="facebook" data-toggle="tooltip" data-placement="top" title="facebook"
                                            href="#"><i class="lni-facebook-filled"></i></a>
                                        <a class="twitter" data-toggle="tooltip" data-placement="top" title="twitter"
                                            href="#"><i class="lni-twitter-filled"></i></a>
                                        <a class="linkedin" data-toggle="tooltip" data-placement="top" title="linkedin"
                                            href="#"><i class="lni-linkedin-fill"></i></a>
                                        <a class="google" data-toggle="tooltip" data-placement="top" title="google plus"
                                            href="#"><i class="lni-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <aside class="details-sidebar">
                        <div class="widget">
                            <h4 class="widget-title">Produk IKM Lainnya</h4>
                            <ul class="posts-list">
                                @foreach ($data_ikm as $item)
                                    <li>
                                        <div class="widget-thumb">
                                            <a href="{{ route('produk-ikm.detail', $item->id) }}">
                                                <img src="{{ $item->image_primary ?? '-' }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="widget-content">
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
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var map = L.map('map').setView([{{ $ikm->perusahaan->latitude ?? -6.175 }},
                    {{ $ikm->perusahaan->longitude ?? 106.8275 }}
                ],
                13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            var marker = L.marker([{{ $ikm->perusahaan->latitude ?? -6.175 }},
                    {{ $ikm->perusahaan->longitude ?? 106.8275 }}
                ])
                .addTo(
                    map);
        });
    </script>
@endpush

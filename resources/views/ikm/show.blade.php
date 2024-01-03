@extends('layouts.app')

@section('title', 'Detail IKM')

@push('css')
    <style>
        table td,
        table td * {
            vertical-align: top;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            IKM
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('ikm.index') }}">
                                        IKM
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Detail
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-4 col-12">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{ route('ikm.edit', $ikm) }}" class="btn btn-success">
                        Edit
                    </a>
                    <a href="{{ route('ikm.index') }}" class="btn btn-outline-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="blog-detail-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="p-0 mb-2 table">
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="mb-75">
                                                    Produk:
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Produk</td>
                                            <td>:</td>
                                            <td>
                                                <strong>{{ $ikm->produk->nama ?? '-' }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->produk->kategoriProduk->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="my-75">
                                                    Perusahaan:
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Perusahaan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->perusahaan->nama_perusahaan ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemilik</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->perusahaan->nama_pemilik ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="my-75">
                                                    Produksi:
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>KBLI/PIRT</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->kbli_pirt ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Harga Jual</td>
                                            <td>:</td>
                                            <td>
                                                Rp. {{ $ikm->harga_jual ?? '0' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tenaga Kerja</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->harga_jual ?? '0' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nilai Investasi</td>
                                            <td>:</td>
                                            <td>
                                                Rp. {{ $ikm->nilai_investasi ?? '0' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Produksi</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->jumlah_produksi ?? '0' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Satuan Produksi</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->satuanProduksi->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nilai Produksi</td>
                                            <td>:</td>
                                            <td>
                                                Rp. {{ $ikm->nilai_produksi ?? '0' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nilai BB/BP</td>
                                            <td>:</td>
                                            <td>
                                                Rp. {{ $ikm->nilai_bb_bp ?? '0' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Export</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->export ?? '0' }}%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $ikm->keterangan ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="my-75">
                                                    Foto 1:
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{ $ikm->image_primary ?? asset('uploads/blank.jpg') }}"
                                                    target="_blank">
                                                    <img src="{{ $ikm->image_primary ?? asset('uploads/blank.jpg') }}"
                                                        alt="Foto 1" class="rounded me-2 mb-1 mb-md-0" width="170"
                                                        height="110">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="my-75">
                                                    Foto 2:
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{ $ikm->image_secondary ?? asset('uploads/blank.jpg') }}"
                                                    target="_blank">
                                                    <img src="{{ $ikm->image_secondary ?? asset('uploads/blank.jpg') }}"
                                                        alt="Foto 1" class="rounded me-2 mb-1 mb-md-0" width="170"
                                                        height="110">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

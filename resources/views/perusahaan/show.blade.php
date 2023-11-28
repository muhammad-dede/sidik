@extends('layouts.app')

@section('title', 'Detail Perusahaan')

@push('css')
    <style>
        table td,
        table td * {
            vertical-align: top;
        }

        #map {
            z-index: 0;
            height: 350px;
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
                            Perusahaan
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('perusahaan.index') }}">
                                        Perusahaan
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
                    <a href="{{ route('perusahaan.edit', $perusahaan) }}" class="btn btn-success">
                        Edit
                    </a>
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-outline-secondary">
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
                                                    Biodata Perusahaan:
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Perusahaan</td>
                                            <td>:</td>
                                            <td>
                                                <strong>{{ $perusahaan->nama_perusahaan ?? '-' }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pemilik</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->nama_pemilik ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No. Telepon</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->no_telp ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->jenisKelamin->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Usia</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->usia ?? '0' }} tahun
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->pendidikan->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->jabatan->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="my-75">
                                                    Lokasi:
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div id="map"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->latitude ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Longitude</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->longitude ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->provinsi->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten/Kota</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->kabKota->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->kecamatan->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kelurahan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->kelurahan->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->alamat ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="my-75">
                                                    Izin Usaha:
                                                </h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Badan Usaha</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->badanUsaha->nama ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Izin</td>
                                            <td>:</td>
                                            <td>
                                                {{ $perusahaan->tahun_izin ?? '-' }}
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

@push('js')
    <script>
        $(document).ready(function() {
            var map = L.map('map').setView([{{ $perusahaan->latitude ?? -6.175 }},
                    {{ $perusahaan->longitude ?? 106.8275 }}
                ],
                13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            var marker = L.marker([{{ $perusahaan->latitude ?? -6.175 }},
                    {{ $perusahaan->longitude ?? 106.8275 }}
                ])
                .addTo(
                    map);
        });
    </script>
@endpush

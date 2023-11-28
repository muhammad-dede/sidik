@extends('layouts.app')

@section('title', 'Ubah Perusahaan')

@push('css')
    <style>
        #map {
            z-index: 0;
            height: 350px;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
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
                                    Ubah
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-vertical-layouts">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h4>
                                Form Ubah Perusahaan
                            </h4>
                            <small class="text-primary">
                                Lengkapi data dibawah dengan benar!
                            </small>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" id="form"
                            action="{{ route('perusahaan.update', $perusahaan) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                {{-- Biodata --}}
                                <div class="col-12">
                                    <div class="mb-1">
                                        <div class="divider divider-start">
                                            <div class="divider-text">
                                                Biodata Perusahaan
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="nama_perusahaan">
                                                            Nama Perusahaan
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="nama_perusahaan"
                                                            class="form-control @error('nama_perusahaan') is-invalid @enderror"
                                                            name="nama_perusahaan"
                                                            value="{{ old('nama_perusahaan') ?? $perusahaan->nama_perusahaan }}" />
                                                        @error('nama_perusahaan')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="nama_pemilik">
                                                            Nama Pemilik
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="nama_pemilik"
                                                            class="form-control @error('nama_pemilik') is-invalid @enderror"
                                                            name="nama_pemilik"
                                                            value="{{ old('nama_pemilik') ?? $perusahaan->nama_pemilik }}" />
                                                        @error('nama_pemilik')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="no_telp">
                                                            No. Telepon
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="no_telp"
                                                            class="form-control @error('no_telp') is-invalid @enderror"
                                                            name="no_telp"
                                                            value="{{ old('no_telp') ?? $perusahaan->no_telp }}" />
                                                        @error('no_telp')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_jenis_kelamin">
                                                            Jenis Kelamin
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_jenis_kelamin') is-invalid @enderror"
                                                            id="id_jenis_kelamin" name="id_jenis_kelamin">
                                                            <option value=""></option>
                                                            @foreach (jenisKelamin() as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_jenis_kelamin') == $row->id || $perusahaan->id_jenis_kelamin == $row->id)>
                                                                    {{ $row->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_jenis_kelamin')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="usia">
                                                            Usia
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="usia"
                                                            class="form-control @error('usia') is-invalid @enderror"
                                                            name="usia"
                                                            value="{{ old('usia') ?? $perusahaan->usia }}" />
                                                        @error('usia')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_pendidikan">
                                                            Pendidikan
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_pendidikan') is-invalid @enderror"
                                                            id="id_pendidikan" name="id_pendidikan">
                                                            <option value=""></option>
                                                            @foreach (pendidikan() as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_pendidikan') == $row->id || $perusahaan->id_pendidikan == $row->id)>
                                                                    {{ $row->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_pendidikan')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_jabatan">
                                                            Jabatan
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_jabatan') is-invalid @enderror"
                                                            id="id_jabatan" name="id_jabatan">
                                                            <option value=""></option>
                                                            @foreach (jabatan() as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_jabatan') == $row->id || $perusahaan->id_jabatan == $row->id)>
                                                                    {{ $row->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_jabatan')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Lokasi --}}
                                <div class="col-12">
                                    <div class="mb-1">
                                        <div class="divider divider-start">
                                            <div class="divider-text">
                                                Lokasi
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9">
                                                        <div id="map"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="latitude">
                                                            Latitude
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="latitude"
                                                            class="form-control @error('latitude') is-invalid @enderror"
                                                            name="latitude"
                                                            value="{{ old('latitude') ?? $perusahaan->latitude }}" />
                                                        @error('latitude')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="longitude">
                                                            Longitude
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="longitude"
                                                            class="form-control @error('longitude') is-invalid @enderror"
                                                            name="longitude"
                                                            value="{{ old('longitude') ?? $perusahaan->longitude }}" />
                                                        @error('longitude')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_provinsi">
                                                            Provinsi
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_provinsi') is-invalid @enderror"
                                                            id="id_provinsi" name="id_provinsi">
                                                            <option
                                                                value="{{ $perusahaan->id_provinsi ?? pengaturan()->id_provinsi }}"
                                                                selected>
                                                                {{ $perusahaan->provinsi->nama ?? pengaturan()->provinsi->nama }}
                                                            </option>
                                                        </select>
                                                        @error('id_provinsi')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_kab_kota">
                                                            Kabupaten/Kota
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_kab_kota') is-invalid @enderror"
                                                            id="id_kab_kota" name="id_kab_kota">
                                                            <option
                                                                value="{{ $perusahaan->id_kab_kota ?? pengaturan()->id_kab_kota }}"
                                                                selected>
                                                                {{ $perusahaan->kabKota->nama ?? pengaturan()->kabKota->nama }}
                                                            </option>
                                                        </select>
                                                        @error('id_kab_kota')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_kecamatan">
                                                            Kecamatan
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_kecamatan') is-invalid @enderror"
                                                            id="id_kecamatan" name="id_kecamatan">
                                                            <option value=""></option>
                                                            @foreach (kecamatan($perusahaan->id_kab_kota ?? null) as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_kecamatan') == $row->id || $perusahaan->id_kecamatan == $row->id)>
                                                                    {{ $row->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_kecamatan')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_kelurahan">
                                                            Kelurahan
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_kelurahan') is-invalid @enderror"
                                                            id="id_kelurahan" name="id_kelurahan">
                                                            <option value=""></option>
                                                            @foreach (kelurahan(old('id_kecamatan') ?? $perusahaan->id_kecamatan) as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_kelurahan') == $row->id || $perusahaan->id_kelurahan == $row->id)>
                                                                    {{ $row->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_kelurahan')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="alamat">
                                                            Alamat
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="alamat"
                                                            class="form-control @error('alamat') is-invalid @enderror"
                                                            name="alamat"
                                                            value="{{ old('alamat') ?? $perusahaan->alamat }}" />
                                                        @error('alamat')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Izin Usaha --}}
                                <div class="col-12">
                                    <div class="mb-1">
                                        <div class="divider divider-start">
                                            <div class="divider-text">
                                                Izin Usaha
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_badan_usaha">
                                                            Badan Usaha
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_badan_usaha') is-invalid @enderror"
                                                            id="id_badan_usaha" name="id_badan_usaha">
                                                            <option value=""></option>
                                                            @foreach (badanUsaha() as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_badan_usaha') == $row->id || $perusahaan->id_badan_usaha)>
                                                                    {{ $row->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_badan_usaha')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="tahun_izin">
                                                            Tahun Izin
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="tahun_izin"
                                                            class="form-control @error('tahun_izin') is-invalid @enderror"
                                                            name="tahun_izin"
                                                            value="{{ old('tahun_izin') ?? $perusahaan->tahun_izin }}" />
                                                        @error('tahun_izin')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-primary me-1" id="btn-save">
                                        Simpan
                                    </button>
                                    <a href="{{ route('perusahaan.index') }}" class="btn btn-outline-secondary">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('js')
    {!! JsValidator::formRequest('App\Http\Requests\Perusahaan\UpdateRequest', '#form') !!}
    {{-- Map leaflet --}}
    <script>
        $(document).ready(function() {
            var map = L.map('map').setView([{{ old('latitude') ?? $perusahaan->latitude }},
                    {{ old('longitude') ?? $perusahaan->longitude }}
                ],
                13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            var marker = L.marker([{{ old('latitude') ?? $perusahaan->latitude }},
                    {{ old('longitude') ?? $perusahaan->longitude }}
                ])
                .addTo(
                    map);

            map.on('click', function(e) {
                let latitude = e.latlng.lat.toString().substring(0, 15);
                let longitude = e.latlng.lng.toString().substring(0, 15);
                let popup = L.popup()
                    .setLatLng([latitude, longitude])
                    .setContent(latitude + ", " + longitude)
                    .openOn(map);
                if (marker != undefined) {
                    map.removeLayer(marker);
                };
                marker = L.marker([latitude, longitude]).addTo(map);

                $('#latitude').val(latitude);
                $('#longitude').val(longitude);
            });

            var geocoder = L.Control.geocoder({
                    defaultMarkGeocode: true
                })
                .on('markgeocode', function(e) {
                    map.removeLayer(marker);
                })
                .addTo(map);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="id_kecamatan"]').on("change", function() {
                $.get("{{ route('wilayah') }}", {
                    id_kecamatan: $(this).val()
                }, function(data, status) {
                    $('select[name="id_kelurahan"]').empty().append(
                        '<option selected></option>');
                    $.each(data, function(key, value) {
                        $('select[name="id_kelurahan"]').append('<option value="' + value
                            .id + '">' + value.nama + '</option>');
                    });
                });
            });
        });
    </script>
@endpush

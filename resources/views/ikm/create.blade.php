@extends('layouts.app')

@section('title', 'Tambah IKM')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
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
                                    Tambah
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
                                Form Tambah IKM
                            </h4>
                            <small class="text-primary">
                                Lengkapi data dibawah dengan benar!
                            </small>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" id="form" action="{{ route('ikm.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- Produk --}}
                                <div class="col-12">
                                    <div class="mb-1">
                                        <div class="divider divider-start">
                                            <div class="divider-text">
                                                Data Produk
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_produk">
                                                            Nama Produk
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="form-select @error('id_produk') is-invalid @enderror select2"
                                                            id="id_produk" name="id_produk">
                                                            <option value=""></option>
                                                            @foreach (produk() as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_produk') == $row->id)>
                                                                    {{ $row->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_produk')
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
                                {{-- Perusahaan --}}
                                <div class="col-12">
                                    <div class="mb-1">
                                        <div class="divider divider-start">
                                            <div class="divider-text">
                                                Perusahaan
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="id_perusahaan">
                                                            Nama Perusahaan
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_perusahaan') is-invalid @enderror"
                                                            id="id_perusahaan" name="id_perusahaan">
                                                            <option value=""></option>
                                                            @foreach (perusahaan() as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_perusahaan') == $row->id)>
                                                                    {{ $row->nama_perusahaan }} - {{ $row->nama_pemilik }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_perusahaan')
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
                                                        <label class="col-form-label" for="kbli_pirt">
                                                            KBLI/PIRT
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="text" id="kbli_pirt"
                                                            class="form-control @error('kbli_pirt') is-invalid @enderror"
                                                            name="kbli_pirt" value="{{ old('kbli_pirt') }}" />
                                                        @error('kbli_pirt')
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
                                {{-- Produksi --}}
                                <div class="col-12">
                                    <div class="mb-1">
                                        <div class="divider divider-start">
                                            <div class="divider-text">
                                                Produksi
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="harga_jual">
                                                            Harga Jual
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="harga_jual"
                                                            class="form-control @error('harga_jual') is-invalid @enderror"
                                                            name="harga_jual" value="{{ old('harga_jual') }}" />
                                                        @error('harga_jual')
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
                                                        <label class="col-form-label" for="tenaga_kerja">
                                                            Tenaga Kerja
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="tenaga_kerja"
                                                            class="form-control @error('tenaga_kerja') is-invalid @enderror"
                                                            name="tenaga_kerja" value="{{ old('tenaga_kerja') }}" />
                                                        @error('tenaga_kerja')
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
                                                        <label class="col-form-label" for="nilai_investasi">
                                                            Nilai Investasi
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="nilai_investasi"
                                                            class="form-control @error('nilai_investasi') is-invalid @enderror"
                                                            name="nilai_investasi"
                                                            value="{{ old('nilai_investasi') }}" />
                                                        @error('nilai_investasi')
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
                                                        <label class="col-form-label" for="jumlah_produksi">
                                                            Jumlah Produksi
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="jumlah_produksi"
                                                            class="form-control @error('jumlah_produksi') is-invalid @enderror"
                                                            name="jumlah_produksi"
                                                            value="{{ old('jumlah_produksi') }}" />
                                                        @error('jumlah_produksi')
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
                                                        <label class="col-form-label" for="id_satuan_produksi">
                                                            Satuan Produksi
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select
                                                            class="select2 form-select @error('id_satuan_produksi') is-invalid @enderror"
                                                            id="id_satuan_produksi" name="id_satuan_produksi">
                                                            <option value=""></option>
                                                            @foreach (satuanProduksi() as $row)
                                                                <option value="{{ $row->id }}"
                                                                    @selected(old('id_satuan_produksi') == $row->id)>
                                                                    {{ $row->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('id_satuan_produksi')
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
                                                        <label class="col-form-label" for="nilai_produksi">
                                                            Nilai Produksi
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="nilai_produksi"
                                                            class="form-control @error('nilai_produksi') is-invalid @enderror"
                                                            name="nilai_produksi" value="{{ old('nilai_produksi') }}" />
                                                        @error('nilai_produksi')
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
                                                        <label class="col-form-label" for="nilai_bb_bp">
                                                            Nilai BB/BP
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="nilai_bb_bp"
                                                            class="form-control @error('nilai_bb_bp') is-invalid @enderror"
                                                            name="nilai_bb_bp" value="{{ old('nilai_bb_bp') }}" />
                                                        @error('nilai_bb_bp')
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
                                                        <label class="col-form-label" for="export">
                                                            Export
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="number" id="export"
                                                            class="form-control @error('export') is-invalid @enderror"
                                                            name="export" value="{{ old('export') }}" />
                                                        @error('export')
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
                                                        <label class="col-form-label" for="keterangan">
                                                            Keterangan
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan"
                                                            cols="30" rows="3">{{ old('keterangan') }}</textarea>
                                                        @error('keterangan')
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
                                                        <label class="col-form-label" for="image_primary">
                                                            Foto 1
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="border rounded p-2">
                                                            <div class="d-flex flex-column flex-md-row">
                                                                <img src="{{ asset('') }}uploads/blank.jpg"
                                                                    id="image_primary_blank"
                                                                    class="rounded me-2 mb-1 mb-md-0" width="170"
                                                                    height="110" alt="Foto 1" />
                                                                <div class="featured-info">
                                                                    <small class="text-muted">
                                                                        Max image size 2mb.
                                                                    </small>
                                                                    <p class="my-50">
                                                                        <span id="image_primary_text">
                                                                            Tidak ada file
                                                                        </span>
                                                                    </p>
                                                                    <div class="d-inline-block">
                                                                        <input
                                                                            class="form-control @error('image_primary') is-invalid @enderror"
                                                                            type="file" id="image_primary"
                                                                            accept="image/*" name="image_primary" />
                                                                        @error('image_primary')
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
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="image_secondary">
                                                            Foto 2
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="border rounded p-2">
                                                            <div class="d-flex flex-column flex-md-row">
                                                                <img src="{{ asset('') }}uploads/blank.jpg"
                                                                    id="image_secondary_blank"
                                                                    class="rounded me-2 mb-1 mb-md-0" width="170"
                                                                    height="110" alt="Foto 1" />
                                                                <div class="featured-info">
                                                                    <small class="text-muted">
                                                                        Max image size 2mb.
                                                                    </small>
                                                                    <p class="my-50">
                                                                        <span id="image_secondary_text">
                                                                            Tidak ada file
                                                                        </span>
                                                                    </p>
                                                                    <div class="d-inline-block">
                                                                        <input
                                                                            class="form-control @error('image_secondary') is-invalid @enderror"
                                                                            type="file" id="image_secondary"
                                                                            accept="image/*" name="image_secondary" />
                                                                        @error('image_secondary')
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-primary me-1" id="btn-save">
                                        Simpan
                                    </button>
                                    <a href="{{ route('ikm.index') }}" class="btn btn-outline-secondary">
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
    {!! JsValidator::formRequest('App\Http\Requests\IKM\StoreRequest', '#form') !!}

    <script>
        $(document).ready(function() {
            // Image Primary
            var imagePrimaryBlank = $('#image_primary_blank');
            var imagePrimaryText = document.getElementById('image_primary_text');
            var imagePrimary = $('#image_primary');
            // Change Image Primary
            if (imagePrimary.length) {
                $(imagePrimary).on('change', function(e) {
                    var reader = new FileReader(),
                        files = e.target.files;
                    reader.onload = function() {
                        if (imagePrimaryBlank.length) {
                            imagePrimaryBlank.attr('src', reader.result);
                        }
                    };
                    reader.readAsDataURL(files[0]);
                    imagePrimaryText.innerHTML = imagePrimary.val();
                });
            }

            // Image Secondary
            var imageSecondaryBlank = $('#image_secondary_blank');
            var imageSecondaryText = document.getElementById('image_secondary_text');
            var imageSecondary = $('#image_secondary');
            // Change Image Secondary
            if (imageSecondary.length) {
                $(imageSecondary).on('change', function(e) {
                    var reader = new FileReader(),
                        files = e.target.files;
                    reader.onload = function() {
                        if (imageSecondaryBlank.length) {
                            imageSecondaryBlank.attr('src', reader.result);
                        }
                    };
                    reader.readAsDataURL(files[0]);
                    imageSecondaryText.innerHTML = imageSecondary.val();
                });
            }
        });
    </script>
@endpush

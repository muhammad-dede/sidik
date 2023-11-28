@extends('layouts.app')

@section('title', 'Pengaturan')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Pengaturan</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    Lainnya
                                </li>
                                <li class="breadcrumb-item active">
                                    Pengaturan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="page-account-settings">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pengaturan') }}" class="form" id="form" method="POST">
                            @csrf
                            <div class="divider divider-start">
                                <div class="divider-text fw-bold">
                                    Pengaturan
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="id_provinsi">
                                                Provinsi
                                            </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select @error('id_provinsi') is-invalid @enderror"
                                                id="id_provinsi" name="id_provinsi">
                                                <option value=""></option>
                                                @foreach (provinsi() as $row)
                                                    <option value="{{ $row->id }}" @selected(old('id_provinsi') == $row->id || ($pengaturan ? $pengaturan->id_provinsi == $row->id : null))>
                                                        {{ $row->nama }}
                                                    </option>
                                                @endforeach
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
                                            <select class="select2 form-select @error('id_kab_kota') is-invalid @enderror"
                                                id="id_kab_kota" name="id_kab_kota">
                                                <option value=""></option>
                                                @foreach (kabKota($pengaturan->id_provinsi ?? null) as $row)
                                                    <option value="{{ $row->id }}" @selected(old('id_kab_kota') == $row->id || ($pengaturan ? $pengaturan->id_kab_kota == $row->id : null))>
                                                        {{ $row->nama }}
                                                    </option>
                                                @endforeach
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
                                            <label class="col-form-label" for="latitude">
                                                Latitude
                                            </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="latitude"
                                                class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                                                value="{{ old('latitude') ?? ($pengaturan->latitude ?? '') }}" />
                                            @error('latitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
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
                                                value="{{ old('longitude') ?? ($pengaturan->longitude ?? '') }}" />
                                            @error('longitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-75">
                                    <div class="alert alert-warning mb-50" role="alert">
                                        <h4 class="alert-heading">Notes:</h4>
                                        <div class="alert-body">
                                            Lengkapi data diatas agar dapat mengelola data Perusahaan dan IKM!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-2 me-1">
                                        Simpan
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary mt-2">
                                        Batal
                                    </button>
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
    {!! JsValidator::formRequest('App\Http\Requests\Pengaturan\UpdateRequest', '#form') !!}

    <script>
        $(document).ready(function() {
            $('select[name="id_provinsi"]').on("change", function() {
                $.get("{{ route('wilayah') }}", {
                    id_provinsi: $(this).val()
                }, function(data, status) {
                    $('select[name="id_kab_kota"]').empty().append(
                        '<option selected></option>');
                    $.each(data, function(key, value) {
                        $('select[name="id_kab_kota"]').append('<option value="' + value
                            .id + '">' + value.nama + '</option>');
                    });
                });
            });
        });
    </script>
@endpush

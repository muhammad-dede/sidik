@extends('layouts.app')

@section('title', 'Tambah Kategori Produk')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            Kategori Produk
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('kategori-produk.index') }}">Kategori Produk</a>
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
                        <h4 class="card-title">Form Tambah Kategori Produk</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('kategori-produk.store') }}" method="POST"
                            id="form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="nama">
                                            Nama
                                        </label>
                                        <input type="text" id="name"
                                            class="form-control @error('nama') is-invalid @enderror" name="nama"
                                            value="{{ old('nama') }}" />
                                        @error('nama')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-primary me-1">
                                        Simpan
                                    </button>
                                    <a href="{{ route('kategori-produk.index') }}" class="btn btn-outline-secondary">
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
    {!! JsValidator::formRequest('App\Http\Requests\KategoriProduk\StoreRequest', '#form') !!}
@endpush

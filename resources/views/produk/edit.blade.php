@extends('layouts.app')

@section('title', 'Ubah Produk')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            Produk
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('produk.index') }}">Produk</a>
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
                        <h4 class="card-title">Form Ubah Produk</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('produk.update', $produk) }}" method="POST"
                            id="form">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="nama">
                                            Nama
                                        </label>
                                        <input type="text" id="nama"
                                            class="form-control @error('nama') is-invalid @enderror" name="nama"
                                            value="{{ old('nama') ?? $produk->nama }}" />
                                        @error('nama')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="id_kategori_produk">
                                            Kategori
                                        </label>
                                        <select class="form-select @error('id_kategori_produk') is-invalid @enderror"
                                            name="id_kategori_produk" id="id_kategori_produk">
                                            <option value=""></option>
                                            @foreach ($kategori_produk as $row)
                                                <option value="{{ $row->id }}" @selected(old('id_kategori_produk') == $row->id || $produk->id_kategori_produk == $row->id)>
                                                    {{ $row->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori_produk')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-primary me-1">
                                        Simpan
                                    </button>
                                    <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary">
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
    {!! JsValidator::formRequest('App\Http\Requests\Produk\UpdateRequest', '#form') !!}
@endpush

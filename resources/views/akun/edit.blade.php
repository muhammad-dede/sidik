@extends('layouts.app')

@section('title', 'Akun')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Akun</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    Lainnya
                                </li>
                                <li class="breadcrumb-item active">
                                    Akun
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
                        <form action="{{ route('akun') }}" class="form" id="form" method="POST">
                            @csrf
                            <div class="divider divider-start">
                                <div class="divider-text fw-bold">
                                    Profil
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="nama">
                                                Nama
                                            </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                value="{{ old('nama') ?? auth()->user()->nama }}" />
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="username">
                                                Username
                                            </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" id="username"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                value="{{ old('username') ?? auth()->user()->username }}" />
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="divider divider-start">
                                <div class="divider-text fw-bold">
                                    Ubah Password
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="password_old">
                                                Password Lama
                                            </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" id="password_old"
                                                class="form-control @error('password_old') is-invalid @enderror"
                                                name="password_old" />
                                            @error('password_old')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="password">
                                                Password Baru
                                            </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" />
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1 row">
                                        <div class="col-sm-3">
                                            <label class="col-form-label" for="password_confirmation">
                                                Konfirmasi Password Baru
                                            </label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="password" id="password_confirmation" class="form-control"
                                                name="password_confirmation" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-75">
                                    <div class="alert alert-warning mb-50" role="alert">
                                        <h4 class="alert-heading">Notes:</h4>
                                        <div class="alert-body">
                                            Abaikan jika tidak ingin mengubah password!
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
    {!! JsValidator::formRequest('App\Http\Requests\Akun\UpdateRequest', '#form') !!}
    <script>
        $(document).ready(function() {
            //
        });
    </script>
@endpush

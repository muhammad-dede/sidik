@extends('layouts.app')

@section('title', 'Ubah user')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            User
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('user.index') }}">User</a>
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
                        <h4 class="card-title">Form Ubah User</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('user.update', $user) }}" method="POST"
                            id="form">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="nama">
                                            Nama
                                        </label>
                                        <input type="text" id="name"
                                            class="form-control @error('nama') is-invalid @enderror" name="nama"
                                            value="{{ old('nama') ?? $user->nama }}" />
                                        @error('nama')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="username">
                                            Username
                                        </label>
                                        <input type="text" id="username"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') ?? $user->username }}" />
                                        @error('username')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="role">
                                            Role
                                        </label>
                                        <select class="form-select @error('role') is-invalid @enderror" name="role"
                                            id="role">
                                            <option value=""></option>
                                            @foreach ($roles as $row)
                                                <option value="{{ $row->name }}" @selected(old('role') == $row->name || $user->roles->pluck('name')[0] == $row->name)>
                                                    {{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="password">
                                            Password
                                        </label>
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password" />
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="password_confirmation">
                                            Konfirmasi Password
                                        </label>
                                        <input type="password" id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" />
                                        @error('password_confirmation')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn btn-primary me-1">
                                        Simpan
                                    </button>
                                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
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
    {!! JsValidator::formRequest('App\Http\Requests\User\UpdateRequest', '#form') !!}
@endpush

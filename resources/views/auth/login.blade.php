@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
            <h2 class="card-title fw-bold mb-1 text-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('') }}logo.png" alt="" class="w-50">
                </a>
            </h2>
            <p class="card-text mb-1 text-center">{{ config('app.name') }}</p>
            <form class="auth-login-form mt-1" action="{{ route('login') }}" method="POST">
                @csrf
                @method('post')
                <div class="mb-1">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" type="text" name="username" placeholder="sidik"
                        aria-describedby="username" autofocus="" tabindex="1" value="{{ old('username') }}" />
                    @error('username')
                        <small class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password">Password</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password" type="password" name="password"
                            placeholder="············" aria-describedby="password" tabindex="2" />
                        <span class="input-group-text cursor-pointer">
                            <i data-feather="eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <small class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
                <div class="mb-2">
                    <div class="form-check">
                        <input name="remember" class="form-check-input" id="remember" type="checkbox" tabindex="3"
                            {{ old('remember') ? 'checked' : '' }} />
                        <label class="form-check-label" for="remember">Ingat Saya</label>
                    </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="4" type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection

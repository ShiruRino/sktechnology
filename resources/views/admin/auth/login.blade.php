@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('title', 'Admin Login')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('auth_header', 'Sign in to start your session')

@section('auth_body')
    <!-- Arahkan action ke route proses login Anda -->
    <form action="{{ url('/admin/login') }}" method="post">
        @csrf

        <!-- Input Username -->
        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}" placeholder="Username" autofocus required>
            
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span> <!-- Icon diubah jadi user (orang) -->
                </div>
            </div>
            
            <!-- Pesan Error Username -->
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Input Password -->
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="Password" required>
            
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span> <!-- Icon gembok untuk password -->
                </div>
            </div>
            
            <!-- Pesan Error Password -->
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Checkbox & Tombol Submit -->
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
        </div>
    </form>
@stop
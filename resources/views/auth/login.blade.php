@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<h5 class="mb-4">Login Admin</h5>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input id="username" type="text"
               class="form-control @error('username') is-invalid @enderror"
               name="username" value="{{ old('username') }}"
               required autocomplete="username" autofocus>

        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password"
               class="form-control @error('password') is-invalid @enderror"
               name="password" required autocomplete="current-password">

        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            Ingat Saya
        </label>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">
            Login
        </button>
    </div>
</form>
@endsection
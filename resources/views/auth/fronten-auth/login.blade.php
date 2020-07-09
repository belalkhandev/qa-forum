@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-header">
        <h3>Admin Login</h3>
    </div>
    <div class="login-body">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Email/Username" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="checkbox-container">
                    <input type="checkbox" name="remember_me" class="input-remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="checkbox-text">Remember Me</span>
                    <div class="checkbox-box"></div>
                </label>
            </div>
            <div class="form-group">
                <button class="submit-btn" type="submit">Login</button>
            </div>
        </form>
    </div>
    <div class="login-footer">
        <p><a href="#">Forgot Password?</a></p>
    </div>
</div>
@endsection

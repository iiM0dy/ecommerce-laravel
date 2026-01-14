<style>
    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f8f9fa;
    }

    .auth-card {
        background: #fff;
        padding: 40px;
        width: 100%;
        max-width: 420px;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .auth-card h2 {
        text-align: center;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .auth-subtitle {
        text-align: center;
        color: #777;
        margin-bottom: 30px;
    }

    .auth-group {
        margin-bottom: 18px;
    }

    .auth-group input {
        width: 100%;
        padding: 14px 16px;
        border-radius: 10px;
        border: 1px solid #ddd;
        outline: none;
        font-size: 14px;
    }

    .auth-group input:focus {
        border-color: #f28123;
    }

    .auth-error {
        color: #e74c3c;
        font-size: 12px;
    }

    .auth-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .auth-options a {
        color: #f28123;
        text-decoration: none;
    }

    .auth-btn {
        width: 100%;
        padding: 14px;
        border-radius: 50px;
        background: linear-gradient(135deg, #f28123, #e96b0c);
        color: #fff;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: 0.3s;
    }

    .auth-btn:hover {
        box-shadow: 0 8px 20px rgba(242, 129, 35, 0.35);
    }

    .auth-footer {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
    }

    .auth-footer a {
        color: #f28123;
        font-weight: 600;
        text-decoration: none;
    }
</style>
@extends('layout.master')

@section('content')
    <div class="auth-wrapper">
        <div class="auth-card">

            <h2>Create Account</h2>
            <p class="auth-subtitle">Join us and start shopping</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="auth-group">
                    <input type="text" name="name" placeholder="Full name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <small class="auth-error">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="auth-group">
                    <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required>
                    @error('email')
                        <small class="auth-error">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="auth-group">
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password')
                        <small class="auth-error">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="auth-group">
                    <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                </div>

                <!-- Button -->
                <button type="submit" class="auth-btn">
                    Create Account
                </button>

                <!-- Login link -->
                <p class="auth-footer">
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </p>

            </form>
        </div>
    </div>
@endsection

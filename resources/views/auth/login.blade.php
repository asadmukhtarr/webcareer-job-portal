@extends('layouts.header')
@section('title', 'Login')
@section('content')

<div class="login-wrapper">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-5 col-md-7 col-12">
                
                {{-- Login Card --}}
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-5">
                        
                        {{-- Heading --}}
                        <h3 class="text-center fw-bold mb-1"> <i class="fa fa-sign-in me-2"></i> Login</h3>
                        <p class="text-center text-muted mb-4">Welcome back! Please login to your account.</p>

                        {{-- Session Messages --}}
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- Email Field --}}
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-secondary">
                                    <i class="fa fa-envelope me-2"></i>Email Address
                                </label>
                                <input id="email" type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" 
                                    placeholder="Enter your email address"
                                    required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Password Field --}}
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold text-secondary">
                                    <i class="fa fa-lock me-2"></i>Password
                                </label>
                                <div class="input-group">
                                    <input id="password" type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        name="password" 
                                        placeholder="Enter your password"
                                        required autocomplete="current-password">
                                    <span class="input-group-btn">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-radius: 0 4px 4px 0;">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </span>
                                </div>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Remember Me & Forgot Password --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-secondary" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none text-primary fw-semibold small">
                                        <i class="fa fa-key me-1"></i>Forgot Password?
                                    </a>
                                @endif
                            </div>

                            {{-- Login Button --}}
                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="fa fa-sign-in me-2"></i>Login
                            </button>

                            {{-- Register Link --}}
                            <div class="text-center">
                                <span class="text-muted">Don't have an account?</span>
                                <a href="{{ route('register') }}" class="text-decoration-none text-primary fw-semibold">
                                    Register Now <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Custom CSS --}}
<style>
    .login-wrapper {
        background: #ffffff;
        min-height: 100vh;
        padding: 20px 0;
    }

    .card {
        background: #ffffff;
        border: 1px solid #e9ecef !important;
    }

    .form-control {
        border-radius: 4px;
        border: 1px solid #ced4da;
        padding: 10px 15px;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.15);
    }

    .input-group .form-control {
        border-radius: 4px 0 0 4px;
    }

    .input-group .btn {
        border-radius: 0 4px 4px 0;
        border: 1px solid #ced4da;
        border-left: none;
        padding: 10px 15px;
        background: #fff;
    }

    .input-group .btn:hover {
        background: #f8f9fa;
    }

    .btn-primary {
        background: #4e73df;
        border: none;
        padding: 10px;
        font-weight: 600;
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .btn-primary:hover {
        background: #2e59d9;
        box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
    }

    .form-check-input:checked {
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .text-primary {
        color: #4e73df !important;
    }

    .alert {
        border-radius: 4px;
        border: none;
        padding: 10px 15px;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
    }

    .btn-close {
        font-size: 12px;
    }
</style>

{{-- JavaScript for Toggle Password --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
</script>

@endsection
@extends('layouts.header')
@section('title', 'Register')
@section('content')

<div class="register-wrapper">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-6 col-md-8 col-12">
                
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-5">
                        <h3 class="text-center fw-bold mb-1"><i class="fa fa-user-plus me-2"></i>Register</h3>
                        <p class="text-center text-muted mb-4">Create your account to get started.</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold text-secondary">
                                    <i class="fa fa-user me-2"></i>Full Name
                                </label>
                                <input id="name" type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" value="{{ old('name') }}" 
                                    placeholder="Enter your full name"
                                    required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-secondary">
                                    <i class="fa fa-envelope me-2"></i>Email Address
                                </label>
                                <input id="email" type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" 
                                    placeholder="Enter your email address"
                                    required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold text-secondary">
                                    <i class="fa fa-lock me-2"></i>Password
                                </label>
                                <input id="password" type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    placeholder="Create a password"
                                    required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label fw-semibold text-secondary">
                                    <i class="fa fa-check-circle me-2"></i>Confirm Password
                                </label>
                                <input id="password-confirm" type="password" 
                                    class="form-control" 
                                    name="password_confirmation" 
                                    placeholder="Confirm your password"
                                    required autocomplete="new-password">
                            </div>

                            {{-- Register Button --}}
                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="fa fa-user-plus me-2"></i>Register
                            </button>

                            {{-- Login Link --}}
                            <div class="text-center">
                                <span class="text-muted">Already have an account?</span>
                                <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">
                                    Login Here <i class="fa fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .register-wrapper {
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

    .text-primary {
        color: #4e73df !important;
    }
</style>

@endsection
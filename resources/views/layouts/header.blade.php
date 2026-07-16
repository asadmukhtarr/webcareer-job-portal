<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Web Career</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        :root {
            --main-color: #135E85;
            --main-color-light: rgba(19, 94, 133, 0.1);
            --main-color-dark: #0e4a6b;
            --main-color-lightest: rgba(19, 94, 133, 0.05);
            --text-color: #334155;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: #1e293b !important;
        }
        
        .navbar-brand i {
            color: var(--main-color);
            margin-right: 10px;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            padding: 8px 15px;
            margin: 0 5px;
            border-radius: 6px;
            transition: all 0.3s ease;
            color: var(--text-color) !important;
            display: flex;
            align-items: center;
        }
        
        .navbar-nav .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
            color: var(--main-color);
        }
        
        .navbar-nav .nav-link:hover {
            background-color: var(--main-color-light);
            color: var(--main-color) !important;
            transform: translateY(-2px);
        }
        
        .navbar-nav .nav-link.active {
            background-color: var(--main-color);
            color: white !important;
        }
        
        .navbar-nav .nav-link.active i {
            color: white !important;
        }
        
        .btn-login {
            background-color: var(--main-color);
            color: white;
            border-radius: 6px;
            padding: 8px 20px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background-color: var(--main-color-dark);
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-login i {
            color: white;
        }
        
        .btn-register {
            background-color: transparent;
            color: var(--main-color);
            border: 2px solid var(--main-color);
            border-radius: 6px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-register:hover {
            background-color: var(--main-color);
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-register i {
            color: var(--main-color);
        }
        
        .btn-register:hover i {
            color: white;
        }
        
        /* Dashboard Layout Styles */
        .dashboard-container {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 230px); /* Account for navbar and footer */
        }
        
        /* Sidebar Styles (Not sticky) */
        .dashboard-sidebar {
            width: 250px;
            background: white;
            border-right: 1px solid #e2e8f0;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            overflow-y: auto;
            position: relative; /* Not fixed */
            height: auto;
            flex-shrink: 0;
        }
        
        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid #e2e8f0;
            background: var(--main-color-lightest);
        }
        
        .sidebar-header h5 {
            margin: 0;
            color: var(--main-color);
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .sidebar-header h5 i {
            margin-right: 10px;
            font-size: 20px;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 15px 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            position: relative;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .sidebar-menu a:hover {
            background-color: var(--main-color-light);
            color: var(--main-color);
            border-left-color: var(--main-color);
        }
        
        .sidebar-menu a.active {
            background-color: var(--main-color-light);
            color: var(--main-color);
            border-left-color: var(--main-color);
            font-weight: 600;
        }
        
        .sidebar-menu i {
            width: 25px;
            font-size: 16px;
            color: var(--main-color);
            transition: all 0.3s ease;
        }
        
        .sidebar-menu span {
            margin-left: 10px;
        }
        
        /* Submenu styles */
        .sidebar-submenu {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: var(--main-color-lightest);
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .sidebar-submenu.show {
            max-height: 200px;
        }
        
        .sidebar-submenu a {
            padding-left: 50px;
            font-size: 14px;
        }
        
        .has-submenu > a::after {
            content: '\f107';
            font-family: 'FontAwesome';
            position: absolute;
            right: 20px;
            transition: transform 0.3s ease;
        }
        
        .has-submenu.active > a::after {
            transform: rotate(180deg);
        }
        
        /* Search box in sidebar */
        .sidebar-search {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            width: 100%;
            padding: 8px 15px 8px 40px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .search-box input:focus {
            outline: none;
            border-color: var(--main-color);
            box-shadow: 0 0 0 3px var(--main-color-light);
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--main-color);
        }
        
        /* Main content area */
        .dashboard-content {
            flex: 1;
            padding: 20px;
            background-color: #f8fafc;
            overflow-y: auto;
        }
        
        .dashboard-section {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .dashboard-section h4 {
            color: var(--main-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--main-color-light);
        }
        
        /* Contact Page Styles */
        .contact-hero {
            background: linear-gradient(135deg, var(--main-color-lightest) 0%, rgba(255,255,255,1) 100%);
            padding: 80px 0 40px;
            border-bottom: 3px solid var(--main-color-light);
        }
        
        .section-title {
            color: var(--main-color);
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background-color: var(--main-color);
            border-radius: 2px;
        }
        
        .section-title.text-center::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .contact-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            height: 100%;
            border-top: 5px solid var(--main-color);
            transition: transform 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-10px);
        }
        
        .contact-icon {
            width: 70px;
            height: 70px;
            background-color: var(--main-color-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .contact-icon i {
            font-size: 30px;
            color: var(--main-color);
        }
        
        .contact-info h4 {
            color: var(--main-color);
            margin-bottom: 10px;
        }
        
        .contact-form-container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--main-color);
            box-shadow: 0 0 0 3px var(--main-color-light);
        }
        
        .btn-submit {
            background-color: var(--main-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-submit:hover {
            background-color: var(--main-color-dark);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(19, 94, 133, 0.2);
        }
        
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: 400px;
        }
        
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        
        /* Footer Styles */
        footer {
            background-color: var(--main-color);
            color: white;
            margin-top: auto;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: white;
            color: var(--main-color);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            background-color: var(--main-color-dark);
        }
        
        .text-main {
            color: var(--main-color) !important;
        }
        
        .bg-main {
            background-color: var(--main-color) !important;
        }
        
        /* Mobile responsiveness */
        @media (max-width: 991px) {
            .navbar-nav {
                padding: 15px 0;
            }
            
            .navbar-nav .nav-link {
                margin: 5px 0;
                padding: 10px 15px;
            }
            
            .account-buttons {
                display: flex;
                flex-direction: column;
                gap: 10px;
                padding: 15px 0;
            }
            
            .btn-login, .btn-register {
                width: 100%;
            }
            
            .contact-form-container {
                padding: 25px;
            }
            
            .contact-hero {
                padding: 60px 0 30px;
            }
            
            /* Mobile sidebar */
            .dashboard-container {
                flex-direction: column;
            }
            
            .dashboard-sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
            }
            
            .dashboard-content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3">
        <div class="container-fluid">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img src="{{ asset('images/logo.png') }}" height="70px" />
            </a>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('welcome') }}">
                            <i class="fa fa-home"></i>
                            Home 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="fa fa-info-circle"></i>
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('available-jobs') ? 'active' : '' }}" href="{{ route('client.jobs') }}">
                            <i class="fa fa-briefcase"></i>
                            Available Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="{{ route('services') }}">
                            <i class="fa fa-cog fa-spin"></i>
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="fa fa-envelope"></i>
                            Contact
                        </a>
                    </li>
                </ul>
                
                <!-- Account Section -->
                <div class="d-flex align-items-center">
                    <!-- Separate Login/Register Buttons -->
                    <div class="account-buttons d-none d-lg-flex">
                        @if(!Auth::check()) 
                            <a href="{{ route('login') }}" class="btn btn-login me-2">
                                <i class="fa fa-sign-in"></i>
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-register">
                                <i class="fa fa-user-plus"></i>
                                Register
                            </a>
                        @else 
                            <div class="dropdown">
                                <a class="btn btn-register dropdown-toggle d-flex align-items-center" 
                                href="#" 
                                role="button" 
                                id="profileDropdown" 
                                data-bs-toggle="dropdown" 
                                aria-expanded="false">
                                    <i class="fa fa-user-circle me-2"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                    <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.settings') }}">Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Layout (only for logged-in users) -->
    <!-- Dashboard Layout (only for logged-in users) -->
@if(Auth::check())
    @php
        // Check if current URL matches public paths
        $currentPath = request()->path();
        
        // Public paths to exclude dashboard
        // Use str_starts_with for routes with dynamic parameters
        $isPublicPath = false;
        
        // Check for exact matches
        $exactPaths = ['', 'about', 'contact', 'services', 'companies', 'available-jobs'];
        
        // Check for path starts with
        $startsWithPaths = ['job/'];
        
        // Check exact paths
        if (in_array($currentPath, $exactPaths) || in_array(ltrim($currentPath, '/'), $exactPaths)) {
            $isPublicPath = true;
        }
        // Check if path starts with any of the patterns
        else {
            foreach ($startsWithPaths as $pattern) {
                if (str_starts_with($currentPath, $pattern) || 
                    str_starts_with(ltrim($currentPath, '/'), $pattern)) {
                    $isPublicPath = true;
                    break;
                }
            }
        }
    @endphp
    
    @if(!$isPublicPath)
        <div class="dashboard-container">
            <!-- Sidebar -->
            <div class="dashboard-sidebar">
                <div class="sidebar-header">
                    <h5><i class="fa fa-user-circle"></i> {{ Auth::user()->name }}</h5>
                </div>
                
                <ul class="sidebar-menu">
                    <li>
                        <a href="{{ route('user.dashboard') }}" class="{{ request()->is('user/dashboard') ? 'active' : '' }}">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="has-submenu">
                        <a href="#" id="jobsMenu">
                            <i class="fa fa-briefcase"></i>
                            <span>Your Jobs</span>
                        </a>
                        <ul class="sidebar-submenu" id="jobsSubmenu">
                            <li>
                                <a href="{{ route('jobs.create') }}" class="{{ request()->is('jobs/create') ? 'active' : '' }}">
                                    <i class="fa fa-plus-circle"></i>
                                    <span>Create New Job</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('jobs.index') }}" class="{{ request()->is('jobs') ? 'active' : '' }}">
                                    <i class="fa fa-list"></i>
                                    <span>All Jobs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{ route('user.yaj') }}" class="{{ request()->is('user/applied-jobs') ? 'active' : '' }}">
                            <i class="fa fa-file-text"></i>
                            <span>Your Applied Jobs</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('user.profile') }}" class="{{ request()->is('user/profile') ? 'active' : '' }}">
                            <i class="fa fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('user.settings') }}" class="{{ request()->is('user/settings') ? 'active' : '' }}">
                            <i class="fa fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                      
                    <li>
                        <a href="{{ route('user.logout') }}">
                          <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Main Content -->
            <div class="dashboard-content">
                @yield('content')
            </div>
        </div>
    @else
        <!-- For logged in users on public routes, show regular content without sidebar -->
        @yield('content')
    @endif
@else
    @yield('content')
@endif
    <!-- Footer -->
    <footer class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-4">
                        <img src="{{ asset('images/logo.png') }}" height="50px" class="me-2" />
                    </h5>
                    <p class="text-white-50">
                        Empowering your career journey with opportunities and guidance.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="social-icon">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}">About Us</a></li>
                        <li class="mb-2"><a href="{{ route('client.jobs') }}">Available Jobs</a></li>
                        <li class="mb-2"><a href="{{ route('services') }}">Services</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3 mb-4">
                    <h5>Services</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="#">Career Counseling</a></li>
                        <li class="mb-2"><a href="#">Resume Building</a></li>
                        <li class="mb-2"><a href="#">Interview Preparation</a></li>
                        <li class="mb-2"><a href="#">Job Placement</a></li>
                        <li class="mb-2"><a href="#">Skill Development</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3 mb-4">
                    <h5>Contact Info</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-3">
                            <i class="fa fa-map-marker me-2 text-white"></i>
                            123 Career Street, City
                        </li>
                        <li class="mb-3">
                            <i class="fa fa-phone me-2 text-white"></i>
                            +1 (555) 123-4567
                        </li>
                        <li class="mb-3">
                            <i class="fa fa-envelope me-2 text-white"></i>
                            info@webcareer.com
                        </li>
                    </ul>
                </div>
            </div>
        </div>
                    
            <div class="footer-bottom py-4 mt-4">
              <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0 text-white-50">
                            © {{ date('Y') }} Web Career. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="text-white-50 me-3">Privacy Policy</a>
                        <a href="#" class="text-white-50">Terms of Service</a>
                    </div>
                </div>
              </div>
            </div>
    </footer>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jobsMenu = document.getElementById('jobsMenu');
            const jobsSubmenu = document.getElementById('jobsSubmenu');
            
            // Toggle jobs submenu
            if (jobsMenu && jobsSubmenu) {
                jobsMenu.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.parentElement.classList.toggle('active');
                    jobsSubmenu.classList.toggle('show');
                });
            }
        });
    </script>
</body>
</html>
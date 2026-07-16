@extends('layouts.header')
@section('title','Find Your Dream Job | Web Career')
@section('content')
<style>
    /* Additional CSS for Landing Page */
    :root {
        --main-color: #135E85;
        --main-color-light: rgba(19, 94, 133, 0.1);
        --main-color-dark: #0e4a6b;
        --main-color-lightest: rgba(19, 94, 133, 0.05);
        --text-color: #334155;
    }
    
    .hero-section {
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
        padding: 100px 0 80px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-content h1 {
        font-weight: 800;
        color: var(--main-color);
        margin-bottom: 25px;
        font-size: 3.5rem;
        line-height: 1.2;
    }
    
    .hero-content .lead {
        font-size: 1.25rem;
        color: var(--text-color);
        margin-bottom: 35px;
        max-width: 600px;
    }
    
    .hero-search {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 20px 40px rgba(19, 94, 133, 0.15);
        margin-top: 30px;
    }
    
    .search-tabs .nav-tabs {
        border: none;
        margin-bottom: 25px;
    }
    
    .search-tabs .nav-link {
        border: none;
        color: #64748b;
        font-weight: 600;
        padding: 12px 25px;
        border-radius: 10px;
        margin-right: 10px;
        transition: all 0.3s ease;
    }
    
    .search-tabs .nav-link.active {
        background-color: var(--main-color);
        color: white;
    }
    
    .search-tabs .nav-link:hover:not(.active) {
        background-color: var(--main-color-light);
        color: var(--main-color);
    }
    
    .search-input-group {
        position: relative;
    }
    
    .search-input-group .form-control {
        padding-left: 50px;
        height: 60px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1.1rem;
    }
    
    .search-input-group .form-control:focus {
        border-color: var(--main-color);
        box-shadow: 0 0 0 3px var(--main-color-light);
    }
    
    .search-input-group .search-icon {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--main-color);
        font-size: 1.2rem;
        z-index: 5;
    }
    
    .btn-hero-search {
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 16px 40px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .btn-hero-search:hover {
        background-color: var(--main-color-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(19, 94, 133, 0.3);
    }
    
    .hero-stats {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid var(--main-color-light);
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--main-color);
        margin-bottom: 5px;
    }
    
    .stat-label {
        color: #64748b;
        font-size: 0.9rem;
    }
    
    .hero-image {
        position: relative;
    }
    
    .hero-image img {
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        transform: perspective(1000px) rotateY(-10deg);
        transition: all 0.5s ease;
    }
    
    .hero-image img:hover {
        transform: perspective(1000px) rotateY(0deg);
    }
    
    .floating-badge {
        position: absolute;
        background: white;
        padding: 15px 25px;
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        animation: float 3s ease-in-out infinite;
    }
    
    .badge-1 {
        top: 20%;
        right: 10%;
        animation-delay: 0s;
    }
    
    .badge-2 {
        bottom: 30%;
        left: 10%;
        animation-delay: 1.5s;
    }
    
    .floating-badge i {
        font-size: 30px;
        color: var(--main-color);
        margin-right: 15px;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    
    .categories-section {
        padding: 100px 0;
        background-color: white;
    }
    
    .section-title {
        color: var(--main-color);
        font-weight: 700;
        margin-bottom: 40px;
        position: relative;
        padding-bottom: 15px;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 4px;
        background-color: var(--main-color);
        border-radius: 2px;
    }
    
    .section-title.text-center::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .category-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 30px;
        border-top: 5px solid var(--main-color);
        transition: all 0.3s ease;
        text-align: center;
        height: 100%;
    }
    
    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(19, 94, 133, 0.15);
        border-top-color: var(--main-color-dark);
    }
    
    .category-icon {
        width: 80px;
        height: 80px;
        background-color: var(--main-color-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        transition: all 0.3s ease;
    }
    
    .category-card:hover .category-icon {
        background-color: var(--main-color);
        transform: scale(1.1);
    }
    
    .category-icon i {
        font-size: 35px;
        color: var(--main-color);
        transition: all 0.3s ease;
    }
    
    .category-card:hover .category-icon i {
        color: white;
    }
    
    .category-card h3 {
        color: var(--main-color);
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .category-count {
        background-color: var(--main-color-light);
        color: var(--main-color);
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-block;
        margin-top: 15px;
    }
    
    .featured-jobs {
        padding: 100px 0;
        background-color: var(--main-color-lightest);
    }
    
    .job-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 25px;
        border-left: 5px solid var(--main-color);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .job-card.featured::before {
        content: 'FEATURED';
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: var(--main-color);
        color: white;
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }
    
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(19, 94, 133, 0.15);
    }
    
    .company-logo {
        width: 70px;
        height: 70px;
        background-color: var(--main-color-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        flex-shrink: 0;
    }
    
    .company-logo i {
        font-size: 30px;
        color: var(--main-color);
    }
    
    .job-title {
        color: var(--main-color);
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 1.25rem;
    }
    
    .company-name {
        color: #64748b;
        font-size: 0.95rem;
        margin-bottom: 5px;
    }
    
    .job-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin: 15px 0;
    }
    
    .job-meta-item {
        display: flex;
        align-items: center;
        color: #475569;
        font-size: 0.9rem;
    }
    
    .job-meta-item i {
        color: var(--main-color);
        margin-right: 8px;
        font-size: 16px;
    }
    
    .btn-view-job {
        background-color: transparent;
        color: var(--main-color);
        border: 2px solid var(--main-color);
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-view-job:hover {
        background-color: var(--main-color);
        color: white;
    }
    
    .view-all-jobs {
        text-align: center;
        margin-top: 50px;
    }
    
    .btn-view-all {
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 15px 40px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    
    .btn-view-all:hover {
        background-color: var(--main-color-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(19, 94, 133, 0.3);
    }
    
    .how-it-works {
        padding: 100px 0;
        background-color: white;
    }
    
    .step-card {
        text-align: center;
        padding: 40px 30px;
        position: relative;
    }
    
    .step-number {
        width: 80px;
        height: 80px;
        background-color: var(--main-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 700;
        margin: 0 auto 25px;
        position: relative;
        z-index: 2;
    }
    
    .step-connector {
        position: absolute;
        top: 40px;
        left: 50%;
        width: 100%;
        height: 3px;
        background-color: var(--main-color-light);
        z-index: 1;
    }
    
    .step-card:last-child .step-connector {
        display: none;
    }
    
    .step-card h3 {
        color: var(--main-color);
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .testimonials-section {
        padding: 100px 0;
        background-color: var(--main-color-lightest);
    }
    
    .testimonial-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        margin: 20px;
        position: relative;
        border-left: 5px solid var(--main-color);
    }
    
    .testimonial-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-color);
        margin-bottom: 30px;
        font-style: italic;
        position: relative;
    }
    
    .testimonial-content::before {
        content: '"';
        font-size: 80px;
        color: var(--main-color-light);
        position: absolute;
        top: -40px;
        left: -10px;
        opacity: 0.3;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
    }
    
    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: var(--main-color-light);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        color: var(--main-color);
        font-weight: 700;
        font-size: 1.2rem;
    }
    
    .author-info h4 {
        color: var(--main-color);
        margin-bottom: 5px;
    }
    
    .author-info p {
        color: #64748b;
        margin-bottom: 0;
    }
    
    .employers-section {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--main-color) 0%, var(--main-color-dark) 100%);
        color: white;
    }
    
    .employer-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 40px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .employer-card:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-10px);
    }
    
    .employer-icon {
        font-size: 50px;
        margin-bottom: 25px;
        color: white;
    }
    
    .employer-card h3 {
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .brands-section {
        padding: 80px 0;
        background-color: white;
    }
    
    .brand-logo {
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.6;
        transition: all 0.3s ease;
        filter: grayscale(1);
    }
    
    .brand-logo:hover {
        opacity: 1;
        filter: grayscale(0);
        transform: scale(1.1);
    }
    
    .brand-logo img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }
    
    .cta-section {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
        text-align: center;
    }
    
    .cta-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--main-color);
        margin-bottom: 25px;
    }
    
    .cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-top: 40px;
        flex-wrap: wrap;
    }
    
    .btn-cta-primary {
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 16px 40px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    
    .btn-cta-primary:hover {
        background-color: var(--main-color-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(19, 94, 133, 0.3);
    }
    
    .btn-cta-secondary {
        background-color: transparent;
        color: var(--main-color);
        border: 2px solid var(--main-color);
        border-radius: 10px;
        padding: 16px 40px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    
    .btn-cta-secondary:hover {
        background-color: var(--main-color-light);
        transform: translateY(-3px);
    }
    
    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2.5rem;
        }
        
        .hero-section {
            padding: 80px 0 60px;
        }
        
        .hero-stats {
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .stat-item {
            flex: 1 0 calc(50% - 20px);
        }
        
        .floating-badge {
            display: none;
        }
        
        .step-connector {
            display: none;
        }
        
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-cta-primary, .btn-cta-secondary {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1>Find Your Dream Job & Build Your Career</h1>
                    <p class="lead">Connect with thousands of job opportunities from top companies. Whether you're starting your career or looking for your next challenge, we've got you covered.</p>
                    
                    <div class="hero-search">
                        <div class="search-tabs">
                            <ul class="nav nav-tabs" id="searchTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="jobs-tab" data-bs-toggle="tab" data-bs-target="#jobs-tab-pane" type="button" role="tab">
                                        <i class="fa fa-briefcase me-2"></i>
                                        Find Jobs
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="companies-tab" data-bs-toggle="tab" data-bs-target="#companies-tab-pane" type="button" role="tab">
                                        <i class="fa fa-building me-2"></i>
                                        Browse Companies
                                    </button>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="searchTabContent">
                                <div class="tab-pane fade show active" id="jobs-tab-pane" role="tabpanel">
                                    <form action="{{ route('client.jobs') }}" method="GET" class="mt-3">
                                        <div class="row g-3">
                                            <div class="col-md-8">
                                                <div class="search-input-group">
                                                    <i class="fa fa-search search-icon"></i>
                                                    <input type="text" class="form-control" name="query" placeholder="Job title, keywords, or company">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-hero-search">
                                                    <i class="fa fa-search me-2"></i>
                                                    Search Jobs
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="location" placeholder="City, state, or remote">
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-select" name="job_type">
                                                    <option value="">All Job Types</option>
                                                    <option value="full-time">Full Time</option>
                                                    <option value="part-time">Part Time</option>
                                                    <option value="remote">Remote</option>
                                                    <option value="contract">Contract</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="tab-pane fade" id="companies-tab-pane" role="tabpanel">
                                    <form action="#" method="GET" class="mt-3">
                                        <div class="row g-3">
                                            <div class="col-md-8">
                                                <div class="search-input-group">
                                                    <i class="fa fa-building search-icon"></i>
                                                    <input type="text" class="form-control" placeholder="Company name or industry">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-hero-search">
                                                    <i class="fa fa-search me-2"></i>
                                                    Find Companies
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="hero-stats">
                            <div class="stat-item">
                                <div class="stat-number">25K+</div>
                                <div class="stat-label">Jobs Available</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">5K+</div>
                                <div class="stat-label">Companies</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">15K+</div>
                                <div class="stat-label">Hired Candidates</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">89%</div>
                                <div class="stat-label">Success Rate</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-image text-center">
                    <img src="https://cdn.pixabay.com/photo/2020/07/08/04/12/work-5382501_1280.jpg" alt="Job Search" class="img-fluid" style="max-height: 500px;">
                    
                    <div class="floating-badge badge-1">
                        <i class="fa fa-rocket"></i>
                        <div>
                            <strong>Fast Hiring</strong>
                            <div>48h avg. response</div>
                        </div>
                    </div>
                    
                    <div class="floating-badge badge-2">
                        <i class="fa fa-shield"></i>
                        <div>
                            <strong>Verified Jobs</strong>
                            <div>100% legit companies</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Job Categories -->
<section class="categories-section">
    <div class="container">
        <h2 class="section-title text-center">Browse Popular Categories</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">Find jobs in your area of expertise across various industries and specializations</p>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fa fa-laptop"></i>
                    </div>
                    <h3>Technology</h3>
                    <p>Software development, IT, cybersecurity, and tech support roles</p>
                    <span class="category-count">4,238 Jobs</span>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <h3>Business</h3>
                    <p>Marketing, sales, management, and business development</p>
                    <span class="category-count">3,567 Jobs</span>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fa fa-heartbeat"></i>
                    </div>
                    <h3>Healthcare</h3>
                    <p>Medical, nursing, healthcare administration, and wellness</p>
                    <span class="category-count">2,891 Jobs</span>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <h3>Education</h3>
                    <p>Teaching, administration, research, and educational services</p>
                    <span class="category-count">1,945 Jobs</span>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fa fa-paint-brush"></i>
                    </div>
                    <h3>Creative</h3>
                    <p>Design, writing, media, arts, and creative services</p>
                    <span class="category-count">2,345 Jobs</span>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fa fa-calculator"></i>
                    </div>
                    <h3>Finance</h3>
                    <p>Accounting, banking, investment, and financial analysis</p>
                    <span class="category-count">3,127 Jobs</span>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <h3>Engineering</h3>
                    <p>Mechanical, electrical, civil, and industrial engineering</p>
                    <span class="category-count">2,678 Jobs</span>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="category-card">
                    <div class="category-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <h3>Sales & Retail</h3>
                    <p>Retail management, customer service, and sales operations</p>
                    <span class="category-count">1,892 Jobs</span>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('client.jobs') }}" class="btn btn-view-all">
                <i class="fa fa-th-large me-2"></i>
                View All Categories
            </a>
        </div>
    </div>
</section>

<!-- Featured Jobs -->
<section class="featured-jobs">
    <div class="container">
        <h2 class="section-title text-center">Featured Jobs</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">Hand-picked opportunities from top companies. Apply now and take the next step in your career.</p>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="job-card featured">
                    <div class="d-flex">
                        <div class="company-logo">
                            <i class="fa fa-apple"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="job-title">Senior React Developer</h3>
                            <p class="company-name">TechVision Inc.</p>
                            <div class="job-meta">
                                <span class="job-meta-item">
                                    <i class="fa fa-map-marker"></i>
                                    Remote
                                </span>
                                <span class="job-meta-item">
                                    <i class="fa fa-money"></i>
                                    $120k - $150k
                                </span>
                                <span class="job-meta-item">
                                    <i class="fa fa-clock-o"></i>
                                    Full Time
                                </span>
                            </div>
                            <button class="btn btn-view-job">
                                <i class="fa fa-eye me-2"></i>
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="job-card">
                    <div class="d-flex">
                        <div class="company-logo">
                            <i class="fa fa-google"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="job-title">Marketing Manager</h3>
                            <p class="company-name">GlobalTech Solutions</p>
                            <div class="job-meta">
                                <span class="job-meta-item">
                                    <i class="fa fa-map-marker"></i>
                                    New York, NY
                                </span>
                                <span class="job-meta-item">
                                    <i class="fa fa-money"></i>
                                    $90k - $120k
                                </span>
                                <span class="job-meta-item">
                                    <i class="fa fa-clock-o"></i>
                                    Full Time
                                </span>
                            </div>
                            <button class="btn btn-view-job">
                                <i class="fa fa-eye me-2"></i>
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="job-card">
                    <div class="d-flex">
                        <div class="company-logo">
                            <i class="fa fa-amazon"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="job-title">Data Scientist</h3>
                            <p class="company-name">DataInsight Corp</p>
                            <div class="job-meta">
                                <span class="job-meta-item">
                                    <i class="fa fa-map-marker"></i>
                                    San Francisco, CA
                                </span>
                                <span class="job-meta-item">
                                    <i class="fa fa-money"></i>
                                    $140k - $180k
                                </span>
                                <span class="job-meta-item">
                                    <i class="fa fa-clock-o"></i>
                                    Full Time
                                </span>
                            </div>
                            <button class="btn btn-view-job">
                                <i class="fa fa-eye me-2"></i>
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="job-card">
                    <div class="d-flex">
                        <div class="company-logo">
                            <i class="fa fa-microsoft"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="job-title">UX/UI Designer</h3>
                            <p class="company-name">Creative Minds Agency</p>
                            <div class="job-meta">
                                <span class="job-meta-item">
                                    <i class="fa fa-map-marker"></i>
                                    Chicago, IL
                                </span>
                                <span class="job-meta-item">
                                    <i class="fa fa-money"></i>
                                    $75k - $95k
                                </span>
                                <span class="job-meta-item">
                                    <i class="fa fa-clock-o"></i>
                                    Contract
                                </span>
                            </div>
                            <button class="btn btn-view-job">
                                <i class="fa fa-eye me-2"></i>
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="view-all-jobs">
            <a href="{{ route('client.jobs') }}" class="btn btn-view-all">
                <i class="fa fa-briefcase me-2"></i>
                View All Jobs
            </a>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works">
    <div class="container">
        <h2 class="section-title text-center">How It Works</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">Simple steps to find your dream job or hire the perfect candidate</p>
        
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <div class="step-connector"></div>
                    <div class="step-number">1</div>
                    <h3>Create Profile</h3>
                    <p>Sign up and build your professional profile with skills and experience</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <div class="step-connector"></div>
                    <div class="step-number">2</div>
                    <h3>Search & Match</h3>
                    <p>Browse jobs or let our AI match you with perfect opportunities</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <div class="step-connector"></div>
                    <div class="step-number">3</div>
                    <h3>Apply Easily</h3>
                    <p>Apply with one click using your profile or upload resume</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3>Get Hired</h3>
                    <p>Connect with employers and land your dream job</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-5 pt-5">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="text-main mb-4">For Employers</h3>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="step-card">
                            <div class="step-number"><i class="fa fa-building"></i></div>
                            <h3>Post Jobs</h3>
                            <p>Create and post job openings in minutes</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="step-card">
                            <div class="step-number"><i class="fa fa-users"></i></div>
                            <h3>Find Talent</h3>
                            <p>Access our pool of qualified candidates</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="step-card">
                            <div class="step-number"><i class="fa fa-handshake-o"></i></div>
                            <h3>Hire Faster</h3>
                            <p>Streamlined hiring process with tools</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section">
    <div class="container">
        <h2 class="section-title text-center">Success Stories</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">Hear from people who found their dream jobs through our platform</p>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "Web Career helped me transition from a traditional industry to tech. The career counseling and job matching were invaluable in landing my dream role as a product manager."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">SR</div>
                        <div class="author-info">
                            <h4>Sarah Rodriguez</h4>
                            <p>Product Manager at TechCorp</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "As a recent graduate, I was struggling to find entry-level positions. Web Career's platform connected me with companies looking for fresh talent. I got hired within 3 weeks!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">MJ</div>
                        <div class="author-info">
                            <h4>Michael Johnson</h4>
                            <p>Junior Developer at StartupXYZ</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "The resume builder and interview preparation tools gave me the confidence to apply for senior roles. I successfully negotiated a 40% salary increase in my new position."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">EP</div>
                        <div class="author-info">
                            <h4>Emma Parker</h4>
                            <p>Marketing Director</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- For Employers -->
<section class="employers-section">
    <div class="container">
        <h2 class="text-center mb-5" style="font-weight: 700; font-size: 2.5rem;">Hire Smarter, Grow Faster</h2>
        <p class="text-center mb-5" style="font-size: 1.25rem; max-width: 700px; margin: 0 auto;">Everything you need to find, attract, and hire the best talent for your team</p>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="employer-card">
                    <div class="employer-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    <h3>Post Jobs Free</h3>
                    <p>Reach thousands of qualified candidates with free basic job postings</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="employer-card">
                    <div class="employer-icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <h3>Smart Matching</h3>
                    <p>Our AI-powered matching finds the perfect candidates for your roles</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="employer-card">
                    <div class="employer-icon">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <h3>Analytics Dashboard</h3>
                    <p>Track applications and hiring metrics with comprehensive analytics</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('register') }}" class="btn btn-cta-primary" style="background-color: white; color: var(--main-color);">
                <i class="fa fa-building me-2"></i>
                Start Hiring Now
            </a>
        </div>
    </div>
</section>

<!-- Trusted Brands -->
<section class="brands-section">
    <div class="container">
        <h2 class="section-title text-center">Trusted by Leading Companies</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">Join thousands of companies who trust us to find their best talent</p>
        
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="brand-logo">
                    <i class="fa fa-apple fa-3x text-muted"></i>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="brand-logo">
                    <i class="fa fa-google fa-3x text-muted"></i>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="brand-logo">
                    <i class="fa fa-microsoft fa-3x text-muted"></i>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="brand-logo">
                    <i class="fa fa-amazon fa-3x text-muted"></i>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="brand-logo">
                    <i class="fa fa-spotify fa-3x text-muted"></i>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="brand-logo">
                    <i class="fa fa-uber fa-3x text-muted"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="cta-title">Ready to Transform Your Career?</h2>
                <p class="fs-5">Join our community of professionals and take control of your career journey. Whether you're looking for a job or building a team, we're here to help you succeed.</p>
                
                <div class="cta-buttons">
                    <a href="{{ route('register') }}" class="btn btn-cta-primary">
                        <i class="fa fa-user-plus me-2"></i>
                        Sign Up Free
                    </a>
                    <a href="{{ route('client.jobs') }}" class="btn btn-cta-secondary">
                        <i class="fa fa-briefcase me-2"></i>
                        Browse Jobs
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@extends('layouts.header')
@section('title', ($vacancy->title ?? 'Job Details') . ' - ' . ($vacancy->company->name ?? 'Company'))
@section('content')
<style>
    /* Additional CSS for Single Job Page */
    :root {
        --main-color: #135E85;
        --main-color-light: rgba(19, 94, 133, 0.1);
        --main-color-dark: #0e4a6b;
        --main-color-lightest: rgba(19, 94, 133, 0.05);
        --text-color: #334155;
    }
    
    .job-hero {
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, rgba(255,255,255,1) 100%);
        padding: 80px 0 40px;
        border-bottom: 3px solid var(--main-color-light);
    }
    
    .section-title {
        color: var(--main-color);
        font-weight: 700;
        margin-bottom: 25px;
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
    
    .job-header-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 30px;
        border-left: 5px solid var(--main-color);
    }
    
    .company-logo-large {
        width: 120px;
        height: 120px;
        background-color: white;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid var(--main-color-light);
        box-shadow: 0 5px 15px rgba(19, 94, 133, 0.1);
        margin-right: 30px;
        flex-shrink: 0;
    }
    
    .company-logo-large i {
        font-size: 50px;
        color: var(--main-color);
    }
    
    .job-title-main {
        color: var(--main-color);
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 2.2rem;
    }
    
    .company-name-large {
        color: var(--text-color);
        font-size: 1.3rem;
        margin-bottom: 20px;
    }
    
    .job-meta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 25px 0;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        padding: 15px;
        background-color: var(--main-color-lightest);
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    
    .meta-item:hover {
        background-color: var(--main-color-light);
        transform: translateY(-3px);
    }
    
    .meta-icon {
        width: 50px;
        height: 50px;
        background-color: var(--main-color);
        color: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
    }
    
    .meta-icon i {
        font-size: 20px;
    }
    
    .meta-content h4 {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 5px;
    }
    
    .meta-content p {
        font-weight: 600;
        color: var(--text-color);
        margin-bottom: 0;
    }
    
    .job-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 20px 0;
    }
    
    .job-badge {
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .badge-fulltime {
        background-color: var(--main-color);
        color: white;
    }
    
    .badge-remote {
        background-color: #10b981;
        color: white;
    }
    
    .badge-urgent {
        background-color: #ef4444;
        color: white;
    }
    
    .badge-featured {
        background-color: #f59e0b;
        color: white;
    }
    
    .badge-parttime {
        background-color: #8b5cf6;
        color: white;
    }
    
    .badge-contract {
        background-color: #f97316;
        color: white;
    }
    
    .badge-internship {
        background-color: #06b6d4;
        color: white;
    }
    
    .job-content-card {
        background: white;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }
    
    .job-description {
        line-height: 1.8;
        color: var(--text-color);
    }
    
    .requirements-list, .benefits-list {
        list-style: none;
        padding-left: 0;
    }
    
    .requirements-list li, .benefits-list li {
        padding: 12px 0;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: flex-start;
    }
    
    .requirements-list li:last-child, .benefits-list li:last-child {
        border-bottom: none;
    }
    
    .requirements-list li i, .benefits-list li i {
        color: var(--main-color);
        margin-right: 12px;
        margin-top: 3px;
        flex-shrink: 0;
    }
    
    .skills-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 20px 0;
    }
    
    .skill-tag {
        background-color: var(--main-color-light);
        color: var(--main-color);
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    
    .skill-tag:hover {
        background-color: var(--main-color);
        color: white;
        transform: translateY(-2px);
    }
    
    .sidebar-widget {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }
    
    .widget-title {
        color: var(--main-color);
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--main-color-light);
    }
    
    .btn-apply-main {
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 16px 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-apply-main:hover {
        background-color: var(--main-color-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(19, 94, 133, 0.3);
    }
    
    .btn-apply-main i {
        margin-right: 10px;
        font-size: 1.2rem;
    }
    
    .btn-save-job {
        background-color: transparent;
        color: var(--main-color);
        border: 2px solid var(--main-color);
        border-radius: 10px;
        padding: 16px 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 15px;
    }
    
    .btn-save-job:hover {
        background-color: var(--main-color-light);
    }
    
    .btn-save-job i {
        margin-right: 10px;
    }
    
    .company-info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .company-info-logo {
        width: 60px;
        height: 60px;
        background-color: var(--main-color-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
    }
    
    .company-info-logo i {
        font-size: 25px;
        color: var(--main-color);
    }
    
    .company-details {
        flex-grow: 1;
    }
    
    .company-details h4 {
        color: var(--main-color);
        margin-bottom: 5px;
    }
    
    .company-details p {
        color: #64748b;
        font-size: 0.9rem;
        margin-bottom: 5px;
    }
    
    .view-company-btn {
        color: var(--main-color);
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        margin-top: 10px;
    }
    
    .view-company-btn:hover {
        color: var(--main-color-dark);
    }
    
    .view-company-btn i {
        margin-left: 5px;
    }
    
    .share-job {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    
    .share-btn {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .share-facebook { background-color: #1877f2; }
    .share-twitter { background-color: #1da1f2; }
    .share-linkedin { background-color: #0077b5; }
    .share-whatsapp { background-color: #25d366; }
    
    .similar-jobs {
        background-color: var(--main-color-lightest);
        padding: 60px 0;
        margin-top: 40px;
    }
    
    .similar-job-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        margin-bottom: 25px;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .similar-job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(19, 94, 133, 0.15);
    }
    
    .similar-job-card h5 {
        color: var(--main-color);
        margin-bottom: 10px;
    }
    
    .similar-job-company {
        color: #64748b;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }
    
    .similar-job-meta {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
        color: #475569;
        font-size: 0.85rem;
    }
    
    .application-stats {
        display: flex;
        justify-content: space-between;
        background-color: var(--main-color-lightest);
        padding: 15px;
        border-radius: 10px;
        margin-top: 20px;
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--main-color);
    }
    
    .stat-label {
        font-size: 0.85rem;
        color: #64748b;
    }
    
    .job-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }
    
    .detail-item {
        background-color: var(--main-color-lightest);
        padding: 20px;
        border-radius: 10px;
    }
    
    .detail-item h5 {
        color: var(--main-color);
        font-size: 1rem;
        margin-bottom: 10px;
    }
    
    @media (max-width: 768px) {
        .job-hero {
            padding: 60px 0 30px;
        }
        
        .job-header-card {
            padding: 25px;
        }
        
        .company-logo-large {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            margin-bottom: 20px;
        }
        
        .company-logo-large i {
            font-size: 35px;
        }
        
        .job-title-main {
            font-size: 1.8rem;
        }
        
        .job-meta-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero Section -->
<section class="job-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('welcome') }}" class="text-decoration-none text-main">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('client.jobs') }}" class="text-decoration-none text-main">Available Jobs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $vacancy->title ?? 'Job Details' }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Main Job Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                @if($message = session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if($message = session()->get('warning'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Job Header -->
                <div class="job-header-card">
                    <div class="d-flex flex-column flex-md-row align-items-start">
                        <div class="company-logo-large">
                            @if($vacancy->company && $vacancy->company->logo)
                                <img src="{{ asset('storage/' . $vacancy->company->logo) }}" alt="{{ $vacancy->company->name ?? 'Company Logo' }}" style="max-width: 80px; max-height: 80px;">
                            @else
                                <i class="fa fa-building"></i>
                            @endif
                        </div>
                        <div class="flex-grow-1">
                            <h1 class="job-title-main">{{ $vacancy->title ?? 'Job Title' }}</h1>
                            <p class="company-name-large">
                                @if($vacancy->company)
                                    {{ $vacancy->company->name ?? 'Company Name' }}
                                @else
                                    Company Name
                                @endif
                            </p>
                            
                            <div class="job-badges">
                                @php
                                    $typeClass = 'badge-fulltime';
                                    if(str_contains(strtolower($vacancy->type ?? ''), 'remote')) {
                                        $typeClass = 'badge-remote';
                                    } elseif(str_contains(strtolower($vacancy->type ?? ''), 'part')) {
                                        $typeClass = 'badge-parttime';
                                    } elseif(str_contains(strtolower($vacancy->type ?? ''), 'contract')) {
                                        $typeClass = 'badge-contract';
                                    } elseif(str_contains(strtolower($vacancy->type ?? ''), 'intern')) {
                                        $typeClass = 'badge-internship';
                                    }
                                @endphp
                                <span class="job-badge {{ $typeClass }}">{{ $vacancy->type ?? 'Full Time' }}</span>
                                
                                @if($vacancy->status == 2)
                                    <span class="job-badge badge-featured">Featured</span>
                                @endif
                                
                                @if($vacancy->vacancies <= 1)
                                    <span class="job-badge badge-urgent">Urgent Hiring</span>
                                @endif
                            </div>
                            
                            <div class="job-meta-grid">
                                @if($vacancy->salary)
                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="meta-content">
                                        <h4>Salary</h4>
                                        <p>{{ $vacancy->salary }}</p>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="meta-content">
                                        <h4>Location</h4>
                                        <p>{{ $vacancy->location ?? 'Location not specified' }}</p>
                                    </div>
                                </div>
                                
                                @if($vacancy->experience)
                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="meta-content">
                                        <h4>Experience</h4>
                                        <p>{{ $vacancy->experience }}</p>
                                    </div>
                                </div>
                                @endif
                                
                                @if($vacancy->vacancies)
                                <div class="meta-item">
                                    <div class="meta-icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="meta-content">
                                        <h4>Positions</h4>
                                        <p>{{ $vacancy->vacancies }} vacancy(ies)</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                            <div class="application-stats">
                                <div class="stat-item">
                                    <div class="stat-number">{{ $vacancy->views ?? '0' }}</div>
                                    <div class="stat-label">Views</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">0</div>
                                    <div class="stat-label">Applications</div>
                                </div>
                                @if($vacancy->created_at)
                                <div class="stat-item">
                                    <div class="stat-number">{{ $vacancy->created_at->diffForHumans() }}</div>
                                    <div class="stat-label">Posted</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Job Description -->
                @if($vacancy->description)
                <div class="job-content-card">
                    <h2 class="section-title">Job Description</h2>
                    <div class="job-description">
                        {!! nl2br(e($vacancy->description)) !!}
                    </div>
                </div>
                @endif
                
                <!-- Requirements -->
                @if($vacancy->requirements)
                <div class="job-content-card">
                    <h2 class="section-title">Requirements</h2>
                    <div class="job-description">
                        {!! nl2br(e($vacancy->requirements)) !!}
                    </div>
                </div>
                @endif
                
                <!-- Skills Required -->
                @if($vacancy->skills)
                <div class="job-content-card">
                    <h2 class="section-title">Required Skills</h2>
                    <div class="skills-tags">
                        @php
                            $skills = explode(',', $vacancy->skills);
                        @endphp
                        @foreach($skills as $skill)
                            <span class="skill-tag">{{ trim($skill) }}</span>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- About Company -->
                @if($vacancy->company && $vacancy->company->description)
                <div class="job-content-card">
                    <h2 class="section-title">About {{ $vacancy->company->name }}</h2>
                    <div class="job-description">
                        {!! nl2br(e($vacancy->company->description)) !!}
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Apply Now Card -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Apply for this Job</h3>
                    @if(Auth::check() && Auth::id() == $vacancy->user_id)
                     <label class="text-danger"><b>   <i class="fa fa-ban"></i> You Cant Apply On Your Own Job</b></label>
                    @else 
                        @if(empty(Auth::user()->profile->resume))
                             <label class="text-danger"><b>   <i class="fa fa-ban"></i> Upload Your Resume For Apply Job</b></label>
                        @else 
                            @if(!empty(App\Models\applicant::where('vacancy_id',$vacancy->id)->where('user_id',Auth::id())->first()))
                            <label class="text-success">
                                <b><i class="fa fa-check-square"></i> Already Applied</b>
                            </label>
                            @else 
                                <a href="{{ route('apply.online',$vacancy->id) }}">
                                    <button class="btn btn-apply-main" id="applyButton">
                                        <i class="fa fa-paper-plane"></i>
                                        Apply Now
                                    </button>
                                </a>
                            @endif
                        @endif
                    @endif
                    <button class="btn btn-save-job">
                        <i class="fa fa-bookmark"></i>
                        Save for Later
                    </button>
                    
                    @if($vacancy->created_at)
                    <div class="mt-4 pt-3 border-top">
                        <h6 class="text-main mb-3">Posted Date</h6>
                        <div class="d-flex align-items-center">
                            <i class="fa fa-calendar text-main me-2"></i>
                            <span>{{ $vacancy->created_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Company Info -->
                @if($vacancy->company)
                <div class="sidebar-widget">
                    <h3 class="widget-title">Company Information</h3>
                    <div class="company-info">
                        <div class="company-info-logo">
                            @if($vacancy->company->logo)
                                <img src="{{ asset('storage/' . $vacancy->company->logo) }}" alt="{{ $vacancy->company->name }}" style="max-width: 40px; max-height: 40px;">
                            @else
                                <i class="fa fa-building"></i>
                            @endif
                        </div>
                        <div class="company-details">
                            <h4>{{ $vacancy->company->name }}</h4>
                            @if($vacancy->company->location)
                            <p><i class="fa fa-map-marker text-main me-1"></i> {{ $vacancy->company->location }}</p>
                            @endif
                            @if($vacancy->company->website)
                            <p><i class="fa fa-globe text-main me-1"></i> {{ $vacancy->company->website }}</p>
                            @endif
                            @if($vacancy->company->size)
                            <p><i class="fa fa-users text-main me-1"></i> {{ $vacancy->company->size }} employees</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- Job Details -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Job Details</h3>
                    <ul class="requirements-list">
                        <li>
                            <i class="fa fa-briefcase text-main"></i>
                            <div>
                                <strong>Job Type:</strong>
                                <div>{{ $vacancy->type ?? 'Not specified' }}</div>
                            </div>
                        </li>
                        @if($vacancy->experience)
                        <li>
                            <i class="fa fa-clock-o text-main"></i>
                            <div>
                                <strong>Experience Level:</strong>
                                <div>{{ $vacancy->experience }}</div>
                            </div>
                        </li>
                        @endif
                        @if($vacancy->location)
                        <li>
                            <i class="fa fa-map-marker text-main"></i>
                            <div>
                                <strong>Location:</strong>
                                <div>{{ $vacancy->location }}</div>
                            </div>
                        </li>
                        @endif
                        @if($vacancy->salary)
                        <li>
                            <i class="fa fa-money text-main"></i>
                            <div>
                                <strong>Salary:</strong>
                                <div>{{ $vacancy->salary }}</div>
                            </div>
                        </li>
                        @endif
                        @if($vacancy->created_at)
                        <li>
                            <i class="fa fa-calendar text-main"></i>
                            <div>
                                <strong>Posted:</strong>
                                <div>{{ $vacancy->created_at->format('M d, Y') }}</div>
                            </div>
                        </li>
                        @endif
                        <li>
                            <i class="fa fa-refresh text-main"></i>
                            <div>
                                <strong>Job ID:</strong>
                                <div>#{{ $vacancy->id }}</div>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Share Job -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Share This Job</h3>
                    <div class="share-job">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="share-btn share-facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($vacancy->title ?? 'Check out this job') }}" target="_blank" class="share-btn share-twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ urlencode($vacancy->title ?? 'Job Opportunity') }}" target="_blank" class="share-btn share-linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode(($vacancy->title ?? 'Check out this job') . ' ' . url()->current()) }}" target="_blank" class="share-btn share-whatsapp">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Report Job -->
                <div class="sidebar-widget">
                    <div class="text-center">
                        <a href="#" class="text-decoration-none text-muted" data-bs-toggle="modal" data-bs-target="#reportJobModal">
                            <i class="fa fa-flag me-1"></i>
                            Report this job
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Report Job Modal -->
<div class="modal fade" id="reportJobModal" tabindex="-1" aria-labelledby="reportJobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportJobModalLabel">Report This Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please select the reason for reporting this job:</p>
                <form id="reportJobForm">
                    <div class="mb-3">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="reportReason" id="reason1" value="fake">
                            <label class="form-check-label" for="reason1">
                                Fake job posting
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="reportReason" id="reason2" value="spam">
                            <label class="form-check-label" for="reason2">
                                Spam or misleading information
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="reportReason" id="reason3" value="discrimination">
                            <label class="form-check-label" for="reason3">
                                Discrimination or offensive content
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="reportReason" id="reason4" value="other">
                            <label class="form-check-label" for="reason4">
                                Other
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reportDetails" class="form-label">Additional details (optional)</label>
                        <textarea class="form-control" id="reportDetails" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Submit Report</button>
            </div>
        </div>
    </div>
</div>

@endsection
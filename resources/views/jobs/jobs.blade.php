@extends('layouts.header')
@section('title','Available Jobs')
@section('content')
<style>
    /* Additional CSS for Jobs Page */
    :root {
        --main-color: #135E85;
        --main-color-light: rgba(19, 94, 133, 0.1);
        --main-color-dark: #0e4a6b;
        --main-color-lightest: rgba(19, 94, 133, 0.05);
        --text-color: #334155;
    }
    
    .jobs-hero {
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
    
    .search-container {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 40px;
    }
    
    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--main-color);
        box-shadow: 0 0 0 3px var(--main-color-light);
    }
    
    .btn-search {
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .btn-search:hover {
        background-color: var(--main-color-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(19, 94, 133, 0.2);
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
    
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(19, 94, 133, 0.15);
    }
    
    .job-card.featured {
        border: 2px solid var(--main-color);
        background: linear-gradient(to right, white 97%, var(--main-color) 3%);
    }
    
    .job-card.urgent::before {
        content: 'URGENT';
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: #ef4444;
        color: white;
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
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
    
    .company-logo img {
        max-width: 50px;
        max-height: 50px;
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
    
    .job-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 15px 0;
    }
    
    .skill-tag {
        background-color: var(--main-color-light);
        color: var(--main-color);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .job-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }
    
    .job-type {
        background-color: var(--main-color);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    .job-type.remote {
        background-color: #10b981;
    }
    
    .job-type.part-time {
        background-color: #f59e0b;
    }
    
    .job-type.contract {
        background-color: #8b5cf6;
    }
    
    .btn-apply {
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-apply:hover {
        background-color: var(--main-color-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(19, 94, 133, 0.2);
    }
    
    .btn-view {
        background-color: transparent;
        color: var(--main-color);
        border: 2px solid var(--main-color);
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-view:hover {
        background-color: var(--main-color);
        color: white;
    }
    
    .sidebar-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 25px;
    }
    
    .sidebar-title {
        color: var(--main-color);
        font-weight: 600;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--main-color-light);
    }
    
    .filter-group {
        margin-bottom: 25px;
    }
    
    .filter-title {
        font-weight: 600;
        color: var(--text-color);
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .filter-option {
        margin-bottom: 8px;
        display: flex;
        align-items: center;
    }
    
    .filter-option input[type="checkbox"] {
        margin-right: 10px;
        accent-color: var(--main-color);
    }
    
    .salary-range {
        width: 100%;
        margin-top: 10px;
        accent-color: var(--main-color);
    }
    
    .salary-labels {
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
        color: #64748b;
        font-size: 0.85rem;
    }
    
    .stats-card {
        background: linear-gradient(135deg, var(--main-color) 0%, var(--main-color-dark) 100%);
        color: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        margin-bottom: 25px;
    }
    
    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .stats-label {
        font-size: 1rem;
        opacity: 0.9;
    }
    
    .pagination .page-link {
        color: var(--main-color);
        border: 2px solid #e2e8f0;
        margin: 0 5px;
        border-radius: 8px;
        font-weight: 600;
    }
    
    .pagination .page-link:hover {
        background-color: var(--main-color-light);
        border-color: var(--main-color);
    }
    
    .pagination .page-item.active .page-link {
        background-color: var(--main-color);
        border-color: var(--main-color);
        color: white;
    }
    
    .no-jobs {
        text-align: center;
        padding: 60px 20px;
    }
    
    .no-jobs-icon {
        font-size: 4rem;
        color: var(--main-color-light);
        margin-bottom: 20px;
    }
    
    .job-detail-modal .modal-content {
        border-radius: 15px;
        border: none;
    }
    
    .job-detail-modal .modal-header {
        background-color: var(--main-color-lightest);
        border-radius: 15px 15px 0 0;
        padding: 25px;
    }
    
    .job-detail-modal .modal-title {
        color: var(--main-color);
        font-weight: 600;
    }
    
    @media (max-width: 768px) {
        .jobs-hero {
            padding: 60px 0 30px;
        }
        
        .job-actions {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }
        
        .job-meta {
            gap: 10px;
        }
    }
</style>

<!-- Hero Section -->
<section class="jobs-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold text-main mb-3">Find Your Dream Job</h1>
                <p class="lead mb-4">Browse through <span class="text-main fw-bold">{{ $vacancies->count() }}+</span> verified job opportunities from top companies. Filter by location, salary, and job type to find your perfect match.</p>
                <div class="d-flex align-items-center">
                    <div class="me-4">
                        <i class="fa fa-briefcase fa-2x text-main"></i>
                    </div>
                    <div>
                        <p class="mb-1"><span class="fw-bold">1,238</span> new jobs posted this week</p>
                        <p class="mb-0"><span class="fw-bold">89%</span> of employers respond within 48 hours</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <img src="https://cdn.pixabay.com/photo/2018/05/18/15/30/web-design-3411373_1280.jpg" alt="Job Search" class="img-fluid rounded" style="max-height: 250px;">
            </div>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3">
                <div class="sidebar-card">
                    <h3 class="sidebar-title">Filters</h3>
                    
                    <div class="filter-group">
                        <div class="filter-title">
                            <span>Job Type</span>
                            <button type="button" class="btn btn-link p-0 text-main" style="font-size: 0.85rem;">Clear</button>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="type-fulltime" checked>
                            <label for="type-fulltime">Full Time</label>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="type-parttime">
                            <label for="type-parttime">Part Time</label>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="type-remote" checked>
                            <label for="type-remote">Remote</label>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="type-contract">
                            <label for="type-contract">Contract</label>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="type-internship">
                            <label for="type-internship">Internship</label>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <div class="filter-title">
                            <span>Experience Level</span>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="exp-entry" checked>
                            <label for="exp-entry">Entry Level (0-2 yrs)</label>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="exp-mid" checked>
                            <label for="exp-mid">Mid Level (2-5 yrs)</label>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="exp-senior">
                            <label for="exp-senior">Senior (5+ yrs)</label>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <div class="filter-title">
                            <span>Salary Range</span>
                        </div>
                        <input type="range" class="salary-range" min="0" max="200000" value="80000" step="10000">
                        <div class="salary-labels">
                            <span>$0</span>
                            <span>$100k</span>
                            <span>$200k+</span>
                        </div>
                        <div class="mt-2 text-center">
                            <span class="text-main fw-bold">$80,000+ per year</span>
                        </div>
                    </div>
                    
                    <div class="filter-group">
                        <div class="filter-title">
                            <span>Date Posted</span>
                        </div>
                        <div class="filter-option">
                            <input type="radio" id="date-anytime" name="date_posted" checked>
                            <label for="date-anytime">Anytime</label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" id="date-last24" name="date_posted">
                            <label for="date-last24">Last 24 hours</label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" id="date-lastweek" name="date_posted">
                            <label for="date-lastweek">Last week</label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" id="date-lastmonth" name="date_posted">
                            <label for="date-lastmonth">Last month</label>
                        </div>
                    </div>
                    
                    <button class="btn btn-search w-100 mt-3">
                        <i class="fa fa-filter me-2"></i>
                        Apply Filters
                    </button>
                </div>
                
                <div class="stats-card">
                    <div class="stats-number">{{ $vacancies->count() }}</div>
                    <div class="stats-label">Active Job Listings</div>
                    <div class="mt-3">
                        <small>Updated: Today, 10:30 AM</small>
                    </div>
                </div>
                
                <div class="sidebar-card">
                    <h3 class="sidebar-title">Popular Searches</h3>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="skill-tag">Software Engineer</a>
                        <a href="#" class="skill-tag">Marketing Manager</a>
                        <a href="#" class="skill-tag">Data Analyst</a>
                        <a href="#" class="skill-tag">Remote Jobs</a>
                        <a href="#" class="skill-tag">UX Designer</a>
                        <a href="#" class="skill-tag">Sales Executive</a>
                        <a href="#" class="skill-tag">Project Manager</a>
                        <a href="#" class="skill-tag">React Developer</a>
                    </div>
                </div>
            </div>
            
            <!-- Job Listings -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title mb-0">Available Jobs <small class="text-muted fs-6">(Showing {{ $vacancies->count() }} jobs)</small></h2>
                    <div class="d-flex align-items-center">
                        <span class="me-3">Sort by:</span>
                        <select class="form-select form-select-sm" style="width: auto;">
                            <option>Most Relevant</option>
                            <option>Newest First</option>
                            <option>Salary: High to Low</option>
                            <option>Salary: Low to High</option>
                        </select>
                    </div>
                </div>
                
                <!-- Job Cards -->
                @if($vacancies->count() > 0)
                    @foreach($vacancies as $job)
                    <div class="job-card @if($job->status == 2) featured @endif @if($job->vacancies <= 1) urgent @endif">
                        <div class="d-flex">
                            <div class="company-logo">
                                <i class="fa fa-building fa-2x text-main"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="job-title">{{ $job->title ?? 'No Title' }}</h3>
                                <p class="company-name">
                                    @if($job->company)
                                        {{ $job->company->name ?? 'Unknown Company' }}
                                    @else
                                        Unknown Company
                                    @endif
                                </p>
                                <div class="job-meta">
                                    <span class="job-meta-item">
                                        <i class="fa fa-map-marker"></i>
                                        {{ $job->location ?? 'Location not specified' }}
                                    </span>
                                    @if($job->salary)
                                    <span class="job-meta-item">
                                        <i class="fa fa-money"></i>
                                        {{ $job->salary }}
                                    </span>
                                    @endif
                                    <span class="job-meta-item">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $job->type ?? 'Full Time' }}
                                    </span>
                                    @if($job->experience)
                                    <span class="job-meta-item">
                                        <i class="fa fa-briefcase"></i>
                                        {{ $job->experience }}
                                    </span>
                                    @endif
                                    @if($job->vacancies)
                                    <span class="job-meta-item">
                                        <i class="fa fa-users"></i>
                                        {{ $job->vacancies }} vacancies
                                    </span>
                                    @endif
                                </div>
                                
                                @if($job->skills)
                                <div class="job-skills">
                                    @php
                                        $skills = explode(',', $job->skills);
                                    @endphp
                                    @foreach(array_slice($skills, 0, 5) as $skill)
                                        <span class="skill-tag">{{ trim($skill) }}</span>
                                    @endforeach
                                    @if(count($skills) > 5)
                                        <span class="skill-tag">+{{ count($skills) - 5 }} more</span>
                                    @endif
                                </div>
                                @endif
                                
                                <div class="job-actions">
                                    <div>
                                        @php
                                            $typeClass = 'job-type';
                                            if(str_contains(strtolower($job->type ?? ''), 'remote')) {
                                                $typeClass .= ' remote';
                                            } elseif(str_contains(strtolower($job->type ?? ''), 'part')) {
                                                $typeClass .= ' part-time';
                                            } elseif(str_contains(strtolower($job->type ?? ''), 'contract')) {
                                                $typeClass .= ' contract';
                                            }
                                        @endphp
                                        <span class="{{ $typeClass }}">{{ $job->type ?? 'Full Time' }}</span>
                                        @if($job->created_at)
                                        <span class="ms-2 text-muted">
                                            <i class="fa fa-calendar me-1"></i>
                                            Posted {{ $job->created_at->diffForHumans() }}
                                        </span>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('show.jobz',$job->id) }}">
                                        <button class="btn btn-apply">
                                            <i class="fa fa-paper-plane me-2"></i>
                                            Apply Now
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Detail Modal for each job -->
                    <div class="modal fade job-detail-modal" id="jobDetailModal{{ $job->id }}" tabindex="-1" aria-labelledby="jobDetailModalLabel{{ $job->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="jobDetailModalLabel{{ $job->id }}">{{ $job->title ?? 'Job Details' }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-4">
                                        <div class="col-md-8">
                                            <h6 class="text-main">
                                                @if($job->company)
                                                    {{ $job->company->name ?? 'Unknown Company' }}
                                                @else
                                                    Unknown Company
                                                @endif
                                            </h6>
                                            <div class="d-flex flex-wrap gap-2 mt-2">
                                                <span class="badge bg-main">{{ $job->type ?? 'Full Time' }}</span>
                                                <span class="badge bg-success">{{ $job->location ?? 'Location not specified' }}</span>
                                                @if($job->salary)
                                                <span class="badge bg-warning">{{ $job->salary }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <button class="btn btn-apply">
                                                <i class="fa fa-paper-plane me-2"></i>
                                                Apply Now
                                            </button>
                                        </div>
                                    </div>
                                    
                                    @if($job->description)
                                    <h6 class="text-main">Job Description</h6>
                                    <p>{{ $job->description }}</p>
                                    @endif
                                    
                                    @if($job->requirements)
                                    <h6 class="text-main mt-4">Requirements</h6>
                                    <p>{{ $job->requirements }}</p>
                                    @endif
                                    
                                    @if($job->skills)
                                    <h6 class="text-main mt-4">Required Skills</h6>
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        @php
                                            $skills = explode(',', $job->skills);
                                        @endphp
                                        @foreach($skills as $skill)
                                            <span class="skill-tag">{{ trim($skill) }}</span>
                                        @endforeach
                                    </div>
                                    @endif
                                    
                                    @if($job->experience)
                                    <h6 class="text-main mt-4">Experience</h6>
                                    <p>{{ $job->experience }}</p>
                                    @endif
                                    
                                    @if($job->vacancies)
                                    <div class="alert alert-info mt-4">
                                        <i class="fa fa-users me-2"></i>
                                        <strong>{{ $job->vacancies }} position(s) available</strong>
                                    </div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-apply">Apply for this Job</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    <!-- Pagination -->
                    <nav aria-label="Job pagination" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                @else
                    <div class="no-jobs">
                        <div class="no-jobs-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h3 class="text-main">No Jobs Available</h3>
                        <p class="text-muted">There are currently no job vacancies available. Please check back later.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5" style="background-color: var(--main-color-lightest);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-main mb-3">Can't find the right job?</h3>
                <p class="mb-0">Create a job alert and we'll notify you when matching positions become available.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <button class="btn btn-apply" style="background-color: white; color: var(--main-color); border: 2px solid var(--main-color);">
                    <i class="fa fa-bell me-2"></i>
                    Create Job Alert
                </button>
            </div>
        </div>
    </div>
</section>

@endsection
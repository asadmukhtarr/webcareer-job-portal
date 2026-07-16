@extends('layouts.header')
@section('title','Your Applied Jobs')
@section('content')

<div>
    <!-- Page Header -->
    <div class="page-header mb-4">
        <h2><i class="fa fa-file-text text-main me-2"></i>Your Applied Jobs</h2>
        <p class="text-muted mb-0">Track all your job applications in one place</p>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-primary">
                    <i class="fa fa-paper-plane"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ $jobs->count() }}</h3>
                    <p>Total Applied</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-warning">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ $interview }}</h3>
                    <p>Interview</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-info">
                    <i class="fa fa-calendar-check-o"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ $hired }}</h3>
                    <p>Hired</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Applied Jobs List -->
    <div class="row">
        @foreach($jobs as $job)
        <!-- Applied Job Card 1 -->
        <div class="col-lg-6 mb-4">
            <div class="applied-job-card">
                <div class="job-header">
                    <div class="company-info">
                        <div class="company-logo">
                            <i class="fa fa-apple"></i>
                        </div>
                        <div class="company-details">
                            <h5>{{ $job->vacancy->title }}</h5>
                            <p class="company-name"> {{ $job->vacancy->company->name }}</p>
                            <div class="job-tags">
                                <span class="badge bg-light text-dark">
                                    <i class="fa fa-map-marker text-main me-1"></i>{{ $job->vacancy->location }}
                                </span>
                                <span class="badge bg-light text-dark">
                                    <i class="fa fa-money text-main me-1"></i>{{ $job->vacancy->salary }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="status-badge">
                        @if($job->status == 0)
                            <span class="badge bg-success">Active</span>
                        @elseif($job->status == 1)
                            <span class="badge bg-info">Interview</span>
                        @elseif($job->status == 2)
                            <span class="badge bg-primary">Hired</span>
                        @elseif($job->status == 3)
                            <span class="badge bg-danger">Declined</span>
                        @endif
                    </div>
                </div>
                
                <div class="job-details">
                    <div class="detail-item">
                        <i class="fa fa-calendar text-main"></i>
                        <div>
                            <small>Applied Date</small>
                            <p class="mb-0">{{ $job->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="detail-item">
                        <i class="fa fa-clock-o text-main"></i>
                        <div>
                            <small>Last Updated</small>
                            <p class="mb-0">{{ $job->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="detail-item">
                        <i class="fa fa-user text-main"></i>
                        <div>
                            <small>Company Name {{$job->status}}</small>
                            <p class="mb-0">{{ $job->vacancy->company->name }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="application-status">
                    <div class="progress-container">
                        <div class="progress-labels">
                            <span>Applied</span>
                            <span>Interview</span>
                            <span>Hired</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="@if($job->status == 0) width: 25% @elseif($job->status == 1) width: 70% @elseif($job->status == 2) width: 100% @endif"></div>
                        </div>
                    </div>
                </div>
                
                <div class="card-actions">
                    <a href="{{ route('show.jobz', $job->vacancy->id) }}">
                        <button class="btn btn-outline-main">
                            <i class="fa fa-eye me-2"></i>View Job
                        </button>
                        </a>
                    <a href="{{ route('withdraw.job', $job->id) }}">
                    <button class="btn btn-outline-secondary">
                        <i class="fa fa-times me-2"></i>Withdraw
                    </button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <!-- Empty State -->
    <div class="card empty-state d-none">
        <div class="card-body text-center py-5">
            <div class="empty-icon mb-4">
                <i class="fa fa-file-text"></i>
            </div>
            <h4>No Applications Yet</h4>
            <p class="text-muted mb-4">You haven't applied to any jobs yet. Start browsing jobs to apply.</p>
            <a href="{{ route('client.jobs') }}" class="btn btn-main">
                <i class="fa fa-search me-2"></i>Browse Jobs
            </a>
        </div>
    </div>
</div>

<style>
    /* Stats Cards */
    .stats-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        align-items: center;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        border-left: 4px solid var(--main-color);
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-right: 15px;
    }

    .stats-icon.bg-primary { background: var(--main-color); }
    .stats-icon.bg-success { background: #10b981; }
    .stats-icon.bg-warning { background: #f59e0b; }
    .stats-icon.bg-info { background: #3b82f6; }

    .stats-content h3 {
        margin: 0;
        font-weight: 700;
        color: var(--text-color);
    }

    .stats-content p {
        margin: 5px 0 0 0;
        color: #64748b;
        font-size: 14px;
    }

    /* Filter Card */
    .filter-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .filter-card .input-group-text {
        background: var(--main-color-light);
        border: 2px solid #e2e8f0;
        color: var(--main-color);
    }

    /* Applied Job Card */
    .applied-job-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border-left: 4px solid var(--main-color);
        height: 100%;
        transition: transform 0.3s ease;
    }

    .applied-job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .job-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .company-info {
        display: flex;
        align-items: flex-start;
    }

    .company-logo {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .company-logo.bg-primary { background: var(--main-color); }
    .company-logo.bg-success { background: #10b981; }
    .company-logo.bg-danger { background: #ef4444; }
    .company-logo.bg-warning { background: #f59e0b; }
    .company-logo.bg-info { background: #3b82f6; }

    .company-details h5 {
        margin: 0 0 5px 0;
        font-weight: 600;
        color: var(--text-color);
    }

    .company-name {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .job-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .badge {
        padding: 5px 10px;
        font-weight: 500;
        font-size: 12px;
    }

    .badge.bg-light {
        border: 1px solid #e2e8f0;
    }

    .status-badge .badge {
        font-size: 12px;
        padding: 5px 12px;
    }

    /* Job Details */
    .job-details {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }

    .detail-item {
        display: flex;
        align-items: center;
    }

    .detail-item i {
        font-size: 18px;
        margin-right: 10px;
        flex-shrink: 0;
    }

    .detail-item small {
        display: block;
        color: #64748b;
        font-size: 12px;
    }

    .detail-item p {
        margin: 0;
        font-weight: 500;
        color: var(--text-color);
        font-size: 14px;
    }

    /* Application Status */
    .progress-container {
        margin: 15px 0;
    }

    .progress-labels {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }

    .progress-labels span {
        font-size: 11px;
        color: #64748b;
        text-transform: uppercase;
        font-weight: 600;
    }

    .progress {
        height: 8px;
        background-color: #e2e8f0;
        border-radius: 4px;
        overflow: hidden;
    }

    .progress-bar {
        border-radius: 4px;
    }

    .progress-bar.bg-warning { background-color: #f59e0b; }
    .progress-bar.bg-success { background-color: #10b981; }
    .progress-bar.bg-info { background-color: #3b82f6; }
    .progress-bar.bg-danger { background-color: #ef4444; }
    .progress-bar.bg-secondary { background-color: #64748b; }

    /* Card Actions */
    .card-actions {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .card-actions .btn {
        flex: 1;
        padding: 10px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 14px;
    }

    .btn-outline-main {
        border: 2px solid var(--main-color);
        color: var(--main-color);
        background: transparent;
    }

    .btn-outline-main:hover {
        background: var(--main-color);
        color: white;
    }

    .btn-outline-secondary {
        border: 2px solid #64748b;
        color: #64748b;
        background: transparent;
    }

    .btn-outline-secondary:hover {
        background: #64748b;
        color: white;
    }

    .btn-outline-success {
        border: 2px solid #10b981;
        color: #10b981;
        background: transparent;
    }

    .btn-outline-success:hover {
        background: #10b981;
        color: white;
    }

    .btn-outline-info {
        border: 2px solid #3b82f6;
        color: #3b82f6;
        background: transparent;
    }

    .btn-outline-info:hover {
        background: #3b82f6;
        color: white;
    }

    /* Status Badges */
    .badge.bg-warning { background: #f59e0b !important; }
    .badge.bg-success { background: #10b981 !important; }
    .badge.bg-info { background: #3b82f6 !important; }
    .badge.bg-danger { background: #ef4444 !important; }
    .badge.bg-secondary { background: #64748b !important; }

    /* Pagination */
    .pagination .page-link {
        border: none;
        color: var(--main-color);
        margin: 0 5px;
        border-radius: 8px;
    }

    .pagination .page-item.active .page-link {
        background: var(--main-color);
        color: white;
    }

    .pagination .page-link:hover {
        background: var(--main-color-light);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        border: 2px dashed var(--main-color-light);
        background: var(--main-color-lightest);
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: var(--main-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        color: white;
        font-size: 36px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .job-details {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .card-actions {
            flex-direction: column;
        }
    }

    @media (max-width: 576px) {
        .job-details {
            grid-template-columns: 1fr;
        }
        
        .job-header {
            flex-direction: column;
        }
        
        .status-badge {
            margin-top: 10px;
            align-self: flex-start;
        }
    }
</style>

<script>
    function applyFilters() {
        const statusFilter = document.getElementById('statusFilter').value;
        const dateFilter = document.getElementById('dateFilter').value;
        const searchTerm = document.querySelector('.filter-card input[type="text"]').value.toLowerCase();
        
        const cards = document.querySelectorAll('.applied-job-card');
        
        cards.forEach(card => {
            const jobTitle = card.querySelector('h5').textContent.toLowerCase();
            const status = card.querySelector('.status-badge .badge').textContent.toLowerCase();
            
            let shouldShow = true;
            
            // Search filter
            if (searchTerm && !jobTitle.includes(searchTerm)) {
                shouldShow = false;
            }
            
            // Status filter
            if (statusFilter && !status.includes(statusFilter)) {
                shouldShow = false;
            }
            
            // Date filter (simple implementation)
            if (dateFilter) {
                const appliedDate = card.querySelector('.detail-item p').textContent;
                // Add your date filtering logic here
            }
            
            if (shouldShow) {
                card.parentElement.style.display = 'block';
            } else {
                card.parentElement.style.display = 'none';
            }
        });
    }
    
    // Initialize filters on page load
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.filter-card input[type="text"]');
        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                applyFilters();
            }
        });
    });
</script>

@endsection
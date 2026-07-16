@extends('layouts.header')
@section('title','Your All Jobs')
@section('content')
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
    <!-- Page Header with Actions -->
    <div class="page-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2><i class="fa fa-briefcase text-main me-2"></i>Your All Jobs</h2>
                <p class="text-muted mb-0">Manage and track all your job postings</p>
            </div>
            <div>
                <a href="{{ route('jobs.create') }}" class="btn btn-main">
                    <i class="fa fa-plus-circle me-2"></i>Post New Job
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-primary">
                    <i class="fa fa-briefcase"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ Auth::user()->vacancy->count() }}</h3>
                    <p>Total Jobs</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-success">
                    <i class="fa fa-eye"></i>
                </div>
                <div class="stats-content">
                    <h3>245</h3>
                    <p>Total Views</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-warning">
                    <i class="fa fa-users"></i>
                </div>
                <div class="stats-content">
                    <h3>48</h3>
                    <p>Total Applicants</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stats-card">
                <div class="stats-icon bg-info">
                    <i class="fa fa-clock-o"></i>
                </div>
                <div class="stats-content">
                    <h3>{{ Auth::user()->vacancy->where('status',0)->count() }}</h3>
                    <p>Active Jobs</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="card filter-card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search jobs by title...">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-filter"></i></span>
                        <select class="form-select">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="closed">Closed</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        <select class="form-select">
                            <option value="">All Dates</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <button class="btn btn-main w-100">
                        <i class="fa fa-filter me-2"></i>Filter
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jobs List -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fa fa-list me-2"></i>All Posted Jobs</h5>
                <span class="badge bg-main">12 Jobs</span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 40%;">Job Title</th>
                            <th>Applications</th>
                            <th>Status</th>
                            <th>Posted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vacancies as $vacancy)
                        <tr>
                            <td>
                                <div class="job-item">
                                    <div class="job-avatar">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="job-info">
                                        <h6 class="mb-1">{{ $vacancy->title }}</h6>
                                        <div class="job-meta">
                                            <span class="badge bg-light text-dark me-2">
                                                <i class="fa fa-map-marker text-main me-1"></i> {{ $vacancy->type }}
                                            </span>
                                            <span class="badge bg-light text-dark">
                                                <i class="fa fa-money text-main me-1"></i> {{ $vacancy->salary }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="applicants-info">
                                    <span class="badge bg-success text-white">{{ $vacancy->applicants->count() }}</span>
                                </div>
                            </td>
                            <td>
                                @if($vacancy->status == 0)
                                <span class="badge bg-success">Active</span>
                                @else 
                                <span class="badge bg-danger">Closed</span>
                                @endif
                            </td>
                            <td>
                                <div class="date-info">
                                    <i class="fa fa-calendar text-main me-1"></i>
                                    {{ $vacancy->created_at->diffForHumans() }}
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{  route('jobs.show',$vacancy->id) }}">
                                    <button class="btn btn-sm btn-outline-main me-1" title="View">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    </a>
                                    <a href="{{ route('jobs.edit',$vacancy->id) }}">
                                        <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                    <form action="{{ route('jobs.destroy',$vacancy->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-sm btn-outline-danger" type="submit" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
          <div class="d-flex justify-content-between align-items-center">
                {{ $vacancies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Empty State (Hidden by default) -->
    <div class="card empty-state d-none">
        <div class="card-body text-center py-5">
            <div class="empty-icon mb-4">
                <i class="fa fa-briefcase"></i>
            </div>
            <h4>No Jobs Posted Yet</h4>
            <p class="text-muted mb-4">You haven't posted any jobs yet. Create your first job posting to get started.</p>
            <a href="{{ route('jobs.create') }}" class="btn btn-main">
                <i class="fa fa-plus-circle me-2"></i>Post Your First Job
            </a>
        </div>
    </div>

<style>
    /* Page Header */
    .page-header {
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }

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
    }

    .filter-card .input-group-text {
        background: var(--main-color-light);
        border: 2px solid #e2e8f0;
        color: var(--main-color);
    }

    /* Jobs Table */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .card-header {
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
        border-bottom: 2px solid var(--main-color-light);
        border-radius: 15px 15px 0 0 !important;
        padding: 20px 25px;
    }

    .table {
        margin-bottom: 0;
    }

    .table th {
        border-top: none;
        border-bottom: 2px solid var(--main-color-light);
        padding: 15px 20px;
        font-weight: 600;
        color: var(--main-color);
        background: var(--main-color-lightest);
    }

    .table td {
        padding: 20px;
        vertical-align: middle;
        border-bottom: 1px solid #e2e8f0;
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .table-hover tbody tr:hover {
        background-color: var(--main-color-lightest);
    }

    /* Job Item */
    .job-item {
        display: flex;
        align-items: center;
    }

    .job-avatar {
        width: 50px;
        height: 50px;
        background: var(--main-color-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: var(--main-color);
        font-size: 20px;
    }

    .job-info h6 {
        margin: 0;
        font-weight: 600;
        color: var(--text-color);
    }

    .job-meta {
        margin-top: 5px;
    }

    .badge {
        padding: 5px 10px;
        font-weight: 500;
        font-size: 12px;
    }

    .badge.bg-light {
        border: 1px solid #e2e8f0;
    }

    /* Applicants Info */
    .applicants-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* Date Info */
    .date-info {
        display: flex;
        align-items: center;
        color: #64748b;
        font-size: 14px;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 5px;
    }

    .action-buttons .btn {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        padding: 0;
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

    .btn-outline-primary {
        border: 2px solid #3b82f6;
        color: #3b82f6;
        background: transparent;
    }

    .btn-outline-primary:hover {
        background: #3b82f6;
        color: white;
    }

    .btn-outline-danger {
        border: 2px solid #ef4444;
        color: #ef4444;
        background: transparent;
    }

    .btn-outline-danger:hover {
        background: #ef4444;
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

    /* Card Footer */
    .card-footer {
        background: var(--main-color-lightest);
        border-top: 1px solid #e2e8f0;
        border-radius: 0 0 15px 15px !important;
        padding: 15px 25px;
    }

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

    /* Status Badges */
    .badge.bg-success { background: #10b981 !important; }
    .badge.bg-danger { background: #ef4444 !important; }
    .badge.bg-warning { background: #f59e0b !important; }
    .badge.bg-info { background: #3b82f6 !important; }
    .badge.bg-secondary { background: #64748b !important; }
</style>

<script>
    // Filter functionality (example)
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.querySelector('.filter-card input[type="text"]');
        const filterBtn = document.querySelector('.filter-card .btn-main');
        
        if (searchInput && filterBtn) {
            filterBtn.addEventListener('click', function() {
                const searchTerm = searchInput.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');
                
                rows.forEach(row => {
                    const jobTitle = row.querySelector('.job-info h6').textContent.toLowerCase();
                    if (jobTitle.includes(searchTerm) || searchTerm === '') {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    });
</script>

@endsection
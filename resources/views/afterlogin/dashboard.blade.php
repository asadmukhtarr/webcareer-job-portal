@extends('layouts.header')
@section('title','Dashboard')
@section('content')
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="d-flex justify-content-between align-items-center text-danger">
            <div>
                <h2 class="mb-1"> <i class="fa fa-smile-o"></i>  Welcome back, {{ Auth::user()->name }}!</h2>
                <p class="text-muted">Here's what's happening with your job search today.</p>
            </div>
            <div class="date-info">
                <span class="badge bg-main text-white p-2 mt-4">
                    <i class="fa fa-calendar me-1"></i>
                    {{ date('F d, Y') }}
                </span>
            </div>
        </div>
    </div>
    <!-- Main Content Area -->
    <div class="row">
        <!-- Left Column - Recent Activity & Job Recommendations -->
        <div class="col-lg-8 mb-4">
            <!-- Recent Applications -->
            <div class="dashboard-section mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Recent Applications</h4>
                    <a href="{{ route('user.yaj') }}" class="btn btn-sm btn-outline-main">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th>Applied Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                            <tr>
                                <td>
                                    <a href="#" class="text-decoration-none text-main">
                                        <strong>{{ $application->vacancy->title }}</strong>
                                    </a>
                                </td>
                                <td>{{ $application->vacancy->company->name ?? 'NA' }}</td>
                                <td>{{ $application->created_at->format('F d, Y') }}</td>
                                <td>
                                    @if($application->vacancy->status == 0)
                                        <span class="badge bg-success">Active</span>
                                    @elseif($application->vacancy->status == 1)
                                        <span class="badge bg-info">Interview</span>
                                    @elseif($application->vacancy->status == 2)
                                        <span class="badge bg-primary">Hired</span>
                                    @elseif($application->vacancy->status == 3)
                                        <span class="badge bg-danger">Declined</span>
                                    @else
                                        <span class="badge bg-secondary">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Right Column - Profile & Quick Actions -->
        <div class="col-lg-4 mb-4">
            <!-- Profile Summary -->
            <div class="dashboard-section mb-4">
                <h4>Profile Summary</h4>
                <div class="profile-summary">
                    <div class="text-center mb-3">
                        <div class="profile-avatar mb-2">
                            <i class="fa fa-user-circle"></i>
                        </div>
                        <h5>{{ Auth::user()->name }}</h5>
                        <p class="text-muted small mb-2">{{ Auth::user()->email }}</p>
                        <div class="profile-completion mb-3">
                            <div class="d-flex justify-content-between">
                                <span class="small">Profile Complete</span>
                                <span class="small">75%</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-main" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-stats">
                        <div class="row text-center">
                            <div class="col-6 border-end">
                                <div class="p-2">
                                    <div class="h5 mb-0">85%</div>
                                    <small class="text-muted">Match Rate</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-2">
                                    <div class="h5 mb-0">3</div>
                                    <small class="text-muted">Skills Verified</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('user.profile') }}" class="btn btn-sm btn-main w-100">
                            <i class="fa fa-edit me-1"></i> Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="dashboard-section mb-4">
                <h4>Quick Actions</h4>
                <div class="quick-actions">
                    <a href="{{ route('user.profile') }}" class="quick-action-item">
                        <div class="action-icon">
                            <i class="fa fa-upload"></i>
                        </div>
                        <div class="action-text">
                            <h6>Upload Resume</h6>
                            <p class="small text-muted mb-0">Update your latest resume</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('user.settings') }}" class="quick-action-item">
                        <div class="action-icon">
                            <i class="fa fa-bell"></i>
                        </div>
                        <div class="action-text">
                            <h6>Notification Settings</h6>
                            <p class="small text-muted mb-0">Manage job alerts</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('client.jobs') }}" class="quick-action-item">
                        <div class="action-icon">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="action-text">
                            <h6>Search Jobs</h6>
                            <p class="small text-muted mb-0">Find new opportunities</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('jobs.create') }}" class="quick-action-item">
                        <div class="action-icon">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="action-text">
                            <h6>Post a Job</h6>
                            <p class="small text-muted mb-0">Looking to hire?</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

<style>
    /* Dashboard Specific Styles */
    .dashboard-header {
        padding: 20px 0;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .dashboard-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border-left: 4px solid var(--main-color);
        height: 100%;
        transition: transform 0.3s ease;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .card-icon {
        width: 50px;
        height: 50px;
        background-color: var(--main-color-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: var(--main-color);
    }
    
    .job-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .job-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .job-card-header {
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .company-logo {
        width: 50px;
        height: 50px;
        background-color: var(--main-color-light);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: var(--main-color);
        font-size: 20px;
    }
    
    .job-card-body {
        padding: 15px;
    }
    
    .job-card-footer {
        padding: 15px;
        background-color: #f8fafc;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .profile-summary {
        padding: 15px 0;
    }
    
    .profile-avatar {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        background-color: var(--main-color-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: var(--main-color);
    }
    
    .quick-actions {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .quick-action-item {
        display: flex;
        align-items: center;
        padding: 15px;
        background-color: #f8fafc;
        border-radius: 8px;
        text-decoration: none;
        color: var(--text-color);
        transition: all 0.3s ease;
    }
    
    .quick-action-item:hover {
        background-color: var(--main-color-light);
        color: var(--main-color);
        transform: translateX(5px);
    }
    
    .action-icon {
        width: 40px;
        height: 40px;
        background-color: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: var(--main-color);
    }
    
    .upcoming-interviews {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .interview-item {
        display: flex;
        align-items: center;
        padding: 15px;
        background-color: #f8fafc;
        border-radius: 8px;
    }
    
    .date-badge {
        width: 50px;
        height: 50px;
        background-color: var(--main-color);
        color: white;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }
    
    .date-badge .day {
        font-size: 18px;
        font-weight: bold;
        line-height: 1;
    }
    
    .date-badge .month {
        font-size: 12px;
        text-transform: uppercase;
    }
    
    .interview-details {
        flex: 1;
    }
    
    .interview-time {
        display: flex;
        align-items: center;
        margin-top: 5px;
    }
    
    .btn-main {
        background-color: var(--main-color);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 6px;
        transition: all 0.3s ease;
    }
    
    .btn-main:hover {
        background-color: var(--main-color-dark);
        color: white;
    }
    
    .btn-outline-main {
        background-color: transparent;
        color: var(--main-color);
        border: 1px solid var(--main-color);
        padding: 8px 20px;
        border-radius: 6px;
        transition: all 0.3s ease;
    }
    
    .btn-outline-main:hover {
        background-color: var(--main-color);
        color: white;
    }
    
    .text-main {
        color: var(--main-color) !important;
    }
    
    .bg-main {
        background-color: var(--main-color) !important;
    }
</style>

@endsection
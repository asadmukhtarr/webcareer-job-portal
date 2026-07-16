@extends('layouts.header')
@section('title', $vacancy->title)
@section('content')
<div class="container-fluid py-4">
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
    <!-- Tab Navigation -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs nav-justified" id="jobTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="details-tab" data-bs-toggle="tab" 
                                    data-bs-target="#details" type="button" role="tab">
                                <i class="fa fa-briefcase me-2"></i>Job Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="applicants-tab" data-bs-toggle="tab" 
                                    data-bs-target="#applicants" type="button" role="tab">
                                <i class="fa fa-users me-2"></i>Applicants
                                <span class="badge bg-success ms-2">{{ $vacancy->applicants->count() }}</span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="jobTabContent">
        <!-- Job Details Tab -->
        <div class="tab-pane fade show active" id="details" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card job-details-card mb-4">
                        <div class="card-header bg-main text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"><i class="fa fa-briefcase me-2"></i>Job Details</h4>
                                @if($vacancy->status == 0)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">Closed</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Job Title -->
                            <div class="mb-4">
                                <h2 class="h4 mb-2 text-main">{{ $vacancy->title }}</h2>
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-building text-muted me-2"></i>
                                    <span>{{ $vacancy->company->name ?? 'Company Name' }}</span>
                                </div>
                            </div>

                            <!-- Job Meta Information -->
                            <div class="job-meta mb-4">
                                <div class="row g-3">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="meta-item">
                                            <i class="fa fa-clock-o text-main me-2"></i>
                                            <strong>Job Type:</strong>
                                            <div class="mt-1">{{ $vacancy->type }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="meta-item">
                                            <i class="fa fa-map-marker text-main me-2"></i>
                                            <strong>Location:</strong>
                                            <div class="mt-1">{{ $vacancy->location }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="meta-item">
                                            <i class="fa fa-money text-main me-2"></i>
                                            <strong>Salary:</strong>
                                            <div class="mt-1">{{ $vacancy->salary ?? 'Not Specified' }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="meta-item">
                                            <i class="fa fa-users text-main me-2"></i>
                                            <strong>Vacancies:</strong>
                                            <div class="mt-1">{{ $vacancy->vacancies }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="meta-item">
                                            <i class="fa fa-line-chart text-main me-2"></i>
                                            <strong>Experience:</strong>
                                            <div class="mt-1">{{ $vacancy->experience }}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="meta-item">
                                            <i class="fa fa-calendar text-main me-2"></i>
                                            <strong>Posted:</strong>
                                            <div class="mt-1">{{ $vacancy->created_at->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Description -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3 text-main">
                                    <i class="fa fa-file-text me-2"></i>Job Description
                                </h5>
                                <div class="job-content">
                                    {!! nl2br(e($vacancy->description)) !!}
                                </div>
                            </div>

                            <!-- Requirements -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3 text-main">
                                    <i class="fa fa-list-check me-2"></i>Requirements
                                </h5>
                                <div class="job-content">
                                    {!! nl2br(e($vacancy->requirements)) !!}
                                </div>
                            </div>

                            <!-- Skills Required -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3 text-main">
                                    <i class="fa fa-tags me-2"></i>Required Skills
                                </h5>
                                <div class="skills-container">
                                    @php
                                        $skills = explode(',', $vacancy->skills);
                                    @endphp
                                    @foreach($skills as $skill)
                                        <span class="skill-badge">{{ trim($skill) }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2 mt-4 pt-3 border-top">
                                <a href="{{ route('jobs.edit', $vacancy->id) }}" class="btn btn-main flex-fill">
                                    <i class="fa fa-edit me-2"></i>Edit Job
                                </a>
                                <form action="{{ route('jobs.destroy', $vacancy->id) }}" method="POST" class="flex-fill">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100" 
                                            onclick="return confirm('Are you sure you want to delete this job?')">
                                        <i class="fa fa-trash me-2"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Applicants Tab -->
        <div class="tab-pane fade" id="applicants" role="tabpanel">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card h-100 mb-4">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fa fa-users me-2"></i> Applicants for "{{ $vacancy->title }}"
                                </h5>
                                <div class="dropdown">
                                    <button class="btn btn-outline-main btn-sm dropdown-toggle" type="button" 
                                            data-bs-toggle="dropdown">
                                        <i class="fa fa-filter me-1"></i>Filter
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">All Applicants</a></li>
                                        <li><a class="dropdown-item" href="#">New (Today)</a></li>
                                        <li><a class="dropdown-item" href="#">Shortlisted</a></li>
                                        <li><a class="dropdown-item" href="#">Rejected</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            @if($vacancy->applicants->count() == 0)
                            <!-- Empty State for Applicants -->
                            <div class="empty-state-applicants text-center py-5">
                                <div class="empty-icon mb-4">
                                    <i class="fa fa-users fa-3x text-main"></i>
                                </div>
                                <h4 class="text-main mb-3">No Applicants Yet</h4>
                                <p class="text-muted mb-4">
                                    This job hasn't received any applications yet. 
                                    Share the job link to attract applicants.
                                </p>
                                
                                <!-- Job Sharing Options -->
                                <div class="row mt-4">
                                    <div class="col-md-4 mb-3">
                                        <div class="card border-dashed h-100">
                                            <div class="card-body text-center">
                                                <i class="fa fa-link fa-2x text-main mb-3"></i>
                                                <h6>Copy Job Link</h6>
                                                <div class="input-group mt-2">
                                                    <input type="text" class="form-control" 
                                                           value="{{ url()->current() }}" readonly>
                                                    <button class="btn btn-outline-main" onclick="copyJobLink()">
                                                        <i class="fa fa-copy"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card border-dashed h-100">
                                            <div class="card-body text-center">
                                                <i class="fa fa-share-alt fa-2x text-main mb-3"></i>
                                                <h6>Share on Social Media</h6>
                                                <div class="btn-group mt-2">
                                                    <button class="btn btn-outline-primary btn-sm">
                                                        <i class="fa fa-facebook"></i>
                                                    </button>
                                                    <button class="btn btn-outline-info btn-sm">
                                                        <i class="fa fa-linkedin"></i>
                                                    </button>
                                                    <button class="btn btn-outline-dark btn-sm">
                                                        <i class="fa fa-twitter"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card border-dashed h-100">
                                            <div class="card-body text-center">
                                                <i class="fa fa-chart-bar fa-2x text-main mb-3"></i>
                                                <h6>Boost Visibility</h6>
                                                <p class="small text-muted">Reach more candidates</p>
                                                <button class="btn btn-main btn-sm mt-2">
                                                    <i class="fa fa-rocket me-1"></i>Promote Job
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quick Stats Placeholder -->
                                <div class="row mt-5">
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="stats-card-sm">
                                            <div class="stats-icon-sm bg-primary">
                                                <i class="fa fa-eye"></i>
                                            </div>
                                            <div class="stats-content-sm">
                                                <h4>245</h4>
                                                <p>Job Views</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="stats-card-sm">
                                            <div class="stats-icon-sm bg-success">
                                                <i class="fa fa-mouse-pointer"></i>
                                            </div>
                                            <div class="stats-content-sm">
                                                <h4>48</h4>
                                                <p>Clicks</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="stats-card-sm">
                                            <div class="stats-icon-sm bg-warning">
                                                <i class="fa fa-download"></i>
                                            </div>
                                            <div class="stats-content-sm">
                                                <h4>12</h4>
                                                <p>Downloads</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 mb-3">
                                        <div class="stats-card-sm">
                                            <div class="stats-icon-sm bg-info">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <div class="stats-content-sm">
                                                <h4>7 days</h4>
                                                <p>Time Active</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else 
                            <!-- Hidden Table (For when there are applicants) -->
                            <div class="applicants-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Applicant</th>
                                                <th>Applied Date</th>
                                                <th>Status</th>
                                                <th>Resume</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($vacancy->applicants as $applicant)
                                           <tr>
                                                <td>{{ $applicant->user->name }}</td>
                                                <td>{{ $applicant->created_at->diffForHumans(); }}</td>
                                                <td>
                                                    @if($applicant->status == 0)
                                                    <span class="badge bg-success">Active</span>
                                                    @elseif($applicant->status == 1)
                                                        <span class="badge bg-info">Interview</span>
                                                    @elseif($applicant->status == 2)
                                                        <span class="badge bg-warning">Hired</span>
                                                    @else 
                                                        <span class="badge bg-danger">Decline</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage') }}/{{ $applicant->user->profile->resume }}" target="_blank">
                                                        <button class="btn btn-sm btn-danger"><i class="fa fa-download"></i> Download</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('applicant.status') }}" id="changestatusform{{ $applicant->id }}" method="post">
                                                        @csrf
                                                        <select id="changestatus" change="status" applicant="{{ $applicant->id }}" name="status" class="form-control form-control-sm">
                                                            <option value="0" @if($applicant->status == 0) selected @endif>Active</option>
                                                            <option value="1" @if($applicant->status == 1) selected @endif>Interview</option>
                                                            <option value="2" @if($applicant->status == 2) selected @endif>Hird</option>
                                                            <option value="3" @if($applicant->status == 3) selected @endif>Decline</option>
                                                        </select>
                                                        <input type="hidden" name="applicant" id="applicant" value="{{ $applicant->id }}" />
                                                    </form>
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Tab Navigation Styles */
    .nav-tabs {
        border-bottom: 2px solid var(--main-color-light);
    }

    .nav-tabs .nav-link {
        color: #666;
        font-weight: 500;
        padding: 15px 20px;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s;
    }

    .nav-tabs .nav-link:hover {
        color: var(--main-color);
        background-color: var(--main-color-lightest);
    }

    .nav-tabs .nav-link.active {
        color: var(--main-color);
        border-bottom: 3px solid var(--main-color);
        background-color: white;
        font-weight: 600;
    }

    .nav-tabs .badge {
        font-size: 11px;
        padding: 3px 8px;
    }

    /* Job Details Card */
    .job-details-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }

    .job-details-card .card-header {
        border-radius: 12px 12px 0 0;
        padding: 20px;
    }

    .job-content {
        line-height: 1.8;
        color: #444;
        padding: 10px 0;
    }

    .job-content p {
        margin-bottom: 1rem;
    }

    .meta-item {
        background: #f8f9fa;
        padding: 12px;
        border-radius: 8px;
        border-left: 3px solid var(--main-color);
        height: 100%;
    }

    .meta-item strong {
        color: #333;
        font-size: 13px;
        display: block;
    }

    .meta-item div {
        color: #555;
        font-weight: 500;
    }

    .skills-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }

    .skill-badge {
        background: var(--main-color-light);
        color: var(--main-color);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
        border: 1px solid var(--main-color-lightest);
        cursor: pointer;
        transition: all 0.3s;
    }

    .skill-badge:hover {
        background: var(--main-color);
        color: white;
        transform: translateY(-2px);
    }

    /* Empty State Styles */
    .empty-state-applicants {
        animation: fadeIn 0.5s ease;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: var(--main-color-lightest);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: var(--main-color);
    }

    .border-dashed {
        border: 2px dashed #dee2e6 !important;
        border-radius: 10px;
    }

    /* Small Stats Cards */
    .stats-card-sm {
        display: flex;
        align-items: center;
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        transition: transform 0.3s;
    }

    .stats-card-sm:hover {
        transform: translateY(-5px);
    }

    .stats-icon-sm {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: white;
        margin-right: 15px;
    }

    .stats-icon-sm.bg-primary { background: var(--main-color); }
    .stats-icon-sm.bg-success { background: #10b981; }
    .stats-icon-sm.bg-warning { background: #f59e0b; }
    .stats-icon-sm.bg-info { background: #3b82f6; }

    .stats-content-sm h4 {
        margin: 0;
        font-weight: 700;
        color: var(--text-color);
        font-size: 20px;
    }

    .stats-content-sm p {
        margin: 5px 0 0 0;
        color: #64748b;
        font-size: 13px;
    }

    /* Buttons */
    .btn-outline-main {
        border: 2px solid var(--main-color);
        color: var(--main-color);
        background: transparent;
    }

    .btn-outline-main:hover {
        background: var(--main-color);
        color: white;
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .nav-tabs .nav-link {
            padding: 12px 15px;
            font-size: 14px;
        }
        
        .meta-item {
            margin-bottom: 15px;
        }
        
        .stats-card-sm {
            margin-bottom: 15px;
        }
    }

    @media (max-width: 576px) {
        .nav-tabs .nav-link {
            padding: 10px;
            font-size: 13px;
        }
        
        .nav-tabs .badge {
            display: none;
        }
        
        .skills-container {
            justify-content: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Tab switching animation
        const tabButtons = document.querySelectorAll('#jobTab button[data-bs-toggle="tab"]');
        tabButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const targetId = this.getAttribute('data-bs-target');
                const targetContent = document.querySelector(targetId);
                
                // Add fade animation
                targetContent.style.opacity = '0';
                targetContent.style.transform = 'translateY(10px)';
                targetContent.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                
                setTimeout(() => {
                    targetContent.style.opacity = '1';
                    targetContent.style.transform = 'translateY(0)';
                }, 300);
            });
        });

        // Copy Job Link function
        window.copyJobLink = function() {
            const linkInput = document.querySelector('input[value*="{{ url()->current() }}"]');
            linkInput.select();
            linkInput.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand('copy');
            
            // Show feedback
            const originalText = linkInput.nextElementSibling.innerHTML;
            linkInput.nextElementSibling.innerHTML = '<i class="fa fa-check"></i> Copied!';
            linkInput.nextElementSibling.classList.remove('btn-outline-main');
            linkInput.nextElementSibling.classList.add('btn-success');
            
            setTimeout(() => {
                linkInput.nextElementSibling.innerHTML = originalText;
                linkInput.nextElementSibling.classList.remove('btn-success');
                linkInput.nextElementSibling.classList.add('btn-outline-main');
            }, 2000);
        };

        // Add click effect to skill badges
        const skillBadges = document.querySelectorAll('.skill-badge');
        skillBadges.forEach(badge => {
            badge.addEventListener('click', function() {
                const skill = this.textContent;
                // Highlight skill
                this.classList.toggle('skill-selected');
                
                if (this.classList.contains('skill-selected')) {
                    this.style.background = 'var(--main-color)';
                    this.style.color = 'white';
                } else {
                    this.style.background = 'var(--main-color-light)';
                    this.style.color = 'var(--main-color)';
                }
            });
        });

        // Simulate loading animation for empty state
        const emptyState = document.querySelector('.empty-state-applicants');
        if (emptyState) {
            emptyState.style.animation = 'fadeIn 0.8s ease';
        }
    });
    $(document).ready(function(){
        $("[change='status']").on("change",function(){
            var applicant_id = $(this).attr('applicant');
            //alert(applicant_id);
           $("#changestatusform"+applicant_id).submit();
        });
    });
</script>
@endsection
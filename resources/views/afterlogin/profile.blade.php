@extends('layouts.header')
@section('title',Auth::user()->name)
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
<div>
    <!-- Page Header -->
    <div class="page-header mb-4">
        <h2><i class="fa fa-user-circle text-main me-2"></i>My Profile</h2>
        <p class="text-muted mb-0">Manage your personal information and account settings</p>
    </div>

    <div class="row">
        <!-- Left Column - Profile Info -->
        <div class="col-lg-4 mb-4">
            <!-- Profile Card -->
            <div class="card profile-card">
                <div class="card-body text-center">
                    <!-- Profile Photo -->
                    <div class="profile-photo mb-3">
                        <div class="photo-container">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=135E85&color=fff&size=200" 
                                 alt="{{ Auth::user()->name }}" 
                                 class="profile-img" 
                                 id="profileImage">
                            <label for="photoUpload" class="photo-upload-btn" title="Change Photo">
                                <i class="fa fa-camera"></i>
                            </label>
                            <input type="file" id="photoUpload" name="profie_picture" accept="image/*" class="d-none">
                        </div>
                    </div>

                    <!-- User Info -->
                    <h4 class="mb-1">{{ Auth::user()->name }}</h4>
                    <p class="text-muted mb-3">{{ Auth::user()->email }}</p>
                    
                    <!-- Profile Completion -->
                    <div class="profile-completion mb-4">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small">Profile Completion</span>
                            <span class="small">65%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-main" style="width: 65%"></div>
                        </div>
                    </div>

                    <!-- Account Stats -->
                    <div class="account-stats">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="stat-item">
                                    <div class="stat-number">12</div>
                                    <div class="stat-label">Jobs Applied</div>
                                </div>
                            </div>
                            <div class="col-4 border-start border-end">
                                <div class="stat-item">
                                    <div class="stat-number">3</div>
                                    <div class="stat-label">Interviews</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <div class="stat-number">85%</div>
                                    <div class="stat-label">Match Rate</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links Card -->
            <div class="card quick-links-card mt-4">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fa fa-link me-2"></i>Quick Links</h6>
                </div>
                <div class="card-body">
                    <div class="quick-links">
                        <a href="#" class="quick-link-item">
                            <div class="link-icon">
                                <i class="fa fa-file-text"></i>
                            </div>
                            <div class="link-text">
                                <span>Resume & CV</span>
                                <small>Upload your resume</small>
                            </div>
                        </a>
                        <a href="#" class="quick-link-item">
                            <div class="link-icon">
                                <i class="fa fa-bell"></i>
                            </div>
                            <div class="link-text">
                                <span>Notifications</span>
                                <small>Manage alerts</small>
                            </div>
                        </a>
                        <a href="#" class="quick-link-item">
                            <div class="link-icon">
                                <i class="fa fa-lock"></i>
                            </div>
                            <div class="link-text">
                                <span>Security</span>
                                <small>Change password</small>
                            </div>
                        </a>
                        <a href="#" class="quick-link-item">
                            <div class="link-icon">
                                <i class="fa fa-download"></i>
                            </div>
                            <div class="link-text">
                                <span>Export Data</span>
                                <small>Download your data</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Edit Forms -->
        <div class="col-lg-8">
    <!-- Personal Information Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0"><i class="fa fa-user me-2"></i>Personal Information</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('personal.one') }}" id="personalInfoForm">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', Auth::user()->name) }}" required>
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', Auth::user()->email) }}" required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            <input type="tel" name="phone" value="{{ old('phone', Auth::user()->profile->phone ?? '') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="+1 (555) 123-4567">
                        </div>
                        @error('phone')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Location</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', Auth::user()->profile->location ?? '') }}" placeholder="Your city, country">
                        </div>
                        @error('location')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date of Birth</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input type="date" name="dob" value="{{ old('dob', Auth::user()->profile->dob ?? '') }}" class="form-control @error('dob') is-invalid @enderror">
                        </div>
                        @error('dob')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gender</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
                            <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male" @if(old('gender', Auth::user()->profile->gender ?? '') == "male") selected @endif>Male</option>
                                <option value="female" @if(old('gender', Auth::user()->profile->gender ?? '') == "female") selected @endif>Female</option>
                                <option value="other" @if(old('gender', Auth::user()->profile->gender ?? '') == "other") selected @endif>Other</option>
                                <option value="prefer-not-to-say" @if(old('gender', Auth::user()->profile->gender ?? '') == "prefer-not-to-say") selected @endif>Prefer not to say</option>
                            </select>
                        </div>
                        @error('gender')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-main">
                        <i class="fa fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Professional Information Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0"><i class="fa fa-briefcase me-2"></i>Professional Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('personal.two') }}" method="post" id="professionalInfoForm">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Headline</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-tag"></i></span>
                        <input type="text" name="headline" class="form-control @error('headline') is-invalid @enderror" value="{{ old('headline', Auth::user()->profile->headline ?? '') }}" placeholder="e.g., Senior Frontend Developer">
                    </div>
                    @error('headline')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Bio / About Me</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Tell us about yourself...">{{ old('description', Auth::user()->profile->about ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Current Position</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-suitcase"></i></span>
                            <input type="text" name="current_position" class="form-control @error('current_position') is-invalid @enderror" value="{{ old('current_position', Auth::user()->profile->current_position ?? '') }}" placeholder="e.g., Software Engineer">
                        </div>
                        @error('current_position')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Experience Level</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-chart-line"></i></span>
                            <select class="form-select @error('experience_level') is-invalid @enderror" name="experience_level">
                                <option value="">Select Level</option>
                                <option value="entry" @if(old('experience_level', Auth::user()->profile->experience_level ?? '') == "entry") selected @endif>Entry Level (0-2 years)</option>
                                <option value="mid" @if(old('experience_level', Auth::user()->profile->experience_level ?? '') == "mid") selected @endif>Mid Level (3-5 years)</option>
                                <option value="senior" @if(old('experience_level', Auth::user()->profile->experience_level ?? '') == "senior") selected @endif>Senior Level (6-10 years)</option>
                                <option value="executive" @if(old('experience_level', Auth::user()->profile->experience_level ?? '') == "executive") selected @endif>Executive (10+ years)</option>
                            </select>
                        </div>
                        @error('experience_level')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Skills</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-code"></i></span>
                        <input type="text" name="skills" class="form-control @error('skills') is-invalid @enderror" value="{{ old('skills', Auth::user()->profile->skills ?? '') }}" placeholder="e.g., JavaScript, React, Node.js">
                    </div>
                    <small class="text-muted">Separate skills with commas</small>
                    @error('skills')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-main">
                        <i class="fa fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Resume & Documents Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0"><i class="fa fa-file-text me-2"></i>Resume & Documents</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('personal.resume') }}" method="post" enctype="multipart/form-data" id="resumeForm">
                @csrf
                <div class="upload-area mb-4">
                    <input type="file" id="resumeUpload" name="resume" accept=".pdf,.doc,.docx" class="d-none">
                    <label for="resumeUpload" class="upload-label">
                        <div class="upload-content">
                            <i class="fa fa-cloud-upload fa-3x text-main mb-3"></i>
                            <h5>Upload Your Resume</h5>
                            <p class="text-muted">Supported formats: PDF, DOC, DOCX</p>
                            <button type="button" class="btn btn-outline-main">
                                <i class="fa fa-upload me-2"></i>Choose File
                            </button>
                        </div>
                    </label>
                    @error('resume')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="text-end">
                    <button type="submit" class="btn btn-main">
                        <i class="fa fa-upload me-2"></i>Upload Resume
                    </button>
                </div>
            </form>
            
            @if(!empty(Auth::user()->profile->resume))
            <!-- Uploaded Documents -->
            <div class="uploaded-documents mt-4">
                <h6 class="mb-3">Uploaded Documents</h6>
                <div class="document-item">
                    <div class="document-icon">
                        <i class="fa fa-file-pdf-o text-danger"></i>
                    </div>
                    <div class="document-info">
                        <h6 class="mb-1">{{ basename(Auth::user()->name) }}</h6>
                        <small class="text-muted">Uploaded: {{ Auth::user()->profile->updated_at->format('M d, Y') }}</small>
                    </div>
                    <div class="document-actions">
                        <a href="{{ Storage::url(Auth::user()->profile->resume) }}" target="_blank" class="btn btn-sm btn-outline-main me-1">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Social Links Card -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="fa fa-share-alt me-2"></i>Social Links</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('personal.social') }}" method="post" id="socialLinksForm">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">LinkedIn</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-linkedin text-linkedin"></i>
                            </span>
                            <input type="url" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ old('linkedin', Auth::user()->profile->linkedin ?? '') }}" placeholder="https://linkedin.com/in/username">
                        </div>
                        @error('linkedin')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">GitHub</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-github"></i>
                            </span>
                            <input type="url" name="github" class="form-control @error('github') is-invalid @enderror" value="{{ old('github', Auth::user()->profile->github ?? '') }}" placeholder="https://github.com/username">
                        </div>
                        @error('github')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Twitter</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-twitter text-twitter"></i>
                            </span>
                            <input type="url" name="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter', Auth::user()->profile->twitter ?? '') }}" placeholder="https://twitter.com/username">
                        </div>
                        @error('twitter')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Portfolio Website</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-globe"></i>
                            </span>
                            <input type="url" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', Auth::user()->profile->website ?? '') }}" placeholder="https://yourwebsite.com">
                        </div>
                        @error('website')
                            <div class="invalid-feedback d-block">
                                <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-main">
                        <i class="fa fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>

<style>
    /* Profile Card */
    .profile-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border-left: 4px solid var(--main-color);
    }

    .profile-photo {
        position: relative;
        display: inline-block;
    }

    .photo-container {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto;
    }

    .profile-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--main-color-light);
    }

    .photo-upload-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 40px;
        height: 40px;
        background: var(--main-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .photo-upload-btn:hover {
        background: var(--main-color-dark);
        transform: scale(1.1);
    }

    .profile-completion .progress {
        border-radius: 4px;
    }

    .progress-bar.bg-main {
        background-color: var(--main-color) !important;
    }

    .account-stats {
        margin-top: 20px;
    }

    .stat-item {
        padding: 10px 0;
    }

    .stat-number {
        font-size: 24px;
        font-weight: 700;
        color: var(--main-color);
        line-height: 1;
    }

    .stat-label {
        font-size: 12px;
        color: #64748b;
        margin-top: 5px;
    }

    /* Quick Links Card */
    .quick-links-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .quick-links-card .card-header {
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
        border-bottom: 2px solid var(--main-color-light);
        border-radius: 15px 15px 0 0 !important;
    }

    .quick-link-item {
        display: flex;
        align-items: center;
        padding: 15px 0;
        text-decoration: none;
        color: var(--text-color);
        border-bottom: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .quick-link-item:last-child {
        border-bottom: none;
    }

    .quick-link-item:hover {
        color: var(--main-color);
        padding-left: 10px;
    }

    .link-icon {
        width: 40px;
        height: 40px;
        background: var(--main-color-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: var(--main-color);
    }

    .link-text span {
        font-weight: 600;
        display: block;
    }

    .link-text small {
        color: #64748b;
        font-size: 12px;
    }

    /* Form Cards */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border-left: 4px solid var(--main-color);
    }

    .card-header {
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
        border-bottom: 2px solid var(--main-color-light);
        border-radius: 15px 15px 0 0 !important;
        padding: 20px;
    }

    .card-body {
        padding: 25px;
    }

    /* Form Styles */
    .form-label {
        font-weight: 600;
        color: var(--text-color);
        margin-bottom: 8px;
        display: block;
    }

    .input-group {
        margin-bottom: 1rem;
    }

    .input-group-text {
        background: var(--main-color-light);
        border: 2px solid #e2e8f0;
        border-right: none;
        color: var(--main-color);
        font-size: 16px;
        padding: 10px 15px;
    }

    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-left: none;
        border-radius: 0 8px 8px 0;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--main-color);
        box-shadow: 0 0 0 3px var(--main-color-light);
    }

    textarea.form-control {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 15px;
        resize: vertical;
    }

    textarea.form-control:focus {
        border-color: var(--main-color);
    }

    /* Resume Upload */
    .upload-area {
        border: 2px dashed var(--main-color-light);
        border-radius: 15px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .upload-area:hover {
        border-color: var(--main-color);
        background: var(--main-color-lightest);
    }

    .upload-label {
        cursor: pointer;
        margin: 0;
        display: block;
    }

    /* Uploaded Documents */
    .document-item {
        display: flex;
        align-items: center;
        padding: 15px;
        background: #f8fafc;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .document-icon {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-right: 15px;
    }

    .document-info {
        flex: 1;
    }

    .document-info h6 {
        margin: 0;
        font-weight: 600;
        color: var(--text-color);
    }

    .document-actions {
        display: flex;
        gap: 5px;
    }

    .document-actions .btn {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        padding: 0;
    }

    /* Social Icons */
    .text-linkedin { color: #0077b5; }
    .text-twitter { color: #1da1f2; }

    /* Buttons */
    .btn-main {
        background: var(--main-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-main:hover {
        background: var(--main-color-dark);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(19, 94, 133, 0.2);
    }

    .btn-outline-main {
        border: 2px solid var(--main-color);
        color: var(--main-color);
        background: transparent;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-main:hover {
        background: var(--main-color);
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
</style>

<script>
    // Profile Photo Upload
    document.getElementById('photoUpload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('profileImage');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                showNotification('Profile photo updated successfully!', 'success');
            }
            
            reader.readAsDataURL(file);
        }
    });

    // Resume Upload
    document.getElementById('resumeUpload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            const fileName = file.name;
            const fileSize = (file.size / (1024*1024)).toFixed(2);
            
            // Validate file type
            const allowedTypes = ['.pdf', '.doc', '.docx'];
            const fileExtension = fileName.substring(fileName.lastIndexOf('.')).toLowerCase();
            
            if (!allowedTypes.includes(fileExtension)) {
                showNotification('Please upload PDF, DOC, or DOCX files only.', 'error');
                return;
            }
            
            // Validate file size (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                showNotification('File size should be less than 5MB.', 'error');
                return;
            }
            
            // Simulate upload
            showNotification('Uploading resume...', 'info');
            
            setTimeout(() => {
                showNotification('Resume uploaded successfully!', 'success');
                
                // Here you would typically send the file to your server
                console.log('Resume uploaded:', fileName, fileSize + 'MB');
            }, 1500);
        }
    });

    // Save Personal Info
    function savePersonalInfo() {
        const form = document.getElementById('personalInfoForm');
        const name = form.querySelector('input[type="text"]').value;
        const email = form.querySelector('input[type="email"]').value;
        
        if (!name || !email) {
            showNotification('Please fill in all required fields.', 'error');
            return;
        }
        
        // Simulate API call
        showNotification('Saving personal information...', 'info');
        
        setTimeout(() => {
            showNotification('Personal information updated successfully!', 'success');
            
            // Update profile completion
            updateProfileCompletion(75);
        }, 1000);
    }

    // Save Professional Info
    function saveProfessionalInfo() {
        showNotification('Professional information updated successfully!', 'success');
        updateProfileCompletion(85);
    }

    // Save Social Links
    function saveSocialLinks() {
        showNotification('Social links updated successfully!', 'success');
        updateProfileCompletion(90);
    }

    // Update Profile Completion
    function updateProfileCompletion(percentage) {
        const progressBar = document.querySelector('.profile-completion .progress-bar');
        const percentageText = document.querySelector('.profile-completion .small:last-child');
        
        progressBar.style.width = percentage + '%';
        progressBar.textContent = percentage + '%';
        percentageText.textContent = percentage + '%';
    }

    // Show Notification
    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} notification`;
        notification.innerHTML = `
            <i class="fa fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
        `;
        
        // Style notification
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
            border-left: 4px solid ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
            border-radius: 8px;
        `;
        
        // Add to page
        document.body.appendChild(notification);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 3000);
    }

    // Initialize date input max to today
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('input[type="date"]').max = today;
    });
</script>
<style>
    /* Error message styling */
    .is-invalid {
        border-color: #dc3545 !important;
    }
    
    .is-invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
    }
    
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    
    .invalid-feedback i {
        font-size: 0.875rem;
    }
    
    /* Ensure proper spacing */
    .input-group + .invalid-feedback {
        margin-top: 0.5rem;
    }
    
    textarea + .invalid-feedback,
    select + .invalid-feedback {
        margin-top: 0.5rem;
    }
</style>

<script>
    // Update JavaScript functions to handle form submissions
    document.addEventListener('DOMContentLoaded', function() {
        // Handle resume file selection
        const resumeUpload = document.getElementById('resumeUpload');
        const uploadButton = document.querySelector('.upload-area .btn-outline-main');
        
        if (uploadButton) {
            uploadButton.addEventListener('click', function(e) {
                e.preventDefault();
                resumeUpload.click();
            });
        }
        
        if (resumeUpload) {
            resumeUpload.addEventListener('change', function(e) {
                const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
                if (uploadButton) {
                    uploadButton.innerHTML = `<i class="fa fa-file me-2"></i>${fileName}`;
                }
            });
        }
        
        // Remove onclick handlers from buttons since we're using form submissions
        const personalSubmit = document.querySelector('#personalInfoForm button[type="submit"]');
        const professionalSubmit = document.querySelector('#professionalInfoForm button[type="submit"]');
        const socialSubmit = document.querySelector('#socialLinksForm button[type="submit"]');
        
        if (personalSubmit) {
            personalSubmit.removeAttribute('onclick');
        }
        if (professionalSubmit) {
            professionalSubmit.setAttribute('type', 'submit');
            professionalSubmit.removeAttribute('onclick');
        }
        if (socialSubmit) {
            socialSubmit.setAttribute('type', 'submit');
            socialSubmit.removeAttribute('onclick');
        }
    });
</script>
@endsection
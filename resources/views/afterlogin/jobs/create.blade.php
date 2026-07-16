@extends('layouts.header')
@section('title','Create New Job')
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
@if(!Auth::user()->company)
<!-- Company Creation Card (First Step) -->
    <div class="card company-card mb-4">
        <div class="card-header">
            <h4 class="mb-0"><i class="fa fa-building text-main me-2"></i>Company Information</h4>
            <p class="text-muted mb-0">Create your company profile first before posting jobs</p>
        </div>
        <div class="card-body">
            <form id="companyForm" action="{{ route('create.company') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-building-o"></i></span>
                            <input type="text" class="form-control" value="{{ old('name')}}" name="name" placeholder="Company Name" required> 
                        </div>
                        @error('name')
                        <font color="red"> <i class="fa fa-exclamation-triangle"></i> {{ $message }}</font>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-tag"></i></span>
                            <input type="text" class="form-control" value="{{ old('industry')}}" name="industry" placeholder="Industry">
                        </div>
                        @error('industry')
                        <font color="red"> <i class="fa fa-exclamation-triangle"></i>{{ $message }}</font>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-globe"></i></span>
                            <input type="text" class="form-control" value="{{ old('website')}}" name="website" placeholder="Website">
                        </div>
                        @error('website')
                        <font color="red"> <i class="fa fa-exclamation-triangle"></i>{{ $message }}</font>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-users"></i></span>
                            <select class="form-control" name="size">
                                <option value="">Company Size</option>
                                <option>1-10 employees</option>
                                <option>11-50 employees</option>
                                <option>51-200 employees</option>
                                <option>201-500 employees</option>
                                <option>500+ employees</option>
                            </select>
                        </div>
                        @error('size')
                        <font color="red"> <i class="fa fa-exclamation-triangle"></i>{{ $message }}</font>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                        <input type="text" class="form-control" value="{{ old('address') }}" name="address" placeholder="Company Address">
                    </div>
                    @error('address')
                    <font color="red"> <i class="fa fa-exclamation-triangle"></i>{{ $message }}</font>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Contact Email" required>
                        </div>
                        @error('email')
                        <font color="red"> <i class="fa fa-exclamation-triangle"></i>{{ $message }}</font>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            <input type="tel" class="form-control" value="{{ old('contact') }}"  name="contact" placeholder="Contact Phone">
                        </div>
                        @error('contact')
                        <font color="red"> <i class="fa fa-exclamation-triangle"></i>{{ $message }}</font>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fa fa-file-text me-2"></i>Company Description</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="Tell us about your company...">
                        {{ old('description') }}
                    </textarea>
                    <br /> @error('description')
                    <font color="red"> <i class="fa fa-exclamation-triangle"></i>{{ $message }}</font>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label"><i class="fa fa-image me-2"></i>Company Logo</label>
                    <div class="logo-upload-area">
                        <input type="file" id="logoUpload" accept="image/*" name="logo" class="d-none">
                        <label for="logoUpload" class="logo-upload-label">
                            <div class="logo-placeholder">
                                <i class="fa fa-cloud-upload"></i>
                                <p class="mt-2 mb-0">Click to upload logo</p>
                                <small class="text-muted">PNG, JPG up to 2MB</small>
                            </div>
                        </label>
                        <div class="logo-preview d-none">
                            <img id="logoPreview" src="#" alt="Logo Preview">
                            <button type="button" class="btn btn-sm btn-danger" onclick="removeLogo()">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <br /> @error('logo')
                    <font color="red"> <i class="fa fa-exclamation-triangle"></i>{{ $message }}</font>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="termsAgree">
                            <label class="form-check-label" for="termsAgree">
                                I agree to the terms and conditions
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-main">
                        <i class="fa fa-check me-2"></i>Create Company
                    </button>
                </div>
            </form>
        </div>
    </div>
@else 
    <div class="card border-light shadow-sm">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="bg-light rounded p-2 d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                        <img src="{{ asset('storage') }}/{{ Auth::user()->company->logo }}" 
                            class="img-fluid" 
                            alt="{{ Auth::user()->company->name }}"
                            style="max-height: 80px; object-fit: contain;" />
                    </div>
                </div>
                <div class="col">
                    <h2 class="h5 fw-bold text-dark mb-2">{{ Auth::user()->company->name }}</h2>
                    <p class="text-secondary mb-0 fs-6">{{ Auth::user()->company->description }}</p>
                    <p><small> <i class="fa fa-clock-o"></i> {{ Auth::user()->company->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card job-card">
        <div class="card-header">
            <h4 class="mb-0"><i class="fa fa-briefcase text-main me-2"></i>Job Details</h4>
            <p class="text-muted mb-0">Fill in the job details to post a new opening</p>
        </div>
        <div class="card-body">
        <form action="{{ route('jobs.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-pencil"></i></span>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                            name="title" 
                            placeholder="Job Title (e.g., Senior Frontend Developer)" 
                            value="{{ old('title') }}"
                            required>
                    </div>
                    @error('title')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-suitcase"></i></span>
                        <select class="form-control @error('type') is-invalid @enderror" name="type">
                            <option value="">Job Type</option>
                            <option value="Full-time" {{ old('type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ old('type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contract" {{ old('type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                            <option value="Internship" {{ old('type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                            <option value="Remote" {{ old('type') == 'Remote' ? 'selected' : '' }}>Remote</option>
                        </select>
                    </div>
                    @error('type')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" 
                            name="location" 
                            placeholder="Location (e.g., Remote, New York)"
                            value="{{ old('location') }}">
                    </div>
                    @error('location')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-money"></i></span>
                        <input type="text" class="form-control @error('salary') is-invalid @enderror" 
                            name="salary" 
                            placeholder="Salary Range (e.g., $70,000 - $90,000)"
                            value="{{ old('salary') }}">
                    </div>
                    @error('salary')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-tags"></i></span>
                    <input type="text" class="form-control @error('skills') is-invalid @enderror" 
                        name="skills" 
                        placeholder="Skills Required (comma separated)"
                        value="{{ old('skills') }}">
                </div>
                @error('skills')
                    <div class="invalid-feedback d-block">
                        <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-align-left me-2"></i>Job Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                        rows="4" 
                        name="description" 
                        placeholder="Describe the role, responsibilities, and expectations...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback d-block">
                        <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-check-circle me-2"></i>Requirements</label>
                <textarea class="form-control @error('requirements') is-invalid @enderror" 
                        rows="3" 
                        name="requirements" 
                        placeholder="List the qualifications and requirements...">{{ old('requirements') }}</textarea>
                @error('requirements')
                    <div class="invalid-feedback d-block">
                        <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        <input type="number" class="form-control @error('vacancies') is-invalid @enderror" 
                            name="vacancies" 
                            placeholder="Vacancies"
                            value="{{ old('vacancies') }}">
                    </div>
                    @error('vacancies')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                        <select class="form-control @error('experience') is-invalid @enderror" name="experience">
                            <option value="">Experience Level</option>
                            <option value="Entry Level" {{ old('experience') == 'Entry Level' ? 'selected' : '' }}>Entry Level</option>
                            <option value="Mid Level" {{ old('experience') == 'Mid Level' ? 'selected' : '' }}>Mid Level</option>
                            <option value="Senior Level" {{ old('experience') == 'Senior Level' ? 'selected' : '' }}>Senior Level</option>
                            <option value="Executive" {{ old('experience') == 'Executive' ? 'selected' : '' }}>Executive</option>
                        </select>
                    </div>
                    @error('experience')
                        <div class="invalid-feedback d-block">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-outline-secondary">
                    <i class="fa fa-refresh me-2"></i>Reset
                </button>
                <button type="submit" class="btn btn-main">
                    <i class="fa fa-paper-plane me-2"></i>Publish Job
                </button>
            </div>
        </form>
        </div>
    </div>
@endif
<style>
    /* Card Styles */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        margin-bottom: 30px;
        border-left: 4px solid var(--main-color);
    }

    .card-header {
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
        border-bottom: 2px solid var(--main-color-light);
        border-radius: 15px 15px 0 0 !important;
        padding: 20px 25px;
    }

    .card-body {
        padding: 25px;
    }

    /* Step Indicator */
    .step-indicator {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
    }

    .steps {
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 600px;
        margin: 0 auto;
    }

    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    .step.active .step-icon {
        background: var(--main-color);
        color: white;
        transform: scale(1.1);
    }

    .step-icon {
        width: 50px;
        height: 50px;
        background: var(--main-color-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: var(--main-color);
        margin-bottom: 10px;
        transition: all 0.3s ease;
    }

    .step-text {
        font-weight: 600;
        color: var(--main-color);
        font-size: 14px;
    }

    .step-line {
        flex: 1;
        height: 3px;
        background: var(--main-color-light);
        margin: 0 20px;
        position: relative;
        top: -15px;
    }

    /* Input Groups */
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

    .form-control {
        border: 2px solid #e2e8f0;
        border-left: none;
        border-radius: 0 8px 8px 0;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--main-color);
        box-shadow: 0 0 0 3px var(--main-color-light);
    }

    /* Logo Upload */
    .logo-upload-area {
        border: 2px dashed var(--main-color-light);
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .logo-upload-area:hover {
        border-color: var(--main-color);
        background: var(--main-color-lightest);
    }

    .logo-upload-label {
        cursor: pointer;
        margin: 0;
    }

    .logo-placeholder {
        color: var(--main-color);
    }

    .logo-placeholder i {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .logo-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .logo-preview img {
        width: 150px;
        height: 150px;
        object-fit: contain;
        border: 2px solid var(--main-color-light);
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 10px;
    }

    /* Form Labels */
    .form-label {
        font-weight: 600;
        color: var(--main-color);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
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

    .btn-outline-secondary {
        border: 2px solid #e2e8f0;
        color: #64748b;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background: #e2e8f0;
    }

    .btn-danger {
        padding: 8px 15px;
    }

    /* Alert */
    .alert-success {
        background: linear-gradient(135deg, rgba(21, 128, 61, 0.1) 0%, white 100%);
        border: none;
        border-left: 4px solid #16a34a;
        border-radius: 10px;
        padding: 20px;
    }

    /* Form Check */
    .form-check-input:checked {
        background-color: var(--main-color);
        border-color: var(--main-color);
    }
</style>

<script>
    // Logo Upload Preview
    document.getElementById('logoUpload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('logoPreview');
        const uploadArea = document.querySelector('.logo-upload-area');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                
                // Hide placeholder, show preview
                document.querySelector('.logo-placeholder').style.display = 'none';
                document.querySelector('.logo-preview').classList.remove('d-none');
                
                // Change upload area style
                uploadArea.style.borderStyle = 'solid';
                uploadArea.style.borderColor = 'var(--main-color)';
                uploadArea.style.background = 'var(--main-color-lightest)';
            }
            
            reader.readAsDataURL(file);
        }
    });

    function removeLogo() {
        document.getElementById('logoUpload').value = '';
        document.querySelector('.logo-placeholder').style.display = 'block';
        document.querySelector('.logo-preview').classList.add('d-none');
        document.querySelector('.logo-upload-area').style.borderStyle = 'dashed';
        document.querySelector('.logo-upload-area').style.borderColor = 'var(--main-color-light)';
        document.querySelector('.logo-upload-area').style.background = 'white';
    }

    // Create Company Function
    function createCompany() {
        const companyName = document.querySelector('#companyForm input[type="text"]').value;
        const email = document.querySelector('#companyForm input[type="email"]').value;
        const terms = document.getElementById('termsAgree').checked;
        
        // Simple validation
        if (!companyName || !email) {
            alert('Please fill in required fields: Company Name and Contact Email');
            return;
        }
        
        if (!terms) {
            alert('Please agree to the terms and conditions');
            return;
        }
        
        // Simulate API call delay
        document.querySelector('.btn-main').innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Creating...';
        document.querySelector('.btn-main').disabled = true;
        
        setTimeout(() => {
            // Enable job card
            const jobCard = document.getElementById('jobCard');
            jobCard.style.opacity = '1';
            jobCard.style.pointerEvents = 'auto';
            
            // Show success message
            document.getElementById('successMessage').classList.remove('d-none');
            
            // Update step indicator
            document.querySelectorAll('.step')[1].classList.add('active');
            
            // Reset button
            document.querySelector('.btn-main').innerHTML = '<i class="fa fa-check me-2"></i>Company Created';
            document.querySelector('.btn-main').classList.add('disabled');
            
            // Scroll to job card
            jobCard.scrollIntoView({ behavior: 'smooth' });
            
            console.log('Company created successfully');
        }, 1500);
    }

    // Create Job Function
    function createJob() {
        const jobTitle = document.querySelector('#jobForm input[type="text"]').value;
        
        if (!jobTitle) {
            alert('Please enter a job title');
            return;
        }
        
        // Simulate API call
        document.querySelector('#jobForm .btn-main').innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Publishing...';
        document.querySelector('#jobForm .btn-main').disabled = true;
        
        setTimeout(() => {
            alert('Job published successfully!');
            
            // Update step indicator
            document.querySelectorAll('.step')[2].classList.add('active');
            
            // Reset form
            document.getElementById('jobForm').reset();
            
            // Reset button
            document.querySelector('#jobForm .btn-main').innerHTML = '<i class="fa fa-paper-plane me-2"></i>Publish Job';
            document.querySelector('#jobForm .btn-main').disabled = false;
        }, 2000);
    }
</script>

@endsection
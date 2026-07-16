@extends('layouts.header')
@section('title','Our Services')
@section('content')
<style>
    /* Additional CSS for Services Page */
    :root {
        --main-color: #135E85;
        --main-color-light: rgba(19, 94, 133, 0.1);
        --main-color-dark: #0e4a6b;
        --main-color-lightest: rgba(19, 94, 133, 0.05);
        --text-color: #334155;
    }
    
    .services-hero {
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
    
    .service-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        height: 100%;
        border-top: 5px solid var(--main-color);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(19, 94, 133, 0.15);
    }
    
    .service-card:hover .service-icon {
        background-color: var(--main-color);
        transform: scale(1.1);
    }
    
    .service-card:hover .service-icon i {
        color: white;
    }
    
    .service-icon {
        width: 80px;
        height: 80px;
        background-color: var(--main-color-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }
    
    .service-icon i {
        font-size: 35px;
        color: var(--main-color);
        transition: all 0.3s ease;
    }
    
    .service-card h3 {
        color: var(--main-color);
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .service-features {
        list-style: none;
        padding-left: 0;
        margin-top: 20px;
    }
    
    .service-features li {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }
    
    .service-features li i {
        color: var(--main-color);
        margin-right: 10px;
        font-size: 14px;
    }
    
    .service-cta {
        margin-top: 25px;
    }
    
    .btn-service {
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-service:hover {
        background-color: var(--main-color-dark);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(19, 94, 133, 0.2);
    }
    
    .btn-service i {
        margin-left: 8px;
    }
    
    .feature-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: var(--main-color);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .pricing-card {
        background: white;
        border-radius: 15px;
        padding: 40px 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid #e2e8f0;
    }
    
    .pricing-card.popular {
        border: 2px solid var(--main-color);
        transform: scale(1.05);
        position: relative;
        overflow: hidden;
    }
    
    .pricing-card.popular::before {
        content: 'Most Popular';
        position: absolute;
        top: 0;
        right: 0;
        background-color: var(--main-color);
        color: white;
        padding: 5px 20px;
        font-size: 12px;
        font-weight: 600;
        border-bottom-left-radius: 15px;
    }
    
    .pricing-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(19, 94, 133, 0.15);
    }
    
    .pricing-card.popular:hover {
        transform: translateY(-10px) scale(1.05);
    }
    
    .price-amount {
        font-size: 48px;
        font-weight: 700;
        color: var(--main-color);
        margin: 20px 0;
    }
    
    .price-period {
        color: #64748b;
        font-size: 16px;
    }
    
    .pricing-features {
        list-style: none;
        padding: 0;
        margin: 30px 0;
    }
    
    .pricing-features li {
        padding: 10px 0;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .pricing-features li i {
        color: var(--main-color);
        margin-right: 10px;
    }
    
    .btn-pricing {
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        font-weight: 600;
        width: 100%;
        transition: all 0.3s ease;
    }
    
    .btn-pricing:hover {
        background-color: var(--main-color-dark);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(19, 94, 133, 0.2);
    }
    
    .process-step {
        text-align: center;
        padding: 30px 20px;
    }
    
    .step-number {
        width: 60px;
        height: 60px;
        background-color: var(--main-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: 700;
        margin: 0 auto 20px;
    }
    
    .process-connector {
        position: relative;
        height: 2px;
        background-color: var(--main-color-light);
        margin: 30px 0;
    }
    
    .process-connector::before {
        content: '';
        position: absolute;
        top: -4px;
        left: 50%;
        transform: translateX(-50%);
        width: 10px;
        height: 10px;
        background-color: var(--main-color);
        border-radius: 50%;
    }
    
    .testimonial-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin: 20px 0;
        border-left: 5px solid var(--main-color);
    }
    
    .testimonial-text {
        font-style: italic;
        color: #475569;
        margin-bottom: 20px;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
    }
    
    .author-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: var(--main-color-light);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: var(--main-color);
        font-weight: 600;
    }
    
    .author-info h5 {
        margin-bottom: 5px;
        color: var(--main-color);
    }
    
    .author-info p {
        color: #64748b;
        font-size: 14px;
    }
    
    .faq-accordion .accordion-button {
        background-color: white;
        border: 2px solid #e2e8f0;
        border-radius: 8px !important;
        margin-bottom: 10px;
        font-weight: 600;
        color: var(--text-color);
        padding: 15px 20px;
    }
    
    .faq-accordion .accordion-button:not(.collapsed) {
        background-color: var(--main-color-light);
        color: var(--main-color);
        border-color: var(--main-color);
    }
    
    .faq-accordion .accordion-button:focus {
        box-shadow: 0 0 0 3px var(--main-color-light);
        border-color: var(--main-color);
    }
    
    @media (max-width: 768px) {
        .services-hero {
            padding: 60px 0 30px;
        }
        
        .pricing-card.popular {
            transform: none;
        }
        
        .pricing-card.popular:hover {
            transform: translateY(-10px);
        }
    }
</style>

<!-- Hero Section -->
<section class="services-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold text-main mb-3">Powerful Tools for Your Career Journey</h1>
                <p class="lead mb-4">Whether you're looking for your dream job or seeking top talent for your company, our comprehensive platform provides everything you need to succeed in today's competitive market.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="btn btn-service">
                        Get Started Now
                        <i class="fa fa-arrow-right"></i>
                    </a>
                    <a href="#how-it-works" class="btn btn-service" style="background-color: transparent; color: var(--main-color); border: 2px solid var(--main-color);">
                        <i class="fa fa-play-circle me-2"></i>
                        See How It Works
                    </a>
                </div>
            </div>
            <div class="col-lg-5 text-center">
                <img src="https://cdn.pixabay.com/photo/2018/09/27/09/22/artificial-intelligence-3706562_1280.jpg" alt="Job Portal Services" class="img-fluid rounded" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<!-- Main Services Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Our Core Services</h2>
        <div class="row g-4">
            <!-- Job Seeker Services -->
            <div class="col-lg-4">
                <div class="service-card">
                    <div class="feature-badge">For Job Seekers</div>
                    <div class="service-icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <h3>Find Your Dream Job</h3>
                    <p>Access thousands of verified job listings from top companies. Filter by location, salary, experience, and job type to find the perfect match.</p>
                    
                    <ul class="service-features">
                        <li><i class="fa fa-check-circle"></i> Advanced job search with filters</li>
                        <li><i class="fa fa-check-circle"></i> Job alerts via email</li>
                        <li><i class="fa fa-check-circle"></i> Salary insights and company reviews</li>
                        <li><i class="fa fa-check-circle"></i> One-click application process</li>
                        <li><i class="fa fa-check-circle"></i> Resume score analysis</li>
                    </ul>
                    
                    <div class="service-cta">
                        <a href="{{ route('client.jobs') }}" class="btn btn-service">
                            Browse Jobs
                            <i class="fa fa-briefcase"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Employer Services -->
            <div class="col-lg-4">
                <div class="service-card">
                    <div class="feature-badge">For Employers</div>
                    <div class="service-icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <h3>Hire Top Talent</h3>
                    <p>Post job openings, manage applications, and find qualified candidates. Build your employer brand with our powerful recruitment tools.</p>
                    
                    <ul class="service-features">
                        <li><i class="fa fa-check-circle"></i> Free job posting (basic)</li>
                        <li><i class="fa fa-check-circle"></i> Company profile creation</li>
                        <li><i class="fa fa-check-circle"></i> Applicant tracking system</li>
                        <li><i class="fa fa-check-circle"></i> Candidate matching algorithm</li>
                        <li><i class="fa fa-check-circle"></i> Recruitment analytics dashboard</li>
                    </ul>
                    
                    <div class="service-cta">
                        <a href="{{ route('register') }}" class="btn btn-service">
                            Post a Job
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Company Profile Services -->
            <div class="col-lg-4">
                <div class="service-card">
                    <div class="feature-badge">For Companies</div>
                    <div class="service-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h3>Company Branding</h3>
                    <p>Showcase your company culture, values, and career opportunities. Attract the right talent with a compelling employer brand.</p>
                    
                    <ul class="service-features">
                        <li><i class="fa fa-check-circle"></i> Custom company profile page</li>
                        <li><i class="fa fa-check-circle"></i> Employee reviews and ratings</li>
                        <li><i class="fa fa-check-circle"></i> Company news and updates</li>
                        <li><i class="fa fa-check-circle"></i> Featured employer listings</li>
                        <li><i class="fa fa-check-circle"></i> Career page integration</li>
                    </ul>
                    
                    <div class="service-cta">
                        <a href="{{ route('register') }}" class="btn btn-service">
                            Create Profile
                            <i class="fa fa-user-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Services Row -->
        <div class="row g-4 mt-3">
            <div class="col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3>Professional Resume Builder</h3>
                    <p>Create a professional resume with our easy-to-use builder. Choose from multiple templates, get expert suggestions, and download in PDF format.</p>
                    
                    <ul class="service-features">
                        <li><i class="fa fa-check-circle"></i> ATS-friendly templates</li>
                        <li><i class="fa fa-check-circle"></i> Real-time content suggestions</li>
                        <li><i class="fa fa-check-circle"></i> Export to PDF/DOC</li>
                        <li><i class="fa fa-check-circle"></i> Multiple language support</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <h3>Career Analytics</h3>
                    <p>Track your application progress, monitor job market trends, and receive personalized career recommendations based on your profile.</p>
                    
                    <ul class="service-features">
                        <li><i class="fa fa-check-circle"></i> Application tracking</li>
                        <li><i class="fa fa-check-circle"></i> Market salary insights</li>
                        <li><i class="fa fa-check-circle"></i> Skill gap analysis</li>
                        <li><i class="fa fa-check-circle"></i> Career growth suggestions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">How It Works</h2>
        
        <div class="row">
            <!-- For Job Seekers -->
            <div class="col-lg-6 mb-5">
                <h3 class="text-main mb-4">For Job Seekers</h3>
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h4>Create Your Profile</h4>
                    <p>Sign up and build your professional profile with skills, experience, and career preferences.</p>
                </div>
                <div class="process-connector"></div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h4>Search & Apply</h4>
                    <p>Browse thousands of jobs, save favorites, and apply with one click using your profile.</p>
                </div>
                <div class="process-connector"></div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h4>Get Hired</h4>
                    <p>Track applications, receive interview calls, and land your dream job.</p>
                </div>
            </div>
            
            <!-- For Employers -->
            <div class="col-lg-6 mb-5">
                <h3 class="text-main mb-4">For Employers</h3>
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h4>Register Company</h4>
                    <p>Create your company profile and verify your business details.</p>
                </div>
                <div class="process-connector"></div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h4>Post Jobs</h4>
                    <p>Post job openings with detailed descriptions, requirements, and salary ranges.</p>
                </div>
                <div class="process-connector"></div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h4>Hire Talent</h4>
                    <p>Review applications, interview candidates, and hire the best talent.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5">Success Stories</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "Found my dream job within two weeks of using this platform. The application process was seamless and the job matching algorithm was spot on!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">SR</div>
                        <div class="author-info">
                            <h5>Sarah Johnson</h5>
                            <p>Software Engineer at TechCorp</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "As a startup, we found amazing talent through this portal. The candidate matching system saved us countless hours of screening."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">MK</div>
                        <div class="author-info">
                            <h5>Michael Chen</h5>
                            <p>Founder, StartupXYZ</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "The company profile feature helped us showcase our culture and attract candidates who align with our values. Hiring quality improved dramatically."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">EP</div>
                        <div class="author-info">
                            <h5>Emma Parker</h5>
                            <p>HR Director, GlobalTech</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Frequently Asked Questions</h2>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion faq-accordion" id="servicesFAQ">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Is it free to create an account?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#servicesFAQ">
                            <div class="accordion-body">
                                Yes, creating an account is completely free for both job seekers and employers. You can post basic job listings and apply for jobs without any charges.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How do I create a company profile?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#servicesFAQ">
                            <div class="accordion-body">
                                After registering, go to your dashboard and click on "Create Company Profile." Fill in your company details, upload your logo, and add information about your company culture. Once verified, your profile will be live.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Can I apply for jobs without a resume?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#servicesFAQ">
                            <div class="accordion-body">
                                Yes! You can apply for jobs using your profile information. However, we recommend creating a professional resume using our resume builder for better chances of getting hired.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How long does job posting remain active?
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#servicesFAQ">
                            <div class="accordion-body">
                                Free job postings remain active for 30 days. Premium postings can remain active for up to 90 days. You can renew or close job postings anytime from your employer dashboard.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background-color: var(--main-color);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-3">Ready to Transform Your Career or Hiring Process?</h2>
                <p class="text-white mb-0">Join thousands of successful job seekers and employers who have found their perfect match through our platform.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('register') }}" class="btn btn-service" style="background-color: white; color: var(--main-color);">
                    Get Started Free
                    <i class="fa fa-rocket"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
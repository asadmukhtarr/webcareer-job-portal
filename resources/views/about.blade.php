@extends('layouts.header')
@section('title','About Us - Your Career Partner')
@section('content')
<style>
    /* Additional CSS for About Page */
    :root {
        --main-color: #135E85;
        --main-color-light: rgba(19, 94, 133, 0.1);
        --main-color-dark: #0e4a6b;
        --main-color-lightest: rgba(19, 94, 133, 0.05);
        --text-color: #334155;
    }
    
    .about-hero {
        background: linear-gradient(135deg, var(--main-color) 0%, var(--main-color-dark) 100%);
        padding: 100px 0 80px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .about-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://cdn.pixabay.com/photo/2018/05/18/15/30/web-design-3411373_1280.jpg') center/cover no-repeat;
        opacity: 0.1;
    }
    
    .hero-content {
        position: relative;
        z-index: 1;
    }
    
    .hero-title {
        font-weight: 800;
        margin-bottom: 25px;
        font-size: 3.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.25rem;
        opacity: 0.9;
        margin-bottom: 30px;
        max-width: 700px;
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
    
    .about-story {
        padding: 100px 0;
        background-color: var(--main-color-lightest);
    }
    
    .story-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(19, 94, 133, 0.15);
        height: 100%;
        min-height: 400px;
        background: url('https://cdn.pixabay.com/photo/2018/02/04/01/38/meeting-3128757_1280.jpg') center/cover no-repeat;
    }
    
    .story-content {
        padding-left: 40px;
    }
    
    .story-content h2 {
        color: var(--main-color);
        margin-bottom: 25px;
    }
    
    .stats-section {
        padding: 80px 0;
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
    }
    
    .stats-card {
        text-align: center;
        padding: 40px 20px;
        border-radius: 15px;
        background: white;
        box-shadow: 0 10px 30px rgba(19, 94, 133, 0.1);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .stats-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(19, 94, 133, 0.2);
    }
    
    .stats-icon {
        width: 80px;
        height: 80px;
        background-color: var(--main-color-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
    }
    
    .stats-icon i {
        font-size: 35px;
        color: var(--main-color);
    }
    
    .stats-number {
        font-size: 3rem;
        font-weight: 800;
        color: var(--main-color);
        margin-bottom: 10px;
        line-height: 1;
    }
    
    .stats-label {
        color: var(--text-color);
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .values-section {
        padding: 100px 0;
        background-color: white;
    }
    
    .value-card {
        text-align: center;
        padding: 40px 30px;
        border-radius: 15px;
        background: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        border-top: 5px solid var(--main-color);
    }
    
    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(19, 94, 133, 0.15);
    }
    
    .value-icon {
        width: 100px;
        height: 100px;
        background-color: var(--main-color-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        transition: all 0.3s ease;
    }
    
    .value-card:hover .value-icon {
        background-color: var(--main-color);
        transform: scale(1.1);
    }
    
    .value-icon i {
        font-size: 45px;
        color: var(--main-color);
        transition: all 0.3s ease;
    }
    
    .value-card:hover .value-icon i {
        color: white;
    }
    
    .value-card h3 {
        color: var(--main-color);
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .team-section {
        padding: 100px 0;
        background-color: var(--main-color-lightest);
    }
    
    .team-card {
        text-align: center;
        padding: 30px;
        border-radius: 15px;
        background: white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        margin-bottom: 30px;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(19, 94, 133, 0.15);
    }
    
    .team-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin: 0 auto 25px;
        overflow: hidden;
        border: 5px solid var(--main-color-light);
        transition: all 0.3s ease;
    }
    
    .team-card:hover .team-avatar {
        border-color: var(--main-color);
        transform: scale(1.05);
    }
    
    .team-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .team-info h4 {
        color: var(--main-color);
        margin-bottom: 5px;
        font-weight: 700;
    }
    
    .team-role {
        color: #64748b;
        font-weight: 600;
        margin-bottom: 15px;
        display: block;
    }
    
    .team-social {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }
    
    .team-social a {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--main-color-light);
        color: var(--main-color);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .team-social a:hover {
        background-color: var(--main-color);
        color: white;
        transform: translateY(-3px);
    }
    
    .mission-vision {
        padding: 100px 0;
        background-color: white;
    }
    
    .mission-card, .vision-card {
        padding: 50px;
        border-radius: 20px;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .mission-card {
        background: linear-gradient(135deg, var(--main-color) 0%, var(--main-color-dark) 100%);
        color: white;
    }
    
    .vision-card {
        background: linear-gradient(135deg, var(--main-color-lightest) 0%, white 100%);
        border: 3px solid var(--main-color-light);
    }
    
    .mission-card h2, .vision-card h2 {
        margin-bottom: 25px;
        font-weight: 700;
    }
    
    .mission-card h2 {
        color: white;
    }
    
    .vision-card h2 {
        color: var(--main-color);
    }
    
    .icon-large {
        font-size: 80px;
        margin-bottom: 30px;
        opacity: 0.2;
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
    
    .cta-section {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--main-color) 0%, var(--main-color-dark) 100%);
        color: white;
        text-align: center;
    }
    
    .cta-title {
        font-size: 2.5rem;
        font-weight: 800;
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
        background-color: white;
        color: var(--main-color);
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
        background-color: #f8fafc;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
    }
    
    .btn-cta-secondary {
        background-color: transparent;
        color: white;
        border: 2px solid white;
        border-radius: 10px;
        padding: 16px 40px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    
    .btn-cta-secondary:hover {
        background-color: white;
        color: var(--main-color);
        transform: translateY(-3px);
    }
    
    .timeline-section {
        padding: 100px 0;
        background-color: white;
    }
    
    .timeline {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .timeline::after {
        content: '';
        position: absolute;
        width: 6px;
        background-color: var(--main-color-light);
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -3px;
    }
    
    .timeline-item {
        padding: 10px 40px;
        position: relative;
        width: 50%;
        box-sizing: border-box;
        margin-bottom: 60px;
    }
    
    .timeline-item:nth-child(odd) {
        left: 0;
    }
    
    .timeline-item:nth-child(even) {
        left: 50%;
    }
    
    .timeline-content {
        padding: 30px;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        position: relative;
        border-top: 4px solid var(--main-color);
    }
    
    .timeline-year {
        color: var(--main-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }
    
    .timeline-content h3 {
        color: var(--main-color);
        margin-bottom: 10px;
    }
    
    .timeline-item::after {
        content: '';
        position: absolute;
        width: 25px;
        height: 25px;
        background-color: var(--main-color);
        border: 4px solid white;
        border-radius: 50%;
        top: 30px;
        z-index: 1;
    }
    
    .timeline-item:nth-child(odd)::after {
        right: -17px;
    }
    
    .timeline-item:nth-child(even)::after {
        left: -17px;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .about-hero {
            padding: 80px 0 60px;
        }
        
        .story-content {
            padding-left: 0;
            padding-top: 40px;
        }
        
        .timeline::after {
            left: 31px;
        }
        
        .timeline-item {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
        }
        
        .timeline-item:nth-child(even) {
            left: 0;
        }
        
        .timeline-item::after {
            left: 20px;
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
<section class="about-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="hero-content text-center">
                    <h1 class="hero-title">Connecting Talent with Opportunity</h1>
                    <p class="hero-subtitle">At Web Career, we're revolutionizing the job search experience by creating meaningful connections between exceptional talent and forward-thinking companies. Our mission is to empower careers and transform hiring processes.</p>
                    <div class="cta-buttons">
                        <a href="{{ route('client.jobs') }}" class="btn btn-cta-primary">
                            <i class="fa fa-briefcase me-2"></i>
                            Browse Jobs
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-cta-secondary">
                            <i class="fa fa-rocket me-2"></i>
                            Join Our Community
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="about-story">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="story-image"></div>
            </div>
            <div class="col-lg-6">
                <div class="story-content">
                    <h2 class="section-title">Our Story</h2>
                    <p>Founded in 2020, Web Career began with a simple observation: the job search process was broken. Candidates struggled to find relevant opportunities, while employers faced challenges in identifying the right talent.</p>
                    <p class="mt-3">What started as a small team of passionate professionals has grown into a comprehensive platform serving thousands of job seekers and employers worldwide. We believe that everyone deserves to find work they love, and every company deserves to find the perfect candidate.</p>
                    <p class="mt-3">Today, we're proud to be at the forefront of recruitment technology, leveraging AI and data analytics to create better matches and more meaningful career connections.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="stats-section">
    <div class="container">
        <h2 class="section-title text-center">By The Numbers</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">Our impact in numbers - helping people build careers and companies find talent</p>
        
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="stats-number">50,000+</div>
                    <div class="stats-label">Job Seekers</div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="stats-number">5,000+</div>
                    <div class="stats-label">Companies</div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <div class="stats-number">25,000+</div>
                    <div class="stats-label">Jobs Posted</div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <div class="stats-number">15,000+</div>
                    <div class="stats-label">Successful Hires</div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="stats-number">120+</div>
                    <div class="stats-label">Countries</div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <div class="stats-number">89%</div>
                    <div class="stats-label">Success Rate</div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="stats-number">48h</div>
                    <div class="stats-label">Avg. Response Time</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="mission-vision">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="mission-card">
                    <div class="icon-large">
                        <i class="fa fa-bullseye"></i>
                    </div>
                    <h2>Our Mission</h2>
                    <p>To bridge the gap between talent and opportunity by providing a platform that makes job searching and hiring seamless, efficient, and rewarding for everyone involved.</p>
                    <p class="mt-3">We're committed to creating equal opportunities and helping people from all backgrounds find meaningful work that aligns with their skills, values, and aspirations.</p>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="vision-card">
                    <div class="icon-large">
                        <i class="fa fa-eye"></i>
                    </div>
                    <h2>Our Vision</h2>
                    <p>To become the world's most trusted career platform, where anyone can discover their dream job and every company can build their dream team.</p>
                    <p class="mt-3">We envision a future where career transitions are smooth, hiring is bias-free, and the right opportunities find the right people at the right time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="values-section">
    <div class="container">
        <h2 class="section-title text-center">Our Core Values</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">These principles guide everything we do at Web Career</p>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h3>People First</h3>
                    <p>We believe in putting people at the center of everything we do. Whether it's job seekers or employers, their success is our success.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa fa-shield"></i>
                    </div>
                    <h3>Trust & Transparency</h3>
                    <p>We build trust through transparency. From salary information to company reviews, we provide honest insights to help make informed decisions.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We continuously innovate to improve the job search and hiring experience, leveraging technology to create better matches and faster connections.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3>Inclusion</h3>
                    <p>We're committed to creating an inclusive platform where diversity is celebrated and everyone has equal access to opportunities.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa fa-rocket"></i>
                    </div>
                    <h3>Excellence</h3>
                    <p>We strive for excellence in everything we do, from platform features to customer support, ensuring the best experience for our users.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <h3>Collaboration</h3>
                    <p>We believe in the power of collaboration - working together with our users, partners, and team to achieve shared success.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline -->
<section class="timeline-section">
    <div class="container">
        <h2 class="section-title text-center">Our Journey</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">Milestones in our journey to transform the recruitment industry</p>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2020</div>
                    <h3>Foundation</h3>
                    <p>Web Career was founded by a team of HR professionals and tech enthusiasts who saw the need for a better job search platform.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2021</div>
                    <h3>Platform Launch</h3>
                    <p>Launched our beta platform with basic job search and posting features. Gained our first 1,000 users within 3 months.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2022</div>
                    <h3>Growth & Expansion</h3>
                    <p>Expanded to international markets, introduced AI-powered job matching, and reached 10,000 active users milestone.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2023</div>
                    <h3>Product Innovation</h3>
                    <p>Launched company profiles, video interviewing, and advanced analytics tools. Partnered with 1,000+ companies worldwide.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-content">
                    <div class="timeline-year">2024</div>
                    <h3>Industry Recognition</h3>
                    <p>Received "Best Job Platform" award, launched mobile app, and introduced career counseling services. Now serving 50,000+ users.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section">
    <div class="container">
        <h2 class="section-title text-center">Success Stories</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">Hear from people who found their dream jobs and companies that found their dream teams through our platform</p>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "Web Career completely transformed my job search. Within two weeks of creating my profile, I landed my dream job at a tech startup. The platform's matching algorithm is spot on!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">SR</div>
                        <div class="author-info">
                            <h4>Sarah Rodriguez</h4>
                            <p>Software Engineer at TechCorp</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "As a hiring manager, Web Career has saved us countless hours. The quality of candidates is exceptional, and the platform's features make the hiring process so much smoother."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">MJ</div>
                        <div class="author-info">
                            <h4>Michael Johnson</h4>
                            <p>HR Director at GlobalTech</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        "The career counseling service helped me navigate a major career transition. My counselor provided invaluable guidance that led me to a more fulfilling career path."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">EP</div>
                        <div class="author-info">
                            <h4>Emma Parker</h4>
                            <p>Marketing Director at CreativeMinds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <h2 class="section-title text-center">Meet Our Leadership Team</h2>
        <p class="text-center mb-5" style="max-width: 700px; margin: 0 auto;">The passionate individuals driving our mission forward</p>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-card">
                    <div class="team-avatar">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Alex Morgan">
                    </div>
                    <div class="team-info">
                        <h4>Alex Morgan</h4>
                        <span class="team-role">CEO & Founder</span>
                        <p>Former HR executive with 15+ years of experience in talent acquisition and workforce development.</p>
                    </div>
                    <div class="team-social">
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-globe"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-card">
                    <div class="team-avatar">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Sarah Chen">
                    </div>
                    <div class="team-info">
                        <h4>Sarah Chen</h4>
                        <span class="team-role">CTO</span>
                        <p>Tech innovator specializing in AI and machine learning applications for recruitment technology.</p>
                    </div>
                    <div class="team-social">
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-github"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-card">
                    <div class="team-avatar">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="David Park">
                    </div>
                    <div class="team-info">
                        <h4>David Park</h4>
                        <span class="team-role">Head of Product</span>
                        <p>Product strategist focused on creating intuitive user experiences and scalable platform features.</p>
                    </div>
                    <div class="team-social">
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-medium"></i></a>
                        <a href="#"><i class="fa fa-globe"></i></a>
                    </div>
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
                <h2 class="cta-title">Ready to Transform Your Career Journey?</h2>
                <p class="fs-5">Join thousands of professionals and companies who have already found success with Web Career. Whether you're looking for your dream job or your dream team, we're here to help you achieve your goals.</p>
                
                <div class="cta-buttons">
                    <a href="{{ route('register') }}" class="btn btn-cta-primary">
                        <i class="fa fa-user-plus me-2"></i>
                        Sign Up Free
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-cta-secondary">
                        <i class="fa fa-envelope me-2"></i>
                        Contact Us
                    </a>
                </div>
                
                <div class="mt-5">
                    <p class="mb-0">Have questions? <a href="{{ route('contact') }}" class="text-white fw-bold">Get in touch with our team</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
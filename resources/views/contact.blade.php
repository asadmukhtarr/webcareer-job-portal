@extends('layouts.header')
@section('title','Contact Us')
@section('content')

<!-- Hero Section -->
<section class="contact-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-main mb-3">Get In Touch</h1>
                <p class="lead mb-4">Have questions about your career path? Need guidance on job opportunities? We're here to help you navigate your professional journey.</p>
                <div class="d-flex align-items-center">
                    <div class="me-4">
                        <i class="fa fa-phone fa-2x text-main"></i>
                    </div>
                    <div>
                        <p class="mb-1">Call us anytime</p>
                        <h5 class="text-main mb-0">+1 (555) 123-4567</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://cdn.pixabay.com/photo/2018/03/22/02/37/email-3249062_1280.png" alt="Contact Illustration" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Contact Information</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="contact-info">
                        <h4>Visit Our Office</h4>
                        <p class="mb-2">123 Career Street</p>
                        <p class="mb-2">Professional District</p>
                        <p>City, State 12345</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="contact-info">
                        <h4>Call Us</h4>
                        <p class="mb-2">Main: +1 (555) 123-4567</p>
                        <p class="mb-2">Support: +1 (555) 987-6543</p>
                        <p>Mon-Fri: 9am-6pm EST</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="contact-info">
                        <h4>Email Us</h4>
                        <p class="mb-2">General: info@webcareer.com</p>
                        <p class="mb-2">Support: support@webcareer.com</p>
                        <p>Jobs: careers@webcareer.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Map -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="contact-form-container">
                    <h2 class="section-title">Send Us a Message</h2>
                    <form action="/" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="John Doe">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="john@example.com">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required placeholder="How can we help you?">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Tell us about your career needs..."></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-submit">
                                    <i class="fa fa-paper-plane me-2"></i>
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Find Us Here</h2>
                <div class="map-container mb-4">
                    <!-- Google Maps Embed -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.177858804427!2d-73.98784468459418!3d40.70555167933205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a315cdf4c9b%3A0x8b934de5cae6f7a!2sCareer%20Development%20Center!5e0!3m2!1sen!2sus!4v1625091234567!5m2!1sen!2sus" 
                            allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="fa fa-clock-o text-main mt-1 me-3"></i>
                            <div>
                                <h6 class="text-main">Working Hours</h6>
                                <p class="mb-0">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                <p class="mb-0">Saturday: 10:00 AM - 4:00 PM</p>
                                <p class="mb-0">Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <i class="fa fa-users text-main mt-1 me-3"></i>
                            <div>
                                <h6 class="text-main">Support Team</h6>
                                <p class="mb-0">Available 24/7 for urgent inquiries</p>
                                <p class="mb-0">Average response time: 2 hours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Frequently Asked Questions</h2>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 mb-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                <i class="fa fa-question-circle text-main me-2"></i>
                                How quickly will I hear back after submitting a contact form?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our team typically responds within 2 business hours during working days. For inquiries submitted on weekends, you can expect a response by the next business day.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 mb-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                <i class="fa fa-question-circle text-main me-2"></i>
                                Do you offer free career consultations?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! We offer a free 30-minute initial consultation for all new clients. This allows us to understand your career goals and determine how we can best assist you.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 mb-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                <i class="fa fa-question-circle text-main me-2"></i>
                                Can I schedule an in-person meeting?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! We offer both in-person and virtual meetings. You can schedule an appointment through our contact form or by calling our office directly.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
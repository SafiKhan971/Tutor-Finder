@extends('front.layouts.app')
@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@endsection
@section('main')

<section class="section_all bg-light" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title_all text-center">
                    <h3 class="font-weight-bold">Welcome To <span class="text-custom">Find Tutor</span></h3>
                    <p class="section_subtitle mx-auto text-muted">Are you struggling with a challenging subject or looking to excel in your studies? Our platform makes it easy to find expert tutors who can guide you on your educational journey. With a wide range of subjects and levels, personalized matching, and flexible scheduling, you’re just a few clicks away from achieving your goals.</p>
                    <div class="">
                        <i class=""></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row vertical_content_manage mt-5">
            <div class="col-lg-6">
                <div class="about_header_main mt-3">
                    <div class="about_icon_box">
                        <p class="text_custom font-weight-bold">Find the Right Tutor Today</p>
                    </div>
                    <h4 class="about_heading text-capitalize font-weight-bold mt-4">Why Choose Us?</h4>
                    <p class="text-muted mt-3"><strong>Expert Tutors:</strong><br>Only the best tutors with proven expertise and teaching experience.
                        <br><strong>Tailored Learning:</strong><br> Personalized sessions that cater to your unique learning style.
                        <br><strong>Convenience:</strong><br> Learn at your own pace, anytime, anywhere.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="img_about mt-3">
                    <img src="{{ asset('assets/images/about-1.jpg') }}" alt="about-img" class="img-fluid mx-auto d-block">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fab fa-angellist"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Personalized Learning Experience</h5>
                        <p class="edu_desc mt-3 mb-0 text-muted">The system connects you with tutors who tailor their teaching methods to your specific needs and learning style, ensuring that you get the most out of each session.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fab fa-angellist"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Convenience and Flexibility</h5>
                        <p class="edu_desc mb-0 mt-3 text-muted">With the ability to book sessions at times that suit you, whether online or in-person, the system offers the flexibility to learn on your schedule, from the comfort of your home.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Access to a Wide Range of Experts </h5>
                        <p class="edu_desc mb-0 mt-3 text-muted">Whether you're looking for help in a specific subject or preparing for a major exam, the system provides access to a diverse pool of qualified tutors with expertise in various fields.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
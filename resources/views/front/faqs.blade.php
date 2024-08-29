@extends('front.layouts.app')
@section('custom_styles')
    <style>
      .heading{
        color: #A8DF8E;
        margin-top: 5rem;
      }
    </style>
@endsection
@section('main')
<div class="mt-5">
<h3 class="text-center heading">Frequent Asked Questions</h3>
</div>
{{-- <h1>This is faqs page </h1> --}}
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          1. What is the Online Tutor Finder System?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          The Online Tutor Finder System is a platform designed to help students find and connect with qualified tutors for various subjects and academic levels. Users can search for tutors based on subject expertise, availability, and location.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          2. How do I create an account?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          To create an account, click on the "Sign Up" button on the homepage. You'll need to provide your email address, create a password, and complete the registration form with your personal details. After signing up, you'll receive a confirmation email to verify your account.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          3. How do I find a tutor?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Use the search bar to enter the subject you need help with. You can filter the search results based on tutor expertise, availability, rating, and location. Once you find a tutor that matches your criteria, you can view their profile for more details and contact them directly.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          4. How do I book a tutoring session?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          After finding a suitable tutor, you can book a session by selecting a time slot that works for both you and the tutor. The tutor will need to confirm the booking before the session is finalized. You can track your upcoming sessions through your account dashboard.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          5. Can I see tutor reviews before booking?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          Yes, each tutor profile includes reviews and ratings from previous students. These reviews can help you gauge the tutor's effectiveness and teaching style before making a decision.
        </div>
      </div>
    </div>
  </div>
@endsection
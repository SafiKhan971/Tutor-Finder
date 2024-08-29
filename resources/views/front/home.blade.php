@extends('front.layouts.app')
@section('custom_styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@endsection
@section('main')
    <section class="section-0 lazy d-flex bg-image-style dark align-items-center "
        data-bg="{{ asset('assets/images/home.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-12 text-center">
                    <span class="main_heading">Find your dream Tution</span>
                    <p>Connecting You with the Perfect Tutor for Your Academic Success</p>
                    <div class="banner-btn mt-5"><a href="{{ route('about-us') }}" class="btn btn-primary mb-4 mb-sm-0">Learn More</a></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-1 py-5 ">
        <div class="container">
            <div class="card border-0 shadow p-5">
                <form action="{{ route('tutor.search') }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- Discipline --}}
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="mb-2">Discipline<span class="text-danger">*</span></label>
                                <select class="form-select" name="discipline" id="discipline">
                                    <option value="default" disabled selected> Select Discipline</option>
                                    @foreach ($disciplines as $discipline)
                                        <option value="{{ $discipline->id }}"
                                            {{ old('discipline_id') == $discipline->id ? 'selected' : '' }}>
                                            {{ $discipline->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('discipline')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Subjects --}}
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="mb-2">Subject<span class="text-danger">*</span></label>
                                <select class="form-select" id="subject" name="subject_id" placeholder="Select Subject">
                                </select>
                            </div>
                            @error('subject')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Location --}}
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="" class="mb-2">Location<span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="address" id="address"
                                    placeholder="Location">
                                @error('address')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        {{-- Hourly Rate --}}
                        <div class="col-md-2 mb-3 mb-sm-3 mb-lg-0">
                            <label for="" class="mb-2">Hourly Rate<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="hourly_rate" id="hourly_rate"
                                placeholder="Hourly Rate in USD">
                            @error('hourly_rate')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class=" col-md-1 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2" style="margin-top: 2.5rem;">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="section-2 bg-2 py-5">
        <div class="container">
            <h2>Popular Subjects</h2>
            <div class="row pt-5">

                @if ($subjects->isNotEmpty())
                    @foreach ($subjects as $subject)
                        <div class="col-lg-4 col-xl-3 col-md-6">
                            <div class="single_catagory">
                                <p class="mb-0 text-white">{{ $subject->discipline->name ?? '' }}</p>
                                <h4 class="pb-2 text-success">{{ $subject->name }}</h4>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="section-3 bg-2 py-5">
        <div class="container">
            <h2>Popular Tutors</h2>
            <div class="row pt-5">
                <div class="job_listing_area">
                    <div class="job_lists">
                        <div class="row">
                            @if ($tutors->isNotEmpty())
                                @foreach ($tutors as $tutor)
                                    <div class="col-md-3">
                                        <div class="card border-0 p-3 shadow mb-4">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    @if ($tutor->image != '')
                                                        <img src="{{ asset('profile_pic/' . $tutor->image) }}"
                                                            alt="avatar" class="rounded-circle img-fluid"
                                                            style="width: 150px;">
                                                    @else
                                                        <img src="{{ asset('/assets/images/avatar7.png') }}" alt="avatar"
                                                            class="rounded-circle img-fluid" style="width: 150px;">
                                                    @endif

                                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $tutor->name }}</h3>
                                                    <p><strong>Hourly Rate :</strong> ${{ $tutor->hourly_rate ?? '0' }}
                                                    </p>

                                                    <!-- Display Rating -->
                                                    @php
                                                        $maxStars = 5;
                                                        $filledStars = $tutor->rating_avg_rating;
                                                    @endphp
                                                    <h4>{{ $filledStars ?? 0 }}</h4>
                                                    <div class="custom_rating">
                                                        @for ($i = 1; $i <= $maxStars; $i++)
                                                            <span>
                                                                <i
                                                                    class="fa fa-star {{ $i <= $filledStars ? 'text-warning' : 'text-muted' }}"></i>
                                                            </span>
                                                        @endfor
                                                    </div>
                                                </div>

                                                {{-- <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $tutor->address }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-users"></i></span>
                                                    <span class="ps-1">{{ $tutor->gender }}</span>
                                                </p>
                                
                                                @if (!is_null($tutor->fee))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $tutor->fee }}</span>
                                                    </p>
                                                @endif
                                            </div> --}}

                                                <div class="d-grid mt-3">
                                                    <a href="{{ route('tutor.show', $tutor->id) }}"
                                                        class="btn btn-primary btn-lg">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section-3 bg-2 py-5">
        <div class="container">
            <h2>Latest Tution</h2>
            <div class="row pt-5">
                <div class="job_listing_area">
                    <div class="job_lists">
                        <div class="row">


                            @if ($latestTutions->isNotEmpty())
                                @foreach ($latestTutions as $latestTution)
                                    <div class="col-md-4">
                                        <div class="card border-0 p-3 shadow mb-4">
                                            <div class="card-body">
                                                <h3 class="border-0 fs-5 pb-2 mb-0">{{ $latestTution->title }}</h3>
                                                <p>{{ Str::words($latestTution->description, 7) }}</p>
                                                <div class="bg-light p-3 border">
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                        <span class="ps-1">{{ $latestTution->location }}</span>
                                                    </p>
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-users"></i></span>
                                                        <span class="ps-1">{{ $latestTution->classType->name }}</span>
                                                    </p>


                                                    @if (!is_null($latestTution->salary))
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                            <span class="ps-1">{{ $latestTution->salary }}</span>
                                                        </p>
                                                    @endif
                                                </div>

                                                <div class="d-grid mt-3">
                                                    <a href="{{ route('tutionDetail', $latestTution->id) }}"
                                                        class="btn btn-primary btn-lg">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif







                             <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="job-detail.html" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">Web Developer</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">Noida</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">Remote</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">2-3 Lacs PA</span>
                                            </p>
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="job-detail.html" class="btn btn-primary btn-lg ">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#discipline').change(function() {
                var disciplineId = $(this).val();
                var $subjectSelect = $('#subject');

                // Clear the existing options
                $subjectSelect.empty();
                $subjectSelect.append('<option disabled selected>Select Subject</option>');

                if (disciplineId) {
                    $.ajax({
                        url: '/get-subjects', // URL to your API endpoint
                        type: 'GET',
                        data: {
                            discipline_id: disciplineId
                        },
                        success: function(response) {
                            var subjects = response.subjects;
                            subjects.forEach(function(subject) {
                                $subjectSelect.append('<option value="' + subject.id +
                                    '">' + subject.name + '</option>');
                            });

                            // Update the Choices instance
                            subjectChoices.setChoices(subjects.map(subject => ({
                                value: subject.id,
                                label: subject.name,
                                selected: false,
                                disabled: false
                            })), 'value', 'label', true);
                        },
                        error: function() {
                            $subjectSelect.append(
                                '<option disabled>Error loading subjects</option>');
                        }
                    });
                }
            });
        });
    </script>
@endsection

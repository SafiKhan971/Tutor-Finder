@extends('front.layouts.tutor-layout')
@section('custom_styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@endsection
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('tutor.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">
                        @include('front.message')
                        <form action="{{ route('account.updateProfile') }}" method="post" id="userForm" name ="userForm">
                            @csrf
                            <div class="card-body  p-4">
                                <h3 class="fs-4 mb-1">Tutor Profile</h3>
                                <div class="row">

                                    {{-- Name --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="mb-2">Full Name<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Enter Name" value="{{ $tutor->name ?? '' }}">
                                            @error('name')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="mb-2">Email<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Enter Email" value="{{ $tutor->email ?? '' }}">
                                        </div>
                                        @error('email')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="mb-2">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                placeholder="Enter Phone" value="{{ $tutor->phone ?? '' }}">
                                        </div>
                                        @error('phone')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Address --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="mb-2">Address</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                placeholder="Enter Address" value="{{ $tutor->address ?? '' }}">
                                        </div>
                                        @error('address')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Gender --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="gender" class="mb-2">Gender<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="gender" id="gender">
                                                <option value="default" {{ $tutor->gender == 'default' ? 'selected' : '' }}>
                                                    Select
                                                    Gender</option>
                                                <option value="Male" {{ $tutor->gender == 'Male' ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="Female" {{ $tutor->gender == 'Female' ? 'selected' : '' }}>
                                                    Female
                                                </option>
                                                <option value="Other" {{ $tutor->gender == 'Other' ? 'selected' : '' }}>
                                                    Other
                                                </option>
                                            </select>
                                        </div>
                                        @error('gender')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{-- Qualification --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="mb-2">Qualification</label>
                                            <input type="text" name="qualification" id="qualification"
                                                class="form-control" placeholder="Enter Your Highest Qualification"
                                                value="{{ $tutor->qualification ?? '' }}">
                                        </div>
                                        @error('qualification')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Experiece --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="mb-2">Experiece (Years)</label>
                                            <input type="text" name="experiece" id="experiece" class="form-control"
                                                placeholder="Enter Experiece in Years"
                                                value="{{ $tutor->experiece ?? '' }}">
                                        </div>
                                        @error('experiece')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{-- Availability --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="mb-2">Availability</label>
                                            <select class="form-select" name="availability" id="availability">
                                                <option value="default"> Select Availability Schedule</option>
                                                <option value="24/7"
                                                    {{ $tutor->availability == '24/7' ? 'selected' : '' }}> 24/7 </option>
                                                <option value="Only Day Time (6:00AM To 6:00PM)"
                                                    {{ $tutor->availability == 'Only Day Time (6:00AM To 6:00PM)' ? 'selected' : '' }}>
                                                    Only Day Time (6:00AM To 6:00PM)
                                                </option>
                                                <option value="Only Night Time (6:00PM To 6:00AM)"
                                                    {{ $tutor->availability == 'Only Night Time (6:00PM To 6:00AM)' ? 'selected' : '' }}>
                                                    Only Night Time (6:00PM To
                                                    6:00AM)</option>
                                            </select>
                                        </div>
                                        @error('availability')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer  p-4">
                                <button type="Submit" class="btn btn-primary">Update</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow mb-4">
                        <form action="{{ route('account.updatePassword') }}" method="post" id="changePasswordForm"
                            name="changePasswordForm">
                            @csrf
                            <div class="card-body p-4">
                                <h3 class="fs-4 mb-1">Change Password</h3>
                                <div class="mb-4">
                                    <label for="old_password" class="mb-2">Old Password*</label>
                                    <input type="password" name="old_password" id="old_password"
                                        placeholder="Old Password" class="form-control">
                                    @error('old_password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="new_password" class="mb-2">New Password*</label>
                                    <input type="password" name="new_password" id="new_password"
                                        placeholder="New Password" class="form-control">
                                    @error('new_password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="confirm_password" class="mb-2">Confirm Password*</label>
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        placeholder="Confirm Password" class="form-control">
                                    @error('confirm_password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 shadow mb-4">
                        <form action="{{ route('account.update-subjects') }}" method="post">
                            @csrf
                            <div class="card-body p-4">
                                <h3 class="fs-4 mb-1">Change Subjects</h3>

                                {{-- Selected Subjects --}}
                                <div class="mb-4">
                                    <h5 class="fs-5 mb-1">Selected Subjects</h5>
                                    @foreach ($tutor_subjects as $tutor_subject)
                                    <div class="info1">
                                        <span class="badge badge-approved">
                                            {{ $tutor_subject->subject->name ?? '' }}
                                        </span>
                                    </div>
                                    @endforeach
                                </div>

                                {{-- Discipline --}}
                                <div class="mb-4">
                                    <label for="discipline_id" class="mb-2">Discipline<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="discipline_id" id="discipline">
                                        <option value="default" disabled selected> Select Discipline</option>
                                        @foreach ($disciplines as $discipline)
                                            <option value="{{ $discipline->id }}">
                                                {{ $discipline->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('confirm_password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>


                                {{-- Subjects --}}
                                <div class="mb-4">
                                    <label for="subject" class="mb-2">Subjects</label>
                                    <select id="subject" name="subjects[]" class="subjectDropdown"
                                        placeholder="Select up to 5 Subjects" multiple>
                                    </select>
                                    @error('confirm_password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <script>
        $(document).ready(function() {
            var subjectChoices = new Choices('#subject', {
                removeItemButton: true,
                maxItemCount: 5,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });

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

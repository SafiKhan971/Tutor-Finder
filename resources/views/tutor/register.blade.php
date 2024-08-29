<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@extends('front.layouts.app')
@section('custom_styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@endsection

@section('main')
    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>
            <div class="justify-content-center">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register As Tutor</h1>
                    <form action="{{ route('tutor.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- Name --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Email<span class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Enter Email" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Enter Phone" value="{{ old('name') }}">
                                </div>
                                @error('phone')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Address --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Enter Address" value="{{ old('address') }}">
                                </div>
                                @error('address')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Gender --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="gender" class="mb-2">Gender<span class="text-danger">*</span></label>
                                    <select class="form-select" name="gender" id="gender">
                                        <option value="default" {{ old('gender') == 'default' ? 'selected' : '' }}> Select
                                            Gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}> Male
                                        </option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}> Female
                                        </option>
                                        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}> Other
                                        </option>
                                    </select>
                                </div>
                                @error('gender')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Qualification --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Qualification</label>
                                    <input type="text" name="qualification" id="qualification" class="form-control"
                                        placeholder="Enter Your Highest Qualification" value="{{ old('qualification') }}">
                                </div>
                                @error('qualification')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Discipline --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="discipline_id" class="mb-2">Discipline<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="discipline_id" id="discipline">
                                        <option value="default" disabled selected> Select Discipline</option>
                                        @foreach ($disciplines as $discipline)
                                            <option value="{{ $discipline->id }}"
                                                {{ old('discipline_id') == $discipline->id ? 'selected' : '' }}>
                                                {{ $discipline->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('discipline_id')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Subjects --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="subject" class="mb-2">Subjects</label>
                                    <select id="subject" name="subjects[]" class="subjectDropdown" placeholder="Select up to 5 Subjects" multiple>
                                    </select>
                                </div>
                                @error('subject')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Experiece --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Experiece (Years)</label>
                                    <input type="text" name="experiece" id="experiece" class="form-control"
                                        placeholder="Enter Experiece in Years" value="{{ old('experiece') }}">
                                </div>
                                @error('experiece')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>


                            {{-- Availability --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Availability</label>
                                    <select class="form-select" name="availability" id="availability">
                                        <option value="default"> Select Availability Schedule</option>
                                        <option value="24/7" {{ old('availability') == '24/7' ? 'selected' : '' }}> 24/7
                                        </option>
                                        <option value="Only Day Time (6:00AM To 6:00PM)"
                                            {{ old('availability') == 'Only Day Time (6:00AM To 6:00PM)' ? 'selected' : '' }}>
                                            Only Day Time (6:00AM To 6:00PM)
                                        </option>
                                        <option value="Only Night Time (6:00PM To 6:00AM)"
                                            {{ old('availability') == 'Only Night Time (6:00PM To 6:00AM)' ? 'selected' : '' }}>
                                            Only Night Time (6:00PM To
                                            6:00AM)</option>
                                    </select>
                                </div>
                                @error('availability')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Enter Password">
                                </div>
                                @error('password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="" class="mb-2">Confirm Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        class="form-control" placeholder="Please Confirm Password">
                                </div>
                                @error('confirm_password')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary mt-2">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a href="{{ route('account.login') }}">Login</a></p>
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

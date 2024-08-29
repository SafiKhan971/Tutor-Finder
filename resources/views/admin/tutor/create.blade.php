@extends('front.layouts.admin-layout')
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Update Tutor</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">

                    @Include('admin.sidebar')



                </div>
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">

                        <div class="card-body card-form">
                            <form action="{{ route('tutor.save') }}" method="post" id="userForm"
                                name="userForm" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body  p-4">
                                    <h3 class="fs-4 mb-1">Add New Tutor</h3>
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
                                                    <option value="24/7" {{ old('availability') == '24/7' ? 'selected' : '' }}> 24/7 </option>
                                                    <option value="Only Day Time (6:00AM To 6:00PM)" {{ old('availability') == 'Only Day Time (6:00AM To 6:00PM)' ? 'selected' : '' }}> Only Day Time (6:00AM To 6:00PM)
                                                    </option>
                                                    <option value="Only Night Time (6:00PM To 6:00AM)" {{ old('availability') == 'Only Night Time (6:00PM To 6:00AM)' ? 'selected' : '' }}> Only Night Time (6:00PM To
                                                        6:00AM)</option>
                                                </select>
                                            </div>
                                            @error('availability')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Type --}}
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="mb-2">Type</label>
                                                <select class="form-select" name="type" id="type">
                                                    <option value="default"> Select Type</option>
                                                    <option value="Online"
                                                        {{ old('type') == 'Online' ? 'selected' : '' }}> Online </option>
                                                    <option value="In Site"
                                                        {{ old('type') == 'In Site' ? 'selected' : '' }}> In Site
                                                    </option>
                                                </select>
                                            </div>
                                            @error('type')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Hourly Rate --}}
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="mb-2">Hourly Rate ($)</label>
                                                <input type="number" name="hourly_rate" id="hourly_rate"
                                                    class="form-control" placeholder="Enter Hourly Rate in US Dollers"
                                                    value="{{ old('hourly_rate') }}">
                                            </div>
                                            @error('hourly_rate')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
            
            
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="mb-2">Profile Picture<span class="text-danger">*</span></label>
                                                <input type="file" name="image" id="image" class="form-control"
                                                   >
                                            </div>
                                            @error('image')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="mb-2">Password<span class="text-danger">*</span></label>
                                                <input type="password" name="password" id="password" class="form-control"
                                                    placeholder="Enter Password">
                                            </div>
                                            @error('password')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="mb-2">Confirm Password<span class="text-danger">*</span></label>
                                                <input type="password" name="confirm_password" id="confirm_password"
                                                    class="form-control" placeholder="Please Confirm Password">
                                            </div>
                                            @error('confirm_password')
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
            </div>
        </div>
    </section>
@endsection

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
                            <li class="breadcrumb-item">Create Subject</li>
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
                            <form action="{{ route('subject.store') }}" method="post" id="userForm" name="userForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body  p-4">
                                    <h3 class="fs-4 mb-1">Create</h3>
                                    <div class="row">

                                        {{-- Name --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="mb-2">Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Enter Name" value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="error-message">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Discipline --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="discipline_id" class="mb-2">Discipline<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" name="discipline_id" id="discipline_id">
                                                    <option value="default" disabled selected> Select Discipline</option>
                                                    @foreach ($disciplines as $discipline)
                                                    <option value="{{ $discipline->id }}" {{ old('discipline_id') == $discipline->id ? 'selected' : '' }}> {{ $discipline->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('discipline_id')
                                                <span class="error-message">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer  p-4">
                                    <button type="Submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

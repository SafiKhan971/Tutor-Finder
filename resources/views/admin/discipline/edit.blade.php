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
                            <li class="breadcrumb-item">Update Discipline</li>
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
                            <form action="{{ route('discipline.update', $discipline->id) }}" method="post" id="userForm"
                                name="userForm">
                                @csrf
                                <div class="card-body  p-4">
                                    <h3 class="fs-4 mb-1">Discipline Edit</h3>
                                    <div class="row">

                                        {{-- Name --}}
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="mb-2">Name<span class="text-danger">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="Enter Name" value="{{ $discipline->name }}">
                                                @error('name')
                                                    <span class="error-message">{{ $message }}</span>
                                                @enderror
                                            </div>
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



@section('customJs')
    <!--
        <script type="text/javascript">
            $("#userForm").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('account.updateProfile') }}',
                    type: 'post',
                    dataType: 'json',
                    data: $("#userForm").serializeArray(),
                    success: function(response) {
                        if (response.status == true) {
                            $("#name").removeClass("is-invalid")
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')

                            $("#email").removeClass("is-invalid")
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')

                            window.location.href = "{{ route('account.profile') }}";

                        } else {
                            var errors = response.error;

                            if (errors.name) {
                                $("#name").addClass("is-invalid")
                                    .siblings('p')
                                    .addClass('invalid-feedback')
                                    .html(errors.name)
                            } else {
                                $("#name").removeClass("is-invalid")
                                    .siblings('p')
                                    .removeClass('invalid-feedback')
                                    .html('')
                            }
                            if (errors.email) {
                                $("#email").addClass("is-invalid")
                                    .siblings('p')
                                    .addClass('invalid-feedback')
                                    .html(errors.email)
                            } else {
                                $("#email").removeClass("is-invalid")
                                    .siblings('p')
                                    .removeClass('invalid-feedback')
                                    .html('')
                            }

                        }

                    }

                });
            });
        </script> -->
@endsection

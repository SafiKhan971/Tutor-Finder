<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>TutorFind | Find the Best Tutor</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    <!-- <meta name= "csrf-token" content=" {{ csrf_token() }}  "> -->
    <meta name="csrf-token" content="{{ csrf_token() }} " />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
    @yield('custom_styles');

</head>

<body data-instant-intensity="mousedown">
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3 fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">FindTutor</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('about-us') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('tutors') }}">Tutors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('subjects') }}">Subjects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('contact') }}">
                                Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('faqs') }}">
                                FAQs</a>
                        </li>
                    </ul>

                    @if (!Auth::check())
                        <a class="btn btn-outline-primary me-2" href="{{ route('account.login') }}"
                            type="submit">Login</a>
                    @else
                        @if (Auth::user()->role == 'admin')
                            <a class="btn btn-outline-primary me-2" href="{{ route('admin.dashboard') }}"
                                type="submit">Admin</a>
                        @elseif(Auth::user()->role == 'tutor')
                            <a class="btn btn-outline-primary me-2" href="{{ route('tutor.profile') }}"
                                type="submit">My Account</a>
                        @else
                            {{-- Messages --}}
                            @php
                                $messageCount = \App\Models\Message::where('to_user', auth()->user()->id)
                                    ->where('status', 0)
                                    ->count();
                            @endphp
                            <a class="btn btn-outline-primary ms-auto position-relative"
                                href="{{ route('message.index') }}">
                                <i class="fa fa-envelope"></i>
                                @if ($messageCount > 0)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $messageCount }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                @endif
                            </a>

                            {{-- Notifications --}}
                            @php
                                $messageCount = auth()
                                    ->user()
                                    ->notifications->where('read_at', null)
                                    ->where('type', 'App\Notifications\NewBookingNotification')
                                    ->count();
                            @endphp
                            <div class="dropdown ms-3">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                    id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    @if ($messageCount > 0)
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ $messageCount }}
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    @endif
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="notificationsDropdown">
                                    @foreach (auth()->user()->notifications->where('read_at', null)->where('type', 'App\Notifications\NewBookingNotification')->take(5) as $notification)
                                        <li><a class="dropdown-item"
                                                href="{{ route('notifications.index') }}">{{ $notification->data['message'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

							{{-- My Account --}}
                            <a class="btn btn-outline-primary ms-3" href="{{ route('account.profile') }}"
                                type="submit">My Account</a>
                        @endif
                    @endif
                </div>
            </div>
        </nav>
    </header>


    @yield('main')



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profilePictureForm" name="profilePictureForm" method="post" action="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <p class="text-denger" id = "image-error"></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-3">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark py-3 bg-2">
        <div class="container">
            <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all right reserved</p>
        </div>
    </footer>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/lightbox.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>



    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#profilePictureForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);


            $.ajax({
                url: '{{ route('account.updateProfilePic') }}',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,

                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.image) {
                            $("#image-error").html(errors.image)
                        }
                    } else {
                        window.location.href = '{{ url()->current() }}'
                    }

                }


            });
        })
    </script>


    @yield('customJs')


</body>

</html>

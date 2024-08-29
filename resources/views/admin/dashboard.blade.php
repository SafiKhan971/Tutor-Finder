@extends('front.layouts.admin-layout')
@section('custom_styles')
    <style>
        .custom_row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .col-md-3 {
            flex: 0 0 calc(25% - 20px);
            max-width: calc(25% - 20px);
        }

        .custom_card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: white;
            padding: 10px 20px;
            height: 100px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .users_card{
            background: linear-gradient(135deg, #5ee7df 0%, #b490ca 100%);
        }

        .col-md-3:nth-child(2) .custom_card {
            background: linear-gradient(135deg, #5ee7df 0%, #b490ca 100%);
        }

        .col-md-3:nth-child(3) .custom_card {
            background: linear-gradient(135deg, #c3cfe2 0%, #c3cfe2 100%);
        }

        .col-md-3:nth-child(4) .custom_card {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        }

        .custom_card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .custom_card h4 {
            color: white;
            font-size: 0.8rem;
        }

        .custom_icon{
            font-size: 1.7rem;
        }

        .custom_card_title{
            font-size: 15px;
        }

        @media (max-width: 768px) {

            .custom_card h4 {
            font-size: 1.5rem;
        }

            .col-md-3 {
                flex: 0 0 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        
    </style>
@endsection
@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                        <div class="card-body">
                            <div class="row custom_row">
                                {{-- Users --}}
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('admin.users') }}">
                                        <div class="custom_card">
                                            <span class="custom_card_title"> Users</span>
                                            <div class="d-flex">
                                                <i class="fa fa-users custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $users }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- Total Tutors --}}
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('tutor.index') }}">
                                        <div class="custom_card">
                                            <span class="custom_card_title"> Tutors</span>
                                            <div class="d-flex">
                                                <i class="fa fa-user custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $total_tutors }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- Pending Tutors --}}
                                <div class="col-md-3 col-sm-6">
                                        <div class="custom_card">
                                            <span class="custom_card_title"> Pending Tutors</span>
                                            <div class="d-flex">
                                                <i class="fa fa-user custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $pending_tutors }}</span>
                                            </div>
                                        </div>
                                </div>

                                {{-- Approved Tutors --}}
                                <div class="col-md-3 col-sm-6">
                                        <div class="custom_card">
                                            <span class="custom_card_title">Approved Tutors</span>
                                            <div class="d-flex">
                                                <i class="fa fa-user custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $approved_tutors }}</span>
                                            </div>
                                        </div>
                                </div>
                                
                            </div>

                            <div class="row custom_row mt-4">

                                {{-- Not Approved Tutors --}}
                                <div class="col-md-3 col-sm-6">
                                        <div class="custom_card">
                                            <span class="custom_card_title"> Not Approved Tutors</span>
                                            <div class="d-flex">
                                                <i class="fa fa-user custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $not_approved_tutors }}</span>
                                            </div>
                                        </div>
                                </div>
                                {{-- Disciplines --}}
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('discipline.index') }}">
                                        <div class="custom_card">
                                            <span class="custom_card_title"> Disciplines</span>
                                            <div class="d-flex">
                                                <i class="fa fa-graduation-cap custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $disciplines }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- Subjects --}}
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('subject.index') }}">
                                        <div class="custom_card">
                                            <span class="custom_card_title"> Subjects</span>
                                            <div class="d-flex">
                                                <i class="fa fa-book custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $subjects }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- Bookings --}}
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('booking.index') }}">
                                        <div class="custom_card">
                                            <span class="custom_card_title"> Bookings</span>
                                            <div class="d-flex">
                                                <i class="fa fa-dollar custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $bookings }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="row custom_row mt-4">

                                {{-- Messages --}}
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('contact.index') }}">
                                        <div class="custom_card">
                                            <span class="custom_card_title"> Messages</span>
                                            <div class="d-flex">
                                                <i class="fa fa-envelope custom_icon" aria-hidden="true"></i>
                                            <span class="ms-auto">{{ $messages }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const gradients = [
    'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
    'linear-gradient(135deg, #5ee7df 0%, #b490ca 100%)',
    'linear-gradient(135deg, #c3cfe2 0%, #c3cfe2 100%)',
    'linear-gradient(135deg, #f6d365 0%, #fda085 100%)',
    'linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%)',
    'linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%)',
    'linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%)',
    'linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%)'
];

document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.custom_card');
    cards.forEach(card => {
        const randomGradient = gradients[Math.floor(Math.random() * gradients.length)];
        card.style.background = randomGradient;
    });
});

    </script>
@endsection

@extends('front.layouts.tutor-layout')
@section('main')

    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Bookings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('tutor.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')
                    <div class="card border-0 shadow mb-4">

                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">Bookings</h3>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">S No.</th>
                                            <th scope="col">Student Name</th>
                                            <th scope="col">Student Email</th>
                                            <th scope="col">Student Phone</th>
                                            <th scope="col">Student Address</th>
                                            <th scope="col">Class Date</th>
                                            <th scope="col">Class Time</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">

                                        @if ($bookings->isNotEmpty())
                                            @foreach ($bookings as $index => $booking)
                                                <tr class="active">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <div class="info1">{{ $booking->student->name ?? '' }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="info1">{{ $booking->student->email ?? '' }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="info1">{{ $booking->student->phone ?? '' }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="info1">{{ $booking->student->address ?? '' }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="info1">{{ $booking->date }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="info1">{{ $booking->time }}</div>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $now = now(); 
                                                            $bookingDateTime = \Carbon\Carbon::parse($booking->date . ' ' . $booking->time); // Create a Carbon instance
                                                            @endphp
                                                    
                                                        @if($now->greaterThanOrEqualTo($bookingDateTime))
                                                        <div class="info1"><span class="badge badge-rejected">Expired</span></div>
                                                        @else
                                                        <div class="info1"><span class="badge badge-pending">Pending</span></div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>

                            <div>
                                {{ $bookings->links() }}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('customJs')
    <script type="text/javascript">
        function deleteUser(id) {
            if (confirm("Are you sure you want to delete!")) {
                $.ajax({
                    url: '{{ route('admin.users.destroy') }}',
                    type: 'delete',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = "{{ route('tutor.index') }}";

                    }
                });

            }

        }
    </script>
@endsection

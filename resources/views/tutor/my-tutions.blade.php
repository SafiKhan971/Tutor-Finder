@extends('front.layouts.tutor-layout')
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
                    @include('front.message')
                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">My Tutions</h3>
                                </div>
                                {{-- <div style="margin-top: -10px;">
                                <a href="{{route('tution.create')}}" class="btn btn-primary">Post a Job</a>
                            </div> --}}

                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Tutor</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Start Time</th>
                                            <th scope="col">End Time</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        @if ($tutions->isNotEmpty())
                                            @foreach ($tutions as $tution)
                                                <tr class="active">
                                                    <td> {{ $tution->title }} </td>
                                                    <td> {{ $tution->student->name ?? '' }} </td>
                                                    <td> {{ $tution->subject->name ?? '' }} </td>
                                                    <td> {{ \Carbon\Carbon::parse($tution->start_time)->format('h:i A') }}
                                                    </td>
                                                    <td> {{ \Carbon\Carbon::parse($tution->end_time)->format('h:i A') }}
                                                    </td>

                                                    <td>
                                                        @if ($tution->status == 1)
                                                            <div class="job-status text-capitalize">Active</div>
                                                        @else
                                                            <div class="job-status text-capitalize">Expired</div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div>
                                {{ $tutions->links() }}

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
        function deleteTution(tutionId) {
            if (confirm("Are you sure that you want to delete?")) {

                $.ajax({
                    url: '{{ route('account.deleteTution') }}',
                    type: 'post',
                    data: {
                        tutionId: tutionId
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = '{{ route('account.myTution') }}';
                    }
                });

            } else {

            }
        }
    </script>
@endsection

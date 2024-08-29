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
                            <li class="breadcrumb-item active">Notifications</li>
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
                                    <h3 class="fs-4 mb-1">Notifications</h3>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">S No.</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Student Name</th>
                                            <th scope="col">Student Email</th>
                                            <th scope="col">Date/Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">


                                        @foreach ($notifications as $index => $notification)
                                            <tr class="active">
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <div class="info1">{{ $notification->data['message'] ?? '' }}</div>
                                                </td>
                                                <td>
                                                    <div class="info1">{{ $notification->data['user_name'] ?? '' }}</div>
                                                </td>
                                                <td>
                                                    <div class="info1">{{ $notification->data['user_email'] ?? '' }}</div>
                                                </td>
                                                <td>
                                                    <div class="info1">{{ $notification->created_at ?? '' }}</div>
                                                </td>
                                                <td>
                                                    <div class="action-dots ">
                                                        <button href="#" class="btn" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('notifications.read', $notification->id) }}">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    Mark As Read</a></li>
                                                            
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

                            <div>
                                {{ $notifications->links() }}

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

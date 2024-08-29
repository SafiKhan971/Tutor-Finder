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
                            <li class="breadcrumb-item active">Messages</li>
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
                                    <h3 class="fs-4 mb-1">Messages</h3>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">S No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        @foreach ($senders as $index => $sender)
                                            <tr class="active">
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <a href="{{ route('message.show', $sender->id) }}">
                                                        <div class="info1">{{ $sender->name ?? '' }}</div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="info1">{{ $sender->email ?? '' }}</div>
                                                </td>

                                                <td>
                                                    <div class="action-dots ">
                                                        <button href="#" class="btn" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="{{ route('message.read', $sender->id) }}">
                                                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                                                    Mark As Read</a></li>
                                                            <li><a class="dropdown-item" href="{{ route('message.destroy', $sender->id) }}">
                                                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                                                    Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>


                                            {{-- Send Message Modal --}}
                                            {{-- <div class="modal fade" id="sendMessage" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title pb-0" id="exampleModalLabel">Send Message
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>


                                                        <div class="modal-body">
                                                            <form method="post" action="{{ route('message.reply') }}">
                                                                @csrf
                                                                <input type="hidden" name="student_id"
                                                                    value="{{ $notification->data['user_id'] }}">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1"
                                                                        class="form-label">Message</label>
                                                                    <textarea class="form-control" name="message" id="message" style="height: 10rem;" placeholder="Write Here ..."
                                                                        required></textarea>
                                                                    @error('message')
                                                                        <span class="error-message">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary mx-3">Send</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

                            <div>
                                {{ $senders->links() }}

                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('front.layouts.admin-layout')
@section('main')

    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Messages</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')
                    <div class="card border-0 shadow mb-4">

                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">Contact Messages</h3>
                                </div>
                                <div style="margin-top: -10px;">
                                    <a href="{{ route('contact.delete-all') }}" class="btn btn-primary">Delete All</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">S No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">contact</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                            @foreach ($contacts as $index => $contact)
                                                <tr class="active">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <div class="job-name fw-500">{{ $contact->name }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="job-name fw-500">{{ $contact->email }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="job-name fw-500">{{ $contact->message }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="action-dots ">
                                                            
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="{{ route('contact.destroy', $contact->id) }}"
                                                                        ><i
                                                                            class="fa fa-trash" aria-hidden="true"></i>
                                                                        Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div>
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

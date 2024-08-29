@extends('front.layouts.app')
@section('main')

    <section class="section-4 bg-2">
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href=""><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i> &nbsp;Back to Tutions</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container job_details_area">
            <div class="row pb-5">
                <div class="col-md-8">

                    <!-- session message  -->

                    @include('front.message')
                    <div class="card shadow border-0">
                        <div class="job_details_header">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">

                                    <div class="jobs_conetent">
                                        <a href="#">
                                            <h4>title</h4>
                                        </a>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="descript_wrap white-bg">
                            <div class="single_wrap">
                                <h4>Job description</h4>
                                <p>this is test description.</p>
                                {{-- {!!nl2br($tution->description) !!} --}}
                                <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p>
                                <p>Variations of passages of lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p> -->
                            </div>
                            {{-- @if (!is_null($tution->qualifications)) --}}
                            <div class="single_wrap">
                                <h4>Responsibility</h4>
                                <ul>
                                    <p>responsibility</p>
                                    {{-- {!!nl2br($tution->responsibility) !!} --}}
                                    <!-- <li>The applicants should have experience in the following areas.</li>
                                    <li>Have sound knowledge of commercial activities.</li>
                                    <li>Leadership, analytical, and problem-solving abilities.</li>
                                    <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li> -->
                                </ul>
                            </div>
                            {{-- @endif --}}

                            {{-- @if (!is_null($tution->qualifications)) --}}
                            <div class="single_wrap">
                                <h4>Qualifications</h4>
                                <ul>
                                    <p>qualification</p>
                                    {{-- {!! nl2br($tution->qualifications) !!} --}}
                                    <!-- <li>The applicants should have experience in the following areas.</li>
                                    <li>Have sound knowledge of commercial activities.</li>
                                    <li>Leadership, analytical, and problem-solving abilities.</li>
                                    <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li> -->
                                </ul>
                            </div>
                            {{-- @endif --}}

                            {{-- @if (!is_null($tution->benefits)) --}}
                            <div class="single_wrap">
                                <h4>Benefits</h4>
                                <ul>benefits</ul>
                                {{-- <ul>{!! nl2br($tution->benefits) !!}</ul> --}}
                                <!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p> -->
                            </div>
                            {{-- @endif --}}


                            <div class="border-bottom"></div>
                            <div class="pt-3 text-end">
                                <!-- <a href="#" class="btn btn-secondary">Save</a> -->

                                @if (Auth::check())
                                    <a href="#" onClick="saveTution()" class="btn btn-primary">Save</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-primary disabled">Login to Apply</a>
                                @endif





                                @if (Auth::check())
                                    <a href="#" onClick="applyTution()" class="btn btn-primary">Apply</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-primary disabled">Login to Apply</a>
                                @endif
                            </div>
                        </div>
                    </div>



                    {{-- @if (Auth::user()) --}}
                        {{-- @if (Auth::user()->id == $tution->user_id) --}}
                            <div class="card shadow border-0 mt-4">
                                <div class="job_details_header">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
                                        <div class="jobs_left d-flex align-items-center">

                                            <div class="jobs_conetent">

                                                <h4>Applicants </h4>

                                            </div>
                                        </div>
                                        <div class="jobs_right">

                                        </div>
                                    </div>
                                </div>
                                <div class="descript_wrap white-bg">

                                    <table class="table table-striped">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Applied Date </th>
                                        </tr>

                                        {{-- @if ($applicants->isNotEmpty())
                                            @foreach ($applicants as $applicant)
                                                <tr>
                                                    <td>{{ optional($applicant->user)->name }}</td>
                                                    <td><a href="#">{{ optional($applicant->user)->email }}</a></td>
                                                    <td><a href="#">{{ optional($applicant->user)->mobile }}</a></td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($applicant->applied_date)->format('d M, Y') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif --}}




                                    </table>






                                </div>
                            </div>


                        {{-- @endif --}}
                    {{-- @endif --}}










                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Tution Summery</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Published on:
                                        <span>12-03-2023</span></li>
                                    <li>Subject: <span> ssdf </span></li>
                                    <li>Class: <span> sdasda </span></li>

                                    <li>Students : <span>sdsa</span></li>
                                    <!-- <li>Salary: <span></span></li> -->
                                    {{-- @if (!is_null($tution->salary))
                                        <li>Salary: <span>{{ $tution->salary }}</span></li>
                                    @else
                                        <li>Salary: <span>After Discussion</span></li>
                                    @endif --}}
                                    <li>Location: <span>location</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow border-0 my-4">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Gurdian Details</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Name: <span>Safi</span></li>
                                    {{-- @if (!is_null($tution->salary))
                                        <li>Locaion: <span>{{ $tution->gurdian_location }}</span></li>
                                    @endif --}}

                                    {{-- <li>Contact : <span><a href="#">{{ $tution->gurdian_number }}</a></span></li> --}}
                                </ul>
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
        function applyTution(id) {
            // alert(id);
            if (confirm("Are you sure want to apply!")) {
                $.ajax({
                    url: '{{ route('applyTution') }}',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.reload(); // Added parentheses after reload
                    }
                });
            }
        }

        function saveTution(id) {

            $.ajax({
                url: '{{ route('saveTution') }}',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    window.location.reload(); // Added parentheses after reload
                }
            });

        }
    </script>
@endsection

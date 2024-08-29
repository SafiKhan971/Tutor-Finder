@extends('front.layouts.app')
@section('main')

<section class="section-3 py-5 bg-2 mt-5">
    <div class="container">     
        <div class="row">
            <div class="col-6 col-md-10 ">
                <h2>Best Tuters</h2>  
            </div>
            <div class="col-6 col-md-2">
                <div class="align-end">
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Latest</option>
                        <option value="">Oldest</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            {{-- <div class="col-md-4 col-lg-3 sidebar mb-4">
                <div class="card border-0 shadow p-4">
                    <div class="mb-4">
                        <h2>Keywords</h2>
                        <input type="text" placeholder="Keywords" class="form-control">
                    </div>

                    <div class="mb-4">
                        <h2>Location</h2>
                        <input type="text" placeholder="Location" class="form-control">
                    </div>

                    <div class="mb-4">
                        <h2>Class </h2>
                            <select name="category" id="category" class="form-control">

                            <option value="">Select a Class</option>

                                @if($classTypes->isNotEmpty())
                                @foreach($classTypes as $classType)


                                <option value="">{{$classType->name}}</option>




                                @endforeach



                                @endif




                            <!-- <option value="">Select a Category</option>
                            <option value="">Engineering</option>
                            <option value="">Accountant</option>
                            <option value="">Information Technology</option>
                            <option value="">Fashion designing</option> -->
                        </select>
                    </div>                   

                    <div class="mb-4">
                        <h2>Subject Types</h2>

                        @if($categories->isNotEmpty())
                            @foreach($categories as $categorie)
                            <div class="form-check mb-2"> 
                                <input class="form-check-input " name="job_type" type="checkbox" value="{{$categorie->id}}" id="class-type-{{$categorie->id}}">    
                                <label class="form-check-label " for="class-type-{{$categorie->id}}">{{$categorie->name}}</label>
                            </div>

                            @endforeach
                        @endif


                        <!-- <div class="form-check mb-2"> 
                            <input class="form-check-input " name="job_type" type="checkbox" value="1" id="">    
                            <label class="form-check-label " for="">Full Time</label>
                        </div> -->

                        <!-- <div class="form-check mb-2"> 
                            <input class="form-check-input school-section" name="job_type" type="checkbox" value="1" id="">    
                            <label class="form-check-label " for="">Part Time</label>
                        </div>

                        <div class="form-check mb-2"> 
                            <input class="form-check-input school-section" name="job_type" type="checkbox" value="1" id="">    
                            <label class="form-check-label " for="">Freelance</label>
                        </div>

                        <div class="form-check mb-2"> 
                            <input class="form-check-input school-section" name="job_type" type="checkbox" value="1" id="">    
                            <label class="form-check-label " for="">Remote</label>
                        </div> -->
                    </div>

                    <div class="mb-4">
                        <h2>Experience</h2>
                        <select name="category" id="category" class="form-control">
                            <option value="">Select Experience</option>
                            <option value="">1 Year</option>
                            <option value="">2 Years</option>
                            <option value="">3 Years</option>
                            <option value="">4 Years</option>
                            <option value="">5 Years</option>
                            <option value="">6 Years</option>
                            <option value="">7 Years</option>
                            <option value="">8 Years</option>
                            <option value="">9 Years</option>
                            <option value="">10 Years</option>
                            <option value="">10+ Years</option>
                        </select>
                    </div>                    
                </div>
            </div> --}}
            <div class="col-md-12 col-lg-12 ">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                    <div class="row">
                        @if ($tutors->isNotEmpty())
                                @foreach ($tutors as $tutor)
                                    <div class="col-md-3">
                                        <div class="card border-0 p-3 shadow mb-4">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    @if ($tutor->image != '')
                                                        <img src="{{ asset('profile_pic/' . $tutor->image) }}"
                                                            alt="avatar" class="rounded-circle img-fluid"
                                                            style="width: 150px;">
                                                    @else
                                                        <img src="{{ asset('/assets/images/avatar7.png') }}" alt="avatar"
                                                            class="rounded-circle img-fluid" style="width: 150px;">
                                                    @endif

                                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $tutor->name }}</h3>
                                                    <p><strong>Subjects :</strong> {{ Str::words($tutor->subjects, 7) }}</p>

                                                    <!-- Display Rating -->
                                                    <div class="rating">
                                                        @php
                                                            $rating = $tutor->rating ?? 1; // Default rating is 1 if not available
                                                        @endphp
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $rating)
                                                                <i class="fa fa-star text-warning"></i>
                                                            @else
                                                                <i class="fa fa-star-o text-warning"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>

                                                {{-- <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $tutor->address }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-users"></i></span>
                                                    <span class="ps-1">{{ $tutor->gender }}</span>
                                                </p>
                                
                                                @if (!is_null($tutor->fee))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $tutor->fee }}</span>
                                                    </p>
                                                @endif
                                            </div> --}}

                                                <div class="d-grid mt-3">
                                                    <a href="{{ route('tutor.show', $tutor->id) }}"
                                                        class="btn btn-primary btn-lg">Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif                   
                       </div>
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

    $("#userForm").submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '{{route('account.updateProfile')}}',
            type:'post',
            dataType: 'json',
            data: $("#userForm").serializeArray(),
            success: function(response)
            {
                if(response.status==true)
                {
                    $("#name").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                        $("#email").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    window.location.href= "{{ route ('account.profile')}}";

                }
                else{
                    var errors = response.error;

                    if(errors.name)
                    {
                        $("#name").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.name)
                    }else{
                        $("#name").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.email)
                    {
                        $("#email").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.email)
                    }else{
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
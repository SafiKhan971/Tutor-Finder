@extends('front.layouts.app')

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
                    
            @Include('front.account.sidebar')



            </div>
            <div class="col-lg-9">

            <form action="{{route('account.saveTution')}}" method ="Post" id="createJobForm" name="createJobForm" >
            @csrf
            <div class="card border-0 shadow mb-4 ">
                  
            
                  <div class="card-body card-form p-4">
                              <h3 class="fs-4 mb-1">Tution Details</h3>
                              <div class="row">
                                  <div class="col-md-6 mb-4">
                                      <label for="" class="mb-2">Title<span class="req">*</span></label>
                                      <input type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                                    <p></p>
                                    </div>
                                  <div class="col-md-6  mb-4">
                                      <label for="" class="mb-2">Category<span class="req">*</span></label>
                                      <select name="category" id="category" class="form-control">
                                          
                                      @if($categories->isNotEmpty())
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach


                                      
                                      

                                      @endif
                                      <!-- <option value="">Select a Category</option>
                                          <option value="">Engineering</option>
                                          <option value="">Accountant</option>
                                          <option value="">Information Technology</option>
                                          <option value="">Fashion designing</option> -->
                                      </select>
                                      <p></p>
                                  </div>
                              </div>
                              
                              <div class="row">
                                  <div class="col-md-6 mb-4">
                                      <label for="" class="mb-2">Class Of Student<span class="req">*</span></label>
                                      <select name="jobType" id="jobType" class="form-select">
                                      @if($jobTypes->isNotEmpty())
                                                @foreach($jobTypes as $jobType)
                                                <option value="{{$jobType->id}}">{{$jobType->name}}</option>
                                                @endforeach


                                      
                                      

                                      @endif
                                          <!-- <option>Full Time</option>
                                          <option>Part Time</option>
                                          <option>Remote</option>
                                          <option>Freelance</option> -->
                                      </select>
                                      <p></p>
                                  </div>
                                  <div class="col-md-6  mb-4">
                                      <label for="" class="mb-2">Number of Student<span class="req">*</span></label>
                                      <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                 <p></p>
                                    </div>
                              </div>
      
                              <div class="row">
                                  <div class="mb-4 col-md-6">
                                      <label for="" class="mb-2">Salary</label>
                                      <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                                 
                                    </div>
      
                                  <div class="mb-4 col-md-6">
                                      <label for="" class="mb-2">Location<span class="req">*</span></label>
                                      <input type="text" placeholder="Location" id="location" name="location" class="form-control">
                                  
                                  <p></p> 
                                 </div>
                              </div>
      
                              <div class="mb-4">
                                  <label for="" class="mb-2">Description<span class="req">*</span></label>
                                  <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                              </div>
                              <div class="mb-4">
                                  <label for="" class="mb-2">Benefits</label>
                                  <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                              </div>
                              <div class="mb-4">
                                  <label for="" class="mb-2">Responsibility</label>
                                  <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                              </div>
                              <div class="mb-4">
                                  <label for="" class="mb-2">Qualifications</label>
                                  <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                              </div>
                              
                              
      
                              <!-- <div class="mb-4">
                                  <label for="" class="mb-2">Experience<span class="req">*</span></label>
                                  <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                              </div> -->
                              
                              <div class="mb-4">
                                  <label for="" class="mb-2">Experience<span class="req">*</span></label>
                                  
                                  <select name="experience" id="experience" class="form-control">
                                    <option value="1">1 Years</option>
                                    <option value="2">2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="4">4 Years</option>
                                    <option value="5">5 Years</option>
                                    <option value="5_plus">5+ Years</option>
                                 
                                </select>
                                <p></p>
                              </div>


      
                              <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Gurdian Details</h3>
      
                              <div class="row">
                                  <div class="mb-4 col-md-6">
                                      <label for="" class="mb-2">Name<span class="req">*</span></label>
                                    
                                      <input type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                                  <p></p>
                                    </div>

      
                                  <div class="mb-4 col-md-6">
                                      <label for="" class="mb-2">Location</label>
                                      <input type="text" placeholder="gurdian_location" id="gurdian_location" name="gurdian_location" class="form-control">
                                 <p></p>
                                    </div>
                                  
                              </div>
      
                              <div class="mb-4">
                                  <label for="" class="mb-2">Contact Number</label>
                                  <input type="text" placeholder="contactnumber" id="contactnumber" name="contactnumber" class="form-control">
                              <p></p>
                                </div>
                          </div> 
                          <div class="card-footer  p-4">
                              <button type="Submit" class="btn btn-primary">Save Tution</button>
                          </div>               
                  </div>
      


            </form>
            
                           
            </div>
        </div>
    </div>
</section>



@endsection



@section('customJs')

<!-- <script type="text/javascript">

    $("#createJobForm").submit(function(e){
        e.preventDefault();
        // console.log($("#createJobForm").serializeArray());
        // return false;

        $.ajax({
            url: '{{ route("account.saveTution") }}',

            type:'POST',
            dataType: 'json',
            data: $("#createJobForm").serializeArray(),
            success: function(response)
            {
                if(response.status==true)
                {
                        $("#title").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                        $("#category").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                        $("#jobType").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                        $("#vacancy").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                        $("#location").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                        $("#description").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                        $("#company_name").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                        $("#contactnumber").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')


                    window.location.href= "{{ route ('account.saveTution')}}";

                }
                else{
                    var errors = response.error;

                    if(errors.title)
                    {
                        $("#title").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.title)
                    }else{
                        $("#title").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.category)
                    {
                        $("#category").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.category)
                    }else{
                        $("#category").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.jobType)
                    {
                        $("#jobType").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.jobType)
                    }else{
                        $("#jobType").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.vacancy)
                    {
                        $("#vacancy").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.vacancy)
                    }else{
                        $("#vacancy").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.location)
                    {
                        $("#loction").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.location)
                    }else{
                        $("#location").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.description)
                    {
                        $("#description").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.description)
                    }else{
                        $("#description").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.company_name)
                    {
                        $("#company_name").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.company_name)
                    }else{
                        $("#company_name").removeClass("is-invalid")
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.contactnumber)
                    {
                        $("#contactnumber").addClass("is-invalid")
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.contactnumber)
                    }else{
                        $("#contactnumber").removeClass("is-invalid")
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
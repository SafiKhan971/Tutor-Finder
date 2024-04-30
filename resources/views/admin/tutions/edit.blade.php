@extends('front.layouts.app')
@section('main')

<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tutions</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.sidebar')
            </div>

            <div class="col-lg-9">

<form action="{{ route("admin.tutions.update",$tution->id) }}" method ="Post" id="editTutionForm" name="editTutionForm" >
@csrf
<div class="card border-0 shadow mb-4 ">
      

      <div class="card-body card-form p-4">
                  <h3 class="fs-4 mb-1">Edit Tution </h3>
                  <div class="row">
                      <div class="col-md-6 mb-4">
                          <label for="" class="mb-2">Title<span class="req">*</span></label>
                          <input type="text" placeholder="Job Title" id="title" name="title" class="form-control" value="{{ $tution->title}}">
                        <p></p>
                        </div>
                      <div class="col-md-6  mb-4">
                          <label for="" class="mb-2">Category<span class="req">*</span></label>
                          <select name="category" id="category" class="form-control">
                              
                          @if($categories->isNotEmpty())
                                    @foreach($categories as $category)
                                    <option {{($tution->category_id==$category->id)?'selected':' '}} value="{{$category->id}}">{{$category->name}}</option>
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
                                    <option {{($tution->category_id==$category->id)?'selected':' '}} value="{{$jobType->id}}">{{$jobType->name}}</option>
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
                          <input value="{{ $tution-> no_of_stu}}" type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                     <p></p>
                        </div>
                  </div>

                  <div class="row">
                      <div class="mb-4 col-md-6">
                          <label for="" class="mb-2">Salary</label>
                          <input value="{{ $tution->salary}}" type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                     
                        </div>

                      <div class="mb-4 col-md-6">
                          <label for="" class="mb-2">Location<span class="req">*</span></label>
                          <input value="{{$tution->location}}" type="text" placeholder="Location" id="location" name="location" class="form-control">
                      
                      <p></p> 
                     </div>
                  </div>

                  <div class="mb-4">
                      <label for="" class="mb-2">Description<span class="req">*</span></label>
                      <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description">{{$tution->description}}</textarea>
                  </div>
                  <div class="mb-4">
                      <label for="" class="mb-2">Benefits</label>
                      <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{$tution->benefits}}</textarea>
                  </div>
                  <div class="mb-4">
                      <label for="" class="mb-2">Responsibility</label>
                      <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility">{{$tution->responsibility}}</textarea>
                  </div>
                  <div class="mb-4">
                      <label for="" class="mb-2">Qualifications</label>
                      <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications">{{$tution->qualifications}}</textarea>
                  </div>
                  
                  

                  <!-- <div class="mb-4">
                      <label for="" class="mb-2">Experience<span class="req">*</span></label>
                      <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                  </div> -->
                  
                  <div class="mb-4">
                      <label for="" class="mb-2">Experience<span class="req">*</span></label>
                      
                      <select name="experience" id="experience" class="form-control">
                        <option value="1" {{($tution->experience==1)? 'selected':''}}>1 Years</option>
                        <option value="2" {{($tution->experience==2)? 'selected':''}}>2 Years</option>
                        <option value="3" {{($tution->experience==3)? 'selected':''}}>3 Years</option>
                        <option value="4" {{($tution->experience==4)? 'selected':''}}>4 Years</option>
                        <option value="5" {{($tution->experience==5)? 'selected':''}}>5 Years</option>
                        <option value="5_plus" {{($tution->experience=="5_plus")? 'selected':''}}>5+ Years</option>
                     
                    </select>
                    <p></p>
                  </div>



                  <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Gurdian Details</h3>

                  <div class="row">
                      <div class="mb-4 col-md-6">
                          <label for="" class="mb-2">Name<span class="req">*</span></label>
                        
                          <input value="{{$tution->gurdian_name}}" type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                      <p></p>
                        </div>


                      <div class="mb-4 col-md-6">
                          <label for="" class="mb-2">Location</label>
                          <input value="{{$tution->gurdian_location}}" type="text" placeholder="gurdian_location" id="gurdian_location" name="gurdian_location" class="form-control">
                     <p></p>
                        </div>
                      
                  </div>

                  <div class="mb-4">
                      <label for="" class="mb-2">Contact Number</label>
                      <input value="{{$tution->gurdian_number}}" type="text" placeholder="contactnumber" id="contactnumber" name="contactnumber" class="form-control">
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

<script type="text/javascript">

function deleteUser(id){
    if (confirm("Are you sure you want to delete!")) {
        $.ajax({
        url: '{{route("admin.users.destroy")}}',
        type: 'delete',
        data: {id: id},
        dataType: 'json',
        success: function (response) {
            window.location.href="{{route('admin.users')}}";
        }
    });
    }
}
</script>

@endsection

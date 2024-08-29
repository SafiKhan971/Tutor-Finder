<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@extends('front.layouts.app')

@section('main')


<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register As Student</h1>
                    <form action="{{ route('account.processregistration')}}" name="registrationForm" id="registrationForm" method="post" >
                    
                    @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                        <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                      <p></p> 
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Please Confirm Password">
                       <p></p>
                        </div> 
                        <button type="submit" class="btn btn-primary mt-2">Register</button>
                        <a href="{{ route('tutor.register') }}" class="float-end mt-3">Register As Tutor</a>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a  href="{{ route('account.login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
<script>
// $(document).ready(function() {
//     $("#registrationForm").submit(function(e) {
//         e.preventDefault(); 

//         $.ajax({
            // url: '{{ route("account.registration")}}',
//             type: 'post',
//             data: $(this).serializeArray(), 
//             dataType: 'json',
//             success: function(response) {
//                 if(response.status == false) {
//                     displayErrors(response.errors);
//                 } else {
//                     clearErrors();
//                     window.location.href = '{{ route("account.login")}}';
//                 }
//             }
//         });
//     });

//     function displayErrors(errors) {
//         $.each(errors, function(key, value) {
//             $("#" + key)
//                 .addClass('is-invalid')
//                 .siblings('p')
//                 .addClass('invalid-feedback')
//                 .html(value);
//         });
//     }

//     function clearErrors() {
//         $("#name, #email, #password, #confirm_password")
//             .removeClass('is-invalid')
//             .siblings('p')
//             .removeClass('invalid-feedback')
//             .html("");
//     }
// });
// 
</script>

@endsection
@extends('layouts.frontend')

@section('content')
<section class="" style="background-color: #2779e2;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <br>
        <h1 class="text-white text-center mb-5 mt-4">Student Registeration Form</h1>
        <form method="POST" action="{{ route('frontend.register-form') }}">
        @csrf
          <div class="card overflow-auto" style="border-radius: 15px;">
            <div class="card-body">

              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">

                  <h6 class="mb-0">Name of Child</h6>

                </div>
                <div class="col-md-9 pe-5">

                  <input type="text" class="form-control form-control-lg" name="name" required />

                </div>
              </div>

              <hr class="mx-n3">

              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">

                  <h6 class="mb-0">Birthday</h6>

                </div>
                <div class="col-md-9 pe-5">

                  <!-- <input type="text" class="form-control form-control-lg" name="dob" /> -->
                  <!-- <input type="text" id="datepicker" class="form-control form-control-lg"> -->
                  <!-- <input class="date form-control" type="text"> -->
                  <input class="date form-control" type="text" name="dob" required> 

                </div>
              </div>

              <hr class="mx-n3">

              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">

                  <h6 class="mb-0">LRN or Student ID</h6>

                </div>
                <div class="col-md-9 pe-5">

                  <input type="text" class="form-control form-control-lg" name="std_id" required/>

                </div>
              </div>

              <hr class="mx-n3">

              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">

                  <h6 class="mb-0">Parent Name</h6>

                </div>
                <div class="col-md-9 pe-5">

                  <input type="text" class="form-control form-control-lg" name="parent_name" required/>

                </div>
              </div>

              <hr class="mx-n3">

              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">

                  <h6 class="mb-0">Parent Contact</h6>

                </div>
                <div class="col-md-9 pe-5">

                  <input type="text" class="form-control form-control-lg" name="parent_contact" required/>

                </div>
              </div>

              <hr class="mx-n3">

              <div class="row align-items-center py-3">
                <div class="col-md-3 ps-5">

                  <h6 class="mb-0">Parent Email address</h6>

                </div>
                <div class="col-md-9 pe-5">

                  <input type="email" class="form-control form-control-lg" placeholder="example@example.com" name="parent_email" required/>

                </div>
              </div>

              <hr class="mx-n3">

              <div class="row align-items-center pt-4 pb-3">
                <div class="col-md-3 ps-5">

                  <h6 class="mb-0">Parent Relationship</h6>

                </div>
                <div class="col-md-9 pe-5">

                  <input type="text" class="form-control form-control-lg" name="parent_relationship" required/>

                </div>
              </div>

              <hr class="mx-n3">

              <div class="text-center py-4">
                <button type="submit" class="btn btn-primary btn-lg">Send application</button>
              </div>

            </div>
          </div>
        </form>

      </div>
    </div>
  </div><br><br>
</section>

<!-- <script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  
</script>   -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript">
    $('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  
</script>   
@endsection
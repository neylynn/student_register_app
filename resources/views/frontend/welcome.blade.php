@extends('layouts.frontend')

@section('content')
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-center mb-5">Welcome to Student Registeration Platform!</h2>
              <div class="text-center py-4">
                <button type="button" class="btn btn-primary btn-lg" onclick=" register()">Register Now</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
function register()
{
     location.href = "/register-form";
} 
</script>
@endsection
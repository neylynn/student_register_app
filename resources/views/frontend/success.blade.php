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
              <h2 class="text-center mb-5">Congratulations!</h2>
              <p>
                You have successfully registered at this school. <br>We will send an approval letter via your registered email address.</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script> 
    setTimeout(function(){window.location='/'}, 5000); 
</script>
@endsection
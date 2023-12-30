@extends('layouts.auth')


@section('title')
{{$title}}
@endsection

@section('content')
<!-- Section: Design Block -->
<section class="vh-100 background-radial-gradient d-flex flex-column justify-content-center overflow-hidden">
  <div class="container px-md-5 text-center text-lg-start ">
    <div class="row gx-lg-5 align-items-center">

     <x-auth-content class="col-lg-6 d-lg-block d-none" />

      <div class="col-lg-6 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="form3Example1">First name</label>
                    <input type="text" id="form3Example1" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="form3Example2">Last name</label>
                    <input type="text" id="form3Example2" class="form-control" />
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" id="form3Example3" class="form-control" />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="form3Example4" class="form-control" />
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                  Subscribe to our newsletter
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary w-100 d-block">
                Sign up
              </button>
              
              <div class="text-center mt-4">
                <p>Already have an account? <a href="{{route('blog.auth.signin')}}">Sign In</a></p>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
@endsection
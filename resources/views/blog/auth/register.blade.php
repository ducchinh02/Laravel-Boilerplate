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
            <form action="/blog/auth/register" method="POST">
              @method('POST')
              @csrf
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="name">Your name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" />
                    @error('name')
                    <p class="text-danger">*{{$message}}</p>
                    @enderror
                  </div>
                </div>
              <!-- Email input -->
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" />
                  @error('email')
                    <p class="text-danger">*{{$message}}</p>
                  @enderror
                  </div>
                </div>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}" />
                @error('password')
                  <p class="text-danger">*{{$message}}</p>
                @enderror
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
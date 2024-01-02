@extends('layouts.auth')


@section('title')
{{$title}}
@endsection

@section('content')
<!-- Section: Design Block -->
<section class="vh-100 background-radial-gradient d-flex flex-column justify-content-center overflow-hidden">

  <div class="container px-md-5 text-center text-lg-start ">
    <div class="row gx-lg-5 align-items-center justify-content-evenly">
      
     <x-auth.content class="col-lg-6 d-lg-block d-none" />

      <div class="col-lg-4  position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            @if(Session::has('error'))
              <div class="alert alert-danger">
                {{ Session::get('error')}}
              </div>
            @endif
            <form action="/blog/auth/signin" method="POST">
              @method('POST')
              @csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" value="{{old('email')}}" name="email" class="form-control" />
                @error('email')
                <p class="text-danger">*{{$message}}</p>
                @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" value="{{old('password')}}" name="password" class="form-control" />
                @error('password')
                <p class="text-danger">*{{$message}}</p>
                @enderror
              </div>

              <div class="text-center">
                <p>Not a member? <a href="{{route('blog.auth.register')}}">Register</a></p>
              </div>


              <!-- Submit button -->
              <button type="submit" class="btn btn-primary w-100 d-block">
                Sign in
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
@endsection
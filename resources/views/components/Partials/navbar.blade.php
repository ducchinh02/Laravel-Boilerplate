<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
  <div class="container px-4 px-lg-5">
      <a class="navbar-brand fw-bold" href="{{route('blog.home')}}">Laravel blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav d-flex align-items-center ms-auto py-4 py-lg-0 gap-3">
              <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('blog.home')}}">Home</a></li>
              <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('blog.about')}}">About</a></li>
              <li class="nav-item"><a class="bg-dark nav-link text-white px-3 py-2"  href="{{route('blog.auth.signin')}}">Sign In</a></li>
              <li class="nav-item"><a class="bg-dark nav-link text-white px-3 py-2"  href="{{route('blog.auth.register')}}">Register</a></li>
          </ul>
      </div>
  </div>
</nav>
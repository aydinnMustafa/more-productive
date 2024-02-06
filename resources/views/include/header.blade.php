<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top">
    <a class="navbar-brand" href="#">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Logout</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('register')}}">Register</a>
        </li>
        @endauth
      </ul>
      <span class="navbar-text">
        To be more productive!
      </span>
    </div>
  </div>
</nav>
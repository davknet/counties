<nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Beautifull-Countries</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Beatifull-Countries</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav navbar-dark justify-content-start flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-dark justify-content-end flex-grow-1 pe-3">
        @if (Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
           
          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"  onclick=""  href="{{ route('logout') }}"> <button type="submit">Logout</button></a>
          </li>
        </form>
        @else
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
        </li>
        @endif
        </ul>
        </div>
      </div>
    </div>
  </nav>
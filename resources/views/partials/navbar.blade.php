<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/"><b>Gaplex</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
         
          @auth
          
          <li class="nav-item">
            <a class="nav-link {{ ($active === "timeline") ? 'active' : '' }}" href="/timeline">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "profile") ? 'active' : '' }}" href="{{ route('profile', Auth::user()->username) }}">Profile</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link {{ ($active === "stranger") ? 'active' : '' }}" href="/stranger">stranger</a>
          </li>
      
          
          @endauth
        </ul>

        
        <ul class="navbar-nav ms-auto"> 
        @auth
        <div class="dropdown text-danger ">
          <button class="btn btn-primary dropdown-toggle bi bi-person-circle text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
             Welcome, {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item bi bi-layout-text-window- bi bi-arrow-bar-up" href="{{ route('profile', Auth::user()->username) }}" > Profile</a></li>
            <li><a class="dropdown-item bi bi-layout-text-window- bi bi-arrow-bar-up" href="{{ route('password.edit') }}" > change password</a></li>
            
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
              <button type="submit" class="dropdown-item bi bi-arrow-return-right" > Log Out</button>
              </form>
            </li>
          </ul>
        </div>

        @else
    
     

          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i> Login</a>
          <li class="nav-item">
            <a href="/register" class="nav-link {{ ($active === "register") ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i> Register</a>

        @endauth
          </li>
        </ul>
      </div>
    </div>
  </nav>
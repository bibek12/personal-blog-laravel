<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="/">Laravel Blog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{Route('index')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{Route('about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{Route('shop.index')}}">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{Route('contact')}}">Contact</a>
            </li>

            @if(Auth::check())
                <li class="nav-item">
                <a class="nav-link" href="{{Route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                <form method="post" id="logout-form" action="{{Route('logout')}}">@csrf</form>
                <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{Route('register')}}">Register</a>
                </li>
            @endif
           </ul>
        </div>
      </div>
    </nav>
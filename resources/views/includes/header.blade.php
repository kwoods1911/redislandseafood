<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a id="logo" class="navbar-brand" href="/">Red Island Seafood</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/product">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/quote">Quote</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">Contact</a>
      </li>


      @auth
            <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
          </a>
            </li>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
      @else
           <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/registration">Register</a>
            </li>
       @endauth
       

       @auth
            <!-- if user is admin then show quotes link -->
                @php
                if(auth()->user()->is_admin){
                    echo '<li class="nav-item admin-link">
                            <a class="nav-link" href="/admin">View Quotes</a>
                    </li>';
                }
                @endphp
            @endauth       
    </ul>


  </div>
  <span class="navbar-text">
        1-900-LOBSTER
    </span>
</nav>



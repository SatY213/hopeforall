<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
    <div class="container">
        <a class="navbar-brand font-weight-bold text-secondary" style="font-size: 43px;" href="{{ url('/') }}">
            <img src="{{ asset('storage/img/logo.png') }}" alt="Logo" class="img-fluid mr-2" style="max-height: 50px;">
            <span class="text-primary"> {{ config('app.name', 'Laravel') }}</span>
           
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

  
        <div class="collapse navbar-collapse justify-content-between" id="#navbarSupportedContent">
            <!-- Left Side Of Navbar -->
        <div class="navbar-nav font-weight-bold mx-auto py-0">   
            <ul class="navbar-nav me-auto">
              <li class="nav-item-active"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
              <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
              <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
            </ul>
        </div> 
  
    
  
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">

                
                
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn " href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                    @endif
  
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn btn-primary px-4" href="/contact">{{ __('Join Us') }}</a>
                        </li>
                    @endif
                @else
                
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
  
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
  
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    
                @endguest
            </ul>
        </div>
    </div>
  </nav>
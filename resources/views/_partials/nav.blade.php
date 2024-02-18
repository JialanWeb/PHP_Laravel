<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ghost py-3 fs-4">
    <div class="container">
        <a class="navbar-brand fs-3" href="{{ url('/') }}">
            myProject
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item" >
                <a class="nav-link {{ Request::is('about') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{url('/about')}}">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ Request::is('referenzen') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{url('/referenzen')}}">Referenzen</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ Request::is('post*') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{url('/post')}}">Beiträge</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ Request::is('users*') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{url('/users')}}">Alle User</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ Request::is('contact') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{url('/contact')}}">Kontakt</a>
                </li>

                @if(Auth::user() && Auth::user()->isAdmin == "1")
                <li class="nav-item">
                <a class="nav-link {{ Request::is('tag*') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{url('/tag')}}">Tags</a>
                </li>
                @endif

                
                <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{url('/home')}}">myProfil</a>
                </li>
             
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'blau py-3 text-center fw-bold' : ''}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>
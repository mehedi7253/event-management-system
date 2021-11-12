<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #FFF343">
    <a class="navbar-brand font-weight-bold" href="{{ url('/') }}" ><span class="ml-2" style="font-family: 'Arial Rounded MT Bold',Arial,sans-serif; font-weight: 700">Evenet Management</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages.package.index') }}">Packages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pages-events.index') }}">Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('stake-holders.index') }}">Stake Holders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact-us.index') }}">Contact</a>
            </li>
            <li class="nav-item dropdown">
                @if (Route::has('login'))
                    @auth
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->role_id == '1')
                            <a class="dropdown-item text-capitalize" href="{{ route('admin.index') }}">Profile</a>
                            @elseif (Auth::user()->role_id == '2')
                            <a class="dropdown-item text-capitalize" href="{{ route('user.index') }}">Profile</a>
                            @elseif (Auth::user()->roler_id == '3')
                            <a class="dropdown-item text-capitalize" href="{{ route('stakeholder.index') }}">Profile</a>
                        @endif
                        <a class="dropdown-item text-capitalize" href="{{ route('logout') }}"
                        onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @else
                    <a class="nav-link dropdown-toggle text-uppercase" href="{{ route('login') }}" target="_blank" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-capitalize" href="{{ route('login') }}">Login</a>
                        <a class="dropdown-item text-capitalize" href="{{ route('register') }}">Registration</a>
                    </div>
                    @endauth
                @endif
            </li>
        </ul>
    </div>
</nav>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Management System</title>
    <link rel="stylesheet" href="{{ asset('assets/template/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/template/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #FFF343">
            <a class="navbar-brand font-weight-bold" href="{{ url('/') }}" ><span class="ml-2" style="font-family: 'Arial Rounded MT Bold',Arial,sans-serif; font-weight: 700">Evenet Management</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.package.index') }}">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        @if (Route::has('login'))
                            @auth
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-capitalize" href="user/index">Profile</a>
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
    </section>

    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto" style="margin-top: 15%">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">User Login</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Enter Password" autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary col-6">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('register') }}" class="text-decoration-none float-right">New User? Registraion Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('assets/template/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/bootstrap.min.js') }}"></script>
</body>
</html>
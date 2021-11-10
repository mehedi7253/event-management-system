<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <img class="img-profile rounded-circle" src="{{ asset('assets/template/img/boy.png')}}" style="max-width: 60px">
          <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href=""
          onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>

        </div>
      </li>
    </ul>
  </nav>
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="{{ asset('assets/template/img/logo/logo2.png') }}">
      </div>
      <div class="sidebar-brand-text mx-3">Admin Pannel</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Packages</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('packages.create') }}">Create Package</a>
          <a class="collapse-item" href="{{ route('packages.index') }}">Manage package</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Category</span>
      </a>
      <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('categorys.create') }}">Add Category</a>
          <a class="collapse-item" href="{{ route('categorys.index') }}">Manage Category</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Orders  
          <sup class="font-weight-bold text-danger">
          @php
              $notification = DB::table('orders')->where('process','=','0')->count();
              echo $notification;
          @endphp
        </sup>
     </span>
      </a>
      <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('neworders.index') }}">New Orders</a>
        </div>
      </div>
    </li>
     <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Stacke Holders</span>
      </a>
      <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('admin-stackholder.index') }}">Manage Stakeholder</a>
          <a class="collapse-item" href="{{ route('admin-stackholder.create') }}">Add New Stakeholder</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap8"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Manage Users</span>
      </a>
      <div id="collapseBootstrap8" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('manage-users.index') }}">Manage Users</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Event</span>
      </a>
      <div id="collapseBootstrap5" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('events.index') }}">Manage Event</a>
          <a class="collapse-item" href="{{ route('events.create') }}">Add New Event</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap6"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Chat</span>
      </a>
      <div id="collapseBootstrap6" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('admin-chat.index') }}">Chat Lsit</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap7"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Stake Holder Payment</span>
      </a>
      <div id="collapseBootstrap7" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="{{ route('stackeholder-payments.index') }}">Payment List</a>
        </div>
      </div>
    </li>
  </ul>
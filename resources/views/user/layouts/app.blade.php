<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>{{ Auth::user()->name }}</title>
  <link href="{{ asset('assets/template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/template/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/template/css/ruang-admin.min.css') }}" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
  <link href="{{ asset('assets/template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('user.layouts.side-bar')
    <!-- Sidebar -->
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('user.layouts.nav')
        <!-- Topbar -->

        <!-- Container Fluid-->
       
        <div class="container-fluid" id="container-wrapper">
            @yield('content')
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
        @include('user.layouts.footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  @include('user.layouts.script')
  @yield('script')
</body>

</html>
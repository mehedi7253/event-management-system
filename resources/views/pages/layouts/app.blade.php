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
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
</head>
<body>
    <section class="menu">
       @include('pages.layouts.nav')
    </section>

    <section class="content">
        <div class="container">
            <div class="row"> 
                @yield('content')
            </div>
        </div>
    </section>

   @include('pages.layouts.script')

   @yield('script')
</body>
</html>
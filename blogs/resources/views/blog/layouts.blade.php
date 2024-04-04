<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    @include('components.header')
    <style>
        .glass{
            background: rgba( 255, 255, 255, 0.25 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 10.5px );
            -webkit-backdrop-filter: blur( 12.5px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
    <a class="navbar-brand" href="{{route('homepage')}}">Blog</a>
    <a class="nav-link" href="{{route('blogsAdmin.list')}}"><i class="fa-solid fa-right-to-bracket"></i></a>
</nav>
    <div class="container">
        @yield('content')
    </div>
    @include('components.footer')
</body>
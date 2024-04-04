<html>
    <head>
        <title>Admin Panel</title>
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
        <div class="container">
            @include('admin.partials.navbar')
            <div class="card">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('components.footer')
    </body>
</html>

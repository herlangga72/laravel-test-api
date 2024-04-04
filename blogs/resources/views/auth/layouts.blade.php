<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="card mt-5">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
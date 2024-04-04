@extends('auth.layouts')

@section('content')
    <div class="card-header">
        Login
    </div>
    <div class="card-body">
        <form method="POST" action="{{Route('login.post')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('register') }}" class="btn btn-link">Register</a>
            </div>
        </form>
    </div>
    <br>
    <a href="{{route('google.redirect')}}" class="btn btn-primary">Login with Google</a>
@endsection

@extends('auth.layouts')

@section('content')
    <div class="card-header">
        Register
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('login') }}" class="btn btn-link">Login Instead</a>
            </div>
        </form>
    </div>
@endsection
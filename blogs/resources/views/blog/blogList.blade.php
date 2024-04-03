@extends('blog.layouts')

@section('content')
    <div style="grid-template-columns: repeat(2, minmax(2, 2fr)); display:grid; grid-auto-flow: column; gap: 5px">
        @foreach($blogs as $blog)
            <div class="card">
                <a href="{{ route('blogs.show',['id'=>$blog->id])}}" class="card-header flex-grow-0" style="min-height:250px">
                    <img src="{{ $blog->cover }}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->desc }}</p>
                    <a href="{{ route('blogs.show',['id'=>$blog->id])}}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

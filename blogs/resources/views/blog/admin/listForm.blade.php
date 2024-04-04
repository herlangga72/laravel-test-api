@extends('admin.layout')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(isset($message))
            <div class="alert alert-{{$message['type']}}">
                <div class="alert-headings">
                    {{ $message['title'] }}
                </div>
                <p>
                    {{ $message['content'] }}
                </p>
            </div>
        @endif
    </div>
    <div class="col-md-12">
        <a href="{{ route('blogsAdmin.create') }}" class="btn btn-primary">Create Blog</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->author }}</td>
            <td>{{ $blog->date }}</td>
            <td class="d-flex align-items-center gap-1">
                <a href="{{ route('blogsAdmin.show',['id'=>$blog->id])}}" class="p-3 btn btn-primary"><i class="fa-solid fa-newspaper"></i></a>
                <a href="{{ route('blogsAdmin.edit',['id'=>$blog->id])}}" class="p-3 btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
                <form action="{{ route('blogsAdmin.destroy',['id'=>$blog->id])}}" method="POST" class="h-full">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="p-2 fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-md-12">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
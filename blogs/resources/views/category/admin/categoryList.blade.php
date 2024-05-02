@extends('admin.layout')

@section('content')
<h6>Category List</h6>
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
        <a href="{{ route('categoryAdmin.create') }}" class="btn btn-primary">Create Category</a>
    </div>
    <table>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td class="d-flex align-items-center gap-1">
                    <a href="{{ route('categoryAdmin.show',['id'=>$item->id])}}" class="p-3 btn btn-primary"><i class="fa-solid fa-newspaper"></i></a>
                    <a href="{{ route('categoryAdmin.edit',['id'=>$item->id])}}" class="p-3 btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
                    <form action="{{ route('categoryAdmin.destroy',['id'=>$item->id])}}" method="POST" class="h-full">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="p-2 fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
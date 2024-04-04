@extends('admin.layout')

@section('content')

<h6>Edit Blog Post</h6>

{!! Form::open(["url"=>route('blogsAdmin.update', ['id'=>$blog->id]) ,"method"=>"PUT", 'enctype'=>'multipart/form-data']); !!}
    <div class="form-group">
        {{ Form::label('title', 'Title :') }}
        {{ Form::text('title', $blog->title, ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('desc', 'Description :') }}
        {{ Form::text('desc', $blog->desc, ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('author', 'Author :') }}
        {{ Form::text('author', $blog->author, ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('github', 'Github :') }}
        {{ Form::text('github', $blog->github, ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('twitter', 'Twitter :') }}
        {{ Form::text('twitter', $blog->twitter, ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('telegram', 'Telegram :') }}
        {{ Form::text('telegram', $blog->telegram, ["class"=>"form-control"]) }}
    </div>
    {{-- <div class="form-group">
        {{ Form::label('cover', 'Cover :') }}
        {{ Form::text('cover', $blog->cover, ["class"=>"form-control"])}}
    </div> --}}
    <div class="form-group">
        {{ Form::label('date', 'Date :') }}
        {{ Form::date('date', $blog->date), ["class"=>"form-control"]}}
    </div>
    <div class="form-group">
        {{ Form::label('cover', 'Image Cover :') }}
        {!! Form::file('cover',["class"=>"form-control"]) !!}
    </div>
    <div class="form-group">
        {{ Form::label('content', 'Content :') }}
        {{ Form::textarea('content', $blog->content, ["class"=>"form-control"]) }}
    </div>
    <button type="submit">Submit</button>
{!! Form::close() !!}
@endsection
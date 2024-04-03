@extends('admin.layout')

@section('content')
<h6>Create Blog Post</h6>
<form action="{{ route('blogsAdmin.store') }}" method="POST">
    @csrf
    <div class="form-group">
        {{ Form::label('title', 'Title :') }}
        {{ Form::text('title', '', ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('desc', 'Description :') }}
        {{ Form::text('desc', '', ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('author', 'Author :') }}
        {{ Form::text('author', '', ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('github', 'Github :') }}
        {{ Form::text('github', '', ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('twitter', 'Twitter :') }}
        {{ Form::text('twitter', '', ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('telegram', 'Telegram :') }}
        {{ Form::text('telegram', '', ["class"=>"form-control"]) }}
    </div>
    <div class="form-group">
        {{ Form::label('cover', 'Cover :') }}
        {{ Form::text('cover', '', ["class"=>"form-control"])}}
    </div>
    <div class="form-group">
        {{ Form::label('date', 'Date :') }}
        {{ Form::date('date', date("Y-m-d")), ["class"=>"form-control"]}}
    </div>
    <div class="form-group">
        {{ Form::label('content', 'Content :') }}
        {{ Form::text('content', '', ["class"=>"form-control"]) }}
    </div>
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>
@endsection
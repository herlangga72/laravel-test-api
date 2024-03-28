<h6>Create Blog Post</h6>
<form action="/api/blogs" method="POST">
    @csrf
    {{ Form::label('title', 'Title :') }}
    {{ Form::text('title', '') }}
    <br/>
    <br/>
    {{ Form::label('desc', 'Description :') }}
    {{ Form::text('desc', '') }}
    <br/>
    <br/>
    {{ Form::label('author', 'Author :') }}
    {{ Form::text('author', '') }}
    <br/>
    <br/>
    {{ Form::label('github', 'Github :') }}
    {{ Form::text('github', '') }}
    <br/>
    <br/>
    {{ Form::label('twitter', 'Twitter :') }}
    {{ Form::text('twitter', '') }}
    <br/>
    <br/>
    {{ Form::label('telegram', 'Telegram :') }}
    {{ Form::text('telegram', '') }}
    <br/>
    <br/>
    {{ Form::label('cover', 'Cover :') }}
    {{ Form::text('cover', '')}}
    {{-- {{ Form::file('cover') }} --}}
    <br/>
    <br/>
    {{ Form::label('date', 'Date :') }}
    {{ Form::date('date', '')}}
    <br/>
    <br/>
    {{ Form::label('content', 'Content :') }}
    {{ Form::text('content', '') }}
    <br/>
    <br/>
    <button type="submit">Submit</button>
</form>
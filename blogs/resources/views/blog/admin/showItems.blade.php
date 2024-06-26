@extends('admin.layout')

@section('content')
    <div style="background-image:url('{{ $blog->cover }}'); background-repeat: no-repeat; backdrop-filter:blur('15px'); background-size:cover;" class="d-flex justify-content-center">
        <div class="m-5 d-flex flex-column p-5 h-100 glass">
            <h2 class="text-center">{{ $blog->title }}</h2> <br>
            <h6>
                {{ $blog->author }}
            </h6>
            <h4> {{ $blog->desc }} </h4><br>
            <div clas="d-flex">
                @if($blog->github)
                    <a href="https://github.com/{{ $blog->github }}"><i class="fa-brands fa-github fa-xl text-white"></i></a>
                @endif
                @if($blog->twitter)    
                    <a href="https://twitter.com/{{ $blog->twitter }}"><i class="fa-brands fa-twitter fa-xl text-white"></i></a>
                @endif
                @if($blog->telegram)    
                    <a href="https://t.me/{{ $blog->telegram }}"><i class="fa-brands fa-telegram fa-xl text-white"></i></a>
                @endif
            </div>
            written on: {{ date_format($blog->date,"d-m-Y") }} <br>
        </div>
    </div>
    <div>
        {!! Str::markdown($blog->content) !!}
    </div>
    <br>
    <br>
@endsection
@extends('layouts.default')

@section('content')

@include('layouts.navbar')
    <div class="container justify-content-md-center col-5 mt-5">
        <div class="float-right ml-3">
            <span>Writen by:</span>
            <h3><a href="{{route('user.show',$article->user->id)}}">{{$article->user->name}}</a></h3>
        </div> 
        <h2>{{$article->title}}</h2>   
        <p>{{$article->slug}}</p>
        <p>{{$article->content}}</p>
        <p>Topic: 
        @foreach ($article->topics as $topic)
            <a href="{{route('articles.index', ['topic' => $topic->name ]) }}" class="mr-1">{{ $topic->name }}</a>
        @endforeach
        </p>
        <footer class="blockquote-footer">Back to <cite title="Source Title"><a href="/articles">articles</a></cite></footer>
        <div class="float-right ml-3">
            @if ($article->user_id == auth()->id())
                <p><a href="/articles/{{$article->id}}/edit" class="btn btn-outline-secondary">Edit your article</a></p>
                <p>
                    <form action="/articles/{{$article->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete your article</button>
                    </form>
                </p>
            @endif
            
        </div>
    </div>    
@endsection
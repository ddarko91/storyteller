@extends('layouts.default')

@section('content')

@include('layouts.navbar')

<style>

    blockquote{
        
    }
    blockquote:hover{
        box-shadow: 0px 3px 18px 0px rgba(0,0,0,0.75);
    }

</style>
<div class="container">
    @if(session()->get('success'))
        <div class="alert alert-success row justify-content-md-center col-3 float-right mt-1">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->get('danger'))
        <div class="alert alert-danger row justify-content-md-center col-3 float-right mt-1">
            {{ session()->get('danger') }}
        </div>
    @endif
</div>
<div class="container mt-5">

    <h1><a href="/articles" class="mb-2">Articles</a></h1>
    <a class="btn btn-outline-primary btn-small float-right ml-2" href="/articles/create">
        Create Article
    </a>

    <div class="row mt-3">
        @forelse ($articles as $article)

            <blockquote class="blockquote col-4 pt-3 pl-5">
                <h3 class="mb-0">{{$article->title}}</h3>
                <p class="mb-0">Slug : <em>{{$article->slug}}</em></p>
                <p>Topic(s) : <em>
                @foreach ($article->topics as $topic)
                    <a href="{{route('articles.index', ['topic' => $topic->name ]) }}" class="mr-1">{{ $topic->name }}</a>
                @endforeach
                </em></p>
                <footer class="blockquote-footer">
                    Author 
                    <cite title="Author Info">
                        <a href="{{route('user.show',$article->user->id)}}">{{$article->user->name}}</a>
                    </cite>
                </footer>
                <a class="btn btn-outline-primary mt-3 mb-3" href="{{route('articles.show',$article)}}">See more...</a>
            </blockquote>

        @empty

            <p>No articles yet.</p>

        @endforelse
    </div>

</div>
    
@endsection
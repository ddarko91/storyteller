@extends('layouts.default')

@section('content')

@include('layouts.navbar')

<div class="container justify-content-md-center col-6">
    
    <form action="{{route('articles.show',$article)}}" method="POST" class="mt-3">

        @csrf
        @method('PUT')

        <fieldset>

          <legend>Update Article</legend>
          
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Article Title" value="{{$article->title}}">

            @error('title')
                <p>{{ $errors->first('title') }}</p>
            @enderror
          </div>
    
          <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$article->slug}}">

            @error('slug')
                <p>{{ $errors->first('slug') }}</p>
            @enderror
          </div>
          
          
          <div class="form-group">
            <label for="exampleTextarea">Content</label>
            <textarea class="form-control" name="content" id="exampleTextarea" rows="4">{{$article->content}}</textarea>

            @error('content')
                <p>{{ $errors->first('content') }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="topic">Topic <small> - You can choose multiple</small></label>
            <select class="form-control" name="topic[]" multiple id="topic" style="height: 60px;">
                @foreach ($topics as $topic)
                    <option value="{{$topic->id}}">{{$topic->name}}</option>
                @endforeach
            </select>

            @error('topic')
                <p>{{ $errors->first('topic') }}</p>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>

        </fieldset>
      </form>

</div>


@endsection
@extends('layouts.default')
@include('layouts.navbar')
@section('content')
    <body>
        <div class="container-fluid justify-content-md-center row mt-5">
            <div class="jumbotron">
                <h1 class="display-3">Hello, Storyteller!</h1>
                <p class="lead">Wanna tell us your story? This is your chance, write your story and share with the world.</p>
                <hr class="my-4">
                <p>Jump to your articles or if you haven't register yet, feel free to join us. Don't waste your time, create your story!</p>
                <p class="lead">
                  <a class="btn btn-primary btn-lg" href="/articles" role="button">Create . . .</a>
                </p>
              </div>
        </div>   
    </body>
@endsection



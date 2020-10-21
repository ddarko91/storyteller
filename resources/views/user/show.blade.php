@extends('layouts.default')

@section('content')

@include('layouts.navbar')

<style>
    p {
        font-size: 130%;
    }
</style>
<div class="container justify-content-md-center mt-5">
    <h1 class="text-center">User Info</h1>
    <div class="container col-4 mt-5">
        <p><b>Name :</b> {{$user->name}}</p>
        <p><b>Email :</b> {{$user->email}}</p>
        <p><b>Biography :</b> {{$user->bio}}</p>
    </div>
</div>


@endsection
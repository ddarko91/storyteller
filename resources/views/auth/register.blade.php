@extends('layouts.default')

<div class="container mt-5 justify-content-md-center col-4">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <fieldset>
            <legend class="text-center"><h1><a href="/">Storyteller</a> - Register</h1></legend>

            <div class="form-group">
                <label for="exampleInputName1" value="{{ __('Name') }}">Name</label>
                <input class="form-control" id="name" type="text" name="name" :value="old('name')" placeholder="Your Name" required autofocus autocomplete="name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1" value="{{ __('Email') }}">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" :value="old('email')" required>
            </div>

            <div class="form-group">
                <label for="bio" value="{{ __('Bio') }}">Biography</label>
                <textarea name="bio" id="bio" rows="4" class="form-control" placeholder="Short Bio"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" value="{{ __('Password') }}">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" value="{{ __('Confirm Password') }}">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputCPassword1" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
            </div>

            @if ($errors->any())
                <div>
                    <div class="text-center text-danger">{{ __('Whoops! Something went wrong.') }}</div>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-center text-danger ml-0" style="list-style-type: none;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <a class="underline" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="btn btn-outline-primary ml-4">
                    {{ __('Register') }}
                </button>
            </div>
        </fieldset>
    </form>
</div>      

@extends('layouts.default')

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
<div class="container mt-5 justify-content-md-center col-4">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <fieldset>
            <legend class="text-center"><h1><a href="/">Storyteller</a> - Login</h1></legend>
            <div class="form-group">
                <label for="exampleInputEmail1" value="{{ __('Email') }}">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" :value="old('email')" required autofocus>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" value="{{ __('Password') }}">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="current-password">
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

            <div class="form-check">
                <label for="remember_me" class="flex items-center form-check-label">
                    <input id="remember_me" type="checkbox" value="" checked="" class="form-check-input" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="btn btn-outline-primary ml-4">
                    {{ __('Login') }}
                </button>

                <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-3" href="{{ route('register') }}">
                    Haven't profile? Register now!
                </a>
            </div>
        </fieldset>
    </form>
</div>      
@extends('layouts.default')

<div class="container justify-content-md-center col-3" style="margin-top: 10%;">
    <div>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif


    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <fieldset>
            <div class="form-group">
                <label for="exampleInputEmail1" value="{{ __('Email') }}"></label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" :value="old('email')" required autofocus>
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

            <div class="text-center">
                <button type="submit" class="btn btn-outline-primary">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </fieldset>    
    </form>
</div>
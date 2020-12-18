@extends('layouts.app')

@section('content')
<div class="center mb-5">
    <div class="text-center mt-5">
        <h1 class="h2">Log in</h1>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                @error('email')
                    <p class="alert alert-danger mb-3" role="alert">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                @error('password')
                    <p class="alert alert-danger mb-3" role="alert">{{ $message }}</p>
                @enderror

                {!! Form::submit('ログイン', ['class' => 'btn btn-block btn-pink mb-3']) !!}
                <div class="text-right">
                <a href="/login/google" role="button">
                    <img src="{{ asset('img/btn_google_signin_dark_normal_web.png') }}" alt="google-login">
                </a>
                </div>
            {!! Form::close() !!}

            <p class="mt-2">New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
        </div>
    </div>
</div>
@endsection
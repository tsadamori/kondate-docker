@extends('layouts.app')

@section('content')
<div class="center mb-5">
    <div class="text-center mt-5">
        <h1>Sign up</h1>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                @error('name')
                    <p class="alert alert-danger" role="alert">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                @error('email')
                    <p class="alert alert-danger" role="alert">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Password (Confirmation)') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                @error('password')
                    <p class="alert alert-danger" role="alert">{{ $message }}</p>
                @enderror
                @error('password_confirmation')
                    <p class="alert alert-danger" role="alert">{{ $message }}</p>
                @enderror
                {!! Form::submit('Sign up', ['class' => 'btn btn-block btn-pink']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
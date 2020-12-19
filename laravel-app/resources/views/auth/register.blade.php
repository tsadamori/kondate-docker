@extends('layouts.app')

@section('content')
<div class="center mb-5">
    <div class="text-center mt-5">
        <h1 class="h2">ユーザ登録</h1>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                @error('name')
                    <p class="alert alert-danger" role="alert">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                @error('email')
                    <p class="alert alert-danger" role="alert">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
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

            <p class="mt-2">{!! link_to_route('login', '>> ログインはこちら') !!}</p>
        </div>
    </div>
</div>
@endsection
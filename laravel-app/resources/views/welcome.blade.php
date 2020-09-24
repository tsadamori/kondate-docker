@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the 献立アプリ</h1>
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-sm btn-primary']) !!}
            {!! link_to_route('login.get', 'Log in', [], ['class' => 'btn btn-sm btn-primary']) !!}
        </div>
    </div>
@endsection
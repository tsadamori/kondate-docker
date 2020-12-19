@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    <div class="pt-5">
        <a href="{{ route('users.password_change') }}"><p>パスワードの変更</p></a>
        <a href="{{ route('users.delete') }}"><p>アカウントの削除</p></a>
    </div>

@endsection
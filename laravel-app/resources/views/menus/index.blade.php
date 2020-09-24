@extends('layouts.app')

@section('content')
    <div class="mt-5 text-right">
        {{ link_to_route('menus.create', 'レシピ新規投稿', [], ['class' => 'btn btn-sm btn-primary']) }}
        {{ link_to_route('logout.get', 'logout', [], ['class' => 'btn btn-sm btn-secondary']) }}
    </div>
    @include('menus.kondate')

    @include('menus.menus')

@endsection
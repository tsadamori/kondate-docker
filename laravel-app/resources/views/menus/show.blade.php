@extends('layouts.app')

@include('layouts.navbar')

@section('content')
<div class="container pt-5">
    <h1 class="h3 mb-3">メニュー詳細<h1>
    <table class="table">
        <tr>
            <th>名前</th>
            <td>{{ $menu->name }}</td>
        <tr>
            <th>内容</th>
            <td>{{ $menu->content }}</td>
        </tr>
        <tr>
            <th>画像</th>
            <td>
                <a href="../img/{{ $menu->img_name }}">
                    @if ($menu->img_name)
                        <img src="../img/{{ $menu->img_name }}" alt="{{ $menu->name }}" height="100">
                    @else
                        <img src="../img/no-image.png" alt="no-image" height="100">
                    @endif
                </a>
            </td>
        </tr>
        <tr>
            <th>材料</th>
            <td>
                @foreach($ingredients as $ingredient)
                    {{ $ingredient['ingredient'] }} {{ $ingredient['count'] }}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>カテゴリ1</th>
            <td>{{ $menu->category1_mod }}</td>
        </tr>
        <tr>
            <th>カテゴリ2</th>
            <td>{{ $menu->category2_mod }}</td>
        </tr>
            <th>外部リンク</th>
            <td><a href="{{ $menu->outside_link }}" target="_blank">{{ $menu->outside_link }}</a></td>
        </tr>
        <tr>
    </table>
    {!! Form::model($menu, ['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
        {!! link_to_route('menus.edit', '編集', [$menu->id], ['class' => 'btn btn-sm btn-secondary']) !!}
        {!! link_to_route('/', 'TOPに戻る', [], ['class' => 'btn btn-sm btn-secondary']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-sm btn-danger']) !!}
    {!! Form::close() !!}
</div>
@endsection
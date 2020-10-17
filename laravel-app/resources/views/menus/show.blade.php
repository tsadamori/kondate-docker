@extends('layouts.app')

@section('content')
<div class="mt-5">
    <p>メニュー詳細</p>

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
                    <img src="../img/{{ $menu->img_name }}" alt="{{ $menu->name }}" width="100">
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
            <td>{{ $menu->category1_id }}</td>
        </tr>
        <tr>
            <th>カテゴリ2</th>
            <td>{{ $menu->category2_id }}</td>
        </tr>
            <th>外部リンク</th>
            <td><a href="{{ $menu->outside_link }}" target="_blank">{{ $menu->outside_link }}</a></td>
        </tr>
        <tr>
    </table>
    {!! Form::model($menu, ['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
        {!! link_to_route('menus.edit', 'edit', [$menu->id], ['class' => 'btn btn-sm btn-success']) !!}
        {!! Form::submit('delete', ['class' => 'btn btn-sm btn-danger']) !!}
        {!! link_to_route('/', 'back', [], ['class' => 'btn btn-sm btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection
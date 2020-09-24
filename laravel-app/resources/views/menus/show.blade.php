@extends('layouts.app')

@section('content')
<div class="mt-5">
    <!-- <div class="row">
        <div clas="col-8">
            <p>名前</p>
            <p>内容</p>
            <p>カテゴリ1</p>
            <p>カテゴリ2</p>
            <p>外部リンク</p>
        </div>
        <div class="col-4">
            <p>{{ $menu->name }}</p>
            <p>{{ $menu->content }}</p>
            <p>{{ $menu->category1 }}</p>
            <p>{{ $menu->category2 }}</p>
            <p>{{ $menu->outside_link }}</p>
        </div>
    </div> -->
    <p>メニュー詳細</p>

    <table class="table">
        <tr>
            <th>名前</th>
            <th>内容</th>
            <th>カテゴリ1</th>
            <th>カテゴリ2</th>
            <th>外部リンク</th>
        </tr>
        <tr>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->content }}</td>
            <td>{{ $menu->category1_id }}</td>
            <td>{{ $menu->category2_id }}</td>
            <td><a href="{{ $menu->outside_link }}" target="_blank">{{ $menu->outside_link }}</a></td>
        </tr>
    </table>
    {!! Form::model($menu, ['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
        {!! link_to_route('menus.edit', 'edit', [$menu->id], ['class' => 'btn btn-sm btn-success']) !!}
        {!! Form::submit('delete', ['class' => 'btn btn-sm btn-danger']) !!}
        {!! link_to_route('/', 'back', [], ['class' => 'btn btn-sm btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endsection
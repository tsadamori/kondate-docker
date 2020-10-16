@extends('layouts.app')

@section('content')
    <div class="mt-5">
        <p>レシピ編集ページ</p>
        <div id="edit-form">
            {!! Form::model($menu, ['route' => ['menus.update', $menu->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'レシピ名:（必須）') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'レシピ説明文:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
               <div id="ingredient-form" class="form-group">
                    {!! Form::label('ingredients[]', '材料:（必須）') !!}
                    @foreach($ingredients as $ingredient)
                        <div class="ingredient-form-item form-inline">
                            {!! Form::label('ingredients[]', '材料: ', ['class' => 'ml-2']) !!}
                            {!! Form::text('ingredients[]', $ingredient['ingredient'], ['class' => 'ml-1 form-control']) !!}
                            {!! Form::label('ingredients_count[]', '数量: ', ['class' => 'ml-2']) !!}
                            {!! Form::text('ingredients_count[]', $ingredient['count'], ['class' => 'ml-1 form-control']) !!}
                            {!! Form::button('＋', ['class' => 'ml-3 add-btn btn btn-sm']) !!}
                            @if($ingredient !== reset($ingredients))
                                {!! Form::button('ー', ['class' => 'minus-btn btn btn-sm']) !!}
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    {!! Form::label('category1_id', 'カテゴリ1:') !!}
                    {!! Form::select('category1_id', [
                        '' => '',
                        '1' => '肉',
                        '2' => '卵',
                        '3' => '豆',
                        '4' => '魚',
                        '5' => 'その他',
                    ], [$menu->category1_id], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category2_id', 'カテゴリ2:') !!}
                    {!! Form::select('category2_id', [
                        '' => '',
                        '1' => '緑',
                        '2' => '豆',
                        '3' => '海藻',
                        '4' => 'きのこ',
                        '5' => 'その他',
                    ], [$menu->category2_id], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('outside_link', '外部リンク:') !!}
                    {!! Form::text('outside_link', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-sm btn-success']) !!}
                {{ link_to_route('/', '戻る', [], ['class' => 'btn btn-sm btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
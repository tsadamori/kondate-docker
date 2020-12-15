@extends('layouts.app')

@include('layouts.navbar')

@section('content')
    <div class="mt-5">
        <h1 class="h2 mb-5">レシピ新規投稿ページ</h1>

        <div id="create-form" class="mb-5">
            {!! Form::model($menu, ['enctype' => 'multipart/form-data', 'route' => 'menus.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'レシピ名:（必須）') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('file', '画像を登録', ['class' => 'btn btn-sm btn-secondary']) !!}
                    {!! Form::file('file', ['class' => 'd-none', 'accept' => 'image/*', 'onchange' => 'onChangeFileInput(this)']) !!}
                    <div id="thumbnail" class="mt-2 mb-4">
                        <img id="thumbnail-img" src="" height="100">
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'レシピ説明文:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                <div id="ingredient-form" class="form-group">
                    {!! Form::label('ingredients[]', '材料:（必須）') !!}
                    <div class="ingredient-form-item form-inline mb-2">
                        {!! Form::label('ingredients[]', '材料: ') !!}
                        {!! Form::text('ingredients[]', null, ['class' => 'ml-1 form-control']) !!}
                        {!! Form::label('ingredients_count[]', '数量: ', ['class' => 'ml-3']) !!}
                        {!! Form::text('ingredients_count[]', null, ['class' => 'ml-1 form-control']) !!}
                        {!! Form::button('＋', ['class' => 'ml-3 add-btn btn btn-sm']) !!}
                    </div>
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
                    ], [], ['class' => 'form-control']) !!}
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
                    ], [], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('outside_link', '外部リンク:') !!}
                    {!! Form::text('outside_link', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-sm btn-success']) !!}
                {{ link_to_route('/', '戻る', [], ['class' => 'btn btn-sm btn-primary']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

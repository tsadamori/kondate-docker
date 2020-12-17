@extends('layouts.app')

@include('layouts.navbar')

@section('content')
<h1 class="h2 mb-3">買い物リスト</h1>
<div id="kondate_list">
{!! Form::model($kondate, ['id' => 'kondate-save-form', 'route' => ['kondate.save'], 'method' => 'post']) !!}
    <ul class="list-unstyled">
@foreach($ingredients_list as $id => $ingredient)
        <p>{{ $ingredient['name'] }}</p>
        <input type="hidden" name="id[]" value="{{ $id }}">
@foreach($ingredient['ingredient'] as $value)
        <li>
            <label>
                <input type="checkbox" class="mr-2">
                <span>{{ $value[0] }} {{ $value[1] }}</span>
            </label>
        </li>
@endforeach
@endforeach
    </ul>
    <div id="btn-area">
{!! Form::submit('保存', ['id' => 'save-btn', 'class' => 'btn btn-dark btn-sm']) !!}
        <button type="button" id="edit-btn" class="btn btn-secondary btn-sm">編集</button>
        <button type="button" id="complete-btn" class="btn btn-secondary btn-sm">完了</button>
        <a href="/"><button type="button" class="btn btn-secondary btn-sm">戻る</button></a>
    </div>
{!! Form::close() !!}
</div>

@endsection
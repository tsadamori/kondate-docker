@extends('layouts.app')

@section('content')
<p class="mt-3">買い物リスト</p>
<div id="kondate_list">
    <ul class="list-unstyled">
        @foreach($ingredients_list as $ingredient)
        @foreach($ingredient as $value)
            <li><input type="checkbox" class="mr-2">{{ $value[0] }} {{ $value[1] }}</li>
        @endforeach
        @endforeach
    </ul>
</div>
@endsection
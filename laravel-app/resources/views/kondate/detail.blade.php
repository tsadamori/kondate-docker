@extends('layouts.app')

@include('layouts.navbar')

@section('content')
<div class="mt-3">
<h1 class="h2 mb-3">{{ $kondate->created_at->format('Y年m月d日') }}</h2>
@for($i = 0; $i < count($menu_array['name']); $i++)
    <div>
        <h2 class="h4">{{ $menu_array['name'][$i] }}</h2>
        <ul>
@foreach($menu_array['ingredients'][$i] as $ingredient)
            <li>{{ $ingredient[0] }} {{ $ingredient[1] }}</li>
@endforeach
        </ul>
    </div>
@endfor
{!! link_to_route('kondate.history', '戻る', [], ['class' => 'btn btn-secondary btn-sm']) !!}
</div>
@endsection
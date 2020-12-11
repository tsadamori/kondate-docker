@extends('layouts.app')

@section('content')
<div class="mt-3">
{{ $kondate->created_at->format('Y年m月d日') }}
@for($i = 0; $i < count($menu_array['name']); $i++)
    <div>
        <p>{{ $menu_array['name'][$i] }}</p>
        <ul>
@foreach($menu_array['ingredients'][$i] as $ingredient)
            <li>{{ $ingredient[0] }} {{ $ingredient[1] }}</li>
@endforeach
        </ul>
    </div>
@endfor
{!! link_to_route('kondate.history', 'back', [], ['class' => 'btn btn-primary btn-sm']) !!}
</div>
@endsection
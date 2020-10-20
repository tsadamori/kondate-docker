@extends('layouts.app')

@section('content')
{{ $kondate->created_at->format('Y年m月d日') }}
@for($i = 0; $i < count($menu_array); $i++)
<div>
    {{ $menu_array['name'][$i] }}<br>
    {{ $menu_array['ingredients'][$i][0] }} {{ $menu_array['ingredients'][$i][1] }}<br>
</div>
@endfor
{!! link_to_route('kondate.history', 'back', [], ['class' => 'btn btn-primary btn-sm']) !!}
@endsection
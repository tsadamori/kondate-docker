@extends('layouts.app')

@section('content')
<div id="kondaet-history">
    <ul>
@foreach($kondate as $value)
        <li>
            <a href="history/{{ $value->id }}">
                {{ $value->created_at->format('Y年m月d日') }}
            </a>
        </li>
@endforeach
    </ul>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="mt-3">
    <p>過去の献立リスト</p>
    <div id="kondate-history">
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
    {!! link_to_route('/', 'back', [], ['class' => 'btn btn-primary btn-sm']) !!}
</div>
@endsection
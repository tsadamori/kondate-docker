@extends('layouts.app')

@include('layouts.navbar')

@section('content')
<div class="container pt-5">
    <h1 class="h3">過去の献立一覧</h1>
    <hr>
@if (count($kondate) !== 0)
    <div id="kondate-history">
        <ul>
@foreach ($kondate as $value)
            <li class="mb-2">
                <a href="history/{{ $value->id }}">
                    {{ $value->created_at->format('Y年m月d日') }}
                </a>
            </li>
@endforeach
        </ul>
    </div>
@else
    <p>過去の献立はありません</p>
@endif
    <hr>
    {!! link_to_route('/', 'TOPに戻る', [], ['class' => 'btn btn-secondary btn-sm']) !!}
</div>
@endsection
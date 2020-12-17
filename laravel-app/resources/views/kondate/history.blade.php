@extends('layouts.app')

@include('layouts.navbar')

@section('content')
<div class="container pt-5">
    <h1 class="h3 mb-5">過去の献立一覧</h1>
@if (count($kondate) !== 0)
    <div id="kondate-history">
        <ul>
@foreach ($kondate as $value)
            <li>
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
    {!! link_to_route('/', '戻る', [], ['class' => 'btn btn-dark btn-sm']) !!}
</div>
@endsection
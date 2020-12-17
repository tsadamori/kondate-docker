<div>
    <h2 class="h3">My献立</h2>
    <div id="search-form mr-0">
        {!! Form::open(['class' => 'form-inline justify-content-end']) !!}
            <div class="form-group mr-sm-2">
                {!! Form::text('keyword', '', [
                    'id' => 'keyword',
                    'class' => 'form-control',
                    'placeholder' => 'Search'
                ]) !!}
            </div>
            <div class="form-group mr-sm-2">
                {!! Form::select('category1_id', [
                    '' => 'Category1',
                    '1' => '肉',
                    '2' => '卵',
                    '3' => '豆',
                    '4' => '魚',
                    '5' => 'その他',
                ], [], [
                    'id' => 'category1_id',
                    'class' => 'form-control'
                ]) !!}
            </div>
            <div class="form-group mr-sm-2">
                {!! Form::select('category2_id', [
                    '' => 'Category2',
                    '1' => '緑',
                    '2' => '豆',
                    '3' => '海藻',
                    '4' => 'きのこ',
                ], [], [
                    'id' => 'category2_id',
                    'class' => 'form-control'
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::button('search', [
                    'id' => 'search-btn',
                    'class' => 'btn btn-secondary py-0 form-control'
                ]) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <div id="menus-list" class="mt-3">
@if(count($menus) > 0)
        <ul class="list-unstyled mb-3">
@foreach($menus as $menu)
            <li class="mb-5">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-lg-3">
                            <a href="{{ route('menus.show', $menu->id) }}">
                                {{ $menu->name }}
                            </a>
                            <br>
                            <span class="small">カテゴリ1: {{ $menu->category1_mod }}　<br class="d-lg-none">カテゴリ2: {{ $menu->category2_mod }}</span>
                        </div>
                        <div>
                            <a href="img/{{ $menu->img_name }}">
                                @if ($menu->img_name)
                                    <img class="mt-1" src="img/{{ $menu->img_name }}" height="100">
                                @else
                                    <img class="mt-1" src="img/no-image.png" height="100">
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="menu-btn col-6 text-right">
                        {!! Form::model($menu, [
                            'route' => [
                                'menus.destroy', $menu->id],
                                'method' => 'delete'
                            ],[
                            'class' => 'form-group'
                            ]) !!}
                            {!! Form::button('献立に入れる', [
                                'class' => 'add-menu-btn btn btn-sm btn-dark form-control mb-2',
                                'type' => 'button',
                                'data-id' => $menu->id,
                                'data-name' => $menu->name
                            ]) !!}
                            {!! link_to_route('menus.edit', '編集', [$menu->id], [
                                'class' => 'btn btn-sm btn-dark form-control mb-2'
                            ]) !!}
                            {!! Form::submit('削除', [
                                'class' => 'btn btn-sm btn-danger form-control'
                            ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </li>
            <hr>
@endforeach
        </ul>
        {{ $menus->links('pagination::bootstrap-4') }}
@else
        <p>No contents</p>
@endif
    </div>
</div>
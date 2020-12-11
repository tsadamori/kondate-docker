    <div class="mt-5">
        <div class="form-inline text-right">
            {!! Form::label('keyword', 'キーワード:') !!}
            {!! Form::text('keyword', '', ['class', 'form-control']) !!}
            {!! Form::label('category1_id', 'カテゴリ:1') !!}
            {!! Form::select('category1_id', [
                '' => '選択してください',
                '1' => '肉',
                '2' => '卵',
                '3' => '豆',
                '4' => '魚',
                '5' => 'その他',
            ], ['class' => 'form-control']) !!}
            {!! Form::label('category2_id', 'カテゴリ2:') !!}
            {!! Form::select('category2_id', [
                '' => '選択してください',
                '1' => '緑',
                '2' => '豆',
                '3' => '海藻',
                '4' => 'きのこ',
            ], ['class' => 'form-control']) !!}
            {!! Form::button('search', ['id' => 'search-btn', 'class' => 'form-control btn btn-sm btn-secondary']) !!}
        </div>
        <div id="menus-list" class="mt-3">
@if(count($menus) > 0)
            <ul class="list-group mb-3">
@foreach($menus as $menu)
                <li>
                    <div class="row">
                        <div class="col-7">
                            <div>
                                <a href="{{ route('menus.show', $menu->id) }}">
                                    {{ $menu->name }}
                                </a>
                                <span style="font-size: 12px;">　カテゴリ1: {{ $menu->category1_mod }}　カテゴリ2: {{ $menu->category2_mod }}</span>
                            </div>
                            <div>
                                <a href="img/{{ $menu->img_name }}">
                                    <img class="mt-1" src="img/{{ $menu->img_name }}" height="100">
                                </a>
                            </div>
                        </div>
                        <div class="menu-btn col-5 text-right">
                            {!! Form::model($menu, ['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                                {!! Form::button('add to kondate', [
                                    'class' => 'add-menu-btn btn btn-sm btn-primary',
                                    'type' => 'button',
                                    'data-id' => $menu->id,
                                    'data-name' => $menu->name]                                        ) !!}
                                {!! link_to_route('menus.edit', 'edit', [$menu->id], ['class' => 'btn btn-sm btn-success']) !!}
                                {!! Form::submit('delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </li>
@endforeach
            </ul>
            {{ $menus->links('pagination::bootstrap-4') }}
@else
            <p>No contents</p>
@endif
        </div>
    </div>
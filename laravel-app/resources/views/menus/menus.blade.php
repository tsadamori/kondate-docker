    <div class="mt-5">
        <div class="form-inline text-right">
            {!! Form::label('keyword', 'キーワード:') !!}
            {!! Form::text('keyword', '', ['class', 'form-control']) !!}
            {!! Form::label('category1_id', 'カテゴリ:1') !!}
            {!! Form::select('category1_id', [
                '1' => '肉',
                '2' => '卵',
                '3' => '豆',
                '4' => '魚',
                '5' => 'その他',
            ], ['class' => 'form-control']) !!}
            {!! Form::label('category2_id', 'カテゴリ2:') !!}
            {!! Form::select('category2_id', [
                '1' => '緑',
                '2' => '豆',
                '3' => '海藻',
                '4' => 'きのこ',
            ], ['class' => 'form-control']) !!}
            {!! Form::button('search', ['id' => 'search-btn', 'class' => 'form-control btn btn-sm btn-secondary']) !!}
        </div>
        <div class="mt-3">
            @if(count($menus) > 0)
                <ul class="list-group">
                    @foreach($menus as $menu)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-7">
                                    <a href="{{ route('menus.show', $menu->id) }}">
                                        {{ $menu->name }}
                                    </a>
                                </div>
                                <div class="menu-btn col-5 text-right">
                                    {!! Form::model($menu, ['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                                        {!! Form::button('add to kondate', [
                                            'class' => 'add-menu-btn btn btn-sm btn-primary',
                                            'type' => 'button',
                                            'data-id' => $menu->id,
                                            'data-name' => $menu->name],
                                        ) !!}
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
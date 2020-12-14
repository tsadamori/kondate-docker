<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="/">献立アプリ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                {{ link_to_route('menus.create', 'レシピ新規投稿', [], ['class' => 'nav-link']) }}    
            </li>
            <li class="nav-item">
                {{ link_to_route('kondate.history', '過去の献立', [], ['class' => 'nav-link']) }}
            </li>
            <li class="nav-item">
                {{ link_to_route('logout', 'logout', [], ['class' => 'nav-link']) }}
            </li>
        </ul>
        <div id="nav-search-form">
            {!! Form::open(['class' => 'form-inline']) !!}
                <div class="form-group">
                    {!! Form::text('keyword', '', [
                        'id' => 'keyword',
                        'class' => 'form-control mr-sm-2',
                        'placeholder' => 'Search'
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('category1_id', [
                        '' => 'Category1',
                        '1' => '肉',
                        '2' => '卵',
                        '3' => '豆',
                        '4' => '魚',
                        '5' => 'その他',
                    ], [], [
                        'id' => 'category1_id',
                        'class' => 'form-control mr-sm-2'
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('category2_id', [
                        '' => 'Category2',
                        '1' => '緑',
                        '2' => '豆',
                        '3' => '海藻',
                        '4' => 'きのこ',
                    ], [], [
                        'id' => 'category2_id',
                        'class' => 'form-control mr-sm-2'
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::button('search', [
                        'id' => 'search-btn',
                        'class' => 'btn btn-outline-secondary form-control'
                    ]) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</nav>






<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">献立アプリ</a>
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
            {{ link_to_route('logout.get', 'logout', [], ['class' => 'nav-link']) }}
        </li>
    </ul>
    {!! Form::select('category1_id', [
        '' => 'Category1',
        '1' => '肉',
        '2' => '卵',
        '3' => '豆',
        '4' => '魚',
        '5' => 'その他',
    ], [], ['class' => 'form-control mr-sm-2']) !!}
    {!! Form::select('category2_id', [
        '' => 'Category2',
        '1' => '緑',
        '2' => '豆',
        '3' => '海藻',
        '4' => 'きのこ',
    ], [], ['class' => 'form-control mr-sm-2']) !!}
    {!! Form::search('keyword', '', ['class' => 'form-control mr-sm-2', 'placeholder' => 'Search']) !!}
    {!! Form::button('search', ['id' => 'search-btn', 'class' => 'btn btn-outline-secondary my-2']) !!}

    </div>
</nav>






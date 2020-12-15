<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <a class="navbar-brand pl-3" href="/">献立アプリ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                {{ link_to_route('menus.create', 'レシピ新規投稿', [], ['class' => 'nav-link']) }}    
            </li>
            <li class="nav-item">
                {{ link_to_route('kondate.history', '過去の献立', [], ['class' => 'nav-link']) }}
            </li>
            <li class="nav-item">
                {{ link_to_route('logout', 'ログアウト', [], ['class' => 'nav-link']) }}
            </li>
        </ul>
    </div>
</nav>






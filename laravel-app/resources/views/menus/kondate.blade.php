<div id="kondate-list" class="mb-5">
    {!! Form::model($kondate, ['route' => ['kondate.kondate_list'], 'method' => 'post']) !!}
    <div class="d-flex">
        <h2 class="h3 mr-3 mb-3">今週の献立一覧</h2>
        {!! Form::submit('買い物リストをつくる', ['id' => 'generate-kondate-btn', 'class' => 'btn btn-sm btn-dark mb-3']) !!}
    </div>
        <div class="mb-3">
            <ul>
            </ul>
        </div>
    {!! Form::close() !!}
    <hr>
</div>
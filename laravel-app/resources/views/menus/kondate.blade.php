<div id="kondate-list" class="mb-5">
    {!! Form::model($kondate, ['route' => ['kondate.kondate_list'], 'method' => 'post']) !!}
        <div class="mb-3">
            <ul class="list-group">
            </ul>
        </div>
    {!! Form::submit('買い物リストをつくる', ['class' => 'btn btn-sm btn-dark']) !!}
    {!! Form::close() !!}
</div>
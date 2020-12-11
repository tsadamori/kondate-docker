<div id="kondate-list" class="mt-3">
    {!! Form::model($kondate, ['route' => ['kondate.kondate_list'], 'method' => 'post']) !!}
        <div class="mb-3">
            <ul class="list-group">
            </ul>
        </div>
    {!! Form::submit('generate kondate list', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
</div>
<div id="kondate-list" class="mt-3">
    {!! Form::model($kondate, ['route' => ['kondate.generate_kondate_list'], 'method' => 'post']) !!}
        <ul class="list-group">
        </ul>
    {!! Form::submit('generate kondate list', ['class' => 'btn btn-sm btn-success']) !!}
    {!! Form::close() !!}
</div>
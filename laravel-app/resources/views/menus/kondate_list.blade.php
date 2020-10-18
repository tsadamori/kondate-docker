@extends('layouts.app')

@section('content')
<p class="mt-3">買い物リスト</p>
<div id="kondate_list">
{!! Form::model($kondate, ['id' => 'kondate-save-form', 'route' => ['kondate.save'], 'method' => 'post']) !!}
        <ul class="list-unstyled">
@foreach($ingredients_list as $ingredient)
@foreach($ingredient as $value)
            <li>
                <label>
                    <input type="checkbox" class="mr-2">
                    <span>{{ $value[0] }} {{ $value[1] }}</span>
                    <input type="hidden" name="ingredient[]" value="{{ $value[0] }} {{ $value[1] }}">
                </label>
            </li>
@endforeach
@endforeach
        </ul>
        <!-- <input type="hidden" name="name" value="value"> -->
        <div id="btn-area">
{!! Form::submit('save', ['id' => 'save-btn', 'class' => 'btn btn-secondary btn-sm']) !!}
            <!-- <button type="submit" id="save-btn" class="btn btn-secondary btn-sm">save</button> -->
            <button type="button" id="edit-btn" class="btn btn-primary btn-sm">edit</button>
            <button type="button" id="complete-btn" class="btn btn-success btn-sm">complete</button>
        </div>
{!! Form::close() !!}
</div>

<script>
    $(document).on('click', '#btn-area #edit-btn', function() {
        $('li').each(function(index) {
            $(this).append('<input type="text" value="' +
                $(this).children('label').children('span').text() +
            '">');
            $(this).children('label').children('span').remove();
        });
        $('#btn-area #edit-btn').hide();
        $('#btn-area #complete-btn').show();
    });
    $(document).on('click', '#btn-area #complete-btn', function() {
        $('li').each(function(index) {
            $(this).children('label').append('<span>' +
                $(this).children('input').val() +
            '</span>');
            $(this).children('input').remove();
        });
        $('#btn-area #edit-btn').show();
        $('#btn-area #complete-btn').hide();
    });

</script>
@endsection
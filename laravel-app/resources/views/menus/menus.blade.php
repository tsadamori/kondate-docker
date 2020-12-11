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

    <script>
        $(document).on('click', '.menu-btn .add-menu-btn', function() {
            kondateList = $('#kondate-list ul');
            id = $(this).data('id');
            name = $(this).data('name');
            kondateList.append(
                `<li class="ml-3" data-id=` + id + `>`
                     + name + 
                    `<button type="button" class="btn btn-sm btn-danger kondate-remove">
                        REMOVE
                    </button>
                    <input type="hidden" name="kondate-id[]" value="` + id + `">
                </li>`
            );
            data = {id: id};

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'menus/add_kondate',
                data: data,
                dataType: 'json',
            }).done(function(res) {
                console.log('done');
            }).fail(function(res) {
                console.log('fail');
            });
            window.sessionStorage.setItem('menuId', id);
            console.log(window.sessionStorage.getItem('menuId'));
        });

        $(document).on('click', '.kondate-remove', function() {
            $(this).parent().remove();
        });

        $('#search-btn').on('click', function() {
            var data = {
                keyword: $('input[name="keyword"]').val(),
                category1_id: $('select[name="category1_id"]').val(),
                category2_id: $('select[name="category2_id"]').val(),
            };
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'menus/search',
                data: data,
                dataType: 'json',
            }).done(function(res) {
                var target = $('#menus-list ul.list-group');
                while(target[0].firstChild) {
                    target[0].removeChild(target[0].firstChild);
                }
                $.each(res, function(index, value){
                    html =
                        `<li class="list-group-item">
                            <div class="row">
                                <div class="col-7">
                                    <div>
                                        <a href="menus/` + value.id + `">` + value.name + `</a>
                                        <span style="font-size: 12px;">　カテゴリ1: ` + value.category1_mod + `　カテゴリ2: ` + value.category2_mod + `</span>
                                    </div>

                                    <div class="mt-1">
                                        <a href="img/` + value.img_name + `"><img src="img/` + value.img_name + `" height="100"></a>
                                    </div>
                                </div>
                                <div class="menu-btn col-5 text-right">
                                    <form method="POST" action="menus/10" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">
                                        <button class="add-menu-btn btn btn-sm btn-primary" type="button" data-id="` + value.id + `" data-name="` + value.name + `">add to kondate</button>
                                        <a href="menus/` + value.id + `/edit" class="btn btn-sm btn-success">edit</a>
                                        <input class="btn btn-sm btn-danger" type="submit" value="delete">
                                    </form>
                                </div>
                            </div>
                        </li>`;
                    target.append(html);
                });
                $('ul.pagination').hide();
            }).fail(function(res) {
            });
        });
    </script>
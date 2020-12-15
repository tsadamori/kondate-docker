$(document).on('click', '.menu-btn .add-menu-btn', function() {
    kondateList = $('#kondate-list ul');
    id = $(this).data('id');
    name = $(this).data('name');
    kondateList.append(
        `<li class="ml-3" data-id=` + id + `>`
             + name + 
            `<button type="button" class="btn btn-sm btn-danger ml-3 kondate-remove">
                REMOVE
            </button>
            <input type="hidden" name="kondate-id[]" value="` + id + `">
        </li>`
    );
    data = {id: id};

    $('#generate-kondate-btn').show();

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

$(document).on('click', '#search-btn', function() {
    console.log($('#keyword').val());
    var data = {
        keyword: $('#keyword').val(),
        category1_id: $('#category1_id').val(),
        category2_id: $('#category2_id').val(),
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
        if(res.length !== 0) {
            $.each(res, function(index, value){
                html =
                    `<li>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <a href="menus/` + value.id + `">` + value.name + `</a>　
                                    <br class="d-lg-none">
                                    <span class="small">カテゴリ1: ` + value.category1_mod + `　カテゴリ2: ` + value.category2_mod + `</span>
                                </div>
    
                                <div class="mt-1">
                                    <a href="img/` + value.img_name + `"><img src="img/` + value.img_name + `" height="100"></a>
                                </div>
                            </div>
                            <div class="menu-btn col-6 text-right">
                                <form method="POST" action="menus/10" accept-charset="UTF-8" class="form-group">
                                    <input class="form-control" name="_method" type="hidden" value="DELETE">
                                    <button class="add-menu-btn btn btn-sm btn-dark form-control" type="button" data-id="` + value.id + `" data-name="` + value.name + `">献立に入れる</button>
                                    <a href="menus/` + value.id + `/edit" class="btn btn-sm btn-dark form-control">編集</a>
                                    <input class="btn btn-sm btn-danger form-control" type="submit" value="削除">
                                </form>
                            </div>
                        </div>
                    </li>`;
                target.append(html);
            });
        } else {
            html = '<p>献立はありません。</p>';
            target.append(html);
        }
        $('ul.pagination').hide();
    }).fail(function(res) {
        console.log('fail');
    });
});

$(document).on('click', '#create-form .add-btn, #edit-form .add-btn', function() {
    $('#ingredient-form')
        .append(
            `<div class="form-inline mb-2">
            <label for="ingredients[]">材料: </label>
            <input type="text" name="ingredients[]" class="ml-1 form-control">
            <label for="ingredients_count[]" class="ml-3">数量: </label>
            <input type="text" name="ingredients_count[]" class="ml-1 form-control">
            <input type="button" value="＋", class="ml-3 add-btn btn btn-sm">
            <input type="button" value="ー", class="minus-btn btn btn-sm">
            </div>`
        );
});

$(document).on('click', '.minus-btn', function() {
    $(this).parent().remove();
});

function onChangeFileInput(fileInput) {
    var file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function() {
            $('#thumbnail').show();
            $('#thumbnail-img').attr('src', reader.result);
        };
        reader.readAsDataURL(file);
    }
}
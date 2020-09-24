<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>献立アプリ</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    </head>

    <body>        
        <div class="container">
            @yield('content')
        </div>
        
        <script>
            $('.menu-btn .add-menu-btn').on('click', function() {
                kondateList = $('#kondate-list ul');
                id = $(this).data('id');
                name = $(this).data('name');
                kondateList.append('<li class="list-group-item ml-3"><a href="menus/' + id + '">' + name + '</a><button type="button" class="btn btn-sm btn-danger">REMOVE</button></li>');
            });

            $('#search-btn').on('click', function() {
                var data = {
                    keyword: $('input[name="keyword"]').val(),
                    category1: $('select[name="category1_id"]').val(),
                    category2: $('select[name="category2_id"]').val(),
                };

                $.ajax({
                    type: 'post',
                    url: 'menus/search',
                    data: data,
                    dataType: 'json',
                }).done(function(res) {
                    console.log(res);
                }).fail({

                });
            });

            $(document).on('click', '.add-btn', function() {
                $('#ingredient-form') //append($('.ingredient-form-item').clone());
                    .append('<div class="form-inline">' + 
                        '<input type="text" name="ingredient" class="form-control">' +
                        '<input type="button" value="+", class="add-btn btn btn-sm">' +
                        '<input type="button" value="-", class="minus-btn btn btn-sm">' +
                        '</div>');
            });
            $(document).on('click', '.minus-btn', function() {
                $(this).parent().remove();
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
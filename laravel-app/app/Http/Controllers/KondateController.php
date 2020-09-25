<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KondateController extends Controller
{
    public function generate_kondate_list() {
        $('#kondate-list').text('');
    }
}

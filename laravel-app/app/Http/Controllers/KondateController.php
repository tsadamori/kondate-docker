<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Kondate;

class KondateController extends Controller
{
    public function generate_kondate_list() {
        $kondate_ids = $_POST['kondate-id'];
        $ingredients_list = [];

        foreach($kondate_ids as $kondate_id) {
            $menu = Menu::where('id', $kondate_id)->get()->first();
            $ingredients_list[] = array_chunk(explode(',', $menu->ingredients), 2);
        }
        return view('menus/kondate_list', ['ingredients_list' => $ingredients_list]);
    }
}

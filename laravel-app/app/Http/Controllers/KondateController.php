<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Kondate;

class KondateController extends Controller
{
    public function generate_kondate_list() {
        $kondate_ids = isset($_POST['kondate-id']) ? $_POST['kondate-id'] : null;
        $ingredients_list = [];

        if($kondate_ids == null) {
            return redirect('/');
        }

        foreach($kondate_ids as $kondate_id) {
            $menu = Menu::where('id', $kondate_id)->get()->first();
            $ingredients_list[] = array_chunk(explode(',', $menu->ingredients), 2);
        }

        $kondate = new Kondate;

        return view('menus/kondate_list', [
            'kondate' => $kondate,
            'ingredients_list' => $ingredients_list,
        ]);
    }

    public function save_kondate_list() {

    }
}

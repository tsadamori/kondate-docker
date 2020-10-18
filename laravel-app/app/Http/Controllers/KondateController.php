<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Kondate;

class KondateController extends Controller
{
    public function history() {
        $kondate = Kondate::all();

        return view('kondate/history', [
            'kondate' => $kondate,
        ]);
    }

    public function history_detail($id) {
        $menu = Menu::where('id', $id)->get()->first();
        var_dump($menu);
        exit;
    }

    public function generate_kondate_list() {
        $kondate_ids = isset($_POST['kondate-id']) ? $_POST['kondate-id'] : null;
        $ingredients_list = [];

        if($kondate_ids == null) {
            return redirect('/');
        }

        foreach($kondate_ids as $kondate_id) {
            $menu = Menu::where('id', $kondate_id)->get()->first();
            $ingredients_list[$menu->id]['name'] = $menu->name;
            $ingredients_list[$menu->id]['ingredient'] = array_chunk(explode(',', $menu->ingredients), 2);
        }

        $kondate = new Kondate;

        return view('kondate/kondate_list', [
            'kondate' => $kondate,
            'ingredients_list' => $ingredients_list,
        ]);
    }

    public function save_kondate_list(Request $request) {
        $this->validate($request, [
            'id' => 'required',
        ]);

        //menu_idを配列から文字列に変更
        $menu_id = implode(',', $_POST['id']);

        $kondate = new Kondate;
        $kondate->menu_id = $menu_id;
        $kondate->save();

        return view('kondate/save_complete');
    }
}

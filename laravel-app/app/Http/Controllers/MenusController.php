<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Kondate;

class MenusController extends Controller
{
    public function index(Request $request) {
        if(\Auth::check()) {
            $user = \Auth::user();
            $menus = Menu::orderBy('id', 'desc')->paginate(10);
            $kondate = new Kondate;
            $data = [
                'user' => $user,
                'menus' => $menus,
                'kondate' => $kondate,
            ];

            return view('menus.index', $data);
        }

        return view('welcome');
    }

    public function show($id) {
        $menu = Menu::find($id);

        return view('menus.show', [
            'menu' => $menu
        ]);
    }

    public function create() {
        $menu = new Menu;
        
        return view('menus.create', [
            'menu' => $menu,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:191',
            'content' => 'max:191',
            // 'ingredients' => 'required|max:191',
        ]);

        $ingredients = $request->ingredients;
        $ingredients_count = $request->ingredients_count;
        $ingredients_array = [];

        for ($i = 0; $i < count($ingredients); $i++) {
            array_push($ingredients_array, !is_null($ingredients[$i]) ? $ingredients[$i] : '');
            array_push($ingredients_array, !is_null($ingredients_count[$i]) ? $ingredients_count[$i] : '');
        }

        $insert_ingredients = implode(',', $ingredients_array);

        $menu = new Menu;
        $menu->name = $request->name;
        $menu->content = !empty($request->content) ? $request->content : null;
        $menu->ingredients = $insert_ingredients;
        $menu->category1_id = !empty($request->category1_id) ? $request->category1_id : null;
        $menu->category2_id = !empty($request->category2_id) ? $request->category2_id : null;
        $menu->outside_link = !empty($request->outside_link) ? $request->outside_link: null;
        $menu->save();

        return redirect('/');
    }

    public function edit($id) {
        $menu = Menu::find($id);

        return view('menus.edit', [
            'menu' => $menu,
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:191',
            'content' => 'max:191',
            // 'ingredients' => 'required|max:191',
        ]);
        
        $ingredients = $request->ingredients;
        $ingredients_count = $request->ingredients_count;
        $ingredients_array = [];

        for ($i = 0; $i < count($ingredients); $i++) {
            array_push($ingredients_array, !is_null($ingredients[$i]) ? $ingredients[$i] : '');
            array_push($ingredients_array, !is_null($ingredients_count[$i]) ? $ingredients_count[$i] : '');
        }

        $insert_ingredients = implode(',', $ingredients_array);

        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->content = !empty($request->content) ? $request->content : null;
        $menu->ingredients = $insert_ingredients;
        $menu->category1_id = !empty($request->category1_id) ? $request->category1_id : null;
        $menu->category2_id = !empty($request->category2_id) ? $request->category2_id : null;
        $menu->outside_link = !empty($request->outside_link) ? $request->outside_link: null;
        $menu->save();

        return redirect('/');
    }

    public function destroy($id) {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('/');
    }

    public function search(Request $request) {
        if(!empty($request->category1_id) && !empty($request->category2_id)) {
            $menus = Menu::where('name', 'like', "%{$request->keyword}%")
                // ->orWhere('content', 'like', "%{$request->keyword}%")
                ->where('category1_id', $request->category1_id)
                ->where('category2_id', $request->category2_id)
                ->orderBy('id', 'desc')
                ->get();
        } else if(empty($request->category1_id) && !empty($request->category2_id)) {
            $menus = Menu::where('name', 'like', "%{$request->keyword}%")
            // ->orWhere('content', 'like', "%{$request->keyword}%")
                ->where('category2_id', $request->category2_id)
                ->orderBy('id', 'desc')
                ->get();
        } else if(!empty($request->category1_id) && empty($request->category2_id)) {
            $menus = Menu::where('name', 'like', "%{$request->keyword}%")
            // ->orWhere('content', 'like', "%{$request->keyword}%")
                ->where('category1_id', $request->category1_id)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $menus = Menu::where('name', 'like', "%{$request->keyword}%")
            // ->orWhere('content', 'like', "%{$request->keyword}%")
                ->orderBy('id', 'desc')
                ->get();
        }
        return response()->json($menus);
    }
}

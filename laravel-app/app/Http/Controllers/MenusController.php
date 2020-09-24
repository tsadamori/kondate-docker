<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenusController extends Controller
{
    public function index(Request $request) {
        if(\Auth::check()) {
            $user = \Auth::user();

            if(!isset($request->keyword)) {
                $menus = Menu::orderBy('id', 'desc')->paginate(10);
            } else {
                $menus = Menu::where('name', 'like', "%{$request->keyword}%")->orderBy('id', 'desc')->paginate(10);
            }
            $data = [
                'user' => $user,
                'menus' => $menus,
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
            'content' => 'required|max:191',
            'ingredients' => 'required|max:191',
        ]);

        $menu = new Menu;
        $menu->name = $request->name;
        $menu->content = !empty($request->content) ? $request->content : null;
        $menu->ingredients = $request->ingredients;
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
            'content' => 'required|max:191',
            'ingredients' => 'required|max:191',
        ]);

        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->content = !empty($request->content) ? $request->content : null;
        $menu->ingredients = $request->ingredients;
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
    // echo json_encode($request->category2_id);
        // $menus = Menu::where('category1_id', $request->category1_id)->get();
        if(!empty($request->category1_id) && !empty($request->category1_id)) {
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

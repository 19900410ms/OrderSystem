<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateMenu;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        return view('menu.index');
    }

    public function create()
    {
        return view('menu/create');
    }

    public function store(CreateMenu $request)
    {
        $menu = new Menu;

        $menu->name     = $request->input('name');
        $menu->image    = $request->input('image');
        $menu->price    = $request->input('price');
        $menu->category = $request->input('category');

        $menu->save();

        return redirect('menu/index');
    }

    public function show($id)
    {
        $menu = Menu::find($id);

        return view('menu.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::find($id);

        return view('menu.edit', compact('menu'));
    }

    public function update(CreateMenu $request, $id)
    {
        $menu = Menu::find($id);

        $menu->name     = $request->input('name');
        $menu->image    = $request->input('image');
        $menu->price    = $request->input('price');
        $menu->category = $request->input('category');

        $menu->save();
        
        return redirect('menu/index');
    }

    public function destroy($id)
    {
        return redirect('menu/index');
    }
}

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
        return view('menus.index');
    }

    public function create()
    {
        return view('menus/create');
    }

    public function store(CreateMenu $request)
    {
        $menu = new Menu;

        $menu->name     = $request->input('name');
        $menu->image    = $request->input('image');
        $menu->price    = $request->input('price');
        $menu->category = $request->input('category');

        $menu->save();

        return redirect('menus/index');
    }

    public function show($id)
    {
        return view('menus.show');
    }

    public function edit($id)
    {
        return view('menus.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect('menus/index');
    }

    public function destroy($id)
    {
        return redirect('menus/index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;;

use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        return view('menus.index');
    }

    public function create()
    {
        return redirect('menus/index');
    }

    public function store(Request $request)
    {
        return view('menus.store');
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
        return redirect('menu/index');
    }

    public function destroy($id)
    {
        return redirect('menu/index');
    }
}

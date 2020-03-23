<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateMenu;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus = DB::table('menus')
        ->select('id', 'name', 'image', 'price', 'category')
        ->orderBy('created_at', 'asc')
        ->get();

        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu/create');
    }

    public function store(CreateMenu $request)
    {
        $menu = new Menu;

        $menu->name     = $request->input('name');
        $menu->price    = $request->input('price');
        $menu->category = $request->input('category');

        if ($request->has('image')) {
            // イメージの取得
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder.$name.'.'.$image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $menu->image = $filePath;
        }


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
        $menu->price    = $request->input('price');
        $menu->category = $request->input('category');
        
        // 画像保存処理
        if ($request->has('image')) {
            // イメージの取得
            $image = $request->file('image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/uploads/images/';
            $filePath = $folder.$name.'.'.$image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $menu->image = $filePath;
        }

        $menu->save();
        
        return redirect('menu/index');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        $menu->delete();

        return redirect('menu/index');
    }

    // 画像保存
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}

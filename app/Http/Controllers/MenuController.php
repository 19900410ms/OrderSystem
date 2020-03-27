<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
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
            // バケットの`myprefix`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            // アップロードした画像のフルパスを取得
            $menu->image = Storage::disk('s3')->url($path);

            // ローカル環境 イメージの取得
            // $image = $request->file('image');
            // $name = Str::slug($request->input('name')).'_'.time();
            // $folder = '/uploads/images/';
            // $filePath = $folder.$name.'.'.$image->getClientOriginalExtension();
            // $this->uploadOne($image, $folder, 'public', $name);
            // $menu->image = $filePath;
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
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            $menu->image = Storage::disk('s3')->url($path);
            
            // $image = $request->file('image');
            // $name = Str::slug($request->input('name')).'_'.time();
            // $folder = '/uploads/images/';
            // $filePath = $folder.$name.'.'.$image->getClientOriginalExtension();
            // $this->uploadOne($image, $folder, 'public', $name);
            // $menu->image = $filePath;
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

    public function meat(Request $request)
    {
        $menus = DB::table('menus')->where('category', '=', 1)->get();

        return view('menu.category.meat', compact('menus'));
    }

    public function fish(Request $request)
    {
        $menus = DB::table('menus')->where('category', '=', 2)->get();

        return view('menu.category.fish', compact('menus'));
    }

    public function salada(Request $request)
    {
        $menus = DB::table('menus')->where('category', '=', 3)->get();

        return view('menu.category.salada', compact('menus'));
    }

    public function drink(Request $request)
    {
        $menus = DB::table('menus')->where('category', '=', 4)->get();

        return view('menu.category.drink', compact('menus'));
    }

    public function sweet(Request $request)
    {
        $menus = DB::table('menus')->where('category', '=', 5)->get();

        return view('menu.category.sweet', compact('menus'));
    }

    public function other(Request $request)
    {
        $menus = DB::table('menus')->where('category', '=', 6)->get();

        return view('menu.category.other', compact('menus'));
    }

    // 画像保存
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}

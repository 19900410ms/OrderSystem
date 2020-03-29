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
        if ($request->has('category')) {
            $menus = DB::table('menus')
            ->where('category', '=', $request->category)
            ->orderBy('created_at', 'asc')
            ->get();
        } else {
            $menus = DB::table('menus')
            ->orderBy('created_at', 'asc')
            ->get();
        }

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

    public function private(Request $request)
    {
        $menus = DB::table('menus')
        ->where('is_public', '=', '1')
        ->orderBy('created_at', 'asc')
        ->get();

        return view('menu.private', compact('menus'));
    }

    // メニューの非公開
    public function closed(Request $request, $id)
    {
        $menu = Menu::find($id);

        $menu->is_public = '1';

        $menu->save();

        return redirect('menu/private');
    }

    // メニューの公開
    public function open(Request $request, $id)
    {
        $menu = Menu::find($id);

        $menu->is_public = '2';

        $menu->save();

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

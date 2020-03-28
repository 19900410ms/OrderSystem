<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCheck;
use App\Models\Check;

class CheckController extends Controller
{
    public function index()
    {
        $checks = Check::orderBy('created_at', 'desc')
        ->get();

        return view('check.index', compact('checks'));
    }

    public function store(StoreCheck $request)
    {
        $check = new Check();

        $check->total_price = $request->total_price;
        $check->user_id = $request->user()->id;

        $check->save();

        return redirect('check/show/'.$check->id);
    }

    public function show($id)
    {
        $check = Check::find($id);

        return view('check.show', compact('check'));
    }

    public function update(Request $request, $id)
    {
        $check = Check::find($id);

        $check->status = $request->status;

        $check->save();

        return redirect('check/index');
    }

    public function destroy($id)
    {
        $check = Check::find($id);

        $check->delete();

        return redirect('check/index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Check;

class CheckController extends Controller
{
    public function index()
    {
        $checks = Check::all();

        return view('check.index', compact('checks'));
    }

    public function store(Request $request)
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

    public function destroy($id)
    {
        $check = Check::find($id);

        $check->delete();

        return redirect('check/index');
    }
}

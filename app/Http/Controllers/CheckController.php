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
}

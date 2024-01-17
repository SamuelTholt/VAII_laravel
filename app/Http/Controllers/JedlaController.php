<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jedla;

class JedlaController extends Controller
{

    public function index()
    {
        $jedla = Jedla::all();
        return view('jedla.index', compact('jedla'));
    }

    public function show(Jedla $jedlo)
    {
        return view('jedla.show', compact('jedlo'));
    }

    public function getMenu() {
        $menu = Jedla::all();
        return response()->json($menu);
    }
}

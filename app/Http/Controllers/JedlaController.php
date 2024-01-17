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

    public function addItem(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nazov' => 'required|string',
            'cena' => 'required|numeric|min:0|max:9999',
            'popis' => 'required|string',
            'alergeny' => 'string',
            'kategoria_id' => 'required|numeric|min:1|max:3',
        ]);

        // Create a new menu item
        $menuItem = Jedla::create($validatedData);

        // You can also perform additional actions if needed, such as sending a response or triggering events.

        return response()->json(['success' => true, 'message' => 'Menu item added successfully', 'data' => $menuItem]);
    }

}

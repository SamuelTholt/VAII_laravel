<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jedla;

class JedlaController extends Controller
{

    public function index()
    {
        $jedla = Jedla::all();
        return view('menu.index', compact('jedla'));
    }

    public function show(Jedla $jedlo)
    {
        return view('menu', compact('jedlo'));
    }

    public function getMenu() {
        $menu = Jedla::all();
        return response()->json($menu);
    }

    public function addItem(Request $request)
    {
        $validatedData = $request->validate([
            'nazov' => 'required|string',
            'cena' => 'required|numeric|min:0|max:9999',
            'popis' => 'required|string',
            'alergeny' => 'string',
            'kategoria_id' => 'required|numeric|min:1|max:3',
        ]);

        $menuItem = Jedla::create($validatedData);


        return response()->json(['success' => true, 'message' => 'Menu item added successfully', 'data' => $menuItem]);
    }

    public function edit($id)
    {

        $jedlo = Jedla::findOrFail($id);


        return view('editJedla', compact('jedlo'));
    }
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nazov' => 'required|string',
            'cena' => 'required|numeric|min:0|max:9999',
            'popis' => 'required|string',
            'alergeny' => 'string',
            'kategoria_id' => 'required|numeric|min:1|max:3',
        ]);


        $jedlo = Jedla::findOrFail($id);
        $jedlo->nazov = $validatedData['nazov'];
        $jedlo->cena = $validatedData['cena'];
        $jedlo->popis = $validatedData['popis'];
        $jedlo->alergeny = $validatedData['alergeny'];
        $jedlo->kategoria_id = $validatedData['kategoria_id'];
        $jedlo->save();

        return redirect()->route('menu')->with('message', 'Jedlo bolo úspešne aktualizované.');
    }

    public function destroy($id)
    {
        $jedlo = Jedla::findOrFail($id);

        $this->authorize('delete', $jedlo);

        $nazov = $jedlo->nazov;

        $jedlo->delete();

        return response()->json(['success' => true, 'message' => 'Jedlo bolo úspešne odstránené.']);
    }


}

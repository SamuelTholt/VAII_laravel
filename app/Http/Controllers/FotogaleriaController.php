<?php

namespace App\Http\Controllers;

use App\Models\Fotogaleria;
use Illuminate\Http\Request;

class FotogaleriaController extends Controller
{
    //

    public function index()
    {
        $foto = Fotogaleria::all();
        return view('fotogaleria.index', compact('foto'));
    }

    public function show(Fotogaleria $foto)
    {
        return view('fotogaleria', compact('foto'));
    }
    public function getPhoto() {
        $gallery = Fotogaleria::all();
        $gallery->transform(function ($item, $key) {
            $item->obrazok = asset('storage/obrazky/' . $item->obrazok);
            return $item;
        });
        return response()->json($gallery);
    }

    public function addItem(Request $request)
    {
        $validatedData = $request->validate([
            'nazov' => 'required|string',
            'typ_id' => 'required|numeric|min:1|max:2',
            'obrazok' => 'required|image',
        ]);

        if($request->hasFile('obrazok')){
            $filenameWithExt = $request->file('obrazok')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('obrazok')->getClientOriginalExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('obrazok')->storeAs('public/obrazky', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create new photo
        $photoItem = new Fotogaleria;
        $photoItem->nazov = $validatedData['nazov'];
        $photoItem->typ_id = $validatedData['typ_id'];
        $photoItem->obrazok = $fileNameToStore;
        $photoItem->save();

        return response()->json(['success' => true, 'message' => 'Photo item added successfully', 'data' => $photoItem]);
    }


    public function edit($id)
    {

        $foto = Fotogaleria::findOrFail($id);


        return view('editPhoto', compact('foto'));
    }
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nazov' => 'required|string',
            'typ_id' => 'required|numeric|min:1|max:2',
            'obrazok' => 'required|binary',
        ]);


        $foto = Fotogaleria::findOrFail($id);
        $foto->nazov = $validatedData['nazov'];
        $foto->typ_id = $validatedData['typ_id'];
        $foto->obrazok = $validatedData['obrazok'];
        $foto->save();

        return redirect()->route('fotogaleria')->with('message', 'Fotka bola úspešne aktualizovaná.');
    }

    public function destroy($id)
    {
        $foto = Fotogaleria::findOrFail($id);

        $this->authorize('delete', $foto);


        $foto->delete();

        return response()->json(['success' => true, 'message' => 'Fotka bola úspešne odstránená.']);
    }
}

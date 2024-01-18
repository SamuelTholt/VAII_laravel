<?php

namespace App\Http\Controllers;

use App\Models\Fotogaleria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create(Fotogaleria $foto)
    {
        return view('pridanieFotky', compact('foto'));
    }
    public function getPhoto() {
        $gallery = Fotogaleria::all();
        $gallery->transform(function ($item, $key) {
            $item->obrazok = asset('storage/obrazky/' . $item->obrazok);
            return $item;
        });
        return response()->json($gallery);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nazov' => 'required|string',
            'typ_id' => 'required|numeric|min:1|max:2',
            'obrazok' => 'required|image',
        ]);

        if($request->hasFile('obrazok')){
            $file = $request->file('obrazok');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            if (!Storage::exists('public/obrazky')) {
                Storage::makeDirectory('public/obrazky');
            }

            $path = $file->storeAs('public/obrazky', $fileNameToStore);

            if (!$path) {
                return redirect(route('fotogaleria'))->with('error', 'There was an error uploading the image.');
            }
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $photoItem = new Fotogaleria;
        $photoItem->nazov = $validatedData['nazov'];
        $photoItem->typ_id = $validatedData['typ_id'];
        $photoItem->obrazok = $fileNameToStore;
        $photoItem->save();

        return redirect(route('fotogaleria'));
    }



    public function edit($id)
    {

        $foto = Fotogaleria::findOrFail($id);


        return view('editFotky', compact('foto'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nazov' => 'required|string',
            'typ_id' => 'required|numeric|min:1|max:2',
            'obrazok' => 'image',
        ]);

        $foto = Fotogaleria::findOrFail($id);
        $foto->nazov = $validatedData['nazov'];
        $foto->typ_id = $validatedData['typ_id'];

        if ($request->hasFile('obrazok')) {
            $filenameWithExt = $request->file('obrazok')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('obrazok')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('obrazok')->storeAs('public/obrazky', $fileNameToStore);

            $foto->obrazok = $fileNameToStore;
        }

        $foto->save();

        return redirect()->route('fotogaleria')->with('message', 'Fotka bola úspešne aktualizovaná.');
    }


    public function destroy($id)
    {
        $foto = Fotogaleria::findOrFail($id);

        if ($foto->obrazok !== 'noimage.jpg') {
            Storage::delete('public/obrazky/' . $foto->obrazok);
        }

        $foto->delete();

        return redirect()->route('fotogaleria')->with('message', 'Fotka bola úspešne odstránená.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorie;
class KategorieController extends Controller
{
    public function index()
    {
        $kategorie = Kategorie::all();
        return view('kategorie.index', compact('kategorie'));
    }

    public function show(Kategorie $kategoria)
    {
        return view('kategorie.show', compact('kategoria'));
    }
}

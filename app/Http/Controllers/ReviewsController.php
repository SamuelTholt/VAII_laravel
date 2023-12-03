<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        // Načítanie všetkých recenzií s príslušnými používateľmi
        $reviews = Reviews::with('user')->orderBy('created_at', 'desc')->get();

        // Prenos recenzií do pohľadu
        return view('recenzie', compact('reviews'));
    }

    public function create()
    {
        return view('vytvorenieRecenzie');
    }

    public function store(Request $request)
    {
        // Validácia údajov
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'comments' => 'nullable',
            'star_rating' => 'required|integer|min:1|max:5'
        ]);

        // Vytvorenie novej recenzie
        $review = new Reviews;
        $review->user_id = $validatedData['user_id'];
        $review->comments = $validatedData['comments'];
        $review->star_rating = $validatedData['star_rating'];
        $review->save();

        // Presmerovanie alebo vrátenie odpovede
        return redirect(route('reviews.index'));
    }
}

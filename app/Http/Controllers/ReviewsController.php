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

    public function edit($id)
    {
        // Načítanie recenzie podľa ID
        $review = Reviews::findOrFail($id);

        // Prenos recenzie do pohľadu pre editáciu
        return view('editRecenzie', compact('review'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'comments' => 'required',
            'star_rating' => 'required|integer|min:1|max:5'
        ]);


        $review = Reviews::findOrFail($id);
        $review->comments = $validatedData['comments'];
        $review->star_rating = $validatedData['star_rating'];
        $review->save();

        return redirect()->route('reviews.index')->with('message', 'Recenzia bola úspešne aktualizovaná.');
    }

    public function destroy($id)
    {

        $review = Reviews::findOrFail($id);

        $this->authorize('delete', $review);

        $review->delete();
        return redirect()->route('reviews.index')->with('message', 'Recenzia bola úspešne odstránená.');
    }

    public function getStarRatings()
    {
        $starRatings = Reviews::pluck('star_rating');

        return response()->json($starRatings);
    }
}

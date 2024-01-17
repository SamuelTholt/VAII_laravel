<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Reviews::with('user')->orderBy('created_at', 'desc')->get();

        return view('recenzie', compact('reviews'));
    }

    public function create()
    {
        return view('vytvorenieRecenzie');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'comments' => 'required',
            'star_rating' => 'required|integer|min:1|max:5'
        ]);


        $review = new Reviews;
        $review->user_id = $validatedData['user_id'];
        $review->comments = $validatedData['comments'];
        $review->star_rating = $validatedData['star_rating'];
        $review->save();


        return redirect(route('reviews.index'));
    }

    public function edit($id)
    {

        $review = Reviews::findOrFail($id);


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

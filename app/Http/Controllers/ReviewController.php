<?php

namespace App\Http\Controllers;


use App\Models\reviews;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Review $review )
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

       // dd($request->input('comment'));
        
        $review->review()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'review_id' => $review->id
        ]);


    
        
        return redirect()->route('reviews.show', $review)->with('success', 'Review added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //Checks if the user is the owner or an admin
        if(auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('reviews.index')->width('error', 'Access denied.');
        }
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //Is this right?
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);
        
        $review->review()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'review_id' => $review->id
        ]);

        // determins what values can be edited
        $review->update($request->only(['rating', 'comment']));
        
        return redirect()->route('reviews.show', $review->review_id)->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        // Deletes a review from the database
    $review->delete();

    // Redirect back to the index page with a success message
    return to_route('reviews.show',$review->review_id )->with('success', 'Review deleted successfully!');
    }
}

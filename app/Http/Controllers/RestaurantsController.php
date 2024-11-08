<?php

namespace App\Http\Controllers;

use App\Models\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurants::all();
        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:500',
            'location' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Checks if the image has been uploaded and handles it
        if ($request->hasFile('image')) {
            $imageName = time(). '.' .$request->image->extension();
            $request->image->move(public_path('images/restaurants'), $imageName);
        }

        //Create a restaurant record in the database
        Restaurants::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Redirect to the index page with a success message
        return to_route('restaurants.index')->with('success', 'Restaurant created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurants $restaurants)
    {        
        return view('restaurants.show')->with('restaurants', $restaurants);                
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurants $restaurants, Request $request)
    {

        return view('restaurants.edit', compact('restaurants'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurants $restaurants)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:500',
            'location' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Checks if the image has been uploaded and handles it
        if ($request->hasFile('image')) {
            $imageName = time(). '.' .$request->image->extension();
            $request->image->move(public_path('images/restaurants'), $imageName);
        }

        //Update a restaurant record in the database
        $restaurants->update([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //Redirect to the index page with a success message
        return to_route('restaurants.index')->with('success', 'Restaurant updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Restaurants $restaurants)
{

    // Delete a restaurant from the database
    $restaurants->delete();

    // Redirect back to the index page with a success message
    return to_route('restaurants.index')->with('success', 'Restaurant deleted successfully!');
}

}

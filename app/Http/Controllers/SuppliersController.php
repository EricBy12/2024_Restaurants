<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Restaurants;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Gets all suppliers and restaurants related to each other.
        $suppliers = Supplier::with('restaurants')->get();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('suppliers.index')->with('error', 'Access Denied.');
        }
        // if you want to add restaurants to a supplier during create supplier.
        $restaurants = Restaurants::all();
        return view('suppliers.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|max:500',
            'phone' => 'required|max:500',
            'restaurants' => 'array'
        ]);

        // if ($request->hasFile('image')) {
        //     $imageName = time(). '.'$request->image->extension();
        //     $request->image->move(public_path('images/suppliers'))
        // }

        $supplier = Supplier::create($validated);

        if ($request->has('restaurants')) {
            $supplier->restaurants()->attach($request->restaurants);
        }

        //Create a supplier record in the database
        // Supplier::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        //Redirect to the index page with a success message
        return to_route('suppliers.index')->with('success', 'Supplier created successfully!');
    }

    /**
     * Display the specified resource.
     * Shows a single supplier record
     */
    public function show(Supplier $supplier)
    {
        //gets all of the supplier_restaurant ids from the from the pivot table and then gets the suppliers form the suppliers table
        $supplier->load('restaurants');
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier, Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('suppliers.index')->with('error', 'Access Denied');
        }

        return view('suppliers.edit', compact('supplier'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|max:500',
            'phone' => 'required|max:500',
        ]);

             


        // update a supplier record in the database
        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Redirect to the index page with a success message
        return to_route('suppliers.index')->with('success', 'Supplier updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Supplier $supplier)
{
    if (auth()->user()->role !== 'admin') {
        return redirect()->route('suppliers.index')->with('error', 'Access Denied');
    }

    // Deletes a restaurant from the database
    $supplier->delete();

    // Redirect back to the index page with a success message
    return to_route('suppliers.index')->with('success', 'Supplier deleted successfully!');
}
}

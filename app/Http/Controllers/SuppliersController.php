<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Suppliers::all();
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
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|max:500',
            'phone' => 'required|max:500',
        ]);

        //Create a supplier record in the database
        Suppliers::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Redirect to the index page with a success message
        return to_route('suppliers.index')->with('success', 'Supplier created successfully!');
    }

    /**
     * Display the specified resource.
     * Shows a single supplier record
     */
    public function show(suppliers $suppliers)
    {
        //loads the supplier with its reviews and the user that made the review       
        return view('suppliers.show')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suppliers $suppliers, Request $request)
    {

        return view('suppliers.edit', compact('suppliers'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suppliers $suppliers)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|max:500',
            'phone' => 'required|max:500',
        ]);

        //update a supplier record in the database
        Suppliers::update([
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
    public function destroy(Suppliers $suppliers)
    {
        // Deletes a supplier from the database
    $suppliers->delete();

    // Redirect back to the index page with a success message
    return to_route('suppliers.index')->with('success', 'Supplier deleted successfully!');
    }
}

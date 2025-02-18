<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Cupons = Cupon::paginate(10);
        return view('pages.cupons.index', compact('Cupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.cupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'discount' => 'required|numeric|min:0',
        ]);

        Cupon::create($request->all());

        return redirect('cupons')->with('success', "cupons has been registered successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cupon = Cupon::findOrFail($id); // Get the coupon by ID
    return view('pages.cupons.show', compact('cupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cupon = Cupon::findOrFail($id); // Get the coupon by ID
    return view('pages.cupons.update', compact('cupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'discount' => 'required|numeric|min:0',
        ]);

        $cupon = Cupon::findOrFail($id); // Find the coupon by ID
        $cupon->update($request->all()); // Update the coupon details

        return redirect('cupons')->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cupon::destroy($id);

        return redirect('cupons')->with('success', "cupons has been Deleted");
    }
}

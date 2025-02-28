<?php

namespace App\Http\Controllers;

use App\Models\Salereturndetail;
use Illuminate\Http\Request;

class SaleturndetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesReturnDetails = Salereturndetail::with('product')->paginate(5); // Fetch all records
        return view('sales_return_details.index', compact('salesReturnDetails'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

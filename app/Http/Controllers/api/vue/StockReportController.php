<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::select('id', 'name')->get();

        return response()->json([
            'product' => $product,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        $query = Stock::query();

        // Filter by Start Date
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        // Filter by End Date
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Filter by Product
        if ($request->product_id) {
            $query->where('product_id', $request->product_id);
        }

        $product = $query->orderBy('created_at', 'asc')->get(); // Get data
        $totalAmount = $query->sum('quantity');                 // Calculate total quantity

        return response()->json([
            'purchases' => $product,
            'totalAmount' => $totalAmount,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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

<?php

namespace App\Http\Controllers;

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
        $products = Product::all();
        return view('pages.stocks.report', [
            'stocks' => [],
            'products' => $products
        ]);
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
    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $productId = $request->product_id;

        $query = Stock::with('product');


        if ($startDate && $endDate) {
            $query->whereBetween('updated_at', [$startDate, $endDate]);
        }

        if (!empty($productId)) {
            $query->where('product_id', $productId);
        }

        $stocks = $query->orderBy('updated_at', 'asc')->get();
        $products = Product::all();

        return view('pages.stocks.report', compact('stocks', 'startDate', 'endDate', 'products', 'productId'));
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

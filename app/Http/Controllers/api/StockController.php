<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = DB::table('stock as s')
            ->select('p.id', 'p.name', DB::raw('SUM(s.quantity) as quantity'))
            ->join('products as p', 'p.id', '=', 's.product_id')
            ->groupBy('p.id', 'p.name')
            ->get();
        return response()->json(['stocks'=>$stocks]);
    }

    public function stock_join()
    {
        $stocks=Stock::with("product")->get();
        return response()->json(['purchase'=>$stocks]);
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
        // $request->validate([
        //     'product_id' => 'required',
        //     'quantity' => 'required',
        //     'remarks' => 'required',


        // ]);

        // Create a new stock record
        Stock::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'min_stock_leve' => $request->min_stock_leve,


        ]);

        // Redirect back with a success message
        return redirect('stock')->with('success', 'Stock added successfully!');
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
    // public function stock()
    // {
    //    $stock=
    // }
}

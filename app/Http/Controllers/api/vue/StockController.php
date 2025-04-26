<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = DB::table('stock as s')
            ->select('p.id', 'p.name', DB::raw('SUM(s.quantity) as quantity'))
            ->join('products as p', 'p.id', '=', 's.product_id')
            ->groupBy('p.id', 'p.name');

        // Apply search if keyword exists
        if ($search) {
            $query->where('p.name', 'like', "%{$search}%");
        }

        $stocks = $query->get();

        return response()->json([
            'stocks' => $stocks,
            'links' => [], // Optional: remove if you're not using pagination
        ]);
    }


    // public function stock_join()
    // {
    //     $stocks=Stock::with("product")->get();
    //     return response()->json(['purchase'=>$stocks]);
    // }

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

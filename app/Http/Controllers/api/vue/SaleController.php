<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Sale::with(['customer', 'payment_status']);

        if ($request->search) {
            $search = $request->search;

            $query->whereHas('customer', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('total_amount', 'like', '%' . $search . '%')
            ->orWhere('sale_date', 'like', '%' . $search . '%');
        }

        $sales = $query->orderBy('id', 'desc')->paginate(5)->appends(['search' => $request->search]);

        return response()->json($sales);
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

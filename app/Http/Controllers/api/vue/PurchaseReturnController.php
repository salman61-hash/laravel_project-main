<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PurchaseReturn;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PurchaseReturn::with('suppliers');

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('purchase_id', 'like', '%' . $request->search . '%')
                  ->orWhere('supplier.name', 'like', '%' . $request->search . '%');
            });

        }

        $purchase_return = $query->paginate(2)->appends(['search' => $request->search]);

        return response()->json($purchase_return);
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

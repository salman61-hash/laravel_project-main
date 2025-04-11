<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Purchase::with(['supplier','payment_status']);

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $purchase = $query->paginate(2)->appends(['search' => $request->search]);

        return response()->json($purchase);
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
        try {
            $purchase =  Purchase::destroy($id);
            return response()->json(["purchase" => $purchase]);
        } catch (\Throwable $th) {
            return response()->json(["purchase" => $th]);
        }
    }
}

<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PurchasesDetails;
use Illuminate\Http\Request;

class PurchaseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PurchasesDetails::with('product');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $purchase_details = $query->paginate(2)->appends(['search' => $request->search]);

        return response()->json($purchase_details);
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
            $PurchasesDetails =  PurchasesDetails::destroy($id);
            return response()->json(["PurchasesDetails" => $PurchasesDetails]);
        } catch (\Throwable $th) {
            return response()->json(["PurchasesDetails" => $th]);
        }
    }
}

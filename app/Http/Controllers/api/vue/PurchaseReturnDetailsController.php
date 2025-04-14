<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Purchasereturndetail;
use Illuminate\Http\Request;

class PurchaseReturnDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Purchasereturndetail::with('product');

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");


        }

        $purchase_return_details = $query->paginate(2)->appends(['search' => $request->search]);

        return response()->json($purchase_return_details);
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

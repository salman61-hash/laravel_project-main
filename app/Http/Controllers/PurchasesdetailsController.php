<?php

namespace App\Http\Controllers;

use App\Models\PurchasesDetails;
use Illuminate\Http\Request;

class PurchasesdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        $purchaseDetails = PurchasesDetails::with('product')->paginate(10);
        return view('pages.purchases_details.index', compact('purchaseDetails'));

=======
        // Fetch purchase details with the related 'supplier' and 'user'
        $purchaseDetails = PurchasesDetails::with(['purchase.supplier', 'purchase.user', 'product'])->paginate(10);

        return view('pages.purchases_details.index', compact('purchaseDetails'));
>>>>>>> cbd6008b1b1762cbb387cdd5e12aeb3aae33cda1
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

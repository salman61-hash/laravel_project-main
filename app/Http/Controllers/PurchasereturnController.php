<?php

namespace App\Http\Controllers;

use App\Models\PurchaseReturn;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchasereturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchase_returns=PurchaseReturn::paginate(3);
        return view('pages.purchase_return.index',compact('purchase_returns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers=Supplier::all();
        return view('pages.purchase_return.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the incoming request
    $request->validate([
        "supplier_id" => 'required|exists:suppliers,id',
        "purchase_id" => 'required|exists:purchases,id',
        "reason" => 'required|min:5',
        "return_amount" => 'required|numeric|min:1',
    ]);

    // Create a new PurchaseReturn instance
    $purchaseReturn = new PurchaseReturn();


    $purchaseReturn->supplier_id = $request->supplier_id;
    $purchaseReturn->purchase_id = $request->purchase_id;
    $purchaseReturn->reason = $request->reason;
    $purchaseReturn->return_amount = $request->return_amount;

    // Save the purchase return to the database
    if ($purchaseReturn->save()) {
        return redirect('purchase_return')->with('success', "Purchase return has been recorded successfully.");
    }

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

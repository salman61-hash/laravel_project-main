<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PurchaseReturn;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchasereturn = PurchaseReturn::all();
        return response()->json(['purchaseReturn' => $purchasereturn]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        print_r($request->all());



        

        $returnpurchase = new PurchaseReturn();

        $returnpurchase->supplier_id = $request->supplier_id;
        $returnpurchase->refund_amount = $request->total_amount;
        $returnpurchase->discount = $request->discount;
        $returnpurchase->vat = $request->vat;
        $returnpurchase->return_date = now(); // Laravel's helper function

        date_default_timezone_set("Asia/Dhaka"); // Set timezone once at the beginning
        $returnpurchase->created_at = date('Y-m-d H:i:s');
        $returnpurchase->updated_at = date('Y-m-d H:i:s');

        $returnpurchase->save(); // Save the object to the database

        // if($ss){
        //     return redirect('')->with('success', 'fuck you');
        // }

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

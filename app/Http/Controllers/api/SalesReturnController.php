<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Salereturn;
use App\Models\Salereturndetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class SalesReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesreturn = Salereturn::all();
        return response()->json(['salesreturn' => $salesreturn]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r($request->all());

        $returnsales = new Salereturn;

        $returnsales->customer_id = $request->customer_id;
        $returnsales->refund_amount = $request->total_amount;
        $returnsales->discount = $request->discount;
        $returnsales->vat = $request->vat;
        $returnsales->return_date = now(); // Laravel's helper function

        date_default_timezone_set("Asia/Dhaka"); // Set timezone once at the beginning
        $returnsales->created_at = date('Y-m-d H:i:s');
        $returnsales->updated_at = date('Y-m-d H:i:s');

        $returnsales->save(); // Save the object to the database

        $lastInsertedId = $returnsales->id;

        $productsdata = $request->products;

        // $subtotal=0;

        foreach ($productsdata as $value) {
            $salesreturnsdetail = new Salereturndetail();
            $salesreturnsdetail->salereturn_id =  $lastInsertedId ;
            $salesreturnsdetail->product_id = $value['item_id'];
            $salesreturnsdetail->description = $value['description'];
            $salesreturnsdetail->quantity = $value['qty'];
            $salesreturnsdetail->price = $value['price'];
            $salesreturnsdetail->total = $value['total'];
            $salesreturnsdetail->discount = $value['discount'];
            $salesreturnsdetail->total_discount = $value['total_discount'];
            $salesreturnsdetail->vat =$request->vat;
            date_default_timezone_set("Asia/Dhaka");
            $salesreturnsdetail->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $salesreturnsdetail->updated_at = date('Y-m-d H:i:s');

            $salesreturnsdetail->save();



            // $preturnDetails = new Salereturndetail();
            // // print_r($value['price']);
            // $preturnDetails->salereturn_id = $lastInsertedId;
            // $preturnDetails->product_id = $value['item_id'];
            // $preturnDetails->description = $value['description'];
            // $preturnDetails->quantity = $value['qty'];
            // $preturnDetails->price = $value['price'];
            // $preturnDetails->total = $value['total'];
            // $preturnDetails->discount = $value['discount'];
            // $preturnDetails->total_discount = $value['total_discount'];
            // $preturnDetails->vat = $request->vat;
            // $preturnDetails->subtotal = $value['subtotal'];

            // $preturnDetails->created_at = date('Y-m-d H:i:s');
            // $preturnDetails->updated_at = date('Y-m-d H:i:s');



            // Uncomment if stock needs to be updated
            $stock = new Stock;
            $stock->product_id = $value['item_id'];
            $stock->quantity = $value['qty'] * (+1);
            $stock->remarks ="Sales_Return";
            $stock->save();
        }

        return response()->json(['success'=>"sales confirmed successfully"]);
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

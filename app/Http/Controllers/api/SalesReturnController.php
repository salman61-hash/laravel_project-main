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

        $productsdata=$request->products;



        foreach($productsdata as $key => $value) {


            // print_r($value['price']);
            $returnDetails=new Salereturndetail;
            $returnDetails->salereturn_id=$lastInsertedId;
            $returnDetails->product_id= $value['item_id'];
            $returnDetails->description= $value['description'];
            $returnDetails->quantity= $value['qty'];
            $returnDetails->price= $value['price'];
            $returnDetails->discount= $value['discount'];
            $returnDetails->vat= $request->vat;
            date_default_timezone_set("Asia/Dhaka");
            $returnDetails->created_at=date('Y-m-d H:i:s');
             date_default_timezone_set("Asia/Dhaka");
            $returnDetails->updated_at=date('Y-m-d H:i:s');

            $returnDetails->save();


            // $stock= new Stock;
            // $stock->product_id=$value['item_id'];
            // $stock->quantity=$value['qty'] * (-1);
            // // $stock ->payment_status_id=$request->payment_status;

            // $stock->save();
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

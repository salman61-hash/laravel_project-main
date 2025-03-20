<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchasesDetails;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function find_product()
    {
        $product = Product::get();
		return response()->json(['product'=> $product]);
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




    public function react_store(Request $request)
    {

        print_r($request->all());

        try {



       $purchase = new Purchase();
       $purchase->supplier_id=$request->supplier['id'];
       $purchase->purchase_date=now();
       $purchase->total_amount=$request->total;
       $purchase->payment_status_id=1;
       date_default_timezone_set("Asia/Dhaka");
		$purchase->created_at=date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
		$purchase->updated_at=date('Y-m-d H:i:s');
		$purchase->save();
        $lastInsertedId = $purchase->id;

        $productsdata=$request->items;



        foreach ($productsdata as $key => $value) {
            // print_r($value['item_id']);
            $purchase_details= new PurchasesDetails();
            $purchase_details->purchase_id=$lastInsertedId;
            $purchase_details->product_id= $value['product_id'];
            $purchase_details->quantity= $value['quantity'];
            $purchase_details->price= $value['unit_price'];
            $purchase_details->discount= $value['discount'];
            $purchase_details->vat= null;
            date_default_timezone_set("Asia/Dhaka");
            $purchase_details->created_at=date('Y-m-d H:i:s');
             date_default_timezone_set("Asia/Dhaka");
            $purchase_details->updated_at=date('Y-m-d H:i:s');

            $purchase_details->save();


            $stock= new Stock();
            $stock->product_id=$value['product_id'];
            $stock->quantity=$value['quantity'] * (+1);
            $stock->remarks="Purchase";
            // $stock ->payment_status_id=$request->payment_status;

            $stock->save();


        }

        return response()->json(['success'=>"Purchase confirmed successfully"]);

    } catch (\Throwable $th) {
        return response()->json(['err'=> $th->getMessage()]);
    }
}
}

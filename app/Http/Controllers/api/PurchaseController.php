<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchasesDetails;
use App\Models\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchase=Purchase::all();
        return response()->json(['purchase'=>$purchase]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    print_r($request->all());
       $purchase = new Purchase;
       $purchase->supplier_id=$request->supplier_id;
       $purchase->purchase_date=now();
       $purchase->total_amount=$request->total_amount;
       $purchase->payment_status_id=$request->payment_status;
       date_default_timezone_set("Asia/Dhaka");
		$purchase->created_at=date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
		$purchase->updated_at=date('Y-m-d H:i:s');
		$purchase->save();
        $lastInsertedId = $purchase->id;

        $productsdata=$request->products;



        foreach ($productsdata as $key => $value) {
            // print_r($value['item_id']);
            $purchase_details= new PurchasesDetails;
            $purchase_details->purchase_id=$lastInsertedId;
            $purchase_details->product_id= $value['item_id'];
            $purchase_details->quantity= $value['qty'];
            $purchase_details->price= $value['price'];
            $purchase_details->discount= $value['discount'];
            $purchase_details->vat= $request->vat;
            date_default_timezone_set("Asia/Dhaka");
            $purchase_details->created_at=date('Y-m-d H:i:s');
             date_default_timezone_set("Asia/Dhaka");
            $purchase_details->updated_at=date('Y-m-d H:i:s');

            $purchase_details->save();

            // foreach ($productsdata as $key => $value) {
            //     // print_r( $value['item_id']);
            //     $orderdetails= new PurchasesDetails;
            //       $orderdetails->sale_id=$lastInsertedId;
            //       $orderdetails->product_id= $value['item_id'];
            //       $orderdetails->cupon_id= $value['coupon_id'];
            //       $orderdetails->quantity= $value['qty'];
            //       $orderdetails->price= $value['price'];
            //       $orderdetails->discount= $value['discount'];
            //       $orderdetails->vat= $request->vat;


            //       $orderdetails->save();







            $stock= new Stock;
            $stock->product_id=$value['item_id'];
            $stock->quantity=$value['qty'] * (+1);
            $stock ->payment_status_id=$request->payment_status;

            $stock->save();


        }

        return response()->json(['success'=>"Purchase confirmed successfully"]);
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

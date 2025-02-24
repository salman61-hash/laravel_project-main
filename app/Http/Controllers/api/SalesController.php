<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales=Sale::all();
        return response()->json(['sales'=>$sales]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $sales = new Sale;
		$sales->customer_id=$request->customer_id;
		$sales->sale_date=now();

		$sales->total_amount=$request->total_amount;

		$sales->payment_status_id=$request->payment_status;
		// $sales->discount=$request->discount;
		// $sales->vat=$request->vat;
        date_default_timezone_set("Asia/Dhaka");
		$sales->created_at=date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
		$sales->updated_at=date('Y-m-d H:i:s');
		$sales->save();
        $lastInsertedId = $sales->id;

        $productsdata=$request->products;


        foreach ($productsdata as $key => $value) {
            // print_r( $value['item_id']);
            $orderdetails= new SaleDetail;
              $orderdetails->sale_id=$lastInsertedId;
              $orderdetails->product_id= $value['item_id'];
              $orderdetails->cupon_id= $value['coupon_id'];
              $orderdetails->quantity= $value['qty'];
              $orderdetails->price= $value['price'];
              $orderdetails->discount= $value['discount'];
              $orderdetails->vat= $request->vat;


              $orderdetails->save();
        // $lastInsertedId = $order->id;

        }

        return response()->json(['success'=>"order confirmed successfully"]);
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

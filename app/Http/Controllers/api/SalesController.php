<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
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
        // print_r($request->all());
        $order = new Sale;
		$order->customer_id=$request->customer_id;
		$order->order_date=now();
		// $order->delivery_date= date('Y-m-d H:i:s', strtotime('+7 days'));
		// $order->shipping_address= "";   //$request->shipping_address;
		$order->total_amount=$request->total_amount;
		// $order->paid_amount=$request->paid_amount;
		// $order->remark="";   //$request->remark;
		$order->payment_status_id=2;
		$order->discount=$request->discount;
		$order->vat=$request->vat;
        date_default_timezone_set("Asia/Dhaka");
		$order->created_at=date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
		$order->updated_at=date('Y-m-d H:i:s');
		$order->save();
        $lastInsertedId = $order->id;

        $productsdata=$request->products;
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

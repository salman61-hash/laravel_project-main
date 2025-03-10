<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Stock;
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
        date_default_timezone_set("Asia/Dhaka");
		$sales->created_at=date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
		$sales->updated_at=date('Y-m-d H:i:s');
		$sales->save();
        $lastInsertedId = $sales->id;

        $productsdata=$request->products;


        foreach ($productsdata as $key => $value) {
            // print_r( $value['item_id']);
            $sales= new SaleDetail;
              $sales->sale_id=$lastInsertedId;
              $sales->product_id= $value['item_id'];
              $sales->cupon_id= $value['coupon_id'];
              $sales->quantity= $value['qty'];
              $sales->price= $value['price'];
              $sales->discount= $value['discount'];
              $sales->vat= $request->vat;
              date_default_timezone_set("Asia/Dhaka");
            $sales->created_at=date('Y-m-d H:i:s');
             date_default_timezone_set("Asia/Dhaka");
            $sales->updated_at=date('Y-m-d H:i:s');
              $sales->save();



              $stock= new Stock;
              $stock->product_id=$value['item_id'];
              $stock->quantity=$value['qty'] * (-1);
              $stock->remarks="Sales";
            //   $stock ->payment_status_id=$request->payment_status;

              $stock->save();



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

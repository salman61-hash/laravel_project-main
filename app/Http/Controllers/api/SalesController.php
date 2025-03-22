<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
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
        $sales = Sale::with(['customer', 'payment_status'])->get();
        return response()->json(['sales' => $sales]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sales = new Sale;
        $sales->customer_id = $request->customer_id;
        $sales->sale_date = now();
        $sales->total_amount = $request->total_amount;
        $sales->payment_status_id = $request->payment_status;
        $sales->save();

        $lastInsertedId = $sales->id;
        $productsData = $request->products;

        foreach ($productsData as $key => $value) {
            $saleDetail = new SaleDetail;
            $saleDetail->sale_id = $lastInsertedId;
            $saleDetail->product_id = $value['item_id'];
            $saleDetail->cupon_id = $value['coupon_id'];
            $saleDetail->quantity = $value['qty'];
            $saleDetail->price = $value['price'];
            $saleDetail->discount = $value['discount'];
            $saleDetail->vat = $request->vat;
            $saleDetail->save();

            $stock = new Stock;
            $stock->product_id = $value['item_id'];
            $stock->quantity = $value['qty'] * (-1);
            $stock->remarks = "Sales";
            $stock->save();
        }

        return response()->json(['success' => "order confirmed successfully"]);
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

    public function react_store(Request $request)
    {
        // Log the request data for debugging purposes
        // print_r($request->all());

        $sales = new Sale;
        $sales->customer_id = $request->customer_id;
        $sales->sale_date = now();
        $sales->total_amount = $request->total;
        $sales->payment_status_id = 1;
        $sales->save();

        $lastInsertedId = $sales->id;
        $productsData = $request->items;

        foreach ($productsData as $key => $value) {
            $saleDetail = new SaleDetail;
            $saleDetail->sale_id = $lastInsertedId;
            $saleDetail->product_id = $value['product_id'];
            $saleDetail->cupon_id = 2;
            $saleDetail->quantity = $value['quantity'];
            $saleDetail->price = $value['unit_price'];
            $saleDetail->discount = $value['discount'];
            $saleDetail->vat = null;
            $saleDetail->save();

            $stock = new Stock;
            $stock->product_id = $value['product_id'];  // Changed 'item_id' to 'product_id' to be consistent
            $stock->quantity = $value['quantity'] * (-1);
            $stock->remarks = "Sales";
            $stock->save();
        }

        return response()->json(['success' => "order confirmed successfully"]);
    }

    public function find_customer(Request $request)
    {
        $customer = Customer::all();
        return response()->json(['customer' => $customer]);
    }
}

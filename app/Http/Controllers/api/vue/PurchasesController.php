<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchasesDetails;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $suppliers = Supplier::all();
            $payment_status = PaymentStatus::all();
            $products = Product::all();


            return response()->json(compact('suppliers', 'products', 'payment_status'));
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }



    public function Manage_purchase(Request $request)
    {
        $query = Purchase::with(['supplier', 'payment_status']);

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $purchase = $query->paginate(10)->appends(['search' => $request->search]);
        return response()->json($purchase);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function Process(Request $request)
    {
        // print_r($request->all());
        $purchase = new Purchase;
        $purchase->supplier_id=$request->supplier['id'];
        $purchase->purchase_date=now();
        $purchase->total_amount=$request->grandtotal;
        $purchase->payment_status_id=$request->payment_status['id'];
        date_default_timezone_set("Asia/Dhaka");
         $purchase->created_at=date('Y-m-d H:i:s');
         date_default_timezone_set("Asia/Dhaka");
         $purchase->updated_at=date('Y-m-d H:i:s');
         $purchase->save();

         $lastInsertedId = $purchase->id;

         $productsdata=$request->products;



         foreach ($productsdata as $key => $value) {
             // print_r($value['item_id']);
             $purchase_details= new PurchasesDetails();
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


             $stock= new Stock;
             $stock->product_id=$value['item_id'];
             $stock->quantity=$value['qty'] * (+1);
             $stock->remarks="Purchase";
             // $stock ->payment_status_id=$request->payment_status;

             $stock->save();


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

<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use App\Models\Customer;
use App\Models\PaymentStatus;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function Manage(Request $request)
    {
        $query = Sale::with(['customer','payment_status']);

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sales = $query->paginate(2)->appends(['search' => $request->search]);

        return response()->json($sales);
    }




    public function index(Request $request)
    {
        try {
            $customers= Customer::all();
            $payment_status = PaymentStatus::all();
            $products= Product::all();
            $cupons = Cupon::all();
            return response()->json(compact('customers','products','cupons','payment_status'));
         } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()]);
         }
    }


    public function status(){
        try {

            $payment_status = PaymentStatus::all();


            return response()->json(compact('payment_status'));
         } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()]);
         }
    }











    /**
     * Store a newly created resource in storage.
     */
    public function Process(Request $request)
    {

try {

        $sales = new Sale();
        $sales->customer_id = $request->customer['id'];
        $sales->sale_date = now();
        $sales->total_amount = $request->grandtotal;
        $sales->payment_status_id = $request->payment_status['id'];
        date_default_timezone_set("Asia/Dhaka");
		$sales->created_at=date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
		$sales->updated_at=date('Y-m-d H:i:s');
        $sales->save();




        // $lastInsertedId = $sales->id;
        // $productsData = $request->products;

        // foreach ($productsData as $key => $value) {
        //     $saleDetail = new SaleDetail();
        //     $saleDetail->sale_id = $lastInsertedId;
        //     $saleDetail->product_id = $value['item_id'];
        //     $saleDetail->cupon_id = $value['cupon_id'];
        //     $saleDetail->quantity = $value['qty'];
        //     $saleDetail->price = $value['price'];
        //     $saleDetail->discount = $value['discount'];
        //     $saleDetail->vat = $request->vat;
        //     $saleDetail->save();

        //     $stock = new Stock();
        //     $stock->product_id = $value['item_id'];
        //     $stock->quantity = $value['qty'] * (-1);
        //     $stock->remarks = "Sales";
        //     $stock->save();
        // }

        $sales= $request->all();
        return response()->json(["success"=> $sales]);
} catch (\Throwable $th) {
    return response()->json(["err"=> $th->getMessage()]);
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
}

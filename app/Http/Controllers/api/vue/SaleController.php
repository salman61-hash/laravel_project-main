<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use App\Models\Customer;
use App\Models\PaymentStatus;
use App\Models\Product;
use App\Models\Profit;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function Manage(Request $request)
    {
        $query = Sale::with(['customer', 'payment_status']);

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $sales = $query->paginate(2)->appends(['search' => $request->search]);
        return response()->json($sales);
    }

    public function index(Request $request)
    {
        try {
            $customers = Customer::all();
            $payment_status = PaymentStatus::all();
            $products = Product::all();
            $cupons = Cupon::all();

            return response()->json(compact('customers', 'products', 'cupons', 'payment_status'));
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function status()
    {
        try {
            $payment_status = PaymentStatus::all();
            return response()->json(compact('payment_status'));
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function Process(Request $request)
    {
        try {
            // Set timezone once
            date_default_timezone_set("Asia/Dhaka");

            $sale = new Sale();
            $sale->customer_id = $request->customer['id'];
            $sale->sale_date = now();
            $sale->total_amount = $request->grandtotal;
            $sale->payment_status_id = $request->payment_status['id'];
            $sale->created_at = date('Y-m-d H:i:s');
            $sale->updated_at = date('Y-m-d H:i:s');
            $sale->save();

            $productsData = $request->products;

            foreach ($productsData as $value) {
                $saleDetail = new SaleDetail();
                $saleDetail->sale_id = $sale->id;
                $saleDetail->product_id = $value['item_id'];
                $saleDetail->cupon_id = $value['cupon_id'] ?? null;  // Safe fallback
                $saleDetail->quantity = $value['qty'];
                $saleDetail->price = $value['price'];
                $saleDetail->discount = $value['discount'];
                $saleDetail->vat = $request->vat;
                $saleDetail->save();

                // If you want to update stock, uncomment below:

                $stock = new Stock();
                $stock->product_id = $value['item_id'];
                $stock->quantity = $value['qty'] * (-1);
                $stock->remarks = "Sales";
                $stock->save();


                $profit = new Profit();
                $profit ->name = "Sales";
                $profit ->amount = $value['profit'];
                $profit -> remarks = "Revenue";
                $profit->save();


            }

            return response()->json(["success" => "Order confirmed successfully!", "data" => $request->all()]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

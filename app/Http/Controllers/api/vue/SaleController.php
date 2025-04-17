<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
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

            $products= Product::all();
            $cupons = Cupon::all();
            return response()->json(compact('customers','products','cupons'));
         } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()]);
         }
    }











    /**
     * Store a newly created resource in storage.
     */
    public function process(Request $request)
    {
     $allData= $request->all();
     return response()->json(["allData"=> $allData]);
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

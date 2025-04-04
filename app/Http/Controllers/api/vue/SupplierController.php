<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $suppliers = Supplier::all();
            if (!$suppliers) {
                $suppliers ="Data Not Found";
            }
            return response()->json(["suppliers"=> Supplier::all()]);
        } catch (\Throwable $th) {

            return response()->json(["error"=> $th->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->save();

            return response()->json(["res" => $supplier]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $suppliers = Supplier::find();
            if(!$suppliers){
                return response()->json(["message" => "No Data found"]);
            }
            return response()->json(["suppliers" => $suppliers]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
                $supplier = Supplier::find($request->id);
                if (!$supplier) {
                    return response()->json(["message" => "suppliers not found"]);
                }

                $supplier->name = $request->name;
                $supplier->phone = $request->phone;
                $supplier->email = $request->email;
                $supplier->address = $request->address;
                $supplier->save();

                return response()->json(["res" => $supplier]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $suppliers=  Supplier::destroy($id);
            return response()->json(["suppliers"=> $suppliers]);
        } catch (\Throwable $th) {
            return response()->json(["suppliers"=>$th]);
        }
    }
}

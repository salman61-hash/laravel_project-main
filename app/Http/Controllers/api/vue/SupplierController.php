<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        try {
            $suppliers = Supplier::all();
            if ($suppliers->isEmpty()) {
                return response()->json(["message" => "No suppliers found"]);
            }
            return response()->json(["suppliers" => $suppliers]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->contact_person = $request->contact_person;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->save();

            return response()->json(["res" => $supplier]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }

    public function show(string $id)
    {
        try {
            $supplier = Supplier::find($id);
            if (!$supplier) {
                return response()->json(["message" => "No Data found"]);
            }
            return response()->json(["supplier" => $supplier]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $supplier = Supplier::find($id);
            if (!$supplier) {
                return response()->json(["message" => "Supplier not found"]);
            }

            $supplier->name = $request->name;
            $supplier->contact_person = $request->contact_person;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->save();

            return response()->json(["res" => $supplier]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $supplier = Supplier::find($id);
            if (!$supplier) {
                return response()->json(["message" => "Supplier not found"]);
            }

            $supplier->delete();
            return response()->json(["message" => "Supplier deleted successfully"]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}

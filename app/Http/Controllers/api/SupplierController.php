<?php

namespace App\Http\Controllers\api;

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
        $supplier = Supplier::get();
		return response()->json(['supplier'=> $supplier]);
    }
    public function find_supplier()
    {
        $supplier = Supplier::get();
		return response()->json(['supplier'=> $supplier]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $supplier = Supplier::create([
                'name' => $request->name,
                'contact_persone' => $request->contact_persone,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address
            ]);

            return response()->json(['status' => 201, 'message' => 'Supplier created successfully!', 'data' => $supplier]);

        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suppliers=Supplier::find($id);
        return response()->json(['suppliers' =>   $suppliers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

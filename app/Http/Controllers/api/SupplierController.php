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
                'contact_person' => $request->contact_person,
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
        $suppliers=Supplier::find($id);
        return response()->json(['message' => 'suppliers updated successfully']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => 'required|min:3',
            "contact_person" => 'required|min:3',
            "phone" => 'required',
            "email" => 'required|email|min:3',
            "address" => 'required|min:3',
        ]);

        // Create a new supplier instance
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->contact_person = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;

        // Save the supplier to the database
        if ($supplier->save()) {
            return response()->json(['message' => 'supplier Update Successfully Done!', 'status'=> 201]);
        } else {
            return back()->with('error', "There was an issue with supplier Update.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

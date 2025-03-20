<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::all();
        return response()->json(['customers'=>$customers]);
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

        $request->validate([
            "name" => 'required|min:3',
            "phone" => 'required',
            "email" => 'required|email|min:3',
            "address" => 'required|min:3',
        ]);

        // Create a new customer instance
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;

        // Save the customer to the database
        if ($customer->save()) {
            return response()->json(['message' => 'Customer Saved Successfully Done!', 'status'=> 201]);
        } else {
            return response()->json(['message' => 'Can not save cutomer.', 'staus'=> 501]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer=Customer::find($id);
        return response()->json(['customer' =>   $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer=Customer::find($id);
        return response()->json(['message' => 'Customer updated successfully']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => 'required|min:3',
            "phone" => 'required',
            "email" => 'required|email|min:3',
            "address" => 'required|min:3',
        ]);

        // Create a new customer instance
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;

        // Save the customer to the database
        if ($customer->save()) {
            return response()->json(['message' => 'Customer Update Successfully Done!', 'status'=> 201]);
        } else {
            return back()->with('error', "There was an issue with customer Update.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully'], 200);
    }
}

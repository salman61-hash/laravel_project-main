<?php

namespace App\Http\Controllers\api\vue;

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


        try {
            $customers = Customer::all();
            if (!$customers) {
                $customers ="Data Not Found";
            }
            return response()->json(["customer"=> Customer::all()]);
        } catch (\Throwable $th) {

            return response()->json(["error"=> $th->getMessage()]);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        try {
            $customers=  Customer::destroy($id);      
            return response()->json(["customers"=> $customers]);
        } catch (\Throwable $th) {
            return response()->json(["customers"=>$th]);
        }
    }
}

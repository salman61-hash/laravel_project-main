<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request)
    {


        $query = Customer::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $customers = $query->paginate(2); // Paginate 5 users per page

        return response()->json($customers);

    }


    public function store(Request $request)
    {
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->save();

            return response()->json(["res" => $customer]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }


    public function show(string $id)
    {
        try {
            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json(["message" => "No Data found"]);
            }

            return response()->json(["customer" => $customer]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            $customer = Customer::find($request->id);

            if (!$customer) {
                return response()->json(["message" => "Customer not found"]);
            }

            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->save();

            return response()->json(["res" => $customer]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }


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

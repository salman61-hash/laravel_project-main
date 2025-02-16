<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Customers=Customer::paginate(5);

        return view('pages.customer.index',compact('Customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request
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
        return redirect('customers')->with('success', "Customer has been registered successfully.");
    } else {
        return back()->with('error', "There was an issue with customer registration.");
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer=Customer::find($id);
        return view('pages.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $customer=Customer::find($id);
       return view('pages.customer.update',compact('customer'));
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
            return redirect('customers')->with('success', "Customer has been registered successfully.");
        } else {
            return back()->with('error', "There was an issue with customer registration.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::destroy($id);

        return redirect('customers')->with('success', "customers has been Deleted");
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform the search using 'like' to find partial matches in any column.
        $Customers = Customer::where('name', 'like', "%{$query}%")
            ->orWhere('phone', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orWhere('address', 'like', "%{$query}%")
            ->paginate(10);

        // Return the view with the results.
        return view('pages.customer.index', compact('Customers'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PaymentStatus;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with(['customer', 'user', 'payment_status'])->paginate(10);

        return view('pages.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $users = User::all();
        $payment_statuses = PaymentStatus::all();

        // Return the view and pass the data
        return view('pages.sales.create', compact('customers', 'users', 'payment_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'user_id' => 'required|exists:users,id',
            'sale_date' => 'required|date',
            'total_amount' => 'required|numeric',
            // 'payment_status' => 'required|exists:payment_statuses,id',
        ]);

        // Create the new sale record in the database
        Sale::create([
            'customer_id' => $request->customer_id,
            'user_id' => $request->user_id,
            'sale_date' => $request->sale_date,
            'total_amount' => $request->total_amount,
            'payment_status' => $request->payment_status,
        ]);

        // Redirect to the sales index page with a success message
        return redirect('sales')->with('success', 'Sale added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::findOrFail($id);
    $customers = Customer::all(); // Retrieve customers
    $users = User::all(); // Retrieve users
    $payment_statuses = PaymentStatus::all(); // Retrieve payment statuses

    return view('pages.sales.show', compact('sale', 'customers', 'users', 'payment_statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sale = Sale::findOrFail($id);
    $customers = Customer::all(); // Retrieve customers
    $users = User::all(); // Retrieve users
    $payment_statuses = PaymentStatus::all(); // Retrieve payment statuses

    return view('pages.sales.update', compact('sale', 'customers', 'users', 'payment_statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'user_id' => 'required|exists:users,id',
            'sale_date' => 'required|date',
            'total_amount' => 'required|numeric',
            // 'payment_status_id' => 'required|exists:payment_status,id',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($validatedData);

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        Sale::destroy($id);
        return redirect('sales')->with('success',"Student has been Deleted");
    }
}

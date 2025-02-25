<?php

namespace App\Http\Controllers;

use App\Models\PaymentStatus;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'user','payment_status'])->paginate(5);

        return view('pages.purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::get();  // Get all suppliers
        $users = User::get();  // Get all users
        $payment_statuses = PaymentStatus::get();  // Get all Payment Status
        $products = Product::get();  // Get all Payment Status

        return view('pages.purchases.create', compact('suppliers', 'users', 'payment_statuses','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|numeric|exists:suppliers,id',
            'user_id' => 'required|numeric|exists:users,id',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric|min:1',
            'payment_status_id' => 'required|string',
        ]);

        // Create a new Purchase object
        $purchase = new Purchase();

        // Assign validated data to the Purchase model
        $purchase->supplier_id = $request->supplier_id;
        $purchase->user_id = $request->user_id;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->total_amount = $request->total_amount;
        $purchase->payment_status_id = $request->payment_status_id;

        // Save the Purchase data to the database
        if ($purchase->save()) {
            return redirect()->route('purchases.index')->with('success', 'Purchase has been registered successfully.');
        } else {
            return redirect()->route('purchases.index')->with('error', 'Failed to register purchase.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get the purchase by its ID
        $purchase = Purchase::findOrFail($id);
        $suppliers = Supplier::get();  // Get all suppliers
        $users = User::get();  // Get all users
        $payment_statuses = PaymentStatus::get();  // Get all Payment Status

        return view('pages.purchases.show', compact('purchase', 'suppliers', 'users', 'payment_statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // Get the purchase by its ID
       $purchase = Purchase::findOrFail($id);
       $suppliers = Supplier::get();  // Get all suppliers
       $users = User::get();  // Get all users
       $payment_statuses = PaymentStatus::get();  // Get all Payment Status

       return view('pages.purchases.update', compact('purchase', 'suppliers', 'users', 'payment_statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'supplier_id' => 'required|numeric|exists:suppliers,id',
            'user_id' => 'required|numeric|exists:users,id',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric|min:1',
            'payment_status_id' => 'required|string',
        ]);

        // Create a new Purchase object
        $purchase = Purchase::find($id);

        // Assign validated data to the Purchase model
        $purchase->supplier_id = $request->supplier_id;
        $purchase->user_id = $request->user_id;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->total_amount = $request->total_amount;
        $purchase->payment_status_id = $request->payment_status_id;

        // Save the Purchase data to the database
        if ($purchase->save()) {
            return redirect()->route('purchases.index')->with('success', 'Purchase has been updated successfully.');
        } else {
            return redirect()->route('purchases.index')->with('error', 'Failed to update purchase.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=Purchase::destroy($id);
        if($result){
         return redirect('purchases')->with('success', "purchases has been Deleted");
        }
    }


    public function find_supplier(Request $request){
		$supplier = Supplier::find($request->id);
		return response()->json(['supplier'=> $supplier]);
	}
    public function find_product(Request $request){
		$products = Product::find($request->id);
		return response()->json(['product'=> $products]);
	}





}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\WithdrawType;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdraws=Withdraw::with(['product','withdrawtype','user'])->paginate(5);
        return view('pages.withdraw.index',compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        $withdrawTypes = WithdrawType::all();

        return view('pages.withdraw.create', compact('users', 'products', 'withdrawTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'withdraw_type_id' => 'required|exists:withdraw_type,id',
            'product_id' => '',
            'quantity' => '',
            'amount' => 'required|numeric|min:0',
            'withdraw_date' => 'required|date',
        ]);

        Withdraw::create([
            'user_id' => $request->user_id,
            'withdraw_type_id' => $request->withdraw_type_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'withdraw_date' => $request->withdraw_date,
        ]);

        return redirect('withdraw')->with('success', 'Withdraw record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $withdraw = Withdraw::findOrFail($id);

        // Pass the withdraw data and related tables (users, products, withdraw types) to the view
        $users = User::all();
        $products = Product::all();
        $withdrawTypes = WithdrawType::all();

        return view('pages.withdraw.update', compact('withdraw', 'users', 'products', 'withdrawTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $withdraw = Withdraw::findOrFail($id);

        // Update the withdraw record with validated data
        $withdraw->update([
            'user_id' => $request->user_id,
            'withdraw_type_id' => $request->withdraw_type_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'amount' => $request->amount,
            'withdraw_date' => $request->withdraw_date,
        ]);

        // Redirect with success message
        return redirect()->route('withdraw.index')->with('success', 'Withdraw updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Withdraw::destroy($id);

        return redirect('withdraw')->with('success', "withdraw has been Deleted");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses=Expense::with('user','expense_type')->paginate(5);
        return view('pages.expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $expense_types = ExpenseType::all();
        return view('pages.expense.create', compact('users', 'expense_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'expense_type_id' => 'required',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
        ]);

        Expense::create([
            'user_id' => $request->user_id,
            'expense_type_id' => $request->expense_type_id,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
        ]);

        return redirect('expense')->with('success', 'Expense added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expense = Expense::findOrFail($id);
        $expenseTypes = ExpenseType::all();

        return view('pages.expense.show', compact('expense', 'expenseTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense = Expense::findOrFail($id);
        $expenseTypes = ExpenseType::all();

        return view('pages.expense.update', compact('expense', 'expenseTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'expense_type_id' => 'required|exists:expense_type,id',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update([
            'expense_type_id' => $request->expense_type_id,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
        ]);

        return redirect()->route('expense.index')->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Expense::destroy($id);

        return redirect('expense')->with('success', "expense has been Deleted");
    }
}

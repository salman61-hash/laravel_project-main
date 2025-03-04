<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();
        $expense_types = ExpenseType::all();
        $expenses = collect([]); // Ensure expenses is always defined

        return view('pages.expense.report', compact('users', 'expense_types', 'expenses'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function generateReport(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $userId = $request->user_id;
        $expenseTypeId = $request->expense_type_id;

        $query = Expense::whereBetween('expense_date', [$startDate, $endDate])
                        ->with('user', 'expense_type');

        if ($userId) {
            $query->where('user_id', $userId);
        }

        if ($expenseTypeId) {
            $query->where('expense_type_id', $expenseTypeId);
        }

        $expenses = $query->get();
        $totalAmount = $expenses->sum('amount');

        // Debugging: Check if data is retrieved
        if ($expenses->isEmpty()) {
            session()->flash('message', 'No expenses found for the selected date range.');
        }

        $users = User::all();
        $expense_types = ExpenseType::all();

        return view('pages.expense.report', compact('expenses', 'totalAmount', 'startDate', 'endDate', 'users', 'expense_types'));
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

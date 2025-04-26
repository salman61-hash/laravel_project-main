<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\Profit;
use App\Models\User;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        try {


            $user = User::all();
            $expense_type = ExpenseType::all();

            return response()->json(compact('user', 'expense_type'));
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }


    public function Manage_expense(Request $request)
    {
        $query = Expense::with(['expense_type','user']);

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $expense = $query->paginate(5); // Paginate 5 users per page

        return response()->json($expense);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $expense = new Expense();
            $expense->user_id = $request->user_id;
            $expense->expense_type_id = $request->expense_type_id;
            $expense->amount = $request->amount;
            $expense->expense_date = $request->expense_date;
            $expense->save();

            $profit = new Profit();
            $profit->name ='Expense';  // or use a dynamic value based on the type of expense
            $profit->remarks = 'Expense';
            $profit->amount = $request->amount;
            $profit->save();

            return response()->json(["res" => $expense]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $expense = Expense::find($id);

            if (!$expense) {
                return response()->json(["message" => "No Data found"]);
            }

            return response()->json(["expense" => $expense]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $expense = Expense::find($request->id);

            if (!$expense) {
                return response()->json(["message" => "expense not found"]);
            }

            $expense->name = $request->name;
            $expense->phone = $request->phone;
            $expense->email = $request->email;
            $expense->address = $request->address;
            $expense->save();

            return response()->json(["res" => $expense]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $expenses=  Expense::destroy($id);
            return response()->json(["expenses"=> $expenses]);
        } catch (\Throwable $th) {
            return response()->json(["expenses"=>$th]);
        }
    }
}

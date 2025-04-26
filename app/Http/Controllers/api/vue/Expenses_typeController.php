<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class Expenses_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ExpenseType::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $expense_type = $query->paginate(5); // Paginate 5 users per page

        return response()->json($expense_type);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $expense_type = new ExpenseType();
            $expense_type->name = $request->name;

            $expense_type->save();



            return response()->json(["res" => $expense_type]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
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
        //
    }
}

<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use Illuminate\Http\Request;

class ProfitReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        $query = Profit::query();

        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $profits = $query->orderBy('created_at', 'asc')->get();

        // Calculation
        $totalRevenue = $profits->where('remarks', 'Revenue')->sum('amount');
        $totalExpense = $profits->where('remarks', 'Expense')->sum('amount');
        $netProfit = $totalRevenue - $totalExpense;

        return response()->json([
            'data' => $profits,
            'totalRevenue' => $totalRevenue,
            'totalExpense' => $totalExpense,
            'netProfit' => $netProfit,
        ]);
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

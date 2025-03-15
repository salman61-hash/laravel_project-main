<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.income_statement.report');
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
    public function show(string $id)
    {
        //
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

    public function generateReport(Request $request)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $startDate = $request->start_date;
    $endDate = $request->end_date;




$profit = DB::select('
    SELECT
        (
            (SELECT SUM(total_amount) FROM sales) -
            (SELECT SUM(total_amount) FROM purchases) -
            (SELECT SUM(amount) FROM expenses)
        ) AS netprofit
   ');

   $totalsales=DB::select('SELECT sum(total_amount) totalsales FROM laravel.sales');
   $totalpurchases=DB::select('SELECT sum(total_amount) totalpurchases FROM laravel.purchases');
   $totalexpenses=DB::select('SELECT sum(amount) totalexpenses FROM laravel.expenses');



//    echo json_encode(  $profit);


     return view('pages.income_statement.report', compact('profit','totalpurchases' ,'totalsales', 'totalexpenses', 'startDate', 'endDate'));
}





// public function generateReport(Request $request)
// {
//     $request->validate([
//         'start_date' => 'required|date',
//         'end_date' => 'required|date|after_or_equal:start_date',
//     ]);

//     $startDate = $request->start_date;
//     $endDate = $request->end_date;

//     $profit = DB::select("
//     SELECT
//         (
//             (SELECT SUM(total_amount) FROM laravel.sales WHERE DATE(created_at) BETWEEN ? AND ?) -
//             (SELECT SUM(total_amount) FROM laravel.purchases WHERE DATE(created_at) BETWEEN ? AND ?) -
//             (SELECT SUM(amount) FROM laravel.expenses WHERE DATE(created_at) BETWEEN ? AND ?)
//         ) AS netprofit
// ", [$startDate, $endDate, $startDate, $endDate, $startDate, $endDate]);

// $totalsales = DB::select("SELECT SUM(total_amount) AS totalsales FROM laravel.sales WHERE DATE(created_at) BETWEEN ? AND ?", [$startDate, $endDate]);
// $totalpurchases = DB::select("SELECT SUM(total_amount) AS totalpurchases FROM laravel.purchases WHERE DATE(created_at) BETWEEN ? AND ?", [$startDate, $endDate]);
// $totalexpenses = DB::select("SELECT SUM(amount) AS totalexpenses FROM laravel.expenses WHERE DATE(created_at) BETWEEN ? AND ?", [$startDate, $endDate]);

// return view('pages.income_statement.report', compact('profit','totalpurchases' ,'totalsales', 'totalexpenses', 'startDate', 'endDate'));

//     }

}





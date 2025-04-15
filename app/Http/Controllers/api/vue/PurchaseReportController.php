<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $payment_statuses = PaymentStatus::all(); // Fetch all payment statuses
        return response()->json( ['suppliers' => $suppliers, 'payment_statuses' => $payment_statuses]);
        // return view('pages.purchases.report', ['purchases' => [], 'suppliers' => $suppliers, 'payment_statuses' => $payment_statuses]);
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
    public function purcahseReport(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $supplier_id = $request->supplier_id;
        $payment_status_id = $request->payment_status_id;

        $query = Purchase::query();

        if ($startDate && $endDate) {
            $query->whereBetween('purchase_date', [$startDate, $endDate]);
        }

        if ($supplier_id) {
            $query->where('supplier_id', $supplier_id);
        }

        if ($payment_status_id) {
            $query->where('payment_status_id', $payment_status_id);
        }

        $purchases = $query->orderBy('purchase_date', 'asc')->get();
        $totalAmount = $query->sum('total_amount'); // Total Amount Calculation

        $suppliers = Supplier::all();
         



        // return view('pages.purchases.report', );
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

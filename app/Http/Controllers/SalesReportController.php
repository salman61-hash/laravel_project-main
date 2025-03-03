<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PaymentStatus;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        $payment_statuses = PaymentStatus::all(); // Fetch all payment statuses
        return view('pages.sales.report', ['purchases' => [], 'customers' => $customers, 'payment_statuses' => $payment_statuses]);
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
    public function show(Request $request)
    {
        {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $customer_id = $request->customer_id;
            $payment_status_id = $request->payment_status_id;

            $query = Sale::query();

            if ($startDate && $endDate) {
                $query->whereBetween('sale_date', [$startDate, $endDate]);
            }

            if ($customer_id) {
                $query->where('customer_id', $customer_id);
            }

            if ($payment_status_id) {
                $query->where('payment_status_id', $payment_status_id);
            }

            $sales = $query->orderBy('sale_date', 'asc')->get();
            $totalAmount = $query->sum('total_amount'); // Total Amount Calculation

            $customers = Customer::all();
            $payment_statuses = PaymentStatus::all();

            return view('pages.sales.report', compact(
                'sales',
                'startDate',
                'endDate',
                'customers',
                'customer_id',
                'payment_statuses',
                'payment_status_id',
                'totalAmount'
            ));
        }
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

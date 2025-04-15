<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function data()
    {
        $suppliers = Supplier::all(['id', 'name']);
        $payment_statuses = PaymentStatus::all(['id', 'name']);

        return response()->json([
            'suppliers' => $suppliers,
            'payment_statuses' => $payment_statuses
        ]);
    }

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
        $totalAmount = $query->sum('total_amount');

        return response()->json([
            'purchases' => $purchases,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'supplier_id' => $supplier_id,
            'payment_status_id' => $payment_status_id,
            'totalAmount' => $totalAmount
        ]);
    }
}

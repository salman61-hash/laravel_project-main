<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::select('id', 'name')->get();
        $payment_statuses = PaymentStatus::select('id', 'name')->get();

        return response()->json([
            'suppliers' => $suppliers,
            'payment_statuses' => $payment_statuses,
        ]);
    }

    public function search(Request $request)
    {
        $query = Purchase::query();

        // Filter by Start Date
        if ($request->start_date) {
            $query->whereDate('purchase_date', '>=', $request->start_date);
        }

        // Filter by End Date
        if ($request->end_date) {
            $query->whereDate('purchase_date', '<=', $request->end_date);
        }

        // Filter by Supplier
        if ($request->supplier_id) {
            $query->where('supplier_id', $request->supplier_id);
        }

        // Filter by Payment Status
        if ($request->payment_status_id) {
            $query->where('payment_status_id', $request->payment_status_id);
        }

        $purchases = $query->orderBy('purchase_date', 'asc')->get();
        $totalAmount = $query->sum('total_amount');

        return response()->json([
            'purchases' => $purchases,
            'totalAmount' => $totalAmount,
        ]);
    }
}

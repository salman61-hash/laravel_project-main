<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Payments = Payment::paginate(10); // Fetch payments with pagination
        return view('pages.payments.index', compact('Payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts=Account::all();
        return view('pages.payments.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            // Validate the incoming request
            // $request->validate([
            //     "account_id" => 'required|integer',
            //     "transaction_type" => 'required|string',
            //     "debit" => 'nullable|numeric|min:0',
            //     "created_by" => 'required',
            //     "account_against" => 'required',
            //     "amount_paid" => 'required|numeric|min:0',
            //     "payment_date" => 'required|date',
            // ]);

            // Create a new Payment instance


            $payment = new Payment();
            $payment->account_id = $request->account_against ;
            $payment->transaction_type = $request->transaction_type;
            $payment->debit = $request->debit ??0;
            $payment->credit =0;
            $payment->created_by = 1;
            $payment->account_against = $request->account_id;
            $payment->amount_paid =$request->debit ;
            $payment->payment_date = $request->payment_date;
            $payment->save();


            $payment = new Payment();
            $payment->account_id = $request->account_id;
            $payment->transaction_type = $request->transaction_type;
            $payment->debit =0;
            $payment->credit = $request->debit ?? 0;
            $payment->created_by = 1;
            $payment->account_against = $request->account_against;
            $payment->amount_paid = $request->debit ;
            $payment->payment_date = $request->payment_date;

            // Save the payment to the database

            if ($payment->save()) {
                return redirect('payments')->with('success', "Payment has been recorded successfully.");
            } else {
                return back()->with('error', "There was an issue with payment recording.");
            }




        // Payment::create($request->all());

        // return redirect('payments')->with('success', "payments has been registered successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Payments = Payment::find($id); // Fetch payments with pagination
        return view('pages.payments.show', compact('Payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id); // Fetch payments with pagination
        return view('pages.payments.update', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request
        $request->validate([
            "account_id" => 'required|integer',
            "transaction_type" => 'required|string',
            "debit" => 'nullable|numeric|min:0',
            "credit" => 'nullable|numeric|min:0',
            "created_by" => 'required',
            "account_against" => 'required',
            "amount_paid" => 'required|numeric|min:0',
            "payment_date" => 'required|date',
        ]);

        // Create a new Payment instance
        $payment =Payment::find($id);
        $payment->account_id = $request->account_id;
        $payment->transaction_type = $request->transaction_type;
        $payment->debit = $request->debit ?? 0;
        $payment->credit = $request->credit ?? 0;
        $payment->created_by = $request->created_by;
        $payment->account_against = $request->account_against;
        $payment->amount_paid = $request->amount_paid;
        $payment->payment_date = $request->payment_date;

        // Save the payment to the database
        if ($payment->save()) {
            return redirect('payments')->with('success', "Payment has been recorded successfully.");
        } else {
            return back()->with('error', "There was an issue with payment recording.");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::destroy($id);

        return redirect('payments')->with('success', "payments has been Deleted");
    }
}

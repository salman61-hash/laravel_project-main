<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Salereturn;
use Illuminate\Http\Request;

class SalesreturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesReturns=Salereturn::paginate(5);
        return view('pages.sales_return.index',compact('salesReturns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers=Customer::all();
        $products=Product::all();
        return view('pages.sales_return.create',compact('customers','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id'=>'required|exists:products,id',
            'product_id' =>'required',
            'discount' =>'required',
            'vat' =>'required',
            'refund_amount'=>'required',
            'return_date'=>'required',
        ]);

        $returns=new Salereturn();

        $returns->customer_id = $request->customer_id;
        $returns->product_id = $request->product_id;
        $returns->discount = $request->discount;
        $returns->vat = $request->vat;
        $returns->refund_amount = $request->refund_amount;
        $returns->return_date = $request->return_date;


        if($returns->save()){
            return redirect('sales-returns')->with('success'," Return Success");
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

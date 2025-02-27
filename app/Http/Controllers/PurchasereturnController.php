<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseReturn;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchasereturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseReturns=PurchaseReturn::with('suppliers')->paginate(5);
        return view('pages.purchase_return.index',compact('purchaseReturns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $products=Product::all();
       $suppliers=Supplier::all();
       return view('pages.purchase_return.create',compact('products','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'purchase_id'=>'required|exists:products,id',
            'product_id' =>'required',
            'refund_amount'=>'required',
            'return_date'=>'required',
        ]);

        $returns=new PurchaseReturn();

        $returns->purchase_id = $request->purchase_id;
        $returns->product_id = $request->product_id;
        $returns->refund_amount = $request->refund_amount;
        $returns->return_date = $request->return_date;


        if($returns->save()){
            return redirect('purchase_returns')->with('success'," Return Success");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchaseReturn = PurchaseReturn::findOrFail($id);
        $purchases = Purchase::all();
        $products = Product::all();

        return view('pages.purchase_return.show', compact('purchaseReturn', 'purchases', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ensure the purchase return exists, or show a 404 error
        $purchaseReturn = PurchaseReturn::findOrFail($id);
        $purchases = Purchase::all();
        $products = Product::all();
        $suppliers=Supplier::all();

        return view('pages.purchase_return.update', compact('purchaseReturn', 'purchases', 'products','suppliers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'purchase_id'=>'required|exists:products,id',
            'product_id' =>'required',
            'refund_amount'=>'required',
            'return_date'=>'required',
        ]);

        $returns=PurchaseReturn::find($id);

        $returns->purchase_id = $request->purchase_id;
        $returns->product_id = $request->product_id;
        $returns->refund_amount = $request->refund_amount;
        $returns->return_date = $request->return_date;


        if($returns->save()){
            return redirect('purchase-returns')->with('success'," Return Success");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PurchaseReturn::destroy($id);
        return redirect('purchase-returns')->with('success', 'Return deleted successfully!');
    }
}

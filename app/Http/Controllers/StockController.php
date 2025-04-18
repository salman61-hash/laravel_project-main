<?php

namespace App\Http\Controllers;

use App\Models\PaymentStatus;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = DB::table('stock as s')
            ->select('p.id', 'p.name', DB::raw('SUM(s.quantity) as quantity'))
            ->join('products as p', 'p.id', '=', 's.product_id')
            ->groupBy('p.id', 'p.name')
            ->paginate(5);

        return view('pages.stocks.index', compact('stocks'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();


        return view('pages.stocks.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'remarks' => 'required',


        ]);

        // Create a new stock record
        Stock::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'min_stock_leve' => $request->min_stock_leve,


        ]);

        // Redirect back with a success message
        return redirect('stock')->with('success', 'Stock added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stock = Stock::findOrFail($id);
        $products = Product::all();


        return view('pages.stocks.show', compact('stock', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stock = Stock::findOrFail($id);
        $products = Product::all();


        return view('pages.stocks.update', compact('stock', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'min_stock_level' => 'required|integer',

        ]);

        // Find the stock record and update it
        $stock = Stock::findOrFail($id);
        $stock->update([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'min_stock_level' => $request->min_stock_level,

        ]);

        // Redirect back with a success message
        return redirect('stock')->with('success', 'Stock updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Stock::destroy($id);
        return redirect('stock')->with('success', 'Stock deleted successfully!');
    }





    public function updateStock(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $stock = Stock::where('product_id', $request->product_id)->first();

    if (!$stock) {
        return response()->json(['success' => false, 'message' => 'Stock not found!']);
    }

    if ($stock->quantity < $request->quantity) {
        return response()->json(['success' => false, 'message' => 'Not enough stock available!']);
    }

    // Create a new row in the stock table for the withdrawal
    $newStock = new Stock();
    $newStock->product_id = $request->product_id;
    $newStock->quantity = -$request->quantity; // Use negative quantity for withdrawal
    $newStock->remarks = 'withdraw';
    $newStock->save();

    // You may also want to track the original stock update elsewhere, like a transaction log

    return response()->json(['success' => true, 'message' => 'Stock withdrawal recorded successfully!']);
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Product2;
use Illuminate\Http\Request;

class ProductController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

// echo ('product_page');
            $results= Product2::get();
            // $result="";
            return view('pages.product.index', compact('results'));
            // return view('pages.product.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'sku' => 'required|alpha_num',
            'barcode' => 'required|alpha_num',
            'purchase_price' => 'required|numeric|min:1',
            'selling_price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:0',
            'min_stock' => 'required|numeric|min:0',
            'unit' => 'required|string',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = new Product2();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->sku = $request->sku;
        $product->barcode = $request->barcode;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->stock = $request->stock;
        $product->min_stock = $request->min_stock;
        $product->unit = $request->unit;

        // Handle file upload
        $photoName = $request->name . "." . $request->file('photo')->extension();
        $request->file('photo')->move(public_path('photo'), $photoName);
        $product->photo = $photoName;

        if ($product->save()) {
            return redirect('product')->with('success', "Product has been registered");
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $result=Product2::find($id);
        return view('pages.product.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $result=Product2::find($id);
        return view('pages.product.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = new Product2();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->sku = $request->sku;
        $product->barcode = $request->barcode;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->stock = $request->stock;
        $product->min_stock = $request->min_stock;
        $product->unit = $request->unit;

        // Handle file upload
        $photoName = $request->name . "." . $request->file('photo')->extension();
        $request->file('photo')->move(public_path('photo'), $photoName);
        $product->photo = $photoName;

        if ($product->save()) {
            return redirect('product')->with('success', "Product has been updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_view(string $id)
    {
        $result=Product2::find($id);
        return view('pages.product.delete',compact('result'));
    }
    public function destroy(Request $request)
    {
        $result=Product2::destroy($request->id);
        if($result){
            return redirect('pages.product')->with('success', "Student has been Deleted");
         }
    }

}

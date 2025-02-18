<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['categories'])->paginate(3);
        return view('pages.products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        return view('pages.products.create', compact('categories'));
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|min:3',
            'category_id' => 'required|numeric',
            'sku' => 'required|string',
            'barcode' => 'required|string',
            'purchase_price' => 'required|numeric|min:1',
            'selling_price' => 'required|numeric|min:1',
            // 'stock' => 'required|numeric|min:0',
            'min_stock' => 'required|numeric|min:0',
            'unit' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find product
        $product =new Product();

        // Update fields
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id ?? null;
        $product->sku = $request->sku;
        $product->barcode = $request->barcode;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        // $product->stock = $request->stock;
        $product->min_stock = $request->min_stock;
        $product->unit = $request->unit;

        // Han
        if ($request->file('photo')) {
            $photoname = $request->name . "." . $request->file('photo')->extension();

            $photoPath = public_path('photo/' . $photoname);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }

            $request->file('photo')->move(public_path('photo'), $photoname);
            $product->photo = $photoname;
        }else{
            $product->photo = $product->photo ;
        }


        if ($product->save()) {
            return redirect('product')->with('success', "Product has been registred");
        } else {
            echo "error";
        };
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $categories = Categories::all();
        return view('pages.Products.show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Categories::all();
        return view('pages.Products.update', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate request
        // $request->validate([
        //     'name' => 'required|min:3',
        //     'category_id' => 'required|numeric',
        //     'sku' => 'required|string',
        //     'barcode' => 'required|string',
        //     'purchase_price' => 'required|numeric|min:1',
        //     'selling_price' => 'required|numeric|min:1',
        //     'stock' => 'required|numeric|min:0',
        //     'min_stock' => 'required|numeric|min:0',
        //     'unit' => 'required|string',
        //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // Find product
        $product = Product::find($id);

        // Update fields
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id ?? null;
        $product->sku = $request->sku;
        $product->barcode = $request->barcode;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->stock = $request->stock;
        $product->min_stock = $request->min_stock;
        $product->unit = $request->unit;

        // Han
        if ($request->file('photo')) {
            $photoname = $request->name . "." . $request->file('photo')->extension();

            $photoPath = public_path('photo/' . $photoname);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }

            $request->file('photo')->move(public_path('photo'), $photoname);
            $product->photo = $photoname;
        }else{
            $product->photo = $product->photo ;
        }


        if ($product->save()) {
            return redirect('product')->with('success', "Product has been registred");
        } else {
            echo "error";
        };
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);

        return redirect('product')->with('success', "Product has been Deleted");
    }
    // ProductController.php

public function search(Request $request)
{
    // Get the search query
    $query = $request->input('query');

    // Search in the products table by 'name', 'sku', 'barcode', etc.
    $products = Product::where('name', 'LIKE', "%{$query}%")
                       ->orWhere('sku', 'LIKE', "%{$query}%")
                       ->orWhere('barcode', 'LIKE', "%{$query}%")
                       ->orWhere('category_id', 'LIKE', "%{$query}%")
                       ->paginate(10);  // Paginate the results to show 10 per page

    // Return the view with the products
    return view('pages.products.index', compact('products'));
}

}

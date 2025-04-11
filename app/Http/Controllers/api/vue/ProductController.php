<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('categories');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(2)->appends(['search' => $request->search]);

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */


        public function store(Request $request)
        {
            try {
                $product = new Product();
                $product->name = $request->name;
                $product->category_id = $request->category_id;

                if ($request->hasFile('photo')) {
                    $file = $request->file('photo');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('/uploads/users'), $filename);
                    $product->photo = '/uploads/users/' . $filename;
                }

                $product->purchase_price = $request->purchase_price;
                $product->selling_price = $request->selling_price;
                $product->stock = $request->stock;
                $product->min_stock = $request->min_stock;
                $product->save();

                return response()->json(['message' => 'Product created successfully!', 'product' => $product]);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage()]);
            }
        }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json($product);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'product not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Update product attributes
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->purchase_price = $request->purchase_price;
            $product->selling_price = $request->selling_price;
            $product->stock = $request->stock;
            $product->min_stock = $request->min_stock;

            // Handle the photo upload (if a new photo is uploaded)
            if ($request->hasFile('photo')) {
                // Delete the old photo if it exists (optional)
                if ($product->photo && file_exists(public_path($product->photo))) {
                    unlink(public_path($product->photo));
                }

                // Upload the new photo
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads/user'), $filename);
                $product->photo = '/uploads/user/' . $filename;
            }

            // Save the updated product
            $product->save();

            // Return a success response
            return response()->json(['message' => 'Product updated successfully!', 'product' => $product]);
        } catch (\Throwable $th) {
            // Handle any errors and return a response
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $products=  Product::destroy($id);
            return response()->json(["products"=> $products]);
        } catch (\Throwable $th) {
            return response()->json(["products"=>$th]);
        }
    }
}

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
        print_r($request->photo);die;
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            if (isset($request->photo)) {
                $product->photo = $request->photo->name;
            }
            $product->purchase_price = $request->purchase_price;
            $product->selling_price = $request->selling_price;
            $product->stock = $request->stock;
            $product->min_stock= $request->min_stock;

            date_default_timezone_set("Asia/Dhaka");
            $product->created_at = date('Y-m-d H:i:s');
            $product->updated_at = date('Y-m-d H:i:s');



            $product->save();
            if (isset($request->photo)) {
                $imageName = $product->id . '.' . $request->photo->extension();
                $product->photo = $imageName;
                $product->update();
                $request->photo->move(public_path('uploads/products'), $imageName);
            }
            return response()->json(["roles" =>  $product]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
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

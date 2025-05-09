<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class SelfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Categories::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $categories = $query->paginate(2); // Paginate 5 users per page

        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $self = new Categories();

            $self->name = $request->name;
            $self->save();

            return response()->json(["self" => $self]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $self = Categories::find($id);
            if (!$self) {
                return response()->json(["message" => "No Data found"]);
            }
            return response()->json(["self" => $self]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $self = Categories::find($id);
            if (!$self) {
                return response()->json(["message" => "Supplier not found"]);
            }

            $self->name = $request->name;

            $self->save();

            return response()->json(["res" => $self]);
        } catch (\Throwable $th) {
            return response()->json(["err" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $selfs = Categories::find($id);
            if (!$selfs) {
                return response()->json(["message" => "selfs not found"]);
            }
            $selfs->delete();
            return response()->json(["message" => "selfs deleted successfully"]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}

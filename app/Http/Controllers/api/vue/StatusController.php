<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\PaymentStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PaymentStatus::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $status = $query->paginate(2); // Paginate 5 users per page

        return response()->json($status);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $status = new PaymentStatus();

            $status->name = $request->name;
            $status->save();

            return response()->json(["status" => $status]);
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
            $status = PaymentStatus::find($id);
            if (!$status) {
                return response()->json(["message" => "No Data found"]);
            }
            return response()->json(["status" => $status]);
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
            $status = PaymentStatus::find($id);
            if (!$status) {
                return response()->json(["message" => "Status not found"]);
            }

            $status->name = $request->name;

            $status->save();

            return response()->json(["res" => $status]);
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
            $status = PaymentStatus::find($id);
            if (!$status) {
                return response()->json(["message" => "status not found"]);
            }
            $status->delete();
            return response()->json(["message" => "status deleted successfully"]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cupon::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $coupons = $query->paginate(2); // Paginate 5 users per page

        return response()->json($coupons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $coupon = new Cupon();

            $coupon->name = $request->name;
            $coupon->discount = $request->discount;
            $coupon->save();

            return response()->json(["coupon" => $coupon]);
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
            $coupon = Cupon::find($id);
            if (!$coupon) {
                return response()->json(["message" => "No Data found"]);
            }
            return response()->json(["coupon" => $coupon]);
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
            $coupon = Cupon::find($id);
            if (!$coupon) {
                return response()->json(["message" => "Coupon not found"]);
            }

            $coupon->name = $request->name;
            $coupon->discount = $request->discount;

            $coupon->save();

            return response()->json(["res" => $coupon]);
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
            $coupon=  Cupon::destroy($id);
            return response()->json(["coupon"=> $coupon]);
        } catch (\Throwable $th) {
            return response()->json(["coupon"=>$th]);
        }
    }
    }


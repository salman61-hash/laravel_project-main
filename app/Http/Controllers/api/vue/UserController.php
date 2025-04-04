<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();
            if (!$users) {
                $users ="Data Not Found";
            }
            return response()->json(["user"=> User::all()]);
        } catch (\Throwable $th) {

            return response()->json(["error"=> $th->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        try {
            $users=  User::destroy($id);
            return response()->json(["users"=> $users]);
        } catch (\Throwable $th) {
            return response()->json(["users"=>$th]);
        }
    }
}

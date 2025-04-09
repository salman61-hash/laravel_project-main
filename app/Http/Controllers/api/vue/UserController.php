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
    public function index(Request $request)
{
    $query = User::query();

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $users = $query->paginate(5)->appends(['search' => $request->search]);

    return response()->json($users);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            if (isset($request->photo)) {
                $user->photo = $request->photo;
            }
            $user->email = $request->email;
            $user->role_id = $request->role_id;

            date_default_timezone_set("Asia/Dhaka");
            $user->created_at = date('Y-m-d H:i:s');
            $user->updated_at = date('Y-m-d H:i:s');



            $user->save();
            if (isset($request->photo)) {
                $imageName = $user->id . '.' . $request->photo->extension();
                $user->photo = $imageName;
                $user->update();
                $request->photo->move(public_path('uploads/users'), $imageName);
            }
            return response()->json(["roles" =>  $user]);
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
            $user = User::findOrFail($id);
            return response()->json($user);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;

            date_default_timezone_set("Asia/Dhaka");
            $user->updated_at = date('Y-m-d H:i:s');

            if (isset($request->photo)) {
                // Remove old photo if needed (optional)
                if ($user->photo && file_exists(public_path('uploads/users/' . $user->photo))) {
                    unlink(public_path('uploads/users/' . $user->photo));
                }

                $imageName = $user->id . '.' . $request->photo->extension();
                $user->photo = $imageName;
                $request->photo->move(public_path('uploads/users'), $imageName);
            }

            $user->update();

            return response()->json(["user" => $user]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $users =  User::destroy($id);
            return response()->json(["users" => $users]);
        } catch (\Throwable $th) {
            return response()->json(["users" => $th]);
        }
    }
}

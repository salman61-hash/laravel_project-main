<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::paginate(3);
        return view('pages.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('pages.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new User instance
        $user = new User();

        // Assign values
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;

        // Handle photo upload
        if ($request->file('photo')) {
            $photoName = time() . '.' . $request->file('photo')->extension();

            $photoPath = public_path('uploads/users/' . $photoName);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }

            $request->file('photo')->move(public_path('uploads/users'), $photoName);
            $user->photo = $photoName;
        }

        if ($user->save()) {
            return redirect('users')->with('success', "User has been registered successfully");
        } else {
            return redirect()->back()->with('error', "Something went wrong!");
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roles = Role::get();
        $user = User::find($id);
        return view('pages.users.show', compact('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::get();
        $user = User::find($id);
        return view('pages.users.update', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:6',
        //     'role_id' => 'required|numeric',
        //     'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // Create a new User instance
        $user = User::find($id);

        // Assign values
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;

        // Handle photo upload
        if ($request->file('photo')) {
            $photoName = time() . '.' . $request->file('photo')->extension();

            $photoPath = public_path('uploads/users/' . $photoName);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }

            $request->file('photo')->move(public_path('uploads/users'), $photoName);
            $user->photo = $photoName;
        }

        if ($user->save()) {
            return redirect('users')->with('success', "User has been registered successfully");
        } else {
            return redirect()->back()->with('error', "Something went wrong!");
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect('users')->with('success', "users has been Deleted");
    }
}

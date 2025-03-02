<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::with('payments')->paginate(10); // Ensure 'payments' is the correct relationship
        return view('pages.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=new Account();
             $result->name= $request->name;

             if($result->save()){
              return redirect('accounts')->with('success',"Accounts has been registred");
             }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result=Account::find($id);
        return view('pages.accounts.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result=Account::find($id);
        return view('pages.accounts.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=Account::find($id);
             $result->name= $request->name;

             if($result->save()){
              return redirect('accounts')->with('success',"Student has been registred");
             }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=Account::find($id);
        return view('pages.accounts.delete',compact('result'));
    }
}

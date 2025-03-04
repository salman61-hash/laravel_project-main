<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use App\Models\WithdrawType;
use Illuminate\Http\Request;

class WithdrawTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results=WithdrawType::paginate(3);
        return view('pages.withdraw_type.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.withdraw_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=new WithdrawType();
             $result->name= $request->name;

             if($result->save()){
              return redirect('withdraw_type')->with('success',"Expensetype has been registred");
             }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result=WithdrawType::find($id);
        return view('pages.withdraw_type.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result=WithdrawType::find($id);
        return view('pages.withdraw_type.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=WithdrawType::find($id);
             $result->name= $request->name;

             if($result->save()){
              return redirect('withdraw_type')->with('success',"Student has been registred");
             }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=WithdrawType::find($id);
        return view('pages.categories.delete',compact('result'));
    }
}

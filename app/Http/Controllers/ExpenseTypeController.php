<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses=ExpenseType::paginate(3);
        return view('pages.Expense_type.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Expense_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=new ExpenseType();
             $result->name= $request->name;

             if($result->save()){
              return redirect('expense_type')->with('success',"ExpenseType has been registred");
             }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result=ExpenseType::find($id);
           return view('pages.Expense_type.create',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result=ExpenseType::find($id);
        return view('pages.Expense_type.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=ExpenseType::find($id);
             $result->name= $request->name;

             if($result->save()){
              return redirect('expense_type')->with('success',"ExpenseType has been registred");
             }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=ExpenseType::find($id);
        return view('pages.Expense_type.delete',compact('result'));
    }
}

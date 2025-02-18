<?php

namespace App\Http\Controllers;

use App\Models\PaymentStatus;
use Illuminate\Http\Request;

class PaymentstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = PaymentStatus::paginate(10);
        return view('pages.payment_status.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.payment_status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=new PaymentStatus();
             $result->name= $request->name;

             if($result->save()){
              return redirect('payment_status')->with('success',"payment_status has been registred");
             }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result=PaymentStatus::find($id);
        return view('pages.payment_status.show',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result=PaymentStatus::find($id);
        return view('pages.payment_status.update',compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3'
             ]);


              $result=PaymentStatus::find($id);
             $result->name= $request->name;

             if($result->save()){
              return redirect('payment_status')->with('success',"payment_status has been updated");
             }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result=PaymentStatus::destroy($id);
        if($result){
         return redirect('payment_status')->with('success', "payment_status has been Deleted");
        }
    }
}
